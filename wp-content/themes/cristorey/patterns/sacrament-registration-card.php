<?php
/**
 * Title: Sacrament Registration Card
 * Slug: cristorey/sacrament-registration-card
 * Categories: featured, text
 * Description: An interactive card for sacrament registration.
 */
?>
<!-- wp:group {"style":{"border":{"width":"1px","style":"solid","color":"var:preset|color|theme-3"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"shadow":"var:preset|shadow|natural"},"backgroundColor":"theme-1","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-theme-1-background-color has-background"
    style="border-color:var(--wp--preset--color--theme-3);border-width:1px;border-style:solid;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);box-shadow:var(--wp--preset--shadow--natural)">
    <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"theme-2"} -->
    <h2 class="wp-block-heading has-text-align-center has-theme-4-color has-text-color"
        style="font-style:normal;font-weight:700">Registro Sacramental</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1rem"}}} -->
    <p class="has-text-align-center" style="font-size:1rem">Inicia tu proceso de registro para Bautismos o Matrimonios.
    </p>
    <!-- /wp:paragraph -->

    <!-- wp:separator {"className":"is-style-wide"} -->
    <hr class="wp-block-separator alignwide is-style-wide" />
    <!-- /wp:separator -->

    <form class="sacrament-form">
        <!-- wp:paragraph -->
        <p><label>Nombre Completo</label><br>
            <input type="text" name="fullname" placeholder="Escribe tu nombre..."
                style="width:100%; padding: 12px; border: 1px solid var(--wp--preset--color--theme-2); background: transparent;">
        </p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph -->
        <p><label>Sacramento Solicitado</label><br>
            <select name="sacrament"
                style="width:100%; padding: 12px; border: 1px solid var(--wp--preset--color--theme-2); background: transparent;">
                <option value="bautismo">Bautismo</option>
                <option value="matrimonio">Matrimonio</option>
                <option value="primera_comunion">Primera Comunión</option>
            </select>
        </p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph -->
        <p><label>Teléfono de Contacto</label><br>
            <input type="tel" name="phone" placeholder="(33) ..."
                style="width:100%; padding: 12px; border: 1px solid var(--wp--preset--color--theme-2); background: transparent;">
        </p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-buttons">
            <!-- wp:button {"backgroundColor":"theme-2","textColor":"theme-1","width":100,"className":"is-style-fill"} -->
            <div class="wp-block-button has-custom-width is-style-fill wp-block-button__width-100"><a
                    class="wp-block-button__link has-theme-1-color has-theme-2-background-color has-text-color has-background wp-element-button">Iniciar
                    Trámite</a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </form>
</div>
<!-- /wp:group -->