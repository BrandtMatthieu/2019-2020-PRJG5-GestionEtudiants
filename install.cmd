@echo off
echo ==========================
echo Creating database
echo ==========================
type nul > database/database.sqlite
echo done.
echo ==========================
echo Installing dependencies
echo ==========================
call composer install
echo ==========================
echo Copying environement files
echo ==========================
copy .env.example .env /y
copy .env.testing.example .env.testing /y
echo done.
echo ==========================
echo Generating key
echo ==========================
call php artisan key:generate
echo done.
echo ==========================
echo Clearing cache
echo ==========================
call clearCache.cmd
echo done.
