<?php
/**
 * Plantilla principal de Archivo para la sección Editorial (Revistas)
 * Muestra el último número en grande y la hemeroteca abajo.
 */

get_header();

$home_url = esc_url(home_url('/'));

// Fetch the LATEST Editorial post
$latest_args = array(
    'post_type'      => 'editorial',
    'posts_per_page' => 1,
    'post_status'    => 'publish',
);
$latest_query = new WP_Query($latest_args);

$has_editorial = $latest_query->have_posts();
$editorial_id = 0;
$title = __('Editorial del Mes', 'cristorey-v2');
$excerpt = __('Mantente al día con nuestros artículos y reflexiones para la comunidad.', 'cristorey-v2');

if ($has_editorial) {
    $latest_query->the_post();
    $editorial_id = get_the_ID();
    $title = get_the_title();
    $excerpt = has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 15);
}
wp_reset_postdata();

?>

<main id="primary" class="site-main editorial-page">

    <section class="cr-hero cr-hero--split cr-bg-dark editorial-hero">
        <div class="cr-hero__bg" style="background-image: url('<?php echo ( $has_editorial && has_post_thumbnail($editorial_id) ) ? get_the_post_thumbnail_url($editorial_id, 'full') : esc_url(get_template_directory_uri() . '/assets/images/heroes/hero_front_page_trad.png'); ?>');"></div>
        <div class="cr-hero__inner">
            <div class="g-fade-in editorial-hero__copy">
                <p class="cr-overline cr-text-gold">Última Edición</p>
                <h1 class="font-solemn cr-hero-title"><?php echo esc_html($title); ?></h1>
                <p class="cr-hero-text"><?php echo esc_html($excerpt); ?></p>
                <?php if ($has_editorial): ?>
                    <div style="margin-top:18px;"><a href="<?php echo get_permalink($editorial_id); ?>" class="cr-btn cr-btn--large">Leer Edición</a></div>
                <?php endif; ?>
            </div>
            <aside class="g-fade-in editorial-hero__aside cr-card">
                <p class="cr-overline cr-text-gold">Editorial</p>
                <h2 class="font-solemn cr-card__title cr-text-blue">La Capellanía en tus manos</h2>
                <p class="cr-card__text cr-text-dim" style="margin-bottom:0;">Conoce la historia y vive la espiritualidad de nuestra comunidad.</p>
            </aside>
        </div>
    </section>



    <?php
    // Fetch Archives (Older Editorials)
    $archive_args = array(
        'post_type'      => 'editorial',
        'posts_per_page' => 6,
        'post_status'    => 'publish',
        'offset'         => 1, // Skip the latest one (already shown)
    );
    $archive_query = new WP_Query($archive_args);

    if ($archive_query->have_posts()):
    ?>
    <section class="cr-section cr-bg-light">
        <div class="cr-container">
            <div class="cr-section__header" style="text-align:center; margin-bottom: 2rem;">
                <h2 class="font-solemn cr-text-blue">Ediciones Anteriores</h2>
                <p class="cr-text-dim">Explora nuestro acervo histórico de publicaciones.</p>
            </div>
            
            <div class="g-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 2rem;">
                <?php while ($archive_query->have_posts()): $archive_query->the_post(); ?>
                    <article class="cr-card g-fade-in" style="display:flex; flex-direction:column; height: 100%;">
                        <?php if (has_post_thumbnail()): ?>
                            <a href="<?php the_permalink(); ?>" class="cr-card__image-link" style="display:block; overflow:hidden; aspect-ratio: 3/4; margin-bottom:1rem;">
                                <?php the_post_thumbnail('medium', ['class' => 'cr-card__image', 'style' => 'width:100%; height:100%; object-fit:cover;']); ?>
                            </a>
                        <?php else: ?>
                            <!-- Fallback thumbnail if none -->
                             <a href="<?php the_permalink(); ?>" class="cr-card__image-link" style="display:flex; justify-content:center; align-items:center; background:#eee; aspect-ratio: 3/4; margin-bottom:1rem;">
                                 <i class="fas fa-book-open fa-3x" style="color:#aaa;"></i>
                             </a>
                        <?php endif; ?>
                        
                        <div class="cr-card__content" style="flex: 1; display:flex; flex-direction:column;">
                            <h3 class="font-solemn cr-card__title" style="font-size: 1.25rem;"><a href="<?php the_permalink(); ?>" style="color:inherit; text-decoration:none;"><?php the_title(); ?></a></h3>
                            <p class="cr-card__text cr-text-dim" style="font-size: 0.9rem; flex-grow:1;">
                                <?php echo has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 12); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="cr-link-arrow" style="margin-top:auto;">Leer Edición <span class="arrow">&rarr;</span></a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <div style="text-align:center; margin-top:2rem;">
                 <a href="<?php echo esc_url(get_post_type_archive_link('editorial')); ?>" class="cr-btn cr-btn--outline">Ver Todo el Archivo</a>
            </div>
        </div>
    </section>
    <?php 
    endif; 
    wp_reset_postdata(); 
    ?>

</main>

<?php get_footer();
