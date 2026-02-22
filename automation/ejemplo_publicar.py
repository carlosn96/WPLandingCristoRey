"""
Script de ejemplo para publicar un post en Cristo Rey WordPress
--------------------------------------------------------------
Este script utiliza la lógica de main.py para:
1. (Opcional) Subir una imagen destacada.
2. Cargar la plantilla HTML.
3. Crear un post en estado 'draft' (borrador).
"""

import sys
import os

# Asegurar que el directorio automation esté en el path para importar main
sys.path.append(os.path.dirname(os.path.abspath(__file__)))

try:
    from main import create_post, upload_media, load_template
except ImportError:
    print("❌ Error: No se pudo importar 'main.py'. Asegúrate de ejecutar el script desde la raíz del proyecto.")
    print("Uso: python automation/ejemplo_publicar.py")
    sys.exit(1)

def publicar_ejemplo():
    print("🎬 Iniciando proceso de publicación de prueba...")

    # 1. Preparar datos
    titulo = "Nueva Iniciativa Cristo Rey (Test)"
    cuerpo = "<p>Contenido de prueba generado automáticamente para verificar el flujo de publicación.</p>"
    
    # 2. Cargar plantilla
    try:
        template = load_template("post_template.html")
    except Exception as e:
        print(f"⚠️ No se encontró la plantilla, usando contenido crudo. Error: {e}")
        template = "{{contenido}}"
    
    # 3. Preparar HTML final (reemplazando placeholders)
    html_final = template.replace("{{titulo}}", titulo).replace("{{contenido}}", cuerpo)
    
    # 4. Crear el post
    try:
        resultado = create_post(
            title=titulo,
            content=html_final,
            status="draft"
        )
        print(f"\n🚀 Proceso completado exitosamente.")
        print(f"🔗 Revisa el borrador con ID: {resultado['id']}")
    except Exception as e:
        print(f"\n❌ Error al crear el post: {e}")
        if "401" in str(e):
            print("💡 Tip: Si estás en localhost, recuerda que WordPress requiere HTTPS para Application Passwords por defecto.")

if __name__ == "__main__":
    publicar_ejemplo()
