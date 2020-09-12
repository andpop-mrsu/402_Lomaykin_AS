@echo off
chcp 65001>nul

if not exist "sqlite3.exe" echo Failed: sqlite3 does not exist && pause
echo.
echo CREATE TABLE IF NOT EXISTS users (name TEXT NOT NULL, date TEXT NOT NULL ); | sqlite3 users.db
echo insert into users values('%USERNAME%', datetime('now', 'localtime')); | sqlite3 users.db

echo Имя программы: %~nx0
echo|<nul set /p="Количество запусков: "
echo select count(*) from users; | sqlite3 users.db
echo|<nul set /p="Первый запуск: "
echo select Date from users order by Date asc limit 1; | sqlite3 users.db

echo.
echo select * from users; | sqlite3 -table users.db
echo.

pause