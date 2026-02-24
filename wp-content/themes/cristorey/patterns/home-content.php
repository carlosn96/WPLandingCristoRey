<?php
/**
 * Title: Home Page Content (The Editorial Layer)
 * Slug: cristorey/home-content
 * Categories: featured, layout
 * Description: Premium Plus immersive homepage with dark-mode, bento grid, cinematic hero, and spiritual aesthetic.
 */
?>
<!-- wp:html -->
<style>
    /* Fonts loaded globally via style.css */

    .home-premium {
        --hp-bg: #0e0c09;
        --hp-bg-alt: #161411;
        --hp-text: #fcfaf7;
        --hp-text-muted: rgba(252, 250, 247, 0.6);
        --hp-gold: #eca413;
        --hp-gold-muted: rgba(236, 164, 19, 0.2);
        --hp-border: rgba(236, 164, 19, 0.15);
        background-color: var(--hp-bg);
        color: var(--hp-text);
        font-family: 'Manrope', 'Inter', sans-serif;
        overflow: hidden;
        width: 100%;
    }

    .home-premium *,
    .home-premium *::before,
    .home-premium *::after {
        box-sizing: border-box;
        -webkit-font-smoothing: antialiased;
    }

    /* Hero Section */
    .hp-hero {
        position: relative;
        padding: clamp(6rem, 15vh, 12rem) clamp(2rem, 5vw, 4rem);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        min-height: 85vh;
        border-bottom: 1px solid var(--hp-border);
        overflow: hidden;
    }

    .hp-hero-bg {
        position: absolute;
        inset: 0;
        background-image: url('https://images.unsplash.com/photo-1548625361-ecacbdbe2275?q=80&w=2938&auto=format&fit=crop');
        background-size: cover;
        background-position: center;
        opacity: 0.15;
        z-index: 0;
        filter: grayscale(80%) sepia(20%) hue-rotate(5deg);
    }

    .hp-hero::after {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 50% 50%, transparent 0%, var(--hp-bg) 80%);
        z-index: 1;
    }

    .hp-hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
    }

    .hp-hero-eyebrow {
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        color: var(--hp-gold);
        margin-bottom: 2rem;
    }

    .hp-hero-title {
        font-family: 'Cinzel', serif;
        font-size: clamp(3rem, 8vw, 6.5rem);
        font-weight: 700;
        line-height: 0.95;
        margin: 0 0 2rem;
        color: var(--hp-text);
    }

    .hp-hero-subtitle {
        font-size: clamp(1.1rem, 2vw, 1.4rem);
        font-weight: 300;
        color: var(--hp-text-muted);
        line-height: 1.7;
        margin-bottom: 3rem;
    }

    .hp-btn {
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
    }

    .hp-btn-primary {
        background: var(--hp-gold);
        color: var(--hp-bg);
    }

    .hp-btn-primary:hover {
        background: #f7b733;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(236, 164, 19, 0.2);
    }

    .hp-btn-outline {
        background: transparent;
        color: var(--hp-text);
        border: 1px solid var(--hp-border);
    }

    .hp-btn-outline:hover {
        border-color: var(--hp-gold);
        color: var(--hp-gold);
    }

    .hp-hero-actions {
        display: flex;
        gap: 1.5rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    /* Bento Grid Services */
    .hp-services {
        padding: clamp(4rem, 10vh, 8rem) clamp(1.5rem, 5vw, 4rem);
        background: var(--hp-bg);
        position: relative;
    }

    .hp-section-header {
        text-align: center;
        margin-bottom: 4rem;
    }

    .hp-section-title {
        font-family: 'Cinzel', serif;
        font-size: clamp(2rem, 4vw, 3rem);
        color: var(--hp-text);
        margin-bottom: 1rem;
    }

    .hp-bento-grid {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        gap: 24px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .hp-bento-item {
        background: var(--hp-bg-alt);
        border: 1px solid var(--hp-border);
        border-radius: 12px;
        padding: 3rem 2rem;
        position: relative;
        overflow: hidden;
        transition: all 0.4s ease;
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
        text-decoration: none;
    }

    .hp-bento-item:hover {
        border-color: var(--hp-gold);
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    }

    .hp-bento-item::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at top right, var(--hp-gold-muted), transparent 50%);
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .hp-bento-item:hover::before {
        opacity: 1;
    }

    .hp-bento-icon {
        font-size: 2.5rem;
        color: var(--hp-gold);
        margin-bottom: 1.5rem;
    }

    .hp-bento-title {
        font-family: 'Cinzel', serif;
        font-size: 1.5rem;
        color: var(--hp-text);
        margin-bottom: 1rem;
    }

    .hp-bento-desc {
        font-size: 0.95rem;
        color: var(--hp-text-muted);
        line-height: 1.6;
    }

    /* Grid Spans */
    .hp-card-misa {
        grid-column: span 12;
        padding: 4rem 2rem;
    }

    .hp-card-confesiones {
        grid-column: span 12;
    }

    .hp-card-sacramentos {
        grid-column: span 12;
    }

    .hp-card-ministerios {
        grid-column: span 12;
    }

    @media (min-width: 768px) {
        .hp-card-misa {
            grid-column: span 8;
        }

        .hp-card-confesiones {
            grid-column: span 4;
        }

        .hp-card-sacramentos {
            grid-column: span 6;
        }

        .hp-card-ministerios {
            grid-column: span 6;
        }
    }

    /* Community CTA footer-like section inside page */
    .hp-community {
        padding: clamp(5rem, 12vh, 10rem) clamp(1.5rem, 5vw, 4rem);
        background: var(--hp-bg-alt);
        text-align: center;
        border-top: 1px solid var(--hp-border);
        position: relative;
    }

    .hp-community::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 50% 100%, var(--hp-gold-muted) 0%, transparent 60%);
        pointer-events: none;
    }
</style>
<!-- /wp:html -->

<!-- wp:html -->
<div class="home-premium">
    <!-- Hero Section -->
    <section class="hp-hero">
        <div class="hp-hero-bg"></div>
        <div class="hp-hero-content">
            <div class="hp-hero-eyebrow">Capellanía Cristo Rey</div>
            <h1 class="hp-hero-title">Bienvenido a Casa</h1>
            <p class="hp-hero-subtitle">Somos una comunidad católica comprometida con la Espiritualidad de la Comunión.
                Te invitamos a caminar juntos en la fe, el servicio y la celebración.</p>
            <div class="hp-hero-actions">
                <a href="<?php echo esc_url(home_url('/soy-nuevo/')); ?>" class="hp-btn hp-btn-primary">Explorar
                    Comunidad</a>
                <a href="<?php echo esc_url(home_url('/horarios/')); ?>" class="hp-btn hp-btn-outline">Horarios de
                    Misa</a>
            </div>
        </div>
    </section>

    <!-- Services Bento Grid -->
    <section class="hp-services">
        <div class="hp-section-header">
            <h2 class="hp-section-title">Nuestros Servicios</h2>
            <p class="hp-hero-subtitle" style="margin-bottom:0; max-width:600px; margin-inline:auto;">Acompañamos cada
                etapa de tu vida espiritual con dignidad y devoción.</p>
        </div>

        <div class="hp-bento-grid">
            <a href="<?php echo esc_url(home_url('/horarios/')); ?>" class="hp-bento-item hp-card-misa">
                <div class="hp-bento-icon">✧</div>
                <h3 class="hp-bento-title">Santa Misa</h3>
                <p class="hp-bento-desc">Encuentra a Dios en la Eucaristía.<br>Domingos: 10AM, 12PM, 6PM | Lunes –
                    Viernes: 7PM</p>
            </a>

            <a href="<?php echo esc_url(home_url('/contacto/')); ?>" class="hp-bento-item hp-card-confesiones">
                <div class="hp-bento-icon">♱</div>
                <h3 class="hp-bento-title">Confesiones</h3>
                <p class="hp-bento-desc">Sábados de 4:00 PM a 5:30 PM,<br>o con cita previa.</p>
            </a>

            <a href="<?php echo esc_url(home_url('/sacramentos/')); ?>" class="hp-bento-item hp-card-sacramentos">
                <div class="hp-bento-icon">✤</div>
                <h3 class="hp-bento-title">Sacramentos</h3>
                <p class="hp-bento-desc">Bautismos, Matrimonios, Primera Comunión y Confirmación.</p>
            </a>

            <a href="<?php echo esc_url(home_url('/ministerios/')); ?>" class="hp-bento-item hp-card-ministerios">
                <div class="hp-bento-icon">👥</div>
                <h3 class="hp-bento-title">Ministerios</h3>
                <p class="hp-bento-desc">Involúcrate en Pastoral Social, Catequesis, Coros o Jóvenes.</p>
            </a>
        </div>
    </section>

    <!-- Community CTA -->
    <section class="hp-community">
        <div class="hp-hero-content" style="margin:0 auto;">
            <div class="hp-hero-eyebrow">Vida en Comunidad</div>
            <h2 class="hp-hero-title" style="font-size: clamp(2rem, 5vw, 4rem);">Unirse a la Comunidad</h2>
            <p class="hp-hero-subtitle" style="font-style: italic;">"Donde dos o tres se reúnen en mi nombre, allí estoy
                yo en medio de ellos." <br>— Mateo 18:20</p>
            <div class="hp-hero-actions">
                <a href="<?php echo esc_url(home_url('/soy-nuevo/')); ?>" class="hp-btn hp-btn-primary">Soy Nuevo</a>
            </div>
        </div>
    </section>
</div>
<!-- /wp:html -->