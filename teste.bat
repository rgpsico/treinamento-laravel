@echo off

setlocal

set PROJECT_PATH=C:\laragon\www\treinamento

cd %PROJECT_PATH%

git fetch origin

git pull origin master

:: reinicie o servidor web, se necessário
:: net stop w3svc
:: net start w3svc

endlocal
