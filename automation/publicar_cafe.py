"""
Script de ejemplo para publicar contenido específico de "El Café de la mañana".
"""

from main import create_post
import requests

def publicar_cafe():
    # El ID de la categoría de El Café de la mañana es el 5.
    CAFE_CATEGORY_ID = 5
    
    title = "Empezando la semana con energía"
    content = """
    <!-- wp:paragraph -->
    <p>Una taza de café caliente y una buena oración son la mejor forma de empezar el lunes. No importa los retos de la semana, Dios nos acompaña.</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:paragraph -->
    <p>Tómate 5 minutos e inspírate este día.</p>
    <!-- /wp:paragraph -->
    """
    
    try:
        # Aquí se fuerza a que el post creado tenga la categoría 5 y se guarde en borrador.
        # Usa status="publish" si prefieres que se vea al instante.
        create_post(
            title=title, 
            content=content, 
            status="draft", 
            categories=[CAFE_CATEGORY_ID]
        )
        print("🎉 ¡El Café de la mañana guardado como borrador con éxito!")
    except requests.exceptions.HTTPError as e:
        print(f"\n❌ Error al crear El Café de la mañana: {e}")
        if hasattr(e, 'response') and e.response is not None:
            print("Detalle:", e.response.text)

if __name__ == "__main__":
    print("🎬 Iniciando proceso de publicación para El Café de la mañana...")
    publicar_cafe()
    print("\n🚀 Proceso completado exitosamente.")
