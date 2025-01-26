[Volver al Menú](root.md)

# `Comandos Windows`

`Incio + r y taskmgr o ctrl + shift + esc` se abre el administrador de tarea

`Incio + r y cmd` se abre la consola

`Incio + r y dxdiag` se abre la herramienta de diagnostico DirectX

`shutdown -s -t (tiempo)` apagar la pc con el tiempo en segundos

`shutdown -r -t (tiempo)` reiniciar la pc con el tiempo en segundos

`shutdown -h -t (tiempo)` hibernar la pc con el tiempo en segundos

`shutdown -l -t (tiempo)` cerrar cesion la pc con el tiempo en segundos

`nslookup myip.opendns.com resolver1.opendns.com` ver la ip publica

`ipconfig` o `ipconfig/all` ver la ip privada

`netsh wlan show interfaces` ver estado de wifi

`netsh wlan set autoconfig enabled=no interface="Wi-Fi"` desactivar wifi (CUANDO NO FUNCIONA EL WIFI)

`netsh wlan set autoconfig enabled=yes interface="Wi-Fi"` activar wifi (DESPUES DE DESACTIVARLO)

`netsh wlan show profile` ver nombres de wifis anteriores

`netsh wlan show profile (nombre wifi) key=clear` ver clave de wifi

`taskschd.msc` abrir programador de tareas y ver `Task Scheduler Library` > `Microsoft` > `Windows` and check if Command Prompt is there.

`chkdsk + (letter)` CHKDSK (Check Disk) is the first Windows diagnostic tool you should try if your PC starts acting strangely.

`gpedit.msc` Editor de directivas de grupo local

`regedit` Editor de Registro

https://www.makeuseof.com/difference-between-chkdsk-sfc-and-dism-in-windows-10/ MORE INFO

`devmgmt.msc - administrador de dispositivos`

`msconfig` Configuracion del sistemas

`netstat -ano | findstr :3000` Run the netstat command

`tasklist | findstr 1234` Identify the process using the port.

[TOP](#comandos)
https://drive.google.com/file/d/1MzDJAgmlPt0kUoVknPBjJdqrX5J5M2Sb/view
