<?php
/**
 * Title: Hero Section
 * Slug: cristorey/hero-section
 * Categories: hero
 * Description: Cinematic hero with mask reveals, parallax depth, and staggered choreography.
 */
?>
<!-- wp:group {"metadata":{"name":"Hero","patternCategory":"hero"},"className":"is-style-section-2 hero-video-section","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-section-2 hero-video-section">

    <!-- wp:group {"tagName":"section","className":"hero-video-container depth-container","layout":{"type":"constrained"}} -->
    <section class="wp-block-group hero-video-container depth-container">
        <!-- Optimized Video: Preload none, Poster fallback, Local asset -->
        <video autoplay muted loop playsinline class="hero-bg-video" preload="none"
            poster="<?php echo esc_url(get_theme_file_uri('assets/images/hero-poster.jpg')); ?>">
            <source src="<?php echo esc_url(get_theme_file_uri('assets/videos/hero.mp4')); ?>" type="video/mp4">
        </video>

        <div class="hero-overlay" data-parallax="0.08"></div>

        <!-- wp:group {"metadata":{"name":"Content"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|90"}}},"layout":{"type":"constrained","contentSize":"800px"}} -->
        <div class="wp-block-group alignwide"
            style="padding-top:var(--wp--preset--spacing--90);padding-bottom:var(--wp--preset--spacing--90)">

            <!-- wp:heading {"textAlign":"center","level":1,"className":"hero-tagline reveal-mask","style":{"typography":{"fontSize":"clamp(2.2rem, 5.5vw, 4.5rem)","lineHeight":"1.05","textTransform":"uppercase","letterSpacing":"0.02em","fontWeight":"400"}}} -->
            <h1 class="wp-block-heading has-text-align-center hero-tagline reveal-mask"
                style="font-size:clamp(2.2rem, 5.5vw, 4.5rem);line-height:1.05;text-transform:uppercase;letter-spacing:0.02em;font-weight:400">
                Cristo Rey del
                Universo: <br>¡Venga a nosotros tu Reino!</h1>
            <!-- /wp:heading -->

            <!-- wp:spacer {"height":"var:preset|spacing|30"} -->
            <div style="height:var(--wp--preset--spacing--30)" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer -->

            <!-- wp:paragraph {"align":"center","className":"reveal-mask reveal-delay-2","style":{"typography":{"fontSize":"clamp(1rem, 2vw, 1.25rem)","fontStyle":"italic","letterSpacing":"0.08em","fontWeight":"300"}}} -->
            <p class="has-text-align-center reveal-mask reveal-delay-2"
                style="font-style:italic;font-size:clamp(1rem, 2vw, 1.25rem);letter-spacing:0.08em;font-weight:300">
                Inspiring · Spiritual
                · Welcoming · Solemn</p>
            <!-- /wp:paragraph -->

            <!-- wp:spacer {"height":"var:preset|spacing|40"} -->
            <div style="height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer -->

            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"className":"reveal-mask reveal-delay-3"} -->
            <div class="wp-block-buttons reveal-mask reveal-delay-3">
                <!-- wp:button {"backgroundColor":"theme-3","textColor":"theme-2","className":"is-style-fill","style":{"border":{"radius":"100px"},"spacing":{"padding":{"top":"14px","bottom":"14px","left":"32px","right":"32px"}},"typography":{"fontSize":"14px","fontWeight":"600","letterSpacing":"0.5px","textTransform":"uppercase"}}} -->
                <div class="wp-block-button has-custom-font-size is-style-fill"
                    style="font-size:14px;font-weight:600;letter-spacing:0.5px;text-transform:uppercase"><a
                        class="wp-block-button__link has-theme-1-color has-theme-3-background-color has-text-color has-background wp-element-button"
                        href="<?php echo esc_url(home_url('/soy-nuevo/')); ?>"
                        style="border-radius:100px;padding-top:14px;padding-right:32px;padding-bottom:14px;padding-left:32px">Planifica
                        tu Visita</a>
                </div>
                <!-- /wp:button -->
                <!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"100px"},"spacing":{"padding":{"top":"14px","bottom":"14px","left":"32px","right":"32px"}},"typography":{"fontSize":"14px","fontWeight":"500","letterSpacing":"0.5px"}}} -->
                <div class="wp-block-button has-custom-font-size is-style-outline"
                    style="font-size:14px;font-weight:500;letter-spacing:0.5px"><a
                        class="wp-block-button__link wp-element-button"
                        href="<?php echo esc_url(home_url('/horarios/')); ?>"
                        style="border-radius:100px;padding-top:14px;padding-right:32px;padding-bottom:14px;padding-left:32px">Horarios
                        de Misa</a>
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
    </section>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->