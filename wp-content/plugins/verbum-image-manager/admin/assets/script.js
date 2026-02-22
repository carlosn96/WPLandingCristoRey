jQuery(document).ready(function ($) {
    let currentPostId = null;
    let selectedMediaId = null;
    let allPosts = [];

    // Cargar posts al iniciar
    loadPosts();

    function loadPosts() {
        $('#vbim-post-list').html('<div class="vbim-loader">Cargando entradas...</div>');
        $.ajax({
            url: vbimData.ajaxUrl,
            type: 'POST',
            data: {
                action: 'vbim_get_posts',
                nonce: vbimData.nonce
            },
            success: function (response) {
                if (response.success) {
                    allPosts = response.data;
                    renderPostGrid(allPosts);
                } else {
                    $('#vbim-post-list').html('<div class="vbim-loader">Error al cargar entradas.</div>');
                }
            }
        });
    }

    function renderPostGrid(posts) {
        let html = '';
        if (posts.length === 0) {
            html = '<div class="vbim-loader">No se encontraron entradas de Verbum Domini.</div>';
        } else {
            posts.forEach(post => {
                html += `
                    <div class="vbim-card" data-id="${post.id}">
                        <div class="vbim-card-img">
                            <img src="${post.image}" alt="${post.title}">
                        </div>
                        <div class="vbim-card-content">
                            <h3>${post.title}</h3>
                            <div class="vbim-card-footer">
                                <span class="status-badge status-${post.status}">${post.status}</span>
                                <span>${post.date}</span>
                            </div>
                        </div>
                    </div>
                `;
            });
        }
        $('#vbim-post-list').html(html);
    }

    // Buscador
    $('#vbim-search').on('input', function () {
        const query = $(this).val().toLowerCase();
        const filtered = allPosts.filter(post => post.title.toLowerCase().includes(query));
        renderPostGrid(filtered);
    });

    // Refresh
    $('#vbim-refresh').click(function () {
        loadPosts();
    });

    // Abrir Modal
    $(document).on('click', '.vbim-card', function () {
        const id = $(this).data('id');
        const post = allPosts.find(p => p.id == id);

        currentPostId = id;
        $('#modal-post-title').text(post.title);
        $('#modal-post-status').text(post.status).attr('class', 'status-badge status-' + post.status);
        $('#modal-post-date').text(post.date);
        $('#vbim-preview-img').attr('src', post.image);

        $('#vbim-update-actions').hide();
        $('#vbim-modal').fadeIn();
    });

    // Cerrar Modal
    $('.vbim-close').click(function () {
        $('#vbim-modal').fadeOut();
    });

    // Selector de Medios de WP
    $('#vbim-open-media').click(function (e) {
        e.preventDefault();
        const frame = wp.media({
            title: 'Seleccionar imagen para Verbum Domini',
            button: { text: 'Usar esta imagen' },
            multiple: false
        });

        frame.on('select', function () {
            const attachment = frame.state().get('selection').first().toJSON();
            selectedMediaId = attachment.id;
            $('#vbim-preview-img').attr('src', attachment.url);
            $('#vbim-update-actions').show();
        });

        frame.open();
    });

    // Guardar Cambios (AJAX)
    $('#vbim-save-changes').click(function () {
        const $btn = $(this);
        $btn.prop('disabled', true).text('Actualizando...');

        $.ajax({
            url: vbimData.ajaxUrl,
            type: 'POST',
            data: {
                action: 'vbim_update_post',
                nonce: vbimData.nonce,
                post_id: currentPostId,
                media_id: selectedMediaId
            },
            success: function (response) {
                if (response.success) {
                    alert(response.data.message);
                    $('#vbim-modal').fadeOut();
                    loadPosts();
                } else {
                    alert('Error: ' + response.data);
                }
            },
            complete: function () {
                $btn.prop('disabled', false).text('Actualizar Entrada');
            }
        });
    });
});
