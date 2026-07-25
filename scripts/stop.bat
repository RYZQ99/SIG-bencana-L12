@echo off
setlocal EnableExtensions EnableDelayedExpansion

:: ============================================================
:: SIG BENCANA MALANG RAYA
:: Docker Development Toolkit
:: Stop Development
:: ============================================================

title SIG Bencana - Stop Development

color 0C

cd /d "%~dp0.."

set PROJECT_NAME=SIG BENCANA MALANG RAYA

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

goto CHECK_DOCKER


:: ============================================================
:: CHECK DOCKER
:: ============================================================

:CHECK_DOCKER

echo [1/2] Checking Docker Desktop...

docker info >nul 2>&1

if errorlevel 1 (

    goto ERROR_DOCKER

)

echo        OK

echo.

goto STOP_CONTAINER


:: ============================================================
:: STOP CONTAINER
:: ============================================================

:STOP_CONTAINER

echo [2/2] Stopping Docker Container...

docker compose down

if errorlevel 1 (

    goto ERROR_CONTAINER

)

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
echo              DEVELOPMENT BERHASIL DIHENTIKAN
echo ============================================================
echo.
echo Semua container Docker telah dihentikan.
echo.
echo Untuk menjalankan kembali project gunakan:
echo.
echo     scripts\start.bat
echo.
pause
exit /b 0


:: ============================================================
:: ERROR HANDLER
:: ============================================================

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
echo Gagal menghentikan Docker Container.
echo.
echo Jalankan perintah berikut untuk melihat penyebabnya:
echo.
echo     docker compose logs
echo.
pause
exit /b 1