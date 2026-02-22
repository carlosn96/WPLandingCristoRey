"""
Script de ejemplo para publicar contenido específico de "Verbum Domini".
"""

from main import create_post
import requests

def publicar_verbum():
    # El ID de la categoría de Verbum Domini es el 4.
    VERBUM_CATEGORY_ID = 4
    
    title = "Reflexión sobre el Amor al Prójimo"
    content = """
    <!-- wp:paragraph -->
    <p>Hoy reflexionamos sobre la importancia de amar al prójimo. Como nos enseña la escritura, el amor es el mandamiento más grande.</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:paragraph -->
    <p>Que esta jornada te encuentre compartiendo la luz con aquellos que más lo necesitan.</p>
    <!-- /wp:paragraph -->
    """
    
    try:
        # Aquí se fuerza a que el post creado tenga la categoría 4 y se publique.
        # Usa status="draft" si prefieres revisarlo antes.
        create_post(
            title=title, 
            content=content, 
            status="publish", 
            categories=[VERBUM_CATEGORY_ID]
        )
        print("🎉 ¡Verbum Domini publicado con éxito!")
    except requests.exceptions.HTTPError as e:
        print(f"\n❌ Error al crear el Verbum Domini: {e}")
        if hasattr(e, 'response') and e.response is not None:
            print("Detalle:", e.response.text)

if __name__ == "__main__":
    print("🎬 Iniciando proceso de publicación de Verbum Domini...")
    publicar_verbum()
    print("\n🚀 Proceso completado exitosamente.")
