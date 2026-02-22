# Guía de Publicación de Contenido - Cristo Rey

Siguiendo el **Protocolo de Operación**, la administración de contenido se realiza exclusivamente a través de la **WordPress REST API**.

## 1. Requisitos Previos

- Tener instalado Python 3.x.
- Dependencias instaladas: `pip install -r automation/requirements.txt`.
- Archivo `.env` configurado con `WP_URL`, `WP_USER` y `WP_APP_PASSWORD`.

## 2. Herramientas de Automatización

El script `automation/main.py` contiene todas las funciones necesarias para interactuar con WordPress.

### Funciones Principales

- `create_post(title, content, status, featured_media)`: Crea una entrada.
- `upload_media(file_path)`: Sube una imagen y devuelve su `id`.
- `load_template(template_name)`: Carga el diseño base desde `automation/templates/`.

## 3. Flujo de Publicación (Paso a Paso)

1. **Subir Imágenes**: Si el post lleva imagen destacada, súbela primero para obtener su ID.
2. **Cargar Plantilla**: Se recomienda usar `post_template.html` para mantener la consistencia visual.
3. **Reemplazar Placeholders**: Sustituir `{{titulo}}`, `{{contenido}}`, etc.
4. **Ejecutar Inserción**: Llamar a `create_post` con el HTML final.

## 4. Ejemplo Rápido

Consulta el archivo `automation/ejemplo_publicar.py` para ver un ejemplo de código funcional que automatiza todo este proceso de un tirón.

> [!IMPORTANT]
> **Nota sobre Desarrollo Local (HTTP):**
> De forma predeterminada, WordPress deshabilita Application Passwords en conexiones inseguras (HTTP). Para probarlo en localhost, asegúrate de que tu entorno local permita estas conexiones o utiliza HTTPS.
