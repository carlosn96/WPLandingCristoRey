<?php
/**
 * Title: Footer Content
 * Slug: cristorey/footer-content
 * Categories: footer
 * Description: Premium Plus dark footer with 4 columns, mass schedule, and social links.
 */
?>
<!-- wp:html -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Manrope:wght@300;400;500;600&display=swap');

    .cr-footer {
        --f-bg: #0a0807;
        --f-bg-alt: #111009;
        --f-text: rgba(252, 250, 247, 0.8);
        --f-text-muted: rgba(252, 250, 247, 0.4);
        --f-gold: #eca413;
        --f-border: rgba(236, 164, 19, 0.12);
        background-color: var(--f-bg);
        color: var(--f-text);
        font-family: 'Manrope', sans-serif;
        -webkit-font-smoothing: antialiased;
    }

    /* ══ TOP BAND ══ */
    .cr-footer-top {
        padding: clamp(4rem, 8vh, 7rem) clamp(1.5rem, 5vw, 4rem);
        border-bottom: 1px solid var(--f-border);
    }

    .cr-footer-grid {
        display: grid;
        grid-template-columns: 1.4fr 1fr 1fr 1.2fr;
        gap: 3rem 4rem;
        max-width: 1400px;
        margin: 0 auto;
    }

    @media (max-width: 1024px) {
        .cr-footer-grid {
            grid-template-columns: 1fr 1fr;
            gap: 2.5rem 3rem;
        }
    }

    @media (max-width: 600px) {
        .cr-footer-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
    }

    /* ══ LOGO COL ══ */
    .cr-footer-logo {
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        margin-bottom: 1.25rem;
    }

    .cr-footer-logo-title {
        font-family: 'Cinzel', serif;
        font-weight: 700;
        font-size: 1.25rem;
        color: #fcfaf7;
        letter-spacing: 0.05em;
    }

    .cr-footer-logo-sub {
        font-size: 0.6rem;
        font-weight: 500;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        color: var(--f-gold);
        opacity: 0.8;
        margin-top: 2px;
    }

    .cr-footer-desc {
        font-size: 0.88rem;
        font-weight: 300;
        line-height: 1.8;
        color: var(--f-text-muted);
        margin-bottom: 1.5rem;
        max-width: 280px;
    }

    /* Social links */
    .cr-footer-social {
        display: flex;
        gap: 12px;
    }

    .cr-social-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        border: 1px solid var(--f-border);
        border-radius: 50%;
        color: var(--f-text-muted);
        text-decoration: none;
        transition: border-color 0.3s ease, color 0.3s ease, background 0.3s ease;
        font-size: 0.9rem;
    }

    .cr-social-link:hover {
        border-color: var(--f-gold);
        color: var(--f-gold);
        background: rgba(236, 164, 19, 0.08);
    }

    /* ══ COLUMN HEADINGS ══ */
    .cr-footer-col-title {
        font-size: 0.68rem;
        font-weight: 700;
        letter-spacing: 0.35em;
        text-transform: uppercase;
        color: var(--f-gold);
        margin-bottom: 1.5rem;
        opacity: 0.9;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid var(--f-border);
    }

    /* ══ NAV LINKS ══ */
    .cr-footer-links {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 0.6rem;
    }

    .cr-footer-links a {
        font-size: 0.88rem;
        font-weight: 400;
        color: var(--f-text);
        text-decoration: none;
        transition: color 0.25s ease, padding-left 0.25s ease;
        display: block;
    }

    .cr-footer-links a:hover {
        color: var(--f-gold);
        padding-left: 6px;
    }

    /* ══ SCHEDULE ══ */
    .cr-footer-schedule-item {
        margin-bottom: 1rem;
    }

    .cr-footer-schedule-day {
        font-size: 0.78rem;
        font-weight: 600;
        color: #fcfaf7;
        margin-bottom: 0.2rem;
    }

    .cr-footer-schedule-time {
        font-size: 0.82rem;
        font-weight: 300;
        color: var(--f-text-muted);
        line-height: 1.6;
    }

    /* ══ CONTACT ══ */
    .cr-footer-contact-item {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 1rem;
        font-size: 0.88rem;
        font-weight: 300;
        color: var(--f-text-muted);
        line-height: 1.6;
    }

    .cr-footer-contact-icon {
        font-size: 0.9rem;
        color: var(--f-gold);
        opacity: 0.7;
        flex-shrink: 0;
        margin-top: 2px;
    }

    /* ══ BOTTOM BAR ══ */
    .cr-footer-bottom {
        padding: 1.5rem clamp(1.5rem, 5vw, 4rem);
        background: var(--f-bg-alt);
    }

    .cr-footer-bottom-inner {
        max-width: 1400px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 0.75rem;
    }

    .cr-footer-copyright {
        font-size: 0.75rem;
        font-weight: 300;
        color: var(--f-text-muted);
    }

    .cr-footer-legal {
        display: flex;
        gap: 1.5rem;
    }

    .cr-footer-legal a {
        font-size: 0.75rem;
        color: var(--f-text-muted);
        text-decoration: none;
        transition: color 0.25s ease;
    }

    .cr-footer-legal a:hover {
        color: var(--f-gold);
    }

    /* ══ DIVIDER ══ */
    .cr-footer-divider {
        width: 40px;
        height: 1px;
        background: linear-gradient(90deg, var(--f-gold), transparent);
        margin: 0 auto 1.75rem;
    }

    .cr-footer-ornament {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 16px;
        margin-bottom: 4rem;
        opacity: 0.4;
    }

    .cr-footer-ornament-line {
        flex: 1;
        max-width: 120px;
        height: 1px;
        background: linear-gradient(to var(--dir, right), transparent, var(--f-gold));
    }

    .cr-footer-ornament-line:last-child {
        --dir: left;
    }
</style>
<!-- /wp:html -->

<!-- wp:html -->
<footer class="cr-footer" role="contentinfo">
    <div class="cr-footer-top">
        <div class="cr-footer-grid">

            <!-- Col 1: Logo + About + Social -->
            <div>
                <a class="cr-footer-logo" href="<?php echo esc_url(home_url('/')); ?>">
                    <svg width="26" height="26" viewBox="0 0 28 28" fill="none">
                        <path d="M14 2L14 8M14 20L14 26M2 14L8 14M20 14L26 14" stroke="#eca413" stroke-width="1.5"
                            stroke-linecap="round" />
                        <circle cx="14" cy="14" r="4" stroke="#eca413" stroke-width="1.5"
                            fill="rgba(236,164,19,0.08)" />
                    </svg>
                    <div>
                        <div class="cr-footer-logo-title">Cristo Rey</div>
                        <div class="cr-footer-logo-sub">Parroquia</div>
                    </div>
                </a>

                <p class="cr-footer-desc">Comunidad católica fundamentada en la Espiritualidad de la Comunión y
                    Fraternidad. Caminamos juntos en la fe y el servicio.</p>

                <div class="cr-footer-social">
                    <a class="cr-social-link" href="https://facebook.com" target="_blank" rel="noopener"
                        aria-label="Facebook">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                        </svg>
                    </a>
                    <a class="cr-social-link" href="https://youtube.com" target="_blank" rel="noopener"
                        aria-label="YouTube">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 0 0-1.95 1.96A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.41 19.6C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.95A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58zM9.75 15.02V8.98L15.5 12l-5.75 3.02z" />
                        </svg>
                    </a>
                    <a class="cr-social-link" href="https://instagram.com" target="_blank" rel="noopener"
                        aria-label="Instagram">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="5" />
                            <circle cx="12" cy="12" r="4" />
                            <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Col 2: Navigation -->
            <div>
                <h4 class="cr-footer-col-title">Navegación</h4>
                <ul class="cr-footer-links">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Inicio</a></li>
                    <li><a href="<?php echo esc_url(home_url('/ministerios/')); ?>">Ministerios</a></li>
                    <li><a href="<?php echo esc_url(home_url('/verbum-domini/')); ?>">Verbum Domini</a></li>
                    <li><a href="<?php echo esc_url(home_url('/soy-nuevo/')); ?>">Soy Nuevo</a></li>
                    <li><a href="<?php echo esc_url(home_url('/donar/')); ?>">Donativos</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contacto/')); ?>">Contacto</a></li>
                </ul>
            </div>

            <!-- Col 3: Horarios -->
            <div>
                <h4 class="cr-footer-col-title">Horarios de Misa</h4>

                <div class="cr-footer-schedule-item">
                    <div class="cr-footer-schedule-day">Domingos</div>
                    <div class="cr-footer-schedule-time">10:00 AM · 12:00 PM · 6:00 PM</div>
                </div>

                <div class="cr-footer-schedule-item">
                    <div class="cr-footer-schedule-day">Lunes – Viernes</div>
                    <div class="cr-footer-schedule-time">7:00 PM</div>
                </div>

                <div class="cr-footer-schedule-item">
                    <div class="cr-footer-schedule-day">Confesiones</div>
                    <div class="cr-footer-schedule-time">Sáb. 4:00 – 5:30 PM<br>O con cita previa</div>
                </div>
            </div>

            <!-- Col 4: Contacto -->
            <div>
                <h4 class="cr-footer-col-title">Contacto</h4>

                <div class="cr-footer-contact-item">
                    <span class="cr-footer-contact-icon">📍</span>
                    <span>Calle del Santuario #123<br>Col. Centro, Ciudad, CP 12345</span>
                </div>

                <div class="cr-footer-contact-item">
                    <span class="cr-footer-contact-icon">📞</span>
                    <span>(33) 1234-5678</span>
                </div>

                <div class="cr-footer-contact-item">
                    <span class="cr-footer-contact-icon">✉</span>
                    <a href="mailto:info@cristoreyrc.com"
                        style="color:inherit; text-decoration:none;">info@cristoreyrc.com</a>
                </div>
            </div>

        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="cr-footer-bottom">
        <div class="cr-footer-bottom-inner">
            <p class="cr-footer-copyright">© <?php echo date('Y'); ?> Parroquia Cristo Rey del Universo · Todos los
                derechos reservados.</p>
            <div class="cr-footer-legal">
                <a href="<?php echo esc_url(home_url('/privacidad/')); ?>">Privacidad</a>
                <a href="<?php echo esc_url(home_url('/terminos/')); ?>">Términos</a>
            </div>
        </div>
    </div>
</footer>
<!-- /wp:html -->