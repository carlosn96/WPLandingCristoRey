import os
import pandas as pd
from pathlib import Path

# Importar funciones modulares
from api import run_llm_analysis, run_image_prompt, run_image_generation
from renderer import render_html

# Importar funciones de main (requiere ajustar ruta al padre)
import sys
import requests
from config import WP_URL
sys.path.append(str(Path(__file__).resolve().parent.parent))
from main import upload_media, create_post, generate_slug

def _get_related_posts(exclude_title: str) -> list[dict]:
    """Obtiene los últimos 3 posts de Verbum Domini (Categoría 4) excluyendo el actual."""
    try:
        # Usamos _embed para obtener la URL de la imagen destacada directamente
        url = f"{WP_URL}/wp-json/wp/v2/posts"
        params = {
            "categories": 4,
            "per_page": 4, # Pedimos 4 por si hay que filtrar el actual
            "status": "publish",
            "_embed": 1
        }
        resp = requests.get(url, params=params)
        resp.raise_for_status()
        posts = resp.json()
        
        related = []
        for p in posts:
            title = p['title']['rendered']
            # Evitar mostrar el mismo post que estamos publicando (si ya existiera o tiene el mismo título)
            if title.lower().strip() == exclude_title.lower().strip():
                continue
            
            # Extraer URL de imagen destacada de los datos embebidos
            img_url = "https://picsum.photos/600/400" # fallback
            try:
                if '_embedded' in p and 'wp:featuredmedia' in p['_embedded']:
                    img_url = p['_embedded']['wp:featuredmedia'][0]['source_url']
            except (KeyError, IndexError):
                pass
                
            related.append({
                "title": title,
                "link": p['link'],
                "image_url": img_url
            })
            
            if len(related) >= 2: # Solo queremos 2 para el diseño actual de grid
                break
        
        return related
    except Exception as e:
        print(f"⚠️ Error al obtener lecturas relacionadas: {e}")
        return []

def verify_column(column: str, df: pd.DataFrame):
    if column not in df.columns:
        df[column] = ""
    return df

def process_excel():
    """Flujo principal que lee el Excel y ejecuta el pipeline."""
    # La ruta al excel data_input se encuentra en la raíz /cristorey_wp/data_input
    excel_path = Path(__file__).resolve().parent.parent.parent / "data_input" / "verbum_passages.xlsx"
    
    if not excel_path.exists():
        print(f"❌ No se encontró el Excel en: {excel_path}")
        return

    print("📖 Leyendo Excel...")
    df = pd.read_excel(excel_path)
    
    # Estandarizar nombres de columnas a minúsculas
    df.columns = [col.lower() for col in df.columns]

    # Ensure 'publicado' and 'image_prompt' and 'file_name_image' columns exist
    df = verify_column('publicado', df)
    df = verify_column('image_prompt', df)
    df = verify_column('file_name_image', df)

    for index, row in df.iterrows():
        # Encontrar la columna de texto.
        texto_col = next((col for col in df.columns if 'text' in col), None)
        if not texto_col or pd.isna(row.get(texto_col)) or not str(row[texto_col]).strip():
            print(f"Fila {index+1}: Sin texto válido, saltando...")
            continue
            
        # Check if already published
        if str(row.get('publicado', '')).strip().lower() in ['sí', 'si', 'true', '1', 'yes', '1.0', 1]:
            print(f"Fila {index+1}: Ya está publicada, saltando...")
            continue
            
        fecha = str(row.get('fecha', ''))
        cita_col = next((col for col in df.columns if 'pasaje' in col or 'cita' in col), None)
        cita = str(row.get(cita_col, f"Pasaje {index+1}"))
        texto_completo = str(row.get(texto_col, ''))
        
        print(f"\n======================================")
        print(f"🚀 Procesando Fila {index+1}: {cita}")
        print(f"======================================")

        # 1. Análisis Teológico
        analysis = run_llm_analysis(texto_completo)
        if not analysis:
            continue
            
        keyword = analysis.get("key_word", "VERBUM")
        central_phrase = analysis.get("central_phrase", cita)

        # 2. Generación Prompt Fotográfico
        image_prompt = run_image_prompt(texto_completo, analysis)
        print(f"\n📸 Prompt fotográfico generado:\n{image_prompt[:150]}...\n")
        df.at[index, 'image_prompt'] = image_prompt
        
        # 3. Generación Imagen
        image_bytes = run_image_generation(image_prompt)
        
        media_id = None
        image_url = ""
        filename = f"verbum-{generate_slug(keyword)}-{index}.jpg"
        df.at[index, 'file_name_image'] = filename
        
        if image_bytes:
            print("☁️ Subiendo imagen a WordPress...")
            media_id, image_url = upload_media(image_bytes, filename)
            
        if not image_url:
            print("⚠️ No se generó la imagen, usando un placeholder de Picsum.")
            image_url = "https://picsum.photos/1200/800"

        # 4. Obtener Lecturas Relacionadas Dinámicas
        title = f"Verbum Domini: {cita}"
        related = _get_related_posts(title)

        # 5. Construir HTML
        html_content = render_html(keyword, central_phrase, texto_completo, image_url, citation=cita, related_posts=related)
        
        print("\n🌐 Publicando en WordPress (Categoría 4 - Verbum Domini)...")
        try:
            create_post(
                title=title,
                content=html_content,
                status="publish", # Lo dejamos como borrador para revisión visual
                featured_media=media_id,
                categories=[4],
                template="single-post-verbum-domini",
                meta={
                    "vb_keyword": keyword,
                    "vb_central_phrase": central_phrase,
                    "vb_citation": cita,
                    "vb_passage_text": texto_completo
                }
            )
            print(f"✅ ¡Entrada de '{cita}' procesada exitosamente!")
            
            # Update 'publicado' and save
            df.at[index, 'publicado'] = 1
            df.to_excel(excel_path, index=False)
            
        except Exception as e:
            print(f"❌ Error al publicar en WP: {e}")

if __name__ == "__main__":
    process_excel()
