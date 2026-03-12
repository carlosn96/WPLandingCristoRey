const fs = require('fs');
const path = require('path');

// 1. Leer argumentos de la consola
const args = process.argv.slice(2);

// Requerimos 5 argumentos para funcionar
if (args.length < 5) {
    console.log(`
📖 PUBLICADOR AUTOMÁTICO DE EDITORIALES 📖
-----------------------------------------
Uso del script:
node scripts/publish-editorial.js <entorno> <wp_user> <app_password> <ruta_imagen> <ruta_pdf>

Ejemplo Local:
node scripts/publish-editorial.js local admin m1P4ssw0rd! ./docs/portada.jpg ./docs/marzo.pdf

Ejemplo Producción:
node scripts/publish-editorial.js prod usuario p4ssw0rdAplicacion ./docs/portada.jpg ./docs/abril.pdf

Notas:
- Necesitas generar una "Contraseña de Aplicación" en WordPress (Usuarios > Perfil > Contraseñas de aplicación)
- 'entorno' debe ser "local" o "prod"
`);
    process.exit(1);
}

const env = args[0]; 
const user = args[1];
const pass = args[2];
const imagePath = path.resolve(args[3]);
const pdfPath = path.resolve(args[4]);

// 2. Validación de Archivos
if (!fs.existsSync(imagePath)) {
    console.error(`❌ Error: No se encontró la imagen en ${imagePath}`);
    process.exit(1);
}
if (!fs.existsSync(pdfPath)) {
    console.error(`❌ Error: No se encontró el PDF en ${pdfPath}`);
    process.exit(1);
}

// 3. Configuración de URLs (Modifica esto con tus dominios reales)
const SITE_URLS = {
    local: 'http://localhost/cristorey_wp',      // Ajusta tu URL local
    prod: 'https://tusitiocristorey.com'  // Ajusta tu URL de producción
};

const baseUrl = SITE_URLS[env];
if (!baseUrl) {
    console.error(`❌ Error: El entorno "${env}" no existe. Debe ser "local" o "prod".`);
    process.exit(1);
}

const apiUrl = `${baseUrl}/wp-json/wp/v2`;

// Generamos el Header de Autorización Básica
const credentials = Buffer.from(`${user}:${pass}`).toString('base64');
const headers = {
    'Authorization': `Basic ${credentials}`
};

// --- FUNCIONES ---

/**
 * Sube un archivo (Imagen o PDF) a la Media Library de WordPress
 */
async function uploadMedia(filePath) {
    const fileName = path.basename(filePath);
    const fileData = fs.readFileSync(filePath);
    
    // Determinar el Content-Type para pasar en los headers HTTP
    let mimeType = 'application/octet-stream';
    if (fileName.match(/\.(jpg|jpeg)$/i)) mimeType = 'image/jpeg';
    else if (fileName.match(/\.png$/i)) mimeType = 'image/png';
    else if (fileName.match(/\.pdf$/i)) mimeType = 'application/pdf';

    console.log(`[1] Subiendo archivo: ${fileName} ...`);
    
    const response = await fetch(`${apiUrl}/media`, {
        method: 'POST',
        headers: {
            ...headers,
            'Content-Type': mimeType,
            'Content-Disposition': `attachment; filename="${fileName}"`
        },
        body: fileData
    });

    if (!response.ok) {
        const errorText = await response.text();
        throw new Error(`Falló la subida de ${fileName}. Código: ${response.status}. Detalle: ${errorText}`);
    }

    const data = await response.json();
    return data;
}

/**
 * Función Principal
 */
async function main() {
    try {
        console.log(`🚀 Iniciando publicación en entorno: [${env.toUpperCase()}] a la URL ${baseUrl}`);
        
        // Paso 1: Subir Imagen
        const imageRes = await uploadMedia(imagePath);
        const imageId = imageRes.id;
        console.log(`  ✅ Imagen subida con éxito (ID: ${imageId})`);

        // Paso 2: Subir PDF
        const pdfRes = await uploadMedia(pdfPath);
        const pdfUrl = pdfRes.source_url;
        console.log(`  ✅ PDF subido con éxito (URL: ${pdfUrl})`);

        // Paso 3: Generar Título Dinámico e Insertar el Post
        // Ejemplo de título: "Editorial de Marzo 2026"
        const date = new Date();
        const months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        const title = `Editorial de ${months[date.getMonth()]} ${date.getFullYear()}`;

        console.log(`[2] Creando la publicación "Editorial" con título: "${title}" ...`);

        const postResponse = await fetch(`${apiUrl}/editorial`, {
            method: 'POST',
            headers: {
                ...headers,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                title: title,
                status: 'publish',          // Publicarlo inmediatamente
                featured_media: imageId,    // Asignar Imagen Destacada
                meta: {
                    '_cr_editorial_pdf_url': pdfUrl,      // Asignar nuestro Meta Box del PDF
                    '_cr_editorial_download_url': pdfUrl  // Mismo link para descarga
                }
            })
        });

        if (!postResponse.ok) {
            const err = await postResponse.text();
            throw new Error(`Falló la creación del post. Código: ${postResponse.status}. Detalle: ${err}`);
        }

        const postData = await postResponse.json();
        console.log(`\n🎉 ¡ÉXITO! Editorial publicada correctamente.`);
        console.log(`🔗 Ver publicación en: ${postData.link}`);

    } catch (error) {
        console.error('\n❌ PROCESO CANCELADO:', error.message);
    }
}

// Ejecutar
main();
