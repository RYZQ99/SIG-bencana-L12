@echo off
setlocal EnableExtensions EnableDelayedExpansion

:: ============================================================
:: SIG BENCANA MALANG RAYA
:: Docker Development Toolkit
:: Setup Project
:: ============================================================

title SIG Bencana - Setup

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

goto CHECK_DOCKER


:: ============================================================
:: CHECK DOCKER
:: ============================================================

:CHECK_DOCKER

echo [1/8] Checking Docker Desktop...

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

echo [2/8] Starting Docker Container...

docker compose up -d

if errorlevel 1 (

    goto ERROR_CONTAINER

)

echo        OK

echo.

goto WAIT_MYSQL


:: ============================================================
:: WAIT MYSQL
:: ============================================================

:WAIT_MYSQL

echo [3/8] Waiting MySQL...

:MYSQL_LOOP

docker compose exec mysql mysqladmin ping -h localhost -proot >nul 2>&1

if errorlevel 1 (

    timeout /t 2 >nul

    goto MYSQL_LOOP

)

echo        OK

echo.

goto ENVIRONMENT


:: ============================================================
:: ENVIRONMENT
:: ============================================================

:ENVIRONMENT

echo [4/8] Checking .env...

if exist .env (

    echo        SKIP (.env already exists)

) else (

    copy .env.example .env >nul

    if errorlevel 1 (

        goto ERROR_ENV

    )

    echo        OK

)

echo.

goto COMPOSER


:: ============================================================
:: COMPOSER
:: ============================================================

:COMPOSER

echo [5/8] Composer Dependency...

if exist vendor\autoload.php (

    echo        SKIP (already installed)

) else (

    docker compose exec app composer install

    if errorlevel 1 (

        goto ERROR_COMPOSER

    )

    echo        OK

)

echo.

goto APP_KEY


:: ============================================================
:: APP KEY
:: ============================================================

:APP_KEY

echo [6/8] Application Key...

findstr /C:"APP_KEY=base64:" .env >nul

if errorlevel 1 (

    docker compose exec app php artisan key:generate

    if errorlevel 1 (

        goto ERROR_KEY

    )

    echo        OK

) else (

    echo        SKIP (already generated)

)

echo.

goto MIGRATION


:: ============================================================
:: MIGRATION
:: ============================================================

:MIGRATION

echo [7/8] Database Migration...

docker compose exec app php artisan migrate --force

if errorlevel 1 (

    goto ERROR_MIGRATION

)

echo        OK

echo.

goto NODE


:: ============================================================
:: NODE INSTALL
:: ============================================================

:NODE

echo [8/8] Node Dependency...

if exist node_modules (

    echo        SKIP (already installed)

) else (

    docker compose exec node npm install

    if errorlevel 1 (

        goto ERROR_NODE

    )

    echo        OK

)

echo.

goto HEALTHCHECK

:: ============================================================
:: FINAL HEALTH CHECK
:: ============================================================

:HEALTHCHECK

echo ============================================================
echo Final Health Check
echo ============================================================

docker compose ps

echo.

goto SUCCESS


:: ============================================================
:: SUCCESS
:: ============================================================

:SUCCESS

color 0A

echo.
echo ============================================================
echo               SETUP BERHASIL
echo ============================================================
echo.

echo Laravel      : %LARAVEL_URL%
echo phpMyAdmin   : %PHPMYADMIN_URL%
echo.

echo Silakan jalankan:
echo.
echo    scripts\start.bat
echo.
echo untuk memulai development.
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
echo Gagal menjalankan Docker Container.
echo.
echo Jalankan:
echo.
echo docker compose logs
echo.
pause
exit /b 1


:ERROR_ENV

color 0C

echo.
echo ============================================================
echo ERROR
echo ============================================================
echo.
echo Gagal membuat file .env
echo.
pause
exit /b 1


:ERROR_COMPOSER

color 0C

echo.
echo ============================================================
echo ERROR
echo ============================================================
echo.
echo Composer Install gagal.
echo.
echo Jalankan:
echo.
echo docker compose logs app
echo.
pause
exit /b 1


:ERROR_KEY

color 0C

echo.
echo ============================================================
echo ERROR
echo ============================================================
echo.
echo Gagal membuat APP_KEY.
echo.
pause
exit /b 1


:ERROR_MIGRATION

color 0C

echo.
echo ============================================================
echo ERROR
echo ============================================================
echo.
echo Migration gagal.
echo.
echo Jalankan:
echo.
echo docker compose exec app php artisan migrate
echo.
pause
exit /b 1


:ERROR_NODE

color 0C

echo.
echo ============================================================
echo ERROR
echo ============================================================
echo.
echo npm install gagal.
echo.
echo Jalankan:
echo.
echo docker compose logs node
echo.
pause
exit /b 1