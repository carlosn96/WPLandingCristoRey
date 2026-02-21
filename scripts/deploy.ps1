<#
.SYNOPSIS
    Script de deploy rápido - Git add, commit y push.
.DESCRIPTION
    Añade cambios, genera un commit con mensaje personalizado y sube al remoto.
.PARAMETER Message
    Mensaje del commit. Si no se proporciona, usa uno genérico.
.EXAMPLE
    .\deploy.ps1 -Message "feat: nuevo diseño del header"
#>

param(
    [string]$Message = "chore: actualización general"
)

$ErrorActionPreference = "Stop"

Write-Host "`n🚀 Deploy - Cristo Rey WordPress" -ForegroundColor Cyan
Write-Host "=================================" -ForegroundColor Cyan

# Verificar que estamos en un repositorio Git
if (-not (Test-Path ".git")) {
    Write-Host "❌ Error: No se encontró repositorio Git en el directorio actual." -ForegroundColor Red
    exit 1
}

# Mostrar estado actual
Write-Host "`n📋 Estado actual:" -ForegroundColor Yellow
git status --short

# Añadir cambios
Write-Host "`n📦 Añadiendo cambios..." -ForegroundColor Yellow
git add -A

# Verificar si hay cambios para hacer commit
$changes = git diff --cached --name-only
if (-not $changes) {
    Write-Host "`n✅ No hay cambios para hacer commit." -ForegroundColor Green
    exit 0
}

# Hacer commit
Write-Host "`n💬 Commit: $Message" -ForegroundColor Yellow
git commit -m $Message

# Push
Write-Host "`n🌐 Enviando al remoto..." -ForegroundColor Yellow
git push

Write-Host "`n✅ Deploy completado exitosamente." -ForegroundColor Green
