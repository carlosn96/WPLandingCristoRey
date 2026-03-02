<?php
/**
 * Theme functions and definitions
 */

if (!function_exists('cristorey_v2_setup')):
    function cristorey_v2_setup()
    {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title.
        add_theme_support('title-tag');

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__('Primary', 'cristorey-v2'),
                'footer' => esc_html__('Footer Menu', 'cristorey-v2'),
            )
        );

        // Switch default core markup for search form, comment form, and comments to output valid HTML5.
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );
    }
endif;
add_action('after_setup_theme', 'cristorey_v2_setup');

/**
 * Enqueue scripts and styles.
 */
function cristorey_v2_scripts()
{
    // 1. Google Fonts: Cinzel Decorative and Poppins
    wp_enqueue_style('cristorey-v2-fonts', 'https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap', array(), null);

    // 2. Main Stylesheet
    wp_enqueue_style('cristorey-v2-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));

    // --- SCRIPTS ---

    // 3. Lenis (Smooth Scroll)
    wp_enqueue_script('lenis-js', 'https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.29/bundled/lenis.min.js', array(), '1.0.29', true);

    // 4. GSAP Core & ScrollTrigger
    wp_enqueue_script('gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), '3.12.2', true);
    wp_enqueue_script('gsap-scrolltrigger-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array('gsap-js'), '3.12.2', true);

    // 5. SplitType (Free alternative to SplitText for word/line animation)
    wp_enqueue_script('splittype-js', 'https://unpkg.com/split-type', array(), '0.3.3', true);

    // 6. Theme Main JS
    wp_enqueue_script('cristorey-v2-main-js', get_template_directory_uri() . '/js/main.js', array('lenis-js', 'gsap-js', 'gsap-scrolltrigger-js', 'splittype-js'), wp_get_theme()->get('Version'), true);
}
add_action('wp_enqueue_scripts', 'cristorey_v2_scripts');
