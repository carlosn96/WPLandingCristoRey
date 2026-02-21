<#
.SYNOPSIS
    Ejecuta la sincronización de contenido hacia WordPress.
.DESCRIPTION
    Activa el entorno virtual Python (si existe) y ejecuta el script
    principal de automatización para sincronizar contenido con WordPress.
.EXAMPLE
    .\sync-content.ps1
#>

$ErrorActionPreference = "Stop"
$ProjectRoot = Split-Path -Parent $PSScriptRoot

Write-Host "`n📡 Sincronización de Contenido - Cristo Rey WordPress" -ForegroundColor Cyan
Write-Host "======================================================" -ForegroundColor Cyan

# Verificar que existe el archivo .env
$envFile = Join-Path $ProjectRoot ".env"
if (-not (Test-Path $envFile)) {
    Write-Host "❌ Error: No se encontró archivo .env en la raíz del proyecto." -ForegroundColor Red
    Write-Host "   Copia .env.example a .env y configura tus credenciales." -ForegroundColor Yellow
    exit 1
}

# Verificar Python
try {
    $pythonVersion = python --version 2>&1
    Write-Host "🐍 Python detectado: $pythonVersion" -ForegroundColor Green
} catch {
    Write-Host "❌ Error: Python no encontrado. Instálalo desde https://python.org" -ForegroundColor Red
    exit 1
}

# Activar entorno virtual si existe
$venvPath = Join-Path $ProjectRoot "automation\.venv\Scripts\Activate.ps1"
if (Test-Path $venvPath) {
    Write-Host "🔧 Activando entorno virtual..." -ForegroundColor Yellow
    & $venvPath
} else {
    Write-Host "⚠️  No se encontró entorno virtual. Usando Python global." -ForegroundColor Yellow
    Write-Host "   Tip: crea uno con 'python -m venv automation/.venv'" -ForegroundColor DarkGray
}

# Ejecutar script principal
$mainScript = Join-Path $ProjectRoot "automation\main.py"
Write-Host "`n▶️  Ejecutando automatización..." -ForegroundColor Yellow
python $mainScript

Write-Host "`n✅ Sincronización completada." -ForegroundColor Green
