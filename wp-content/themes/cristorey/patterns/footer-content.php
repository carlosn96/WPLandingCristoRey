<?php
/**
 * Title: Footer Content
 * Slug: cristorey/footer-content
 * Categories: footer
 * Description: Footer columns with dynamic links.
 */
?>
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}}} -->
<div class="wp-block-columns alignwide">
    <!-- wp:column {"width":"30%"} -->
    <div class="wp-block-column" style="flex-basis:30%">
        <!-- wp:site-title {"style":{"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase","letterSpacing":"1px","fontSize":"18px"}},"textColor":"theme-3"} /-->

        <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.7"},"spacing":{"margin":{"top":"12px"}}}} -->
        <p style="margin-top:12px;font-size:0.875rem;line-height:1.7">Comunidad católica fundamentada en la
            Espiritualidad de la Comunión y Fraternidad.</p>
        <!-- /wp:paragraph -->

        <!-- wp:social-links {"iconColor":"theme-3","iconColorValue":"#d4af37","size":"has-small-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"left":"16px"},"margin":{"top":"16px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <ul class="wp-block-social-links has-icon-color has-small-icon-size is-style-logos-only"
            style="margin-top:16px">
            <!-- wp:social-link {"url":"https://facebook.com","service":"facebook"} /-->
            <!-- wp:social-link {"url":"https://youtube.com","service":"youtube"} /-->
            <!-- wp:social-link {"url":"https://instagram.com","service":"instagram"} /-->
        </ul>
        <!-- /wp:social-links -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"width":"20%"} -->
    <div class="wp-block-column" style="flex-basis:20%">
        <!-- wp:heading {"level":4,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"2px","fontSize":"0.75rem","fontWeight":"600"},"spacing":{"margin":{"bottom":"12px"}}},"textColor":"theme-3"} -->
        <h4 class="wp-block-heading has-theme-3-color has-text-color"
            style="margin-bottom:12px;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:2px">
            Navegación</h4>
        <!-- /wp:heading -->
        <!-- wp:list {"className":"is-style-default","style":{"typography":{"fontSize":"0.875rem"},"spacing":{"blockGap":"6px"}}} -->
        <ul class="is-style-default" style="font-size:0.875rem">
            <!-- wp:list-item -->
            <li><a href="<?php echo esc_url(home_url('/')); ?>">Inicio</a></li><!-- /wp:list-item -->
            <!-- wp:list-item -->
            <li><a href="<?php echo esc_url(home_url('/ministerios/')); ?>">Ministerios</a></li><!-- /wp:list-item -->
            <!-- wp:list-item -->
            <li><a href="<?php echo esc_url(home_url('/verbum-domini/')); ?>">Verbum Domini</a></li>
            <!-- /wp:list-item -->
            <!-- wp:list-item -->
            <li><a href="<?php echo esc_url(home_url('/soy-nuevo/')); ?>">Soy Nuevo</a></li><!-- /wp:list-item -->
            <!-- wp:list-item -->
            <li><a href="<?php echo esc_url(home_url('/contacto/')); ?>">Contacto</a></li><!-- /wp:list-item -->
        </ul>
        <!-- /wp:list -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"width":"20%"} -->
    <div class="wp-block-column" style="flex-basis:20%">
        <!-- wp:heading {"level":4,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"2px","fontSize":"0.75rem","fontWeight":"600"},"spacing":{"margin":{"bottom":"12px"}}},"textColor":"theme-3"} -->
        <h4 class="wp-block-heading has-theme-3-color has-text-color"
            style="margin-bottom:12px;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:2px">
            Horarios de Misa</h4>
        <!-- /wp:heading -->
        <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.7"}}} -->
        <p style="font-size:0.875rem;line-height:1.7"><strong>Domingos</strong><br>10:00 AM · 12:00 PM · 6:00 PM</p>
        <!-- /wp:paragraph -->
        <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.7"}}} -->
        <p style="font-size:0.875rem;line-height:1.7"><strong>Entre Semana</strong><br>Lun – Vie: 7:00 PM</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"width":"30%"} -->
    <div class="wp-block-column" style="flex-basis:30%">
        <!-- wp:heading {"level":4,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"2px","fontSize":"0.75rem","fontWeight":"600"},"spacing":{"margin":{"bottom":"12px"}}},"textColor":"theme-3"} -->
        <h4 class="wp-block-heading has-theme-3-color has-text-color"
            style="margin-bottom:12px;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:2px">
            Contacto</h4>
        <!-- /wp:heading -->
        <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.7"}}} -->
        <p style="font-size:0.875rem;line-height:1.7">Calle del Santuario #123<br>Col. Centro, Ciudad, CP 12345<br>Tel:
            (33) 1234-5678<br>info@cristoreyrc.com</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:separator {"className":"is-style-wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|30"}},"color":{"text":"rgba(255,255,255,0.15)"}}} -->
<hr class="wp-block-separator has-text-color is-style-wide"
    style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--30);color:rgba(255,255,255,0.15)" />
<!-- /wp:separator -->

<!-- wp:group {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide">
    <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.75rem"}}} -->
    <p style="font-size:0.75rem">© <?php echo date('Y'); ?> Parroquia Cristo Rey del Universo. Todos los derechos
        reservados.</p>
    <!-- /wp:paragraph -->
    <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.75rem"}}} -->
    <p style="font-size:0.75rem"><a href="<?php echo esc_url(home_url('/privacidad/')); ?>">Privacidad</a> · <a
            href="<?php echo esc_url(home_url('/terminos/')); ?>">Términos</a></p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->