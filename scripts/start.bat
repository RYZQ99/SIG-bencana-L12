@echo off
setlocal EnableExtensions EnableDelayedExpansion

:: ============================================================
:: SIG BENCANA MALANG RAYA
:: Docker Development Toolkit
:: Start Development
:: ============================================================

title SIG Bencana - Start Development

color 0A

cd /d "%~dp0.."

set PROJECT_NAME=SIG BENCANA MALANG RAYA
set LARAVEL_URL=http://localhost:8000
set PHPMYADMIN_URL=http://localhost:8080

cls

goto HEADER


:: ============================================================
:: HEADER
:: ============================================================

:HEADER

echo.
echo ============================================================
echo               %PROJECT_NAME%
echo             Docker Development Toolkit
echo ============================================================
echo.

goto CHECK_ENV


:: ============================================================
:: CHECK ENV
:: ============================================================

:CHECK_ENV

echo [1/6] Checking Project...

if not exist .env (

    goto ERROR_ENV

)

if not exist vendor\autoload.php (

    goto ERROR_VENDOR

)

if not exist node_modules (

    goto ERROR_NODEMODULE

)

echo        OK

echo.

goto CHECK_DOCKER


:: ============================================================
:: CHECK DOCKER
:: ============================================================

:CHECK_DOCKER

echo [2/6] Checking Docker Desktop...

docker info >nul 2>&1

if errorlevel 1 (

    goto ERROR_DOCKER

)

echo        OK

echo.

goto START_CONTAINER


:: ============================================================
:: START CONTAINER
:: ============================================================

:START_CONTAINER

echo [3/6] Starting Docker Container...

docker compose up -d

if errorlevel 1 (

    goto ERROR_CONTAINER

)

echo        OK

echo.

goto START_VITE


:: ============================================================
:: START VITE
:: ============================================================

:START_VITE

echo [4/6] Starting Vite...

start "Vite Development Server" cmd /k "cd /d %cd% && docker compose exec node npm run dev"

timeout /t 3 >nul

echo        OK

echo.

goto OPEN_BROWSER


:: ============================================================
:: OPEN BROWSER
:: ============================================================

:OPEN_BROWSER

echo [5/6] Opening Browser...

start "" "%LARAVEL_URL%"

echo        OK

echo.

goto INFORMATION


:: ============================================================
:: INFORMATION
:: ============================================================

:INFORMATION

echo [6/6] Development Information...

echo        OK

echo.

goto SUCCESS


:: ============================================================
:: SUCCESS
:: ============================================================

:SUCCESS

color 0A

echo.
echo ============================================================
echo               DEVELOPMENT SIAP
echo ============================================================
echo.

echo Laravel      : %LARAVEL_URL%
echo phpMyAdmin   : %PHPMYADMIN_URL%
echo.
echo Vite berjalan pada jendela CMD terpisah.
echo.
echo Selamat bekerja.
echo.

pause
exit /b 0


:: ============================================================
:: ERROR HANDLER
:: ============================================================

:ERROR_ENV

color 0C

echo.
echo ============================================================
echo ERROR
echo ============================================================
echo.
echo File .env belum ditemukan.
echo.
echo Jalankan:
echo.
echo     scripts\setup.bat
echo.
pause
exit /b 1


:ERROR_VENDOR

color 0C

echo.
echo ============================================================
echo ERROR
echo ============================================================
echo.
echo Dependency Composer belum terinstall.
echo.
echo Jalankan:
echo.
echo     scripts\setup.bat
echo.
pause
exit /b 1


:ERROR_NODEMODULE

color 0C

echo.
echo ============================================================
echo ERROR
echo ============================================================
echo.
echo Node Modules belum terinstall.
echo.
echo Jalankan:
echo.
echo     scripts\setup.bat
echo.
pause
exit /b 1


:ERROR_DOCKER

color 0C

echo.
echo ============================================================
echo ERROR
echo ============================================================
echo.
echo Docker Desktop belum berjalan.
echo.
echo Silakan buka Docker Desktop terlebih dahulu.
echo.
pause
exit /b 1


:ERROR_CONTAINER

color 0C

echo.
echo ============================================================
echo ERROR
echo ============================================================
echo.
echo Gagal menjalankan Docker Container.
echo.
echo Jalankan perintah berikut untuk melihat penyebabnya:
echo.
echo     docker compose logs
echo.
pause
exit /b 1