<?php
/**
 * Title: Hero Section
 * Slug: cristorey/hero-section
 * Categories: hero
 * Description: Hero section with lazy-loaded video background and poster fallback.
 */
?>
<!-- wp:group {"metadata":{"name":"Hero","patternCategory":"hero","patternSubcategory":"","remotePatternId":17797},"className":"is-style-section-2 hero-video-section","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-section-2 hero-video-section">

    <!-- wp:group {"tagName":"section","className":"hero-video-container","layout":{"type":"constrained"}} -->
    <section class="wp-block-group hero-video-container">
        <!-- Optimized Video: Preload none, Poster fallback, Local asset -->
        <video autoplay muted loop playsinline class="hero-bg-video" preload="none"
            poster="<?php echo esc_url(get_theme_file_uri('assets/images/hero-poster.jpg')); ?>">
            <source src="<?php echo esc_url(get_theme_file_uri('assets/videos/hero.mp4')); ?>" type="video/mp4">
        </video>

        <div class="hero-overlay"></div>

        <!-- wp:group {"metadata":{"name":"Content"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group alignwide"
            style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
            <!-- wp:heading {"textAlign":"center","level":1,"className":"hero-tagline reveal","style":{"typography":{"fontSize":"clamp(2rem, 5vw, 4rem)","lineHeight":"1.1","textTransform":"uppercase"}}} -->
            <h1 class="wp-block-heading has-text-align-center hero-tagline reveal"
                style="font-size:clamp(2rem, 5vw, 4rem);line-height:1.1;text-transform:uppercase">Cristo Rey del
                Universo: <br>¡Venga a nosotros tu Reino!</h1>
            <!-- /wp:heading -->

            <!-- wp:spacer {"height":"var:preset|spacing|40"} -->
            <div style="height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer -->

            <!-- wp:paragraph {"align":"center","className":"reveal","style":{"typography":{"fontSize":"var:preset|font-size|large","fontStyle":"italic"}}} -->
            <p class="has-text-align-center reveal has-large-font-size" style="font-style:italic">Inspiring · Spiritual
                · Welcoming · Solemn</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </section>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->