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
    /* Fonts loaded globally via style.css */

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
<footer class="cr-footer" role="contentinfo" aria-label="Pie de página">
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
                        <div class="cr-footer-logo-sub">Capellanía</div>
                    </div>
                </a>

                <p class="cr-footer-desc">Comunidad católica fundamentada en la Espiritualidad de la Comunión y
                    Fraternidad. Caminamos juntos en la fe y el servicio.</p>

                <div class="cr-footer-social">
                    <?php if ($fb = get_option('cr_inst_facebook')): ?>
                        <a class="cr-social-link" href="<?php echo esc_url($fb); ?>" target="_blank" rel="noopener"
                            aria-label="Facebook">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                            </svg>
                        </a>
                    <?php endif; ?>

                    <?php if ($yt = get_option('cr_inst_youtube')): ?>
                        <a class="cr-social-link" href="<?php echo esc_url($yt); ?>" target="_blank" rel="noopener"
                            aria-label="YouTube">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 0 0-1.95 1.96A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.41 19.6C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.95A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58zM9.75 15.02V8.98L15.5 12l-5.75 3.02z" />
                            </svg>
                        </a>
                    <?php endif; ?>

                    <?php if ($ig = get_option('cr_inst_instagram')): ?>
                        <a class="cr-social-link" href="<?php echo esc_url($ig); ?>" target="_blank" rel="noopener"
                            aria-label="Instagram">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" />
                                <circle cx="12" cy="12" r="4" />
                                <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none" />
                            </svg>
                        </a>
                    <?php endif; ?>

                    <?php if ($tk = get_option('cr_inst_tiktok')): ?>
                        <a class="cr-social-link" href="<?php echo esc_url($tk); ?>" target="_blank" rel="noopener"
                            aria-label="TikTok">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12.53.02C13.84 0 15.14.01 16.44 0c.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.12-3.44-3.17-3.8-5.46-.4-2.52.41-5.23 2.14-7.07 1.62-1.73 4.1-2.73 6.47-2.61.02 0 .04 0 .06.01v4.06c-1.28-.15-2.69.11-3.69 1.05-.88.82-1.33 2.1-1.1 3.32.22 1.17 1.01 2.22 2.05 2.76 1.4.74 3.24.8 4.67.12 1.57-.74 2.44-2.31 2.51-4 0-4.99 0-9.99 0-14.99.01.01.02.01.02.01z" />
                            </svg>
                        </a>
                    <?php endif; ?>

                    <?php if ($wa = get_option('cr_inst_whatsapp')): ?>
                        <a class="cr-social-link" href="<?php echo esc_url($wa); ?>" target="_blank" rel="noopener"
                            aria-label="WhatsApp">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.886-.788-1.483-1.761-1.656-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z" />
                            </svg>
                        </a>
                    <?php endif; ?>
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
                <h4 class="cr-footer-col-title">Horarios de Oficina</h4>

                <div class="cr-footer-schedule-item">
                    <div class="cr-footer-schedule-time">
                        <?php echo wp_kses_post(get_option('cr_inst_schedule', 'Lun – Vie: 9:00 AM – 5:00 PM<br>Sáb: 9:00 AM – 1:00 PM')); ?>
                    </div>
                </div>
            </div>

            <!-- Col 4: Contacto -->
            <div>
                <h4 class="cr-footer-col-title">Contacto</h4>

                <div class="cr-footer-contact-item">
                    <span class="cr-footer-contact-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                    </span>
                    <span><?php echo wp_kses_post(get_option('cr_inst_address', 'Calle del Santuario #123<br>Col. Centro, Ciudad, CP 12345')); ?></span>
                </div>

                <div class="cr-footer-contact-item">
                    <span class="cr-footer-contact-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                            </path>
                        </svg>
                    </span>
                    <span><?php echo esc_html(get_option('cr_inst_phone', '(33) 1234-5678')); ?></span>
                </div>

                <div class="cr-footer-contact-item">
                    <span class="cr-footer-contact-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                            </path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </span>
                    <?php $email = get_option('cr_inst_email', 'info@cristoreyrc.com'); ?>
                    <a href="mailto:<?php echo esc_attr($email); ?>"
                        style="color:inherit; text-decoration:none;"><?php echo esc_html($email); ?></a>
                </div>
            </div>

        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="cr-footer-bottom">
        <div class="cr-footer-bottom-inner">
            <p class="cr-footer-copyright">© <?php echo date('Y'); ?> Capellanía Cristo Rey · Todos los
                derechos reservados.</p>
            <div class="cr-footer-legal">
                <a href="<?php echo esc_url(home_url('/privacidad/')); ?>">Privacidad</a>
                <a href="<?php echo esc_url(home_url('/terminos/')); ?>">Términos</a>
            </div>
        </div>
    </div>
</footer>
<!-- /wp:html -->