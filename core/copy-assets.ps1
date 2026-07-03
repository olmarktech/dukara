$ErrorActionPreference = "Stop"

Write-Host "Starting asset copy process..."

$publicPath = "c:\wamp64\www\jihost_v1\core\public"
$assetsPath = "$publicPath\assets"

# Ensure assets directory exists
if (-not (Test-Path $assetsPath)) {
    New-Item -ItemType Directory -Path $assetsPath -Force | Out-Null
    Write-Host "Created assets directory"
}

# Copy landlord folder
Write-Host "Copying landlord folder..."
if (Test-Path "$publicPath\landlord") {
    Copy-Item -Path "$publicPath\landlord" -Destination "$assetsPath\landlord" -Recurse -Force
    Write-Host "Landlord folder copied successfully"
}

# Copy common folder
Write-Host "Copying common folder..."
if (Test-Path "$publicPath\common") {
    Copy-Item -Path "$publicPath\common" -Destination "$assetsPath\common" -Recurse -Force
    Write-Host "Common folder copied successfully"
}

# Copy plugins folder
Write-Host "Copying plugins folder..."
if (Test-Path "$publicPath\plugins") {
    Copy-Item -Path "$publicPath\plugins" -Destination "$assetsPath\plugins" -Recurse -Force
    Write-Host "Plugins folder copied successfully"
}

# Verify
Write-Host "`nVerifying files..."
$cssFile = "$assetsPath\landlord\admin\css\style.css"
if (Test-Path $cssFile) {
    Write-Host "SUCCESS: CSS files are in place!" -ForegroundColor Green
    Write-Host "File found: $cssFile"
} else {
    Write-Host "ERROR: CSS files not found!" -ForegroundColor Red
}

Write-Host "`nAsset copy complete!"

