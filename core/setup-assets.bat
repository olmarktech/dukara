@echo off
echo Setting up assets directory...
cd /d "c:\wamp64\www\jihost_v1\core\public"

if not exist "assets" mkdir "assets"
echo Assets directory created.

echo Copying landlord folder...
xcopy /E /I /Y "landlord" "assets\landlord" >nul 2>&1

echo Copying common folder...
xcopy /E /I /Y "common" "assets\common" >nul 2>&1

echo Copying plugins folder...
xcopy /E /I /Y "plugins" "assets\plugins" >nul 2>&1

echo.
echo Setup complete! Assets directory structure:
dir /b "assets"

echo.
echo Press any key to exit...
pause >nul

