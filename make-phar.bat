@echo off
title PHP Archive

if "%~1"=="" (
    set "ERROR=true"
    echo Invalid Arg: PHAR File
)
if "%~2"=="" (
    set "ERROR=true"
    echo Invalid Arg: SRC Dir
)
if "%~3"=="" (
    set "ERROR=true"
    echo Invalid Arg: STUB File
)
if "%~4"=="" (
    echo Invalid Arg: STUB File [Web]
)

if "%ERROR%" == "true" (
    set /p PHAR=PHAR File: 
    set /p SRC=SRC Dir: 
    set /p INDEX=STUB File: 
    set /p INDEX_WEB=STUB File [Web]: 
    php make-phar.php "%PHAR%" "%SRC%" "%INDEX%" "%INDEX_WEB%"
    goto END
)

:MAKE
php make-phar.php "%1" "%2" "%3" "%4"
goto END

:END
pause
