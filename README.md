# Cristo Rey - WordPress Project

Sitio web de Cristo Rey, construido con WordPress y automatizado con Python.

## 📁 Estructura del Proyecto

```text
cristorey_wp/
├── automation/              # Scripts de automatización (Python)
│   ├── main.py              # Script principal - REST API de WordPress
│   ├── requirements.txt     # Dependencias Python
│   ├── processors/          # Procesadores de datos (Excel, JSON, etc.)
│   └── templates/           # Plantillas HTML para generar posts
│
├── wp-content/themes/cristorey/   # Tema personalizado (PHP/CSS)
│
├── scripts/                 # Utilidades PowerShell
│   ├── deploy.ps1           # Git push rápido
│   └── sync-content.ps1     # Ejecutar sincronización de contenido
│
├── .env.example             # Plantilla de variables de entorno
├── .gitignore               # Solo rastrea código personalizado
└── README.md                # Este archivo
```

## 🚀 Primeros Pasos

### 1. Configurar credenciales

```powershell
Copy-Item .env.example .env
# Edita .env con tus credenciales reales
```

### 2. Instalar dependencias Python

```powershell
cd automation
python -m venv .venv
.venv\Scripts\Activate.ps1
pip install -r requirements.txt
```

### 3. Uso

| Tarea | Comando |
|-------|---------|
| Publicar contenido | `.\scripts\sync-content.ps1` |
| Deploy rápido (Git) | `.\scripts\deploy.ps1 -Message "feat: cambio"` |
| Editar diseño | Modificar archivos en `wp-content/themes/cristorey/` |

## 📝 Reglas del Proyecto

- **Diseño/tema** → Editar `wp-content/themes/cristorey/`, luego commit y push.
- **Contenido** → Usar scripts en `automation/` que llaman a la REST API de WordPress.
- **Nunca modificar** el core de WordPress directamente.
- **Nunca subir** el archivo `.env` al repositorio.

## 🔑 Configuración de WordPress para la API

Para que los scripts funcionen, necesitas crear una **Application Password** en WordPress:

1. Ve a **Usuarios → Tu Perfil** en el panel de WordPress.
2. Busca la sección **Application Passwords**.
3. Crea una nueva contraseña y cópiala al `.env`.
