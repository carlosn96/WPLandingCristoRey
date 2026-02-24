<#
.SYNOPSIS
    Script para automatizar la creacion de los enlaces simbolicos (symlinks) necesarios 
    en el servidor remoto utilizando credenciales predefinidas.
.DESCRIPTION
    Conecta por SSH al servidor de Hostinger y crea los enlaces simbolicos para el tema, 
    las automatizaciones y los plugins personalizados tanto en produccion como en el entorno temporal.
    Utiliza System.Windows.Forms.SendKeys temporalmente para pasar la contrasena y no pausar 
    la ejecucion manual (limitacion nativa de OpenSSH en Windows).
#>

$ErrorActionPreference = "Stop"

# Credenciales y parametros Hostinger
$Password = "Ch@rly1996"
$Ip = "145.223.105.90"
$Port = "65002"
$User = "u487588057"

Write-Host "`n🔗 Enlazando contenido en servidor remoto..." -ForegroundColor Cyan
Write-Host "=============================================" -ForegroundColor Cyan

$RemoteCmd = @(
    # Produccion
    "cd public_html/wp-content/themes/ && rm -rf cristorey && ln -s ../../deploy-src/wp-content/themes/cristorey cristorey"
    "cd public_html && rm -rf automation && ln -s deploy-src/automation automation"
    "cd public_html/wp-content/plugins/ && rm -rf cristorey-institucional verbum-image-manager && ln -s ../../deploy-src/wp-content/plugins/cristorey-institucional cristorey-institucional && ln -s ../../deploy-src/wp-content/plugins/verbum-image-manager verbum-image-manager"
    
    # Entorno temporal (temp.cristoreyrc.com)
    "cd domains/temp.cristoreyrc.com/public_html/wp-content/themes/ && rm -rf cristorey && ln -s ../../deploy-src/wp-content/themes/cristorey cristorey"
    "cd domains/temp.cristoreyrc.com/public_html && rm -rf automation && ln -s deploy-src/automation automation"
    "cd domains/temp.cristoreyrc.com/public_html/wp-content/plugins/ && rm -rf cristorey-institucional verbum-image-manager && ln -s ../../deploy-src/wp-content/plugins/cristorey-institucional cristorey-institucional && ln -s ../../deploy-src/wp-content/plugins/verbum-image-manager verbum-image-manager"
) -join " ; "

Write-Host "Iniciando conexion SSH con $User en $Ip (Puerto: $Port)..." -ForegroundColor Yellow

# Cargamos ensamblado para SendKeys
Add-Type -AssemblyName System.Windows.Forms

# Construimos la sintaxis final de SSH
# Es importante poner -m, pero en Windows pasaremos todo como argumento del comando CMD para evitar el "Access denied" sobre SendKeys.
$ArgumentList = "-p $Port ${User}@${Ip} `"$RemoteCmd`""

# Iniciamos el proceso SSH y no esperamos inmediatamente (para poder teclear la password)
$sshProcess = Start-Process -FilePath "ssh" -ArgumentList $ArgumentList -PassThru -NoNewWindow
Start-Sleep -Seconds 3 # Tiempo de gracia para que aparezca el prompt de password
[System.Windows.Forms.SendKeys]::SendWait("$Password{ENTER}")
$sshProcess.WaitForExit()

if ($sshProcess.ExitCode -eq 0) {
    Write-Host "`n✅ Enlaces creados exitosamente." -ForegroundColor Green
} else {
    Write-Host "`n❌ Hubo un problema al crear los enlaces o no fue posible enviar la contrasena." -ForegroundColor Red
    Write-Host "Aviso: Como utiliza SendKeys, no toques el teclado ni cambies de ventana mientras corre el comando SSH." -ForegroundColor DarkGray
}
