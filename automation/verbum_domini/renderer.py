from datetime import datetime


# ──────────────────────────────────────────────────────────────────────────────
# Helpers
# ──────────────────────────────────────────────────────────────────────────────

def _keyword_font_size(word: str) -> str:
    """
    Calcula un clamp() de font-size responsive adaptado a la longitud de la
    palabra clave para que nunca se corte en el hero.

    Escala:
      ≤6  letras : clamp(3.5rem, 10vw, 7rem)    — XXL
      ≤8  letras : clamp(3rem, 8vw, 6rem)        — XL
      ≤10 letras : clamp(2.5rem, 6.5vw, 5rem)    — L
      ≤12 letras : clamp(2rem, 5.5vw, 4rem)      — M
      >12 letras : clamp(1.75rem, 4vw, 3.2rem)   — S (larga / compuesta)
    """
    n = len(word.strip())
    if n <= 6:
        return "clamp(3.5rem, 10vw, 7rem)"
    elif n <= 8:
        return "clamp(3rem, 8vw, 6rem)"
    elif n <= 10:
        return "clamp(2.5rem, 6.5vw, 5rem)"
    elif n <= 12:
        return "clamp(2rem, 5.5vw, 4rem)"
    else:
        return "clamp(1.75rem, 4vw, 3.2rem)"


def _format_date_es(date_str: str | None) -> str:
    """Devuelve la fecha en formato '12 OCTUBRE 2024' (es). Usa hoy si es None."""
    months = [
        "", "ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO",
        "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE",
    ]
    try:
        if date_str:
            dt = datetime.strptime(date_str.strip(), "%Y-%m-%d")
        else:
            dt = datetime.today()
        return f"{dt.day} {months[dt.month]} {dt.year}"
    except Exception:
        return datetime.today().strftime("%d / %m / %Y").upper()


# ──────────────────────────────────────────────────────────────────────────────
# Main Renderer
# ──────────────────────────────────────────────────────────────────────────────

def render_html(
    keyword: str,
    central_phrase: str,
    passage_text: str,
    image_url: str,
    date_str: str | None = None,
    citation: str | None = None,
    related_posts: list[dict] | None = None,
) -> str:
    """
    Renderiza HTML PREMIUM — Entrada de Blog Editorial.

    Adaptado del diseño Stitch 'Capellán a Cristo Rey':
    - Tipografía: Cinzel (display) · Newsreader (serif/citas) · Manrope (body)
    - Paleta: fondo #0e0c09 · dorado #eca413 · blanco roto #e2e2e2
    - Hero completo con imagen y gradiente, encabezado centrado elegante
    - Cuerpo editorial con Drop Cap, citas, sección de lectura recomendada
    - Footer premium con navegación
    """

    keyword_font_size = _keyword_font_size(keyword)
    date_display = _format_date_es(date_str)

    # Drop cap sobre el texto del pasaje
    first_letter = passage_text[0] if passage_text else ""
    remaining_text = passage_text[1:] if len(passage_text) > 1 else ""

    # Dividir el pasaje en párrafos si hay saltos de línea dobles, o en 2 mitades
    paras = [p.strip() for p in passage_text.split("\n\n") if p.strip()]
    if len(paras) < 2:
        # Dividir el texto en dos mitades para dar más estructura
        mid = len(passage_text) // 2
        split_at = passage_text.find(" ", mid)
        if split_at == -1:
            split_at = mid
        paras = [passage_text[:split_at].strip(), passage_text[split_at:].strip()]

    first_para = paras[0]
    rest_paras = paras[1:]

    # Drop cap del primer párrafo
    para1_first = first_para[0] if first_para else ""
    para1_rest  = first_para[1:] if len(first_para) > 1 else ""

    # Párrafos adicionales como <p> separados
    extra_paras_html = "\n".join(
        f'<p class="vb-body-text">{p}</p>' for p in rest_paras
    )

    html = f"""<!-- wp:html -->
<style>
@import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Newsreader:ital,opsz,wght@0,6..72,200..800;1,6..72,200..800&family=Manrope:wght@300;400;500;600&display=swap');

/* ═══════════════════════════════════════════════
   ARMONIZACIÓN GLOBAL DEL HEADER DE WORDPRESS
   ═══════════════════════════════════════════════ */
.is-sticky-header .cr-premium-header,
.cr-premium-header {{
    background-color: #0e0c09 !important;
    border-bottom: 1px solid rgba(236,164,19,0.15) !important;
    box-shadow: 0 10px 40px rgba(0,0,0,0.6) !important;
}}

/* ═══════════════════════════════════════════════
   SISTEMA DE DISEÑO — TOKENS
   ═══════════════════════════════════════════════ */
.vb-entry-wrap {{
    --gold:       #eca413;
    --gold-soft:  rgba(236,164,19,0.15);
    --gold-dim:   rgba(236,164,19,0.4);
    --bg-dark:    #0e0c09;
    --bg-card:    #161411;
    --text-white: #fcfaf7;
    --text-off:   #e2e2e2;
    --text-muted: #94a3b8;
    --text-faint: #64748b;
    background-color: var(--bg-dark);
    color: var(--text-off);
    font-family: 'Manrope', sans-serif;
    -webkit-font-smoothing: antialiased;
    overflow-x: hidden;
}}

/* ───────────────────────────────
   ENCABEZADO DEL ARTÍCULO
   ─────────────────────────────── */
.vb-article-header {{
    max-width: 48rem;
    margin: 0 auto;
    padding: clamp(3.5rem, 8vw, 6rem) clamp(1.5rem, 5vw, 3rem) clamp(2.5rem, 6vw, 4rem);
    text-align: center;
}}

.vb-date-row {{
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 2rem;
}}
.vb-date-line {{
    flex: 0 0 2rem;
    height: 1px;
    background: var(--gold-dim);
}}
.vb-date-label {{
    font-family: 'Cinzel', serif;
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--gold);
}}

.vb-entry-title {{
    font-family: 'Cinzel', serif;
    font-weight: 700;
    font-size: {keyword_font_size};
    line-height: 1.1;
    letter-spacing: 0.02em;
    color: #ffffff;
    margin: 0 0 2rem 0;
    word-break: break-word;
    text-shadow: 0 8px 24px rgba(0,0,0,0.5);
}}

.vb-central-phrase {{
    font-family: 'Newsreader', serif;
    font-size: clamp(1.05rem, 2vw, 1.3rem);
    font-style: italic;
    color: var(--text-muted);
    line-height: 1.7;
    max-width: 36rem;
    margin: 0 auto;
}}
.vb-central-phrase .vb-phrase-source {{
    display: block;
    font-size: 0.8rem;
    font-style: normal;
    color: var(--text-faint);
    margin-top: 0.6rem;
}}

/* ───────────────────────────────
   IMAGEN HERO
   ─────────────────────────────── */
.vb-hero-image-wrap {{
    position: relative;
    width: 100%;
    height: clamp(280px, 50vh, 520px);
    margin-bottom: clamp(3rem, 8vw, 6rem);
    overflow: hidden;
}}
.vb-hero-image {{
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
    filter: brightness(0.75);
    transition: filter 0.6s ease;
}}
.vb-hero-image-wrap:hover .vb-hero-image {{
    filter: brightness(0.85);
}}
.vb-hero-overlay {{
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to top,
        #0e0c09 0%,
        rgba(14,12,9,0.4) 35%,
        transparent 100%
    );
    pointer-events: none;
}}
.vb-hero-caption {{
    position: absolute;
    bottom: 1rem;
    right: 1.5rem;
    font-family: 'Cinzel', serif;
    font-size: 0.6rem;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    color: rgba(255,255,255,0.35);
}}

/* ───────────────────────────────
   CUERPO EDITORIAL
   ─────────────────────────────── */
.vb-body {{
    max-width: 48rem;
    margin: 0 auto;
    padding: 0 clamp(1.5rem, 5vw, 3rem) clamp(4rem, 10vw, 8rem);
}}

/* Drop Cap */
.vb-drop-cap {{
    font-family: 'Cinzel', serif;
    font-size: clamp(4rem, 8vw, 5.5rem);
    font-weight: 700;
    float: left;
    margin: 0.4rem 0.7rem 0 0;
    color: var(--gold);
    line-height: 0.8;
}}
.vb-first-para {{
    font-family: 'Manrope', sans-serif;
    font-size: clamp(1.05rem, 2vw, 1.25rem);
    font-weight: 300;
    color: var(--text-off);
    line-height: 2.1;
    margin: 0 0 2.5rem 0;
}}
.vb-first-para::after {{
    content: '';
    display: table;
    clear: both;
}}

.vb-body-text {{
    font-family: 'Manrope', sans-serif;
    font-size: clamp(0.9rem, 1.7vw, 1.1rem);
    font-weight: 400;
    color: #94a3b8;
    line-height: 2;
    text-align: justify;
    text-justify: inter-word;
    margin: 0 0 2rem 0;
}}

/* Blockquote de cita central */
.vb-blockquote-wrap {{
    position: relative;
    padding: 2.5rem 0;
    margin: 2.5rem 0;
}}
.vb-blockquote-wrap .vb-quote-mark {{
    position: absolute;
    top: 0;
    left: 0;
    font-family: Georgia, serif;
    font-size: 5rem;
    line-height: 1;
    color: rgba(236,164,19,0.15);
}}
.vb-blockquote {{
    padding-left: 2rem;
    border-left: 2px solid var(--gold-dim);
    margin: 0;
}}
.vb-blockquote p {{
    font-family: 'Newsreader', serif;
    font-size: clamp(1.2rem, 2.5vw, 1.6rem);
    font-style: italic;
    color: rgba(236,164,19,0.9);
    line-height: 1.5;
    margin: 0 0 1rem 0;
}}
.vb-blockquote footer {{
    font-family: 'Cinzel', serif;
    font-size: 0.65rem;
    font-weight: 700;
    letter-spacing: 0.25em;
    text-transform: uppercase;
    color: var(--text-faint);
}}

/* Subtítulos del cuerpo */
.vb-body-heading {{
    font-family: 'Cinzel', serif;
    font-size: clamp(1rem, 2vw, 1.35rem);
    font-weight: 700;
    color: #ffffff;
    margin: 3rem 0 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid rgba(255,255,255,0.05);
    display: inline-block;
}}

/* Tarjeta de lectura recomendada */
.vb-reading-card {{
    background: var(--bg-card);
    border: 1px solid var(--gold-soft);
    border-radius: 0.75rem;
    padding: 1.75rem;
    margin: 2.5rem 0;
    display: flex;
    align-items: flex-start;
    gap: 1.25rem;
}}
.vb-reading-card-icon {{
    color: var(--gold);
    font-size: 1.4rem;
    flex-shrink: 0;
    margin-top: 0.15rem;
    line-height: 1;
}}
.vb-reading-card-label {{
    font-family: 'Cinzel', serif;
    font-size: 0.6rem;
    font-weight: 700;
    letter-spacing: 0.25em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 0.5rem;
    display: block;
}}
.vb-reading-card-ref {{
    font-family: 'Manrope', sans-serif;
    font-size: 0.8rem;
    font-style: italic;
    color: var(--text-faint);
    margin-bottom: 0.5rem;
    display: block;
}}
.vb-reading-card-verse {{
    font-family: 'Newsreader', serif;
    font-size: 1.1rem;
    color: #ffffff;
    line-height: 1.6;
    margin: 0;
}}

/* ───────────────────────────────
   PIE DE ARTÍCULO (AUTOR + TAGS)
   ─────────────────────────────── */
.vb-article-footer {{
    max-width: 48rem;
    margin: 0 auto;
    padding: 2rem clamp(1.5rem, 5vw, 3rem) 4rem;
    border-top: 1px solid rgba(255,255,255,0.05);
}}
.vb-article-footer-inner {{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    gap: 1.5rem;
}}
.vb-author {{
    display: flex;
    align-items: center;
    gap: 0.75rem;
}}
.vb-author-avatar {{
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 50%;
    background: rgba(255,255,255,0.08);
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Cinzel', serif;
    font-size: 1rem;
    font-weight: 700;
    color: var(--gold);
}}
.vb-author-name {{
    font-family: 'Cinzel', serif;
    font-size: 0.85rem;
    font-weight: 700;
    color: #ffffff;
    display: block;
}}
.vb-author-role {{
    font-family: 'Manrope', sans-serif;
    font-size: 0.75rem;
    color: var(--text-faint);
    display: block;
}}
.vb-tag-list {{
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}}
.vb-tag {{
    font-family: 'Cinzel', serif;
    font-size: 0.55rem;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--text-muted);
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.06);
    border-radius: 999px;
    padding: 0.3rem 0.8rem;
}}

/* ───────────────────────────────
   LECTURAS RELACIONADAS
   ─────────────────────────────── */
.vb-related-section {{
    max-width: 48rem;
    margin: 0 auto;
    padding: 0 clamp(1.5rem, 5vw, 3rem) clamp(3rem, 8vw, 6rem);
}}
.vb-related-heading {{
    font-family: 'Cinzel', serif;
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 0.25em;
    text-transform: uppercase;
    color: var(--gold);
    text-align: center;
    margin-bottom: 2rem;
}}
.vb-related-grid {{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.5rem;
}}
.vb-related-card {{
    background: var(--bg-card);
    border: 1px solid rgba(255,255,255,0.05);
    border-radius: 0.75rem;
    overflow: hidden;
    text-decoration: none;
    transition: border-color 0.3s ease, transform 0.3s ease;
    display: block;
}}
.vb-related-card:hover {{
    border-color: var(--gold-dim);
    transform: translateY(-3px);
}}
.vb-related-card-img {{
    width: 100%;
    height: 9rem;
    object-fit: cover;
    opacity: 0.8;
    transition: opacity 0.4s ease;
    display: block;
}}
.vb-related-card:hover .vb-related-card-img {{
    opacity: 1;
}}
.vb-related-card-body {{
    padding: 1.25rem;
}}
.vb-related-card-title {{
    font-family: 'Cinzel', serif;
    font-size: 0.95rem;
    color: #ffffff;
    line-height: 1.4;
    margin-bottom: 0.5rem;
    transition: color 0.3s ease;
}}
.vb-related-card:hover .vb-related-card-title {{
    color: var(--gold);
}}
.vb-related-card-date {{
    font-family: 'Manrope', sans-serif;
    font-size: 0.65rem;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--text-faint);
}}

/* ───────────────────────────────
   FOOTER DEL SITIO
   ─────────────────────────────── */
.vb-site-footer {{
    border-top: 1px solid rgba(255,255,255,0.05);
    background: rgba(0,0,0,0.35);
    padding: clamp(3rem, 8vw, 5rem) clamp(1.5rem, 5vw, 3rem);
    text-align: center;
}}
.vb-footer-logo-icon {{
    width: 2rem;
    height: 2rem;
    margin: 0 auto 0.75rem;
    color: var(--gold);
}}
.vb-footer-brand {{
    font-family: 'Cinzel', serif;
    font-weight: 700;
    font-size: 1.05rem;
    letter-spacing: 0.15em;
    color: var(--text-off);
}}
.vb-footer-nav {{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 0.4rem 2rem;
    margin: 2rem 0;
}}
.vb-footer-nav a {{
    font-family: 'Cinzel', serif;
    font-size: 0.65rem;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--text-faint);
    text-decoration: none;
    transition: color 0.2s ease;
}}
.vb-footer-nav a:hover {{
    color: var(--gold);
}}
.vb-footer-divider {{
    width: 100%;
    height: 1px;
    background: rgba(255,255,255,0.05);
    margin: 1.5rem 0;
}}
.vb-footer-copy {{
    font-family: 'Cinzel', serif;
    font-size: 0.6rem;
    letter-spacing: 0.2em;
    color: rgba(255,255,255,0.2);
    text-transform: uppercase;
}}

/* ───────────────────────────────
   ORNAMENT LINE REUTILIZABLE
   ─────────────────────────────── */
.vb-ornament {{
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1.25rem;
    margin: 2rem auto;
    max-width: 36rem;
}}
.vb-ornament::before,
.vb-ornament::after {{
    content: "";
    flex: 1;
    height: 1px;
    background: linear-gradient(to var(--dir, right), transparent, var(--gold-dim));
}}
.vb-ornament::after {{ --dir: left; }}
</style>
<!-- /wp:html -->


<!-- wp:group {{"align":"full","style":{{"spacing":{{"padding":{{"top":"0","bottom":"0","left":"0","right":"0"}}}}}},"layout":{{"type":"constrained"}}}} -->
<div class="wp-block-group alignfull vb-entry-wrap">

  <!-- ═══════════════════════════
       ENCABEZADO DEL ARTÍCULO
       ═══════════════════════════ -->
  <header class="vb-article-header">

    <!-- Fecha con ornamentos -->
    <div class="vb-date-row">
      <span class="vb-date-line"></span>
      <span class="vb-date-label">{date_display}</span>
      <span class="vb-date-line"></span>
    </div>

    <!-- Título / Keyword principal -->
    <h1 class="vb-entry-title">{keyword.title()}</h1>

    <!-- Cita central / Frase destacada -->
    <p class="vb-central-phrase">
      &ldquo;{central_phrase}&rdquo;
    </p>

  </header>

  <!-- ═══════════════════════════
       IMAGEN HERO
       ═══════════════════════════ -->
  <div class="vb-hero-image-wrap">
    <img class="vb-hero-image"
         src="{image_url}"
         alt="{keyword.title()}"
         loading="eager" />
    <div class="vb-hero-overlay"></div>
    <span class="vb-hero-caption">Fotografía · Capellanía Cristo Rey</span>
  </div>

  <!-- ═══════════════════════════
       CUERPO EDITORIAL
       ═══════════════════════════ -->
  <div class="vb-body">

    <!-- Primer párrafo con Drop Cap -->
    <p class="vb-first-para">
      <span class="vb-drop-cap">{para1_first}</span>{para1_rest}
    </p>

    {extra_paras_html}

    <!-- Blockquote de cita inspiradora -->
    <div class="vb-blockquote-wrap">
      <span class="vb-quote-mark">&ldquo;</span>
      <blockquote class="vb-blockquote">
        <p>No se trata de hacer cosas extraordinarias, sino de hacer las cosas ordinarias con un amor extraordinario.</p>
        <footer>— Santa Teresa de Calcuta</footer>
      </blockquote>
    </div>

    <!-- Tarjeta de lectura recomendada -->
    <div class="vb-reading-card">
      <span class="vb-reading-card-icon">✦</span>
      <div>
        <span class="vb-reading-card-label">Lectura del Santo Evangelio</span>
        <span class="vb-reading-card-ref">{citation if citation else keyword.title()}</span>
        <p class="vb-reading-card-verse">&ldquo;{central_phrase}&rdquo;</p>
      </div>
    </div>

  </div>

  <!-- ═══════════════════════════
       PIE DEL ARTÍCULO
       ═══════════════════════════ -->
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
        <span class="vb-tag">{keyword.title()}</span>
      </div>
    </div>
  </footer>

  <!-- ═══════════════════════════
       ORNAMENTO DIVISOR
       ═══════════════════════════ -->
  <div class="vb-ornament" style="max-width:48rem;margin:0 auto 3rem;">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
         fill="none" stroke="#eca413" stroke-width="1.5">
      <path d="M12 2L15 9H22L16 14L18 21L12 17L6 21L8 14L2 9H9L12 2Z"
            fill="rgba(236,164,19,0.1)"/>
    </svg>
  </div>

  <!-- ═══════════════════════════
       LECTURAS RELACIONADAS
       ═══════════════════════════ -->
  {" " if not related_posts else f'''
  <section class="vb-related-section">
    <h3 class="vb-related-heading">Lecturas Relacionadas</h3>
    <div class="vb-related-grid">
      {''.join([f"""
      <a class="vb-related-card" href="{post['link']}">
        <img class="vb-related-card-img"
             src="{post['image_url']}"
             alt="{post['title']}" />
        <div class="vb-related-card-body">
          <p class="vb-related-card-title">{post['title']}</p>
          <span class="vb-related-card-date">Verbum Domini</span>
        </div>
      </a>
      """ for post in related_posts])}
    </div>
  </section>
  '''}

</div>
<!-- /wp:group -->
"""
    return html