<?php
/**
 * Class VBIM_Renderer
 * Ported from renderer-port.php to a class-based structure.
 */
class VBIM_Renderer
{

    public static function keyword_font_size($word)
    {
        $n = strlen(trim($word));
        if ($n <= 6) {
            return "clamp(3.5rem, 10vw, 7rem)";
        } elseif ($n <= 8) {
            return "clamp(3rem, 8vw, 6rem)";
        } elseif ($n <= 10) {
            return "clamp(2.5rem, 6.5vw, 5rem)";
        } elseif ($n <= 12) {
            return "clamp(2rem, 5.5vw, 4rem)";
        } else {
            return "clamp(1.75rem, 4vw, 3.2rem)";
        }
    }

    public static function format_date_es($date_str)
    {
        $months = array(
            "01" => "ENERO",
            "02" => "FEBRERO",
            "03" => "MARZO",
            "04" => "ABRIL",
            "05" => "MAYO",
            "06" => "JUNIO",
            "07" => "JULIO",
            "08" => "AGOSTO",
            "09" => "SEPTIEMBRE",
            "10" => "OCTUBRE",
            "11" => "NOVIEMBRE",
            "12" => "DICIEMBRE",
        );

        if ($date_str) {
            $time = strtotime($date_str);
        } else {
            $time = time();
        }

        $day = date('j', $time);
        $month = $months[date('m', $time)];
        $year = date('Y', $time);

        return "$day $month $year";
    }

    public static function render_editorial_html($keyword, $central_phrase, $passage_text, $image_url, $date_str = null, $citation = null)
    {
        $keyword_font_size = self::keyword_font_size($keyword);
        $date_display = self::format_date_es($date_str);
        $keyword_title = mb_convert_case($keyword, MB_CASE_TITLE, "UTF-8");

        // Procesar texto
        $paras = array_filter(array_map('trim', explode("\n\n", $passage_text)));
        if (count($paras) < 2) {
            $mid = floor(strlen($passage_text) / 2);
            $split_at = strpos($passage_text, ' ', $mid);
            if (false === $split_at) {
                $split_at = $mid;
            }
            $paras = array(substr($passage_text, 0, $split_at), substr($passage_text, $split_at));
        }

        $first_para = $paras[0];
        $para1_first = mb_substr($first_para, 0, 1);
        $para1_rest = mb_substr($first_para, 1);

        $extra_paras_html = "";
        for ($i = 1; $i < count($paras); $i++) {
            $extra_paras_html .= '<p class="vb-body-text">' . esc_html($paras[$i]) . '</p>';
        }

        ob_start();
        ?>
        <!-- wp:html -->
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Newsreader:ital,opsz,wght@0,6..72,200..800;1,6..72,200..800&family=Manrope:wght@300;400;500;600&display=swap');

            .is-sticky-header .cr-premium-header,
            .cr-premium-header {
                background-color: #0e0c09 !important;
                border-bottom: 1px solid rgba(236, 164, 19, 0.15) !important;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.6) !important;
            }

            .vb-entry-wrap {
                --gold: #eca413;
                --gold-soft: rgba(236, 164, 19, 0.15);
                --gold-dim: rgba(236, 164, 19, 0.4);
                --bg-dark: #0e0c09;
                --bg-card: #161411;
                --text-white: #fcfaf7;
                --text-off: #e2e2e2;
                --text-muted: #94a3b8;
                --text-faint: #64748b;
                background-color: var(--bg-dark);
                color: var(--text-off);
                font-family: 'Manrope', sans-serif;
                -webkit-font-smoothing: antialiased;
                overflow-x: hidden;
            }

            .vb-article-header {
                max-width: 48rem;
                margin: 0 auto;
                padding: clamp(3.5rem, 8vw, 6rem) clamp(1.5rem, 5vw, 3rem) clamp(2.5rem, 6vw, 4rem);
                text-align: center;
            }

            .vb-date-row {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 1rem;
                margin-bottom: 2rem;
            }

            .vb-date-line {
                flex: 0 0 2rem;
                height: 1px;
                background: var(--gold-dim);
            }

            .vb-date-label {
                font-family: 'Cinzel', serif;
                font-size: 0.7rem;
                font-weight: 700;
                letter-spacing: 0.2em;
                text-transform: uppercase;
                color: var(--gold);
            }

            .vb-entry-title {
                font-family: 'Cinzel', serif;
                font-weight: 700;
                font-size:
                    <?php echo $keyword_font_size; ?>
                ;
                line-height: 1.1;
                letter-spacing: 0.02em;
                color: #ffffff;
                margin: 0 0 2rem 0;
                word-break: break-word;
                text-shadow: 0 8px 24px rgba(0, 0, 0, 0.5);
            }

            .vb-central-phrase {
                font-family: 'Newsreader', serif;
                font-size: clamp(1.05rem, 2vw, 1.3rem);
                font-style: italic;
                color: var(--text-muted);
                line-height: 1.7;
                max-width: 36rem;
                margin: 0 auto;
            }

            .vb-hero-image-wrap {
                position: relative;
                width: 100%;
                height: clamp(280px, 50vh, 520px);
                margin-bottom: clamp(3rem, 8vw, 6rem);
                overflow: hidden;
            }

            .vb-hero-image {
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
                display: block;
                filter: brightness(0.75);
            }

            .vb-hero-overlay {
                position: absolute;
                inset: 0;
                background: linear-gradient(to top, #0e0c09 0%, rgba(14, 12, 9, 0.4) 35%, transparent 100%);
            }

            .vb-body {
                max-width: 48rem;
                margin: 0 auto;
                padding: 0 clamp(1.5rem, 5vw, 3rem) clamp(4rem, 10vw, 8rem);
            }

            .vb-drop-cap {
                font-family: 'Cinzel', serif;
                font-size: clamp(4rem, 8vw, 5.5rem);
                font-weight: 700;
                float: left;
                margin: 0.4rem 0.7rem 0 0;
                color: var(--gold);
                line-height: 0.8;
            }

            .vb-first-para {
                font-family: 'Manrope', sans-serif;
                font-size: clamp(1.05rem, 2vw, 1.25rem);
                font-weight: 300;
                color: var(--text-off);
                line-height: 2.1;
                margin: 0 0 2.5rem 0;
            }

            .vb-body-text {
                font-family: 'Manrope', sans-serif;
                font-size: clamp(0.9rem, 1.7vw, 1.1rem);
                font-weight: 400;
                color: #94a3b8;
                line-height: 2;
                text-align: justify;
                margin: 0 0 2rem 0;
            }

            .vb-blockquote-wrap {
                position: relative;
                padding: 2.5rem 0;
                margin: 2.5rem 0;
            }

            .vb-blockquote-wrap .vb-quote-mark {
                position: absolute;
                top: 0;
                left: 0;
                font-family: Georgia, serif;
                font-size: 5rem;
                line-height: 1;
                color: rgba(236, 164, 19, 0.15);
            }

            .vb-blockquote {
                padding-left: 2rem;
                border-left: 2px solid var(--gold-dim);
                margin: 0;
            }

            .vb-blockquote p {
                font-family: 'Newsreader', serif;
                font-size: clamp(1.2rem, 2.5vw, 1.6rem);
                font-style: italic;
                color: rgba(236, 164, 19, 0.9);
                line-height: 1.5;
                margin: 0 0 1rem 0;
            }

            .vb-blockquote footer {
                font-family: 'Cinzel', serif;
                font-size: 0.65rem;
                font-weight: 700;
                letter-spacing: 0.25em;
                text-transform: uppercase;
                color: var(--text-faint);
            }

            .vb-reading-card {
                background: var(--bg-card);
                border: 1px solid var(--gold-soft);
                border-radius: 0.75rem;
                padding: 1.75rem;
                margin: 2.5rem 0;
                display: flex;
                align-items: flex-start;
                gap: 1.25rem;
            }

            .vb-reading-card-icon {
                color: var(--gold);
                font-size: 1.4rem;
                flex-shrink: 0;
            }

            .vb-reading-card-label {
                font-family: 'Cinzel', serif;
                font-size: 0.6rem;
                font-weight: 700;
                letter-spacing: 0.25em;
                text-transform: uppercase;
                color: var(--gold);
                margin-bottom: 0.5rem;
                display: block;
            }

            .vb-reading-card-verse {
                font-family: 'Newsreader', serif;
                font-size: 1.1rem;
                color: #ffffff;
                line-height: 1.6;
                margin: 0;
            }

            .vb-article-footer {
                max-width: 48rem;
                margin: 0 auto;
                padding: 2rem clamp(1.5rem, 5vw, 3rem) 4rem;
                border-top: 1px solid rgba(255, 255, 255, 0.05);
            }

            .vb-article-footer-inner {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                align-items: center;
                gap: 1.5rem;
            }

            .vb-author {
                display: flex;
                align-items: center;
                gap: 0.75rem;
            }

            .vb-author-avatar {
                width: 2.5rem;
                height: 2.5rem;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.08);
                display: flex;
                align-items: center;
                justify-content: center;
                font-family: 'Cinzel', serif;
                font-size: 1rem;
                font-weight: 700;
                color: var(--gold);
            }

            .vb-author-name {
                font-family: 'Cinzel', serif;
                font-size: 0.85rem;
                font-weight: 700;
                color: #ffffff;
                display: block;
            }

            .vb-tag-list {
                display: flex;
                flex-wrap: wrap;
                gap: 0.5rem;
            }

            .vb-tag {
                font-family: 'Cinzel', serif;
                font-size: 0.55rem;
                letter-spacing: 0.2em;
                text-transform: uppercase;
                color: var(--text-muted);
                background: rgba(255, 255, 255, 0.04);
                border: 1px solid rgba(255, 255, 255, 0.06);
                border-radius: 999px;
                padding: 0.3rem 0.8rem;
            }
        </style>
        <!-- /wp:html -->

        <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group alignfull vb-entry-wrap">
            <header class="vb-article-header">
                <div class="vb-date-row">
                    <span class="vb-date-line"></span>
                    <span class="vb-date-label">
                        <?php echo esc_html($date_display); ?>
                    </span>
                    <span class="vb-date-line"></span>
                </div>
                <h1 class="vb-entry-title">
                    <?php echo esc_html($keyword_title); ?>
                </h1>
                <p class="vb-central-phrase">&ldquo;
                    <?php echo esc_html($central_phrase); ?>&rdquo;
                </p>
            </header>

            <div class="vb-hero-image-wrap">
                <img class="vb-hero-image" src="<?php echo esc_url($image_url); ?>"
                    alt="<?php echo esc_attr($keyword_title); ?>" />
                <div class="vb-hero-overlay"></div>
            </div>

            <div class="vb-body">
                <p class="vb-first-para">
                    <span class="vb-drop-cap">
                        <?php echo esc_html($para1_first); ?>
                    </span>
                    <?php echo esc_html($para1_rest); ?>
                </p>

                <?php echo $extra_paras_html; ?>

                <div class="vb-blockquote-wrap">
                    <span class="vb-quote-mark">&ldquo;</span>
                    <blockquote class="vb-blockquote">
                        <p>No se trata de hacer cosas extraordinarias, sino de hacer las cosas ordinarias con un amor
                            extraordinario.</p>
                        <footer>— Santa Teresa de Calcuta</footer>
                    </blockquote>
                </div>

                <div class="vb-reading-card">
                    <span class="vb-reading-card-icon">✦</span>
                    <div>
                        <span class="vb-reading-card-label">Lectura del Santo Evangelio</span>
                        <span class="vb-reading-card-ref">
                            <?php echo esc_html($citation ?: $keyword_title); ?>
                        </span>
                        <p class="vb-reading-card-verse">&ldquo;
                            <?php echo esc_html($central_phrase); ?>&rdquo;
                        </p>
                    </div>
                </div>
            </div>

            <footer class="vb-article-footer">
                <div class="vb-article-footer-inner">
                    <div class="vb-author">
                        <div class="vb-author-avatar">CR</div>
                        <div>
                            <span class="vb-author-name">Capellanía Cristo Rey</span>
                            <span class="vb-author-role">Equipo Pastoral</span>
                        </div>
                    </div>
                    <div class="vb-tag-list">
                        <span class="vb-tag">Verbum Domini</span>
                        <span class="vb-tag">Espiritualidad</span>
                        <span class="vb-tag">
                            <?php echo esc_html($keyword_title); ?>
                        </span>
                    </div>
                </div>
            </footer>
        </div>
        <!-- /wp:group -->
        <?php
        return ob_get_clean();
    }
}
