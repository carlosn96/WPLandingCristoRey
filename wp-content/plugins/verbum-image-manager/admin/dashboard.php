<div class="wrap vbim-dashboard">
    <header class="vbim-header">
        <div class="vbim-logo">
            <span class="dashicons dashicons-images-alt2"></span>
            <h1>Verbum Image Manager</h1>
        </div>
        <p class="vbim-tagline">Gestión editorial de imágenes para Verbum Domini</p>
    </header>

    <div id="vbim-app">
        <div class="vbim-grid-filters">
            <input type="text" id="vbim-search" placeholder="Buscar entrada por título...">
            <button id="vbim-refresh" class="button button-secondary">
                <span class="dashicons dashicons-update"></span> Actualizar Lista
            </button>
        </div>

        <div id="vbim-post-list" class="vbim-post-grid">
            <!-- Cargando... -->
            <div class="vbim-loader">Cargando entradas...</div>
        </div>
    </div>

    <!-- Modal de Edición -->
    <div id="vbim-modal" class="vbim-modal">
        <div class="vbim-modal-content">
            <span class="vbim-close">&times;</span>
            <h2 id="modal-post-title" class="cinzel">Editar Imagen</h2>

            <div class="vbim-edit-container">
                <div class="vbim-current-preview">
                    <label>Imagen Actual / Previsualización</label>
                    <div class="preview-box">
                        <img id="vbim-preview-img" src="" alt="Vista previa">
                    </div>
                    <button id="vbim-open-media" class="button button-primary button-large">
                        Elegir Nueva Imagen
                    </button>
                </div>

                <div class="vbim-info-panel">
                    <div class="vbim-meta-status">
                        <span id="modal-post-status" class="status-badge"></span>
                        <span id="modal-post-date"></span>
                    </div>
                    <p class="vbim-instruction">
                        Al seleccionar una nueva imagen, el post se re-generará automáticamente manteniendo el diseño de
                        Verbum Domini.
                    </p>

                    <div id="vbim-update-actions" style="display:none;">
                        <hr>
                        <button id="vbim-save-changes" class="button button-hero button-primary" style="width:100%;">
                            Actualizar Entrada
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>