@echo off
title Laravel Docker Setup

echo ==========================================
echo      Laravel Docker Initial Setup
echo ==========================================
echo.

echo [1/6] Menjalankan Docker Container...
docker compose up -d

echo.
echo [2/6] Install Composer Dependency...
docker compose exec app composer install

echo.
echo [3/6] Generate APP_KEY...
docker compose exec app php artisan key:generate

echo.
echo [4/6] Menjalankan Migration...
docker compose exec app php artisan migrate

echo.
echo [5/6] Install Node Dependency...
docker compose exec node npm install

echo.
echo [6/6] Setup selesai!
echo.

echo ==========================================
echo Laravel : http://localhost:8000
echo phpMyAdmin : http://localhost:8080
echo.
echo Jalankan start-dev.bat untuk menjalankan Vite
echo ==========================================

pause