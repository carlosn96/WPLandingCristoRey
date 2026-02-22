"""
Script principal del Agente de Automatización - Cristo Rey WordPress
=====================================================================
Conecta con la REST API de WordPress para publicar y gestionar contenido.

Uso:
    python main.py

Requisitos:
    - Archivo .env configurado en la raíz del proyecto
    - Dependencias instaladas: pip install -r requirements.txt
"""

import os
import sys
import json
import requests
import mimetypes
import re
import unicodedata
from dotenv import load_dotenv
from pathlib import Path

# Cargar variables de entorno desde .env en la raíz del proyecto
env_path = Path(__file__).resolve().parent.parent / ".env"
load_dotenv(dotenv_path=env_path)

# Configuración desde .env
WP_URL = os.getenv("WP_URL", "").rstrip("/")
WP_USER = os.getenv("WP_USER", "")
WP_APP_PASSWORD = os.getenv("WP_APP_PASSWORD", "")


def get_auth():
    """Retorna la tupla de autenticación para la REST API."""
    if not WP_USER or not WP_APP_PASSWORD:
        print("❌ Error: WP_USER y WP_APP_PASSWORD deben estar configurados en .env")
        sys.exit(1)
    return (WP_USER, WP_APP_PASSWORD)


def get_headers():
    """Retorna las cabeceras incluyendo el fallback X-WP-Auth."""
    import base64
    user_pass = f"{WP_USER}:{WP_APP_PASSWORD}"
    encoded_u_p = base64.b64encode(user_pass.encode()).decode()
    return {
        "Authorization": f"Basic {encoded_u_p}",
        "Content-Type": "application/json"
    }


def get_api_url(endpoint: str) -> str:
    """Construye la URL completa de la API REST de WordPress."""
    if not WP_URL:
        print("❌ Error: WP_URL debe estar configurado en .env")
        sys.exit(1)
    return f"{WP_URL}/wp-json/wp/v2/{endpoint}"


def generate_slug(text: str) -> str:
    """
    Genera un slug amigable para URLs a partir de un texto.
    (Ej: "Hola Mundo!" -> "hola-mundo")
    """
    text = str(text)
    # Normalizar caracteres (quitar acentos, etc)
    text = unicodedata.normalize('NFKD', text).encode('ascii', 'ignore').decode('ascii')
    # Convertir a minúsculas
    text = text.lower()
    # Reemplazar espacios y caracteres no alfanuméricos por guiones
    text = re.sub(r'[^a-z0-9]+', '-', text)
    # Limpiar guiones iniciales o finales
    return text.strip('-')


def create_post(title: str, content: str, status: str = "draft", featured_media: int = None, slug: str = None, categories: list = None, template: str = None, meta: dict = None, excerpt: str = None) -> dict:
    """
    Crea un nuevo post en WordPress.

    Args:
        title: Título del post
        content: Contenido HTML del post
        status: 'draft', 'publish', o 'pending' (default: 'draft')
        featured_media: ID del medio a usar como imagen destacada (opcional)
        slug: Slug personalizado (opcional, se auto-genera si no se provee)
        categories: Lista de IDs de categorías a las que asignar el post (opcional)
        template: Nombre del template a asignar (ej. 'single-post-verbum-domini')
        meta: Diccionario de metadatos (post_meta)
        excerpt: Resumen del post

    Returns:
        dict con la respuesta de la API
    """
    payload = {
        "title": title,
        "content": content,
        "status": status,
        "slug": slug if slug else generate_slug(title)
    }
    if featured_media:
        payload["featured_media"] = featured_media
    if categories:
        payload["categories"] = categories
    if template:
        payload["template"] = template
    if meta:
        payload["meta"] = meta
    if excerpt:
        payload["excerpt"] = excerpt

    response = requests.post(
        get_api_url("posts"),
        headers=get_headers(),
        json=payload,
    )
    response.raise_for_status()
    data = response.json()
    print(f"✅ Post creado: '{data['title']['rendered']}' (ID: {data['id']}, URL: {data.get('link', 'N/A')})")
    return data


def update_post(post_id: int, payload: dict) -> dict:
    """
    Actualiza un post existente.
    """
    response = requests.post(
        get_api_url(f"posts/{post_id}"),
        headers=get_headers(),
        json=payload,
    )
    response.raise_for_status()
    data = response.json()
    print(f"✅ Post {post_id} actualizado.")
    return data


def create_page(title: str, content: str, status: str = "draft", featured_media: int = None, slug: str = None) -> dict:
    """
    Crea una nueva página en WordPress.

    Args:
        title: Título de la página
        content: Contenido HTML de la página
        status: 'draft', 'publish', o 'pending' (default: 'draft')
        featured_media: ID del medio a usar como imagen destacada (opcional)
        slug: Slug personalizado (opcional, se auto-genera si no se provee)

    Returns:
        dict con la respuesta de la API
    """
    payload = {
        "title": title,
        "content": content,
        "status": status,
        "slug": slug if slug else generate_slug(title)
    }
    if featured_media:
        payload["featured_media"] = featured_media

    response = requests.post(
        get_api_url("pages"),
        headers=get_headers(),
        json=payload,
    )
    response.raise_for_status()
    data = response.json()
    print(f"✅ Página creada: '{data['title']['rendered']}' (ID: {data['id']}, URL: {data.get('link', 'N/A')})")
    return data


def list_posts(per_page: int = 10) -> list:
    """Lista los posts existentes."""
    response = requests.get(
        get_api_url("posts"),
        auth=get_auth(),
        params={"per_page": per_page},
    )
    response.raise_for_status()
    posts = response.json()
    print(f"📄 {len(posts)} posts encontrados:")
    for post in posts:
        print(f"   - [{post['id']}] {post['title']['rendered']} ({post['status']})")
    return posts


def upload_media(file_path: str) -> dict:
    """
    Sube un archivo multimedia a WordPress y retorna el ID.

    Args:
        file_path: Ruta al archivo local (ej: 'imagenes/foto.jpg')

    Returns:
        dict con la respuesta de la API, incluyendo el ID del medio.
    """
    path = Path(file_path)
    if not path.exists():
        print(f"❌ Error: Archivo no encontrado: {file_path}")
        return None

    mime_type, _ = mimetypes.guess_type(path)
    if not mime_type:
        mime_type = "application/octet-stream"

    headers = get_headers()
    headers.update({
        "Content-Disposition": f'attachment; filename="{path.name}"',
        "Content-Type": mime_type,
    })

    with open(path, "rb") as f:
        data = f.read()

    response = requests.post(
        get_api_url("media"),
        headers=headers,
        data=data,
    )
    response.raise_for_status()
    response_data = response.json()
    print(f"🖼️ Media subido exitosamente: '{path.name}' (ID: {response_data['id']})")
    return response_data


def load_template(template_name: str) -> str:
    """
    Carga una plantilla HTML desde automation/templates/.

    Args:
        template_name: nombre del archivo de plantilla (ej: 'post_template.html')

    Returns:
        Contenido de la plantilla como string
    """
    template_path = Path(__file__).resolve().parent / "templates" / template_name
    if not template_path.exists():
        print(f"❌ Error: Plantilla no encontrada: {template_path}")
        sys.exit(1)
    return template_path.read_text(encoding="utf-8")


# ---------------------------------------------------------------------------
# Punto de entrada
# ---------------------------------------------------------------------------
if __name__ == "__main__":
    print("🚀 Agente de Automatización - Cristo Rey WordPress")
    print(f"   URL: {WP_URL or '⚠️  No configurada'}")
    print(f"   Usuario: {WP_USER or '⚠️  No configurado'}")
    print()

    if not WP_URL or not WP_USER or not WP_APP_PASSWORD:
        print("⚠️  Configura el archivo .env antes de continuar.")
        print("   Copia .env.example a .env y llena los valores.")
        sys.exit(0)

    # Ejemplo: listar posts existentes
    list_posts()
