@echo off
set /p link_name=Insert link name: 
set /p project_name=Insert project name: 
mklink /d c:\OpenServer\domains\%link_name% %CD%\%project_name%