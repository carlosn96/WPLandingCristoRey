<?php
/**
 * Assembler functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Assembler
 * @since Assembler 1.0
 */

declare(strict_types=1);

if (!function_exists('assembler_unregister_patterns')):
	/**
	 * Unregister Jetpack patterns and core patterns bundled in WordPress.
	 */
	function assembler_unregister_patterns()
	{
		$pattern_names = array(
			// Jetpack form patterns.
			'contact-form',
			'newsletter-form',
			'rsvp-form',
			'registration-form',
			'appointment-form',
			'feedback-form',
			// Patterns bundled in WordPress core.
			// These would be removed by remove_theme_support( 'core-block-patterns' )
			// if it's called on the init action with priority 9 from a plugin, not from a theme.
			'core/query-standard-posts',
			'core/query-medium-posts',
			'core/query-small-posts',
			'core/query-grid-posts',
			'core/query-large-title-posts',
			'core/query-offset-posts',
			'core/social-links-shared-background-color',
		);
		foreach ($pattern_names as $pattern_name) {
			$pattern = \WP_Block_Patterns_Registry::get_instance()->get_registered($pattern_name);
			if ($pattern) {
				unregister_block_pattern($pattern_name);
			}
		}
	}

endif;

if (!function_exists('assembler_setup')):
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Assembler 1.0
	 *
	 * @return void
	 */
	function assembler_setup()
	{

		// Make theme available for translation.
		load_theme_textdomain('assembler');

		// Enqueue editor styles.
		add_editor_style('style.css');
		// Unregister Jetpack form patterns and core patterns bundled in WordPress.
		// Simple sites
		assembler_unregister_patterns();
		add_filter('wp_loaded', function () {
			// Atomic sites
			assembler_unregister_patterns();
		});
		// Remove theme support for the core and featured patterns coming from the Dotorg pattern directory.
		remove_theme_support('core-block-patterns');
	}

endif;

add_action('after_setup_theme', 'assembler_setup');

/**
 * Enqueue Scripts & Styles
 */
function assembler_scripts()
{
	// Register theme stylesheet.
	wp_register_style(
		'assembler-style',
		get_stylesheet_directory_uri() . '/style.css',
		array(),
		wp_get_theme()->get('Version')
	);

	wp_enqueue_style('assembler-style');

	// Interactive behaviors (Sticky Header + Scroll Reveal)
	$script_data = <<<'JS'
    document.addEventListener('DOMContentLoaded', function() {
        // 1. Reduced Motion Check
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        // 2. Scroll Reveal (IntersectionObserver)
        if (!prefersReducedMotion) {
            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        // Stagger effect based on index/order if needed, or just standard
                        setTimeout(() => {
                            entry.target.classList.add('active');
                        }, 100); // slight delay to ensure smooth entry
                        revealObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));
        }

        // 3. Sticky Header State
        const header = document.querySelector('.is-sticky-header');
        if (header) {
            const headerObserver = new IntersectionObserver(([e]) => {
                e.target.classList.toggle('scrolled', e.intersectionRatio < 1);
            }, { threshold: [1] });

            // Create a sentinel to detect when header is unstuck (at top)
            const sentinel = document.createElement('div');
            sentinel.style.position = 'absolute';
            sentinel.style.top = '0';
            sentinel.style.height = '1px';
            sentinel.style.width = '100%';
            sentinel.style.pointerEvents = 'none';
            document.body.prepend(sentinel);

            // Observe the sentinel
            const stickyObserver = new IntersectionObserver(([e]) => {
                header.classList.toggle('scrolled', !e.isIntersecting);
            }, { rootMargin: '-1px 0px 0px 0px', threshold: [1] });
            
            stickyObserver.observe(sentinel);
        }
    });
JS;

	// Register script with defer strategy
	wp_register_script('assembler-script', false, array(), false, array('strategy' => 'defer'));
	wp_enqueue_script('assembler-script');
	wp_add_inline_script('assembler-script', $script_data);
}
add_action('wp_enqueue_scripts', 'assembler_scripts');

/**
 * Remove default assembler_styles action to avoid duplicate enqueue
 */
// Note: We replaced the original assembler_styles with assembler_scripts which handles both.
// We will remove the original hook if it exists, but since we are editing the file, we can just replace the block.

/**
 * Preload Fonts & Schema for SEO/Performance
 */
function assembler_head_optimizations()
{
	?>
	<!-- Preload Critical Fonts -->
	<link rel="preload"
		href="<?php echo esc_url(get_theme_file_uri('assets/fonts/cinzel-decorative/cinzel-decorative-700.woff2')); ?>"
		as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?php echo esc_url(get_theme_file_uri('assets/fonts/poppins/poppins-400.woff2')); ?>"
		as="font" type="font/woff2" crossorigin>

	<!-- Critical CSS to prevent FOUC/Layout Shift -->
	<style>
		.hero-video-section {
			background-color: #0b1d37;
			min-height: 80vh;
		}

		.is-sticky-header {
			position: sticky;
			top: 0;
			z-index: 1000;
		}
	</style>

	<!-- Schema.org JSON-LD -->
	<script type="application/ld+json">
						{
						  "@context": "https://schema.org",
						  "@type": "CatholicChurch",
						  "@id": "<?php echo esc_url(home_url('/#organization')); ?>",
						  "name": "Parroquia Cristo Rey del Universo",
						  "description": "Una comunidad católica basada en la Espiritualidad de la Comunión y Fraternidad.",
						  "url": "<?php echo esc_url(home_url()); ?>",
						  "logo": "<?php echo esc_url(get_site_icon_url()); ?>",
						  "image": "<?php echo esc_url(get_site_icon_url()); ?>",
						  "address": {
							"@type": "PostalAddress",
							"streetAddress": "Calle del Santuario #123",
							"addressLocality": "Ciudad",
							"addressRegion": "Jalisco",
							"postalCode": "12345",
							"addressCountry": "MX"
						  },
						  "geo": {
							"@type": "GeoCoordinates",
							"latitude": 20.659698,
							"longitude": -103.349609
						  },
						  "telephone": "+52-33-1234-5678",
						  "openingHoursSpecification": [
							{
							  "@type": "OpeningHoursSpecification",
							  "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
							  "opens": "09:00",
							  "closes": "19:00"
							},
							{
							  "@type": "OpeningHoursSpecification",
							  "dayOfWeek": "Saturday",
							  "opens": "10:00",
							  "closes": "20:00"
							},
							{
							  "@type": "OpeningHoursSpecification",
							  "dayOfWeek": "Sunday",
							  "opens": "08:00",
							  "closes": "21:00"
							}
						  ]
						}
						</script>
	<script type="application/ld+json">
						{
						  "@context": "https://schema.org",
						  "@type": "WebSite",
						  "@id": "<?php echo esc_url(home_url('/#website')); ?>",
						  "url": "<?php echo esc_url(home_url()); ?>",
						  "name": "<?php echo esc_js(get_bloginfo('name')); ?>",
						  "description": "<?php echo esc_js(get_bloginfo('description')); ?>",
						  "publisher": {
							"@id": "<?php echo esc_url(home_url('/#organization')); ?>"
						  },
						  "inLanguage": "es-MX"
						}
						</script>
	<?php
}
add_action('wp_head', 'assembler_head_optimizations');



/**
 * Automate Content Creation (versioned installer)
 * Bump CRISTOREY_CONTENT_VERSION when adding new pages.
 */
define('CRISTOREY_CONTENT_VERSION', 2);

function assembler_install_content()
{
	$installed_version = (int) get_option('cristorey_content_version', 0);
	if ($installed_version >= CRISTOREY_CONTENT_VERSION) {
		return;
	}

	// Page definitions: slug => [title, pattern_slug]
	$pages = array(
		'inicio' => array('Inicio', 'cristorey/home-content'),
		'ministerios' => array('Ministerios', 'cristorey/ministries-overview'),
		'verbum-domini' => array('Verbum Domini', 'cristorey/verbum-domini-listing'),
		'horarios' => array('Horarios de Misa', 'cristorey/page-horarios'),
		'soy-nuevo' => array('Soy Nuevo', 'cristorey/page-soy-nuevo'),
		'contacto' => array('Contacto', 'cristorey/page-contacto'),
		'donar' => array('Donar', 'cristorey/page-donar'),
		'privacidad' => array('Política de Privacidad', 'cristorey/page-privacidad'),
		'terminos' => array('Términos de Uso', 'cristorey/page-terminos'),
	);

	foreach ($pages as $slug => $meta) {
		$existing = get_page_by_path($slug);
		if (!$existing) {
			$page_id = wp_insert_post(array(
				'post_title' => $meta[0],
				'post_name' => $slug,
				'post_content' => '<!-- wp:pattern {"slug":"' . $meta[1] . '"} /-->',
				'post_status' => 'publish',
				'post_type' => 'page',
			));

			// Set Inicio as static front page
			if ($slug === 'inicio' && $page_id && !is_wp_error($page_id)) {
				update_option('show_on_front', 'page');
				update_option('page_on_front', $page_id);
			}
		}
	}

	// Create Blog page for posts
	$blog = get_page_by_path('blog');
	if (!$blog) {
		$blog_id = wp_insert_post(array(
			'post_title' => 'Blog',
			'post_name' => 'blog',
			'post_content' => '',
			'post_status' => 'publish',
			'post_type' => 'page',
		));
		if ($blog_id && !is_wp_error($blog_id)) {
			update_option('page_for_posts', $blog_id);
		}
	}

	update_option('cristorey_content_version', CRISTOREY_CONTENT_VERSION);
}
add_action('init', 'assembler_install_content');
