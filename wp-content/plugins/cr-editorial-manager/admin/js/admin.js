jQuery(document).ready(function ($) {

    var mediaUploader;
    var pdfUploader;

    // Selector de Imagen
    $('#cr_btn_cover').on('click', function (e) {
        e.preventDefault();
        
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Elige la Portada de la Revista',
            button: {text: 'Usar esta Portada'},
            multiple: false,
            library: {type: 'image'}
        });
        
        mediaUploader.on('select', function () {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#cr_cover_id').val(attachment.id);
            if (attachment.url) {
                $('#cr_cover_preview').html('<img src="' + attachment.url + '" style="max-width:150px; height:auto;border-radius:4px;box-shadow:0 1px 3px rgba(0,0,0,0.1);"/>');
            }
        });
        
        mediaUploader.open();
    });

    // Selector de PDF
    $('#cr_btn_pdf').on('click', function (e) {
        e.preventDefault();
        
        if (pdfUploader) {
            pdfUploader.open();
            return;
        }
        
        pdfUploader = wp.media.frames.file_frame = wp.media({
            title: 'Sube o elige tu archivo PDF',
            button: {text: 'Usar este PDF'},
            multiple: false,
            library: {type: 'application/pdf'} // Filtrar a solo PDF
        });
        
        pdfUploader.on('select', function () {
            var attachment = pdfUploader.state().get('selection').first().toJSON();
            $('#cr_pdf_id').val(attachment.id);
            if (attachment.filename) {
                $('#cr_pdf_preview').html('<span class="dashicons dashicons-media-document" style="font-size:32px;width:32px;height:32px;padding-right:10px;"></span> <strong>' + attachment.filename + '</strong><br><small>(' + (attachment.filesizeHumanReadable || '') + ')</small>');
            }
        });
        
        pdfUploader.open();
    });

    // Enviar AJAX
    $('#cr_btn_publish').on('click', function (e) {
        e.preventDefault();
        
        var title = $('#cr_post_title').val();
        var coverId = $('#cr_cover_id').val();
        var pdfId = $('#cr_pdf_id').val();
        var msgBox = $('#cr_message_box');
        var loading = $('#cr_loading');

        msgBox.hide().html('');

        if (!title || !coverId || !pdfId) {
            msgBox.html('<div class="notice notice-error"><p>Es necesario seleccionar la Imagen, el PDF y escribir un Título.</p></div>').fadeIn();
            return;
        }

        loading.show();
        $(this).attr('disabled', 'disabled');

        var data = {
            action: 'cr_publicar_editorial',
            nonce: crEditorialData.nonce,
            title: title,
            cover_id: coverId,
            pdf_id: pdfId
        };

        $.post(crEditorialData.ajax_url, data, function (response) {
            loading.hide();
            $('#cr_btn_publish').removeAttr('disabled');

            if (response.success) {
                msgBox.html(`
                    <div class="notice notice-success is-dismissible" style="padding: 15px;">
                        <span class="dashicons dashicons-yes" style="color:#00a32a; font-size:30px; line-height:30px; float:left;"></span>
                        <div style="margin-left:40px;">
                            <h3 style="margin-top:0;">${response.data.message}</h3>
                            <p><a href="${response.data.url}" target="_blank" class="button button-primary">Ver Publicación</a></p>
                        </div>
                    </div>
                `).fadeIn();
                
                // Reset form
                $('#cr_cover_id, #cr_pdf_id').val('');
                $('#cr_cover_preview').html('<i>No hay imagen seleccionada</i>');
                $('#cr_pdf_preview').html('<i>No hay PDF seleccionado</i>');
            } else {
                msgBox.html('<div class="notice notice-error"><p>Error: ' + response.data + '</p></div>').fadeIn();
            }
        }).fail(function () {
            loading.hide();
            $('#cr_btn_publish').removeAttr('disabled');
            msgBox.html('<div class="notice notice-error"><p>Error crítico. Falla en el servidor.</p></div>').fadeIn();
        });
    });
});
