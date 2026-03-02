<footer id="colophon" class="cr-footer section-padding cr-bg-blue cr-text-white cr-border-gold" itemscope
    itemtype="http://schema.org/CatholicChurch">
    <div class="cr-container"
        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 60px;">

        <!-- Col 1: Brand & Identity -->
        <div class="cr-footer-brand">
            <h2 class="font-solemn cr-text-gold"
                style="font-size: 1.8rem; margin-bottom: 15px; letter-spacing: 0.05em; margin-top: 0;">CRISTO REY</h2>
            <p style="opacity: 0.8; font-size: 0.95rem; line-height: 1.8; margin-bottom: 25px;">
                Cristo Rey del Universo:<br>
                ¡Venga a nosotros tu Reino!
            </p>
            <div class="cr-social-links" style="display: flex; flex-wrap: wrap; gap: 15px;">
                <?php if ($fb = get_option('cr_inst_facebook')): ?>
                    <a href="<?php echo esc_url($fb); ?>" class="cr-text-gold" target="_blank" rel="noopener"
                        style="opacity: 0.8; transition: opacity 0.3s ease; text-transform: uppercase; font-size: 0.8rem; font-weight: 600; letter-spacing: 1px; display: inline-flex; align-items: center; gap: 6px;"
                        onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'">
                        <i class="fa-brands fa-facebook"></i> Facebook
                    </a>
                <?php endif; ?>
                <?php if ($ig = get_option('cr_inst_instagram')): ?>
                    <a href="<?php echo esc_url($ig); ?>" class="cr-text-gold" target="_blank" rel="noopener"
                        style="opacity: 0.8; transition: opacity 0.3s ease; text-transform: uppercase; font-size: 0.8rem; font-weight: 600; letter-spacing: 1px; display: inline-flex; align-items: center; gap: 6px;"
                        onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'">
                        <i class="fa-brands fa-instagram"></i> Instagram
                    </a>
                <?php endif; ?>
                <?php if ($yt = get_option('cr_inst_youtube')): ?>
                    <a href="<?php echo esc_url($yt); ?>" class="cr-text-gold" target="_blank" rel="noopener"
                        style="opacity: 0.8; transition: opacity 0.3s ease; text-transform: uppercase; font-size: 0.8rem; font-weight: 600; letter-spacing: 1px; display: inline-flex; align-items: center; gap: 6px;"
                        onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'">
                        <i class="fa-brands fa-youtube"></i> YouTube
                    </a>
                <?php endif; ?>
                <?php if ($tk = get_option('cr_inst_tiktok')): ?>
                    <a href="<?php echo esc_url($tk); ?>" class="cr-text-gold" target="_blank" rel="noopener"
                        style="opacity: 0.8; transition: opacity 0.3s ease; text-transform: uppercase; font-size: 0.8rem; font-weight: 600; letter-spacing: 1px; display: inline-flex; align-items: center; gap: 6px;"
                        onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'">
                        <i class="fa-brands fa-tiktok"></i> TikTok
                    </a>
                <?php endif; ?>
                <?php if ($wa = get_option('cr_inst_whatsapp')): ?>
                    <a href="<?php echo esc_url($wa); ?>" class="cr-text-gold" target="_blank" rel="noopener"
                        style="opacity: 0.8; transition: opacity 0.3s ease; text-transform: uppercase; font-size: 0.8rem; font-weight: 600; letter-spacing: 1px; display: inline-flex; align-items: center; gap: 6px;"
                        onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'">
                        <i class="fa-brands fa-whatsapp"></i> WhatsApp
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Col 2: Navegación -->
        <div class="cr-footer-nav">
            <h3 class="font-solemn cr-text-white"
                style="font-size: 1.2rem; margin-bottom: 25px; letter-spacing: 0.1em; text-transform: uppercase; margin-top: 0;">
                Navegación</h3>
            <ul class="cr-footer-menu"
                style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px;">
                <?php
                $home_url = esc_url(home_url('/'));
                $descubre_url = esc_url(home_url('/descubre-la-fe/'));
                $vive_url = esc_url(home_url('/vive-tu-fe/'));
                $sirve_url = esc_url(home_url('/sirve-y-participa/'));
                $donativos_url = esc_url(home_url('/donativos/'));
                ?>
                <li><a href="<?php echo $home_url; ?>"
                        style="color: rgba(255,255,255,0.8); text-decoration: none; transition: color 0.3s ease;"
                        onmouseover="this.style.color='var(--cr-color-gold)'"
                        onmouseout="this.style.color='rgba(255,255,255,0.8)'">Inicio</a></li>
                <li><a href="<?php echo $descubre_url; ?>"
                        style="color: rgba(255,255,255,0.8); text-decoration: none; transition: color 0.3s ease;"
                        onmouseover="this.style.color='var(--cr-color-gold)'"
                        onmouseout="this.style.color='rgba(255,255,255,0.8)'">Descubre la Fe</a></li>
                <li><a href="<?php echo $vive_url; ?>"
                        style="color: rgba(255,255,255,0.8); text-decoration: none; transition: color 0.3s ease;"
                        onmouseover="this.style.color='var(--cr-color-gold)'"
                        onmouseout="this.style.color='rgba(255,255,255,0.8)'">Vive tu Fe</a></li>
                <li><a href="<?php echo $sirve_url; ?>"
                        style="color: rgba(255,255,255,0.8); text-decoration: none; transition: color 0.3s ease;"
                        onmouseover="this.style.color='var(--cr-color-gold)'"
                        onmouseout="this.style.color='rgba(255,255,255,0.8)'">Sirve y Participa</a></li>
                <li><a href="<?php echo $donativos_url; ?>"
                        style="color: rgba(255,255,255,0.8); text-decoration: none; transition: color 0.3s ease;"
                        onmouseover="this.style.color='var(--cr-color-gold)'"
                        onmouseout="this.style.color='rgba(255,255,255,0.8)'">Donativos</a></li>
            </ul>
        </div>

        <!-- Col 3: Horarios -->
        <div class="cr-footer-schedule">
            <h3 class="font-solemn cr-text-white"
                style="font-size: 1.2rem; margin-bottom: 25px; letter-spacing: 0.1em; text-transform: uppercase; margin-top: 0;">
                Horarios</h3>
            <div style="opacity: 0.8; font-size: 0.95rem; line-height: 1.8;">
                <?php echo wp_kses_post(get_option('cr_inst_schedule', 'Lun – Vie: 9:00 AM – 5:00 PM<br>Sáb: 9:00 AM – 1:00 PM')); ?>
            </div>
        </div>

        <!-- Col 4: Contacto -->
        <div class="cr-footer-contact">
            <h3 class="font-solemn cr-text-white"
                style="font-size: 1.2rem; margin-bottom: 25px; letter-spacing: 0.1em; text-transform: uppercase; margin-top: 0;">
                Contacto</h3>
            <div style="opacity: 0.8; font-size: 0.95rem; line-height: 1.8;">
                <address style="font-style: normal; margin-bottom: 20px;" itemprop="address" itemscope
                    itemtype="http://schema.org/PostalAddress">
                    <?php echo wp_kses_post(get_option('cr_inst_address', 'Calle del Santuario #123<br>Col. Centro, Ciudad, CP 12345')); ?>
                </address>
                <p style="margin: 0 0 10px 0;"><span
                        itemprop="telephone"><?php echo esc_html(get_option('cr_inst_phone', '(33) 1234-5678')); ?></span>
                </p>
                <p style="margin: 0;">
                    <?php $email = get_option('cr_inst_email', 'info@cristoreyrc.com'); ?>
                    <a href="mailto:<?php echo esc_attr($email); ?>" itemprop="email" class="cr-text-gold"
                        style="text-decoration: none; border-bottom: 1px solid rgba(245,214,123,0.3); padding-bottom: 2px; transition: border-color 0.3s ease;"
                        onmouseover="this.style.borderColor='var(--cr-color-gold)'"
                        onmouseout="this.style.borderColor='rgba(245,214,123,0.3)'"><?php echo esc_html($email); ?></a>
                </p>
            </div>
        </div>

    </div>

    <!-- Copyright -->
    <div class="cr-container"
        style="margin-top: 80px; padding-top: 30px; border-top: 1px solid rgba(255,255,255,0.1); text-align: center; font-size: 0.85rem; opacity: 0.6;">
        &copy; <?php echo date('Y'); ?> Capellanía Cristo Rey. Todos los derechos reservados.
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>