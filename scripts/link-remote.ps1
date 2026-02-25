<#
.SYNOPSIS
    Script para automatizar la creacion de los enlaces simbolicos (symlinks) necesarios 
    en el servidor remoto utilizando credenciales predefinidas.
.DESCRIPTION
    Conecta por SSH al servidor de Hostinger y crea los enlaces simbolicos.
    Utiliza variables configurables en el archivo .env
#>

$ErrorActionPreference = "Stop"

$ProjectRoot = Split-Path -Parent $PSScriptRoot
$envFile = Join-Path $ProjectRoot ".env"

if (-not (Test-Path $envFile)) {
    Write-Host "❌ Error: No se encontro archivo .env en la raiz del proyecto." -ForegroundColor Red
    exit 1
}

$envConfig = @{}
Get-Content $envFile | Where-Object { $_ -match '^([^#]+)=(.*)$' } | ForEach-Object {
    $envConfig[$Matches[1].Trim()] = $Matches[2].Trim()
}

$Password = $envConfig['SSH_PASSWORD']
$Ip = $envConfig['SSH_HOST']
$Port = $envConfig['SSH_PORT']
$User = $envConfig['SSH_USER']

if (-not $Password -or -not $Ip -or -not $Port -or -not $User) {
    Write-Host "❌ Error: Faltan variables SSH en .env" -ForegroundColor Red
    exit 1
}

Write-Host "`n🔗 Enlazando contenido en servidor remoto..." -ForegroundColor Cyan
Write-Host "=============================================" -ForegroundColor Cyan

# Cadena literal en Bash para ejecutar todos los enlaces de manera segura
$RemoteCmd = "cd ~/domains/temp.cristoreyrc.com/public_html && rm -rf cristorey-institucional verbum-image-manager automation scripts wp-content/plugins/cristorey-institucional wp-content/plugins/verbum-image-manager wp-content/themes/cristorey ; ln -s deploy-src/automation automation ; ln -s deploy-src/scripts scripts ; cd wp-content/themes/ && ln -s ../../deploy-src/wp-content/themes/cristorey cristorey ; cd ../plugins/ && ln -s ../../deploy-src/wp-content/plugins/cristorey-institucional cristorey-institucional && ln -s ../../deploy-src/wp-content/plugins/verbum-image-manager verbum-image-manager"

Write-Host "Iniciando conexion SSH con $User en $Ip (Puerto: $Port)..." -ForegroundColor Yellow

Add-Type -AssemblyName System.Windows.Forms

# Agregamos comillas simples alrededor del comando remoto para que Bash lo interprete tal cual, y asi evitar que PowerShell trate de evaluar caracteres especiales.
$ArgumentList = "-p $Port ${User}@${Ip} '$RemoteCmd'"

$sshProcess = Start-Process -FilePath "ssh" -ArgumentList $ArgumentList -PassThru -NoNewWindow
Start-Sleep -Seconds 3
[System.Windows.Forms.SendKeys]::SendWait("$Password{ENTER}")
$sshProcess.WaitForExit()

if ($sshProcess.ExitCode -eq 0) {
    Write-Host "`n✅ Enlaces creados exitosamente." -ForegroundColor Green
} else {
    Write-Host "`n❌ Hubo un problema al crear los enlaces. Verifica los datos de acceso." -ForegroundColor Red
}
