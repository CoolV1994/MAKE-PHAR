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
    echo Invalid Arg: STUB File (Web)
)

if "%ERROR%" == "true" (
    goto END
)

:MAKE
php make-phar.php "%1" "%2" "%3" "%4"

:END
pause
