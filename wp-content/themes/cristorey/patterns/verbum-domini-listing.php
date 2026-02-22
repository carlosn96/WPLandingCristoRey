<?php
/**
 * Title: Verbum Domini Listing
 * Slug: cristorey/verbum-domini-listing
 * Categories: featured, text
 * Description: Premium Plus editorial composition for the Verbum Domini reflections index.
 */
?>
<!-- wp:html -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Inter:wght@300;400;500;600&family=Manrope:wght@300;400;500;600&display=swap');

    /* ══ RESET & GLOBAL ══ */
    .vdl-section *,
    .vdl-section *::before,
    .vdl-section *::after {
        box-sizing: border-box;
        -webkit-font-smoothing: antialiased;
    }

    .vdl-section {
        --vdl-ochre: #eca413;
        --vdl-bg: #0e0c09;
        --vdl-bg-alt: #161411;
        --vdl-text: #fcfaf7;
        --vdl-text-muted: rgba(252, 250, 247, 0.6);
        --vdl-border: rgba(236, 164, 19, 0.15);
        background-color: var(--vdl-bg);
        color: var(--vdl-text);
        font-family: 'Manrope', 'Inter', sans-serif;
    }

    /* ══ HERO — Full width, no column constraints ══ */
    .vdl-hero-wrap {
        width: 100vw;
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
        background-color: var(--vdl-bg);
        border-bottom: 1px solid var(--vdl-border);
        overflow: hidden;
    }

    .vdl-hero-wrap::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 50% 0%, rgba(236, 164, 19, 0.08) 0%, transparent 70%);
        pointer-events: none;
        z-index: 0;
    }

    .vdl-hero {
        padding: clamp(7rem, 18vh, 14rem) clamp(2rem, 10vw, 6rem);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        position: relative;
        z-index: 1;
    }

    .vdl-hero-eyebrow {
        font-weight: 600;
        font-size: 0.75rem;
        letter-spacing: 0.4em;
        text-transform: uppercase;
        color: var(--vdl-ochre);
        margin: 0 0 2rem;
        opacity: 0.9;
    }

    .vdl-hero-title {
        font-family: 'Cinzel', serif;
        font-weight: 900;
        font-size: clamp(3.5rem, 10vw, 7.5rem);
        line-height: 0.95;
        color: var(--vdl-text);
        margin: 0 0 1.5rem;
        letter-spacing: -0.02em;
    }

    .vdl-hero-subtitle {
        font-weight: 300;
        font-size: clamp(1.1rem, 2vw, 1.4rem);
        color: var(--vdl-text-muted);
        max-width: 700px;
        line-height: 1.8;
        margin: 0;
    }

    /* Ornament */
    .vdl-hero-orn {
        display: flex;
        align-items: center;
        gap: 20px;
        margin: 3.5rem 0 0;
    }

    .vdl-hero-orn-line {
        width: 120px;
        height: 1px;
        background: linear-gradient(to var(--dir, right), transparent, rgba(236, 164, 19, 0.4));
    }

    .vdl-hero-orn-line:last-child {
        --dir: left;
    }

    /* ══ GRID SECTION ══ */
    .vdl-section-wrap {
        background: var(--vdl-bg);
    }

    .vdl-section-content {
        padding: clamp(4rem, 8vh, 8rem) clamp(1.5rem, 5vw, 4rem);
        width: 100%;
        box-sizing: border-box;
    }

    /* The WP query block renders its own container — target it directly */
    .vdl-section .wp-block-query {
        width: 100%;
    }

    /* Post template creates the li/ul wrapper — reset it */
    .vdl-section .wp-block-post-template {
        display: grid !important;
        grid-template-columns: repeat(3, 1fr) !important;
        gap: 36px !important;
        margin: 0 !important;
        padding: 0 !important;
        list-style: none !important;
        width: 100% !important;
        max-width: none !important;
    }

    @media (max-width: 960px) {
        .vdl-section .wp-block-post-template {
            grid-template-columns: repeat(2, 1fr) !important;
        }
    }

    @media (max-width: 600px) {
        .vdl-section .wp-block-post-template {
            grid-template-columns: 1fr !important;
        }
    }

    /* Each li inside the post template = a card slot */
    .vdl-section .wp-block-post-template>li,
    .vdl-section .wp-block-post-template>.wp-block-post {
        display: contents;
        /* let the card div inside be the grid cell */
    }

    .vdl-grid {
        display: none;
        /* kept for fallback, not used anymore */
    }

    /* ══ TARJETAS EDITORIALES (Premium Plus) ══ */
    .vdl-card {
        position: relative;
        background: var(--vdl-bg-alt);
        border: 1px solid rgba(255, 255, 255, 0.06);
        display: flex;
        flex-direction: column;
        text-decoration: none;
        transition: transform 0.45s cubic-bezier(0.165, 0.84, 0.44, 1),
            box-shadow 0.45s cubic-bezier(0.165, 0.84, 0.44, 1),
            border-color 0.35s ease;
        border-radius: 14px;
        overflow: hidden;
        cursor: pointer;
    }

    /* Gold top accent bar that slides in on hover */
    .vdl-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, transparent, var(--vdl-ochre), transparent);
        transform: scaleX(0);
        transition: transform 0.45s ease;
        z-index: 10;
    }

    .vdl-card:hover::before {
        transform: scaleX(1);
    }

    .vdl-card:hover {
        border-color: rgba(236, 164, 19, 0.25);
        transform: translateY(-10px);
        box-shadow: 0 32px 72px rgba(0, 0, 0, 0.7),
            0 0 0 1px rgba(236, 164, 19, 0.12);
    }

    /* ── Thumbnail ── */
    .vdl-card-thumb {
        position: relative;
        width: 100%;
        height: 300px;
        overflow: hidden;
        flex-shrink: 0;
        background: #1a1612;
    }

    .vdl-card-thumb img,
    .vdl-card-thumb .wp-block-post-featured-image img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
        transition: transform 1.4s cubic-bezier(0.165, 0.84, 0.44, 1),
            filter 1.4s ease !important;
        display: block !important;
        filter: brightness(0.9) saturate(0.85);
    }

    .vdl-card:hover .vdl-card-thumb img,
    .vdl-card:hover .vdl-card-thumb .wp-block-post-featured-image img {
        transform: scale(1.1) !important;
        filter: brightness(1.0) saturate(1.0);
    }

    /* Multi-stop gradient overlay: transparent → card bg */
    .vdl-card-thumb-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom,
                rgba(22, 20, 17, 0) 0%,
                rgba(22, 20, 17, 0.2) 50%,
                rgba(22, 20, 17, 0.85) 85%,
                rgba(22, 20, 17, 1) 100%);
        z-index: 2;
    }

    /* Category badge floating over image bottom-left */
    .vdl-card-badge {
        position: absolute;
        bottom: 1.2rem;
        left: 1.5rem;
        z-index: 3;
        background: rgba(236, 164, 19, 0.15);
        border: 1px solid rgba(236, 164, 19, 0.4);
        backdrop-filter: blur(8px);
        padding: 4px 12px;
        border-radius: 100px;
        font-size: 0.65rem;
        font-weight: 600;
        letter-spacing: 0.22em;
        text-transform: uppercase;
        color: var(--vdl-ochre);
    }

    /* ── Card body ── */
    .vdl-card-body {
        padding: 2rem 2.2rem 2.5rem;
        display: flex;
        flex-direction: column;
        flex: 1;
        gap: 0;
    }

    /* Date */
    .vdl-card .wp-block-post-date,
    .vdl-card .vdl-card-meta {
        font-size: 0.68rem !important;
        font-weight: 700;
        letter-spacing: 0.35em;
        text-transform: uppercase;
        color: var(--vdl-ochre) !important;
        margin: 0 0 1.1rem;
        opacity: 0.85;
        display: block;
    }

    .vdl-card .wp-block-post-date a {
        color: var(--vdl-ochre) !important;
        text-decoration: none;
    }

    /* Thin gold separator under date */
    .vdl-card-date-sep {
        width: 32px;
        height: 1px;
        background: var(--vdl-ochre);
        opacity: 0.5;
        margin-bottom: 1.2rem;
    }

    /* Title */
    .vdl-card .wp-block-post-title {
        font-family: 'Cinzel', serif !important;
        font-weight: 700 !important;
        font-size: clamp(1.25rem, 2vw, 1.65rem) !important;
        line-height: 1.2 !important;
        color: var(--vdl-text) !important;
        margin: 0 0 1.1rem !important;
        transition: color 0.25s ease;
    }

    .vdl-card .wp-block-post-title a {
        color: var(--vdl-text) !important;
        text-decoration: none !important;
        font-family: 'Cinzel', serif !important;
        transition: color 0.25s ease;
    }

    .vdl-card:hover .wp-block-post-title a {
        color: rgba(252, 250, 247, 0.85) !important;
    }

    /* Excerpt */
    .vdl-card .wp-block-post-excerpt,
    .vdl-card .wp-block-post-excerpt p,
    .vdl-card .wp-block-post-excerpt__excerpt {
        font-size: 0.93rem !important;
        font-weight: 300 !important;
        line-height: 1.8 !important;
        color: rgba(252, 250, 247, 0.45) !important;
        margin: 0 0 1.8rem !important;
    }

    .vdl-card .wp-block-post-excerpt__more-link {
        display: none !important;
    }

    /* ── CTA button (pill-shaped, ghost) ── */
    .vdl-card-cta {
        margin-top: auto;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 9px 20px;
        border: 1px solid rgba(236, 164, 19, 0.35);
        border-radius: 100px;
        width: fit-content;
        font-weight: 600;
        font-size: 0.72rem;
        letter-spacing: 0.22em;
        text-transform: uppercase;
        color: var(--vdl-ochre);
        text-decoration: none;
        transition: background 0.3s ease, border-color 0.3s ease, gap 0.3s ease;
    }

    .vdl-card-cta-arrow {
        display: inline-block;
        transition: transform 0.3s ease;
        font-style: normal;
        font-size: 1rem;
        line-height: 1;
    }

    .vdl-card:hover .vdl-card-cta {
        background: rgba(236, 164, 19, 0.08);
        border-color: rgba(236, 164, 19, 0.7);
        gap: 14px;
    }

    .vdl-card:hover .vdl-card-cta-arrow {
        transform: translateX(4px);
    }

    /* ══ PAGINACIÓN ══ */
    .vdl-pagination {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 6rem;
    }

    .vdl-pagination a,
    .vdl-pagination span {
        font-weight: 500;
        font-size: 0.9rem;
        color: var(--vdl-text-muted);
        text-decoration: none;
        padding: 12px 20px;
        border: 1px solid var(--vdl-border);
        border-radius: 6px;
        transition: all 0.3s ease;
    }

    .vdl-pagination a:hover {
        border-color: var(--vdl-ochre);
        color: var(--vdl-ochre);
        background: rgba(236, 164, 19, 0.08);
    }

    .vdl-pagination .current {
        border-color: var(--vdl-ochre);
        color: var(--vdl-ochre);
        background: rgba(236, 164, 19, 0.15);
    }
</style>
<!-- /wp:html -->

<!-- wp:html -->
<div class="vdl-section">
    <div class="vdl-hero-wrap">
        <div class="vdl-hero">
            <p class="vdl-hero-eyebrow">Parroquia Cristo Rey · Reflexión Diaria</p>
            <h1 class="vdl-hero-title">Verbum Domini</h1>
            <p class="vdl-hero-subtitle">Meditaciones diarias que nutren el espíritu<br>desde la Palabra de Dios viva y
                eficaz.</p>
            <div class="vdl-hero-orn">
                <div class="vdl-hero-orn-line"></div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="#eca413">
                    <path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z" />
                </svg>
                <div class="vdl-hero-orn-line"></div>
            </div>
        </div>
    </div>
</div>
<!-- /wp:html -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull vdl-section">

    <!-- wp:html -->
    <div class="vdl-section-content">
        <!-- /wp:html -->

        <!-- wp:query {"queryId":1,"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","categoryIds":[4],"inherit":false},"layout":{"type":"default"}} -->
        <div class="wp-block-query">

            <!-- wp:post-template {"layout":{"type":"default"}} -->

            <!-- wp:html -->
            <div class="vdl-card">
                <!-- /wp:html -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
                <div class="wp-block-group vdl-card-thumb">
                    <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/2","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->
                    <div class="vdl-card-thumb-overlay"></div>
                    <!-- wp:html -->
                    <span class="vdl-card-badge">Reflexión</span>
                    <!-- /wp:html -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
                <div class="wp-block-group vdl-card-body">
                    <!-- wp:post-date {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"4px","fontSize":"0.65rem"}},"className":"vdl-card-meta"} /-->
                    <!-- wp:html -->
                    <div class="vdl-card-date-sep"></div>
                    <!-- /wp:html -->
                    <!-- wp:post-title {"isLink":true,"style":{"typography":{"fontSize":"1.5rem","fontWeight":"700","lineHeight":"1.2"}},"className":"vdl-card-title"} /-->
                    <!-- wp:post-excerpt {"moreText":"","excerptLength":22,"style":{"typography":{"fontSize":"0.93rem","fontWeight":"300","lineHeight":"1.8"}},"className":"vdl-card-excerpt"} /-->
                    <!-- wp:html -->
                    <span class="vdl-card-cta">Leer meditación <em class="vdl-card-cta-arrow">→</em></span>
                    <!-- /wp:html -->
                </div>
                <!-- /wp:group -->

            <!-- wp:html -->
            </div>
            <!-- /wp:html -->

            <!-- /wp:post-template -->

            <!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"},"className":"vdl-pagination"} -->
            <!-- wp:query-pagination-previous /-->
            <!-- wp:query-pagination-numbers /-->
            <!-- wp:query-pagination-next /-->
            <!-- /wp:query-pagination -->

        </div>
        <!-- /wp:query -->

        <!-- wp:html -->
    </div>
    <!-- /wp:html -->

</div>
<!-- /wp:group -->

<!-- wp:html -->
<script>
    // Make each vdl-card fully clickable via its post title link
    (function () {
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.vdl-card').forEach(function (card) {
                var link = card.querySelector('.wp-block-post-title a');
                if (!link) return;
                card.addEventListener('click', function (e) {
                    if (!e.target.closest('a')) {
                        window.location.href = link.href;
                    }
                });
                card.style.cursor = 'pointer';
            });
        });
    })();
</script>
<!-- /wp:html -->