<?php
/**
 * Title: Soy Nuevo (I'm New)
 * Slug: cristorey/page-soy-nuevo
 * Categories: featured, text
 * Description: Premium Plus welcome page with soft floating cards, 3-step guide, and cinematic aesthetic.
 */
?>
<!-- wp:html -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Manrope:wght@300;400;500;600&display=swap');

    .sn-premium {
        --sn-bg: #FCFAF7;
        /* Warm off-white */
        --sn-bg-alt: #FFFFFF;
        --sn-text: #1C1917;
        /* Deep Charcoal */
        --sn-text-muted: rgba(28, 25, 23, 0.7);
        --sn-gold: #D29035;
        /* Soft Gold */
        --sn-gold-light: rgba(210, 144, 53, 0.1);
        --sn-border: rgba(28, 25, 23, 0.08);
        background-color: var(--sn-bg);
        color: var(--sn-text);
        font-family: 'Manrope', sans-serif;
        overflow: hidden;
    }

    .sn-premium *,
    .sn-premium *::before,
    .sn-premium *::after {
        box-sizing: border-box;
        -webkit-font-smoothing: antialiased;
    }

    /* Hero Section */
    .sn-hero {
        position: relative;
        padding: clamp(6rem, 15vh, 10rem) clamp(1.5rem, 5vw, 4rem);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        background: var(--sn-bg);
        border-bottom: 1px solid var(--sn-border);
    }

    .sn-hero-bg {
        position: absolute;
        inset: 0;
        /* Soft community/church door placeholder */
        background-image: url('https://images.unsplash.com/photo-1548625361-ecacbdbe2275?q=80&w=2938&auto=format&fit=crop');
        background-size: cover;
        background-position: center;
        opacity: 0.04;
        filter: sepia(30%) hue-rotate(5deg);
        z-index: 0;
    }

    .sn-hero-content {
        position: relative;
        z-index: 2;
        max-width: 760px;
    }

    .sn-eyebrow {
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        color: var(--sn-gold);
        margin-bottom: 1.5rem;
    }

    .sn-title {
        font-family: 'Cinzel', serif;
        font-size: clamp(2.5rem, 6vw, 5rem);
        font-weight: 600;
        line-height: 1.1;
        margin: 0 0 1.5rem;
        color: var(--sn-text);
    }

    .sn-subtitle {
        font-size: clamp(1.1rem, 2vw, 1.35rem);
        font-weight: 300;
        line-height: 1.8;
        color: var(--sn-text-muted);
    }

    /* Steps Section */
    .sn-steps {
        padding: clamp(4rem, 10vh, 8rem) clamp(1.5rem, 5vw, 4rem);
        background: #F4F1ED;
    }

    .sn-section-header {
        text-align: center;
        margin-bottom: 5rem;
    }

    .sn-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .sn-card {
        background: var(--sn-bg-alt);
        border: 1px solid var(--sn-border);
        border-radius: 12px;
        padding: 3.5rem 2.5rem;
        text-align: center;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .sn-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 24px 48px rgba(28, 25, 23, 0.08);
        border-color: rgba(210, 144, 53, 0.3);
    }

    .sn-card-step {
        position: absolute;
        top: -20px;
        right: -10px;
        font-family: 'Cinzel', serif;
        font-size: 8rem;
        font-weight: 700;
        color: var(--sn-gold-light);
        line-height: 1;
        z-index: 0;
    }

    .sn-card-content {
        position: relative;
        z-index: 1;
    }

    .sn-card-icon {
        font-size: 2.5rem;
        color: var(--sn-gold);
        margin-bottom: 1.5rem;
    }

    .sn-card-title {
        font-family: 'Cinzel', serif;
        font-size: 1.6rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--sn-text);
    }

    .sn-card-desc {
        font-size: 1rem;
        color: var(--sn-text-muted);
        line-height: 1.7;
    }

    /* CTA Section */
    .sn-cta {
        padding: clamp(5rem, 12vh, 10rem) clamp(1.5rem, 5vw, 4rem);
        background: var(--sn-text);
        color: var(--sn-bg);
        text-align: center;
        position: relative;
    }

    .sn-cta-title {
        color: var(--sn-bg);
    }

    .sn-cta-desc {
        color: rgba(252, 250, 247, 0.7);
    }

    .sn-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 1rem 2.5rem;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        text-decoration: none;
        border-radius: 4px;
        transition: all 0.4s ease;
        margin-top: 2rem;
    }

    .sn-btn-primary {
        background: var(--sn-gold);
        color: var(--sn-text);
    }

    .sn-btn-primary:hover {
        background: #e6a545;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(210, 144, 53, 0.2);
    }
</style>
<!-- /wp:html -->

<!-- wp:html -->
<div class="sn-premium">
    <!-- Hero Section -->
    <section class="sn-hero">
        <div class="sn-hero-bg"></div>
        <div class="sn-hero-content">
            <div class="sn-eyebrow">Bienvenido a Cristo Rey</div>
            <h1 class="sn-title">Te Estábamos Esperando</h1>
            <p class="sn-subtitle">Nos alegra que estés aquí. Ya sea que busques una comunidad de fe, estés de visita
                por primera vez o regreses después de un tiempo, hay un lugar especial para ti.</p>
        </div>
    </section>

    <!-- 3-Step Guide Section -->
    <section class="sn-steps">
        <div class="sn-section-header">
            <h2 class="sn-title" style="font-size: clamp(2rem, 4vw, 3rem);">¿Qué Esperar?</h2>
            <p class="sn-subtitle">Una guía sencilla para tu primera visita.</p>
        </div>

        <div class="sn-cards">
            <!-- Step 1 -->
            <div class="sn-card">
                <div class="sn-card-step">1</div>
                <div class="sn-card-content">
                    <div class="sn-card-icon">📍</div>
                    <h3 class="sn-card-title">Llegada</h3>
                    <p class="sn-card-desc">Ven como estés. Contamos con estacionamiento amplio y personas en la entrada
                        dispuestas a recibirte y orientarte con una sonrisa.</p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="sn-card">
                <div class="sn-card-step">2</div>
                <div class="sn-card-content">
                    <div class="sn-card-icon">📖</div>
                    <h3 class="sn-card-title">Celebración</h3>
                    <p class="sn-card-desc">Nuestras misas duran alrededor de 60 minutos. Puedes seguir las lecturas en
                        los misales disponibles en cada banca para vivir la liturgia.</p>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="sn-card">
                <div class="sn-card-step">3</div>
                <div class="sn-card-content">
                    <div class="sn-card-icon">☕</div>
                    <h3 class="sn-card-title">Comunidad</h3>
                    <p class="sn-card-desc">Al terminar la celebración, te invitamos a compartir un café. Es el momento
                        perfecto para conversar, relajarte y conocer a la familia de Cristo Rey.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Cinematic CTA -->
    <section class="sn-cta">
        <div class="sn-hero-content" style="margin: 0 auto;">
            <div class="sn-eyebrow" style="color: rgba(252, 250, 247, 0.5);">Da el Siguiente Paso</div>
            <h2 class="sn-title sn-cta-title" style="font-size: clamp(2.2rem, 5vw, 3.5rem);">Comienza Tu Camino Aquí
            </h2>
            <p class="sn-subtitle sn-cta-desc">Inscríbete como miembro, solicita información sobre sacramentos o
                simplemente envíanos tus dudas. Estamos para servirte.</p>
            <a href="<?php echo esc_url(home_url('/contacto/')); ?>" class="sn-btn sn-btn-primary">Contáctanos</a>
        </div>
    </section>
</div>
<!-- /wp:html -->