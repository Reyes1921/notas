[Volver al Menú](root.md)

# `Comandos`

`clear` Limpiar la terminal

# `SSH`

`ssh root + @ + (ipv4 o ipv6) o hostname`

# `Descriptores de rutas:`

`/` Ruta raíz del sistema

`.` Directorio actual

`..` Directorio anterior

`~` Directorio home del usuario

## `Ejemplos:`

`cd /` ir a la ruta raíz del sistema

`cd .` ir al directorio actual

# `Atajos de teclado:`

`CTRL-C` Termina el proceso de un comando en la terminal

`CTRL-D` Termina el input de un comando

`CTRL-A` Avanza al inicio de línea

`CTRL-E` Avanza al final de línea

`CTRL-L` Limpia la pantalla de la terminal

# `Operaciones con directorios:`

`pwd` Imprime el directorio actual Utiliza el comando pwd para encontrar la ruta de tu directorio de trabajo actual. Simplemente introduciendo pwd te devolverá la ruta actual completa, una ruta de todos los directorios que comienza con una barra oblicua (/). Por ejemplo, /inicio/nombredeusuario.

`mkdir dir1` Crea el directorio con nombre dir1

`cd dir1` Cambia al directorio con nombre dir1

`cd ../..` Cambia dos directorios anteriores del actual

`cd` Cambia al directorio home del usuario

`ls` Muestra archivos y directorios

`tree /ruta` Muestra todos los archivos y directorios anidados dentro de la ruta a cualquier nivel de profundidad.

`tree -L 2 .` Muestra todos los archivos y directorios anidados dentro de la ruta actual a dos niveles de profundidad

# `Operaciones de ls:`

`-a` Muestra todo (incluyendo archivos ocultos)

`-R` Muestra una lista de manera recursiva

`-r` Muestra listando de forma inversa

`-t` Muestra los últimos modificados

`-S` Muestra ordenando por tamaño

`-l` Muestra usando un formato largo

# `Manipulación de archivos y directorios:`

`touch newFile` Crea un nuevo archivo llamado newFile

`file mi_archivo` Muestra las características de mi_archivo

`cp file1 /destino` Copia el archivo file1 a la ruta /destino

`cp -r dir1 dir1_cp` Copia el directorio dir1 y su contenido a uno nuevo llamado dir1_cp

`mv file1 /destino` Mueve el archivo file1 a la ruta /destino

`mv file1 ok_file` Renombra el archivo file1 al nombre ok_file

`rm file1` Elimina el archivo file1

`rm -ri dir1` Elimina el directorio dir1 y su contenido de forma interactiva

`rm -r dir1` Elimina el directorio dir1 y su contenido de forma directa

`ln -s file link_name` Crea un link simbólico al archivo

`open filename` Abre el archivo con el programa predeterminado (MacOS)

`xdg-open filename` Abre el archivo con el programa predeterminado (mayoría de sistemas Linux)

# `Manipulación de archivos de texto:`

`head file.txt` Muestra las primeras 10 líneas de texto de archivo file.txt

`head -n 20 file.txt` Muestra las primeras 20 líneas de texto del archivo file.txt

`tail file.txt` Muestra las últimas 10 líneas de texto del archivo file.txt

`tail -n 20 file.txt` Muestra las últimas 20 líneas de texto del archivo file.txt

`less file.txt` Explora el contenido de archivo con paginación

`cat file1` Podemos ver el contenido de un archivo

`cat file1 file2` Concatena el contenido de file1 y file2 a la salida de la terminal

# `Exploración de comandos y ayuda dentro de la terminal:`

`man command` Muestra el manual de usuario del comando

`help command` Muestra ayuda para el comando (solo funciona si la shell es Bash)

`which command` Muestra la ruta de donde se encuentr el ejecutable del comando

`whatis command` Muestra brevemente la función de comando

`alias aliasname=”command”` Crea un alias para el comando

`alias l=”ls -la”` Crea un alias para el comando ls con opciones llamado l

`unalias` Por otro lado, el comando unalias borra un alias existente.

## `Wildcards`

`*` Coincide con cualquier carácter

`?` Coincide con cualquier carácter individual

`[caracteres]` Coincide con cualquier carácter que sea miembro
del conjunto caracteres

`[!caracteres] `Coincide con cualquier carácter que no sea
miembro del conjunto caracteres

`[[:clase:]]` Coincide con cualquier carácter de la clase

# `Clases dentro de los Wildcards:`

`[:alnum:]` Coincide con cualquier carácter alfanumérico

`[:alpha:]` Coincide con cualquier carácter alfabético

`[:digit:]` Coincide con cualquier número

`[:lower:]` Coincide con cualquier letra minúscula

`[:upper:` Coincide con cualquier letra mayúscula

# `Redirecciones I/O y operadores de control:`

`comando < archivo` Redirige el input de un comando hacia un archivo

`comando > archivo` Redirige la salida de un comando a un archivo (usarse con cuidado porque sobrescribe el sistema)

`comando >> archivo` Concatena la salida de un comando a un archivo. Si no existe lo crea.

`comando 2> error.txt` Redirige la salida de error de un comando al archivo error.txt

`comando1 | comando2` Redirige la salida del comando1 a la entrada del comando2

`comando1; comando2` Ejecuta de manera consecutiva

`comando1 & comando2` Ejecuta de manera asíncrona

`comando1 && comando2` Ejecuta el comando2 si y solo si el comando1 se ejecutó de manera exitosa

`comando1 || comando2` Ejecuta el comando1 o el comando2

# `Manejo de permisos y usuarios:`

## `Tipo de modo:`

| Dueño | Grupo | World |
| ----- | ----- | ----- |
| rwx   | r-x   | r-x   |
| 1 1 1 | 1 0 1 | 1 0 1 |

## `Modo octal:`

| Octal | Binario | Permisos |
| ----- | ------- | -------- |
| 0     | 000     | ---      |
| 1     | 001     | --x      |
| 2     | 010     | -w-      |
| 3     | 011     | -wx      |
| 4     | 100     | r--      |
| 5     | 101     | r-x      |
| 6     | 110     | rw-      |
| 7     | 111     | rwx      |

## `Modo simbólico:`

| Simbolo | Significado                   |
| ------- | ----------------------------- |
| u       | Solo para el usuario          |
| g       | Solo para el grupo            |
| o       | Solo para otros (es el world) |
| a       | Aplica para todos             |

`chmod` es un comando común que modifica los permisos de lectura, escritura y ejecución de un archivo o directorio. En Linux, cada archivo está asociado a tres clases de usuarios: propietario, miembro de grupo y otros.

`chmod 755 mitexto` Cambia los permisos del archivo a 755

`chmod u-r mitexto` Quita el permiso de lectura al archivo

`chmod u=rwx,go=r mitexto` Agrega permiso de lectura, escritura y ejecución al usuario y solo de lectura al grupo y otros.

`id` Muestra el ID del usuario

`whoami` Muestra el nombre del usuario logueado

`su username` Cambia de usuario

`sudo comando` Ejecuta un comando como superusuario Abreviatura de superusuario do, sudo es uno de los comandos básicos más populares de Linux que te permite realizar tareas que requieren permisos administrativos o de root.

Al utilizar sudo, el sistema pedirá a los usuarios que se autentiquen con una contraseña. A continuación, el sistema Linux registrará una marca de tiempo como seguimiento. Por defecto, cada usuario root puede ejecutar comandos sudo durante 15 minutos por sesión.

## `Variables de entorno:`

`env` Imprime las variables de entorno actuales

`echo $VAR` Imprime la variable de entorno VAR

`$PATH` Variable donde están las rutas de los ejecutables

`$HOME` Directorio home del usuario

`export $VAR=val` Asigna la variable $VAR con el valor val

## `Comandos de búsqueda:`

`find <ruta> -name <nombre>` Busca en una ruta y con un nombre de archivo

`find . -name agenda` Busca el archivo con el nombre agenda en el directorio actual

`grep <regex> file` Busca con expresiones regulares dentro de un archivo o salida de terminal

`grep -i hola mensaje.txt` Busca la palabra hola ignorando

## `Utilidades de red:`

`ifconfig` Muestra información de red

`ping ip_domain` Consulta la disponibilidad del recurso

`curl ip_domain` Consulta un recurso ya sea por dirección IP o por dominio y lo y lo muestra en terminal

`wget ip_domain` Descarga un recurso ya sea por dirección IP o por dominio

`traceroute ip_domain` Muestra la ruta del paquete a una IP o dominio

`netstat -i` Muestra las interfaces de red y su estado

## `Comprimir archivos:`

`tar -czvf <nombre>.tar.gz <nombre_directorio>`

## `Ejemplo:`

`tar -czvf mis_archivos.tar.gz` Documentos

## `Descomprimir archivos:`

`tar -xzvf <nombre>.tar.gz <nombre_directorio>`

## `Ejemplo:`

`tar -xzvf mis_archivos.tar.gz Documentos`

# `Otros`

`rmdir` Para eliminar permanentemente un directorio vacío, utiliza el comando rmdir. Recuerda que el usuario que ejecuta este comando debe tener privilegios sudo en el directorio padre.

`locate` El comando locate puedes encontrar un archivo en el sistema de base de datos.

Además, si añades el argumento -i, desactivará la distinción entre mayúsculas y minúsculas, por lo que podrás buscar un archivo aunque no recuerdes su nombre exacto.

`df [opciones] [archivo]` Utiliza el comando df para informar sobre el uso del espacio en disco del sistema, mostrado en porcentaje y en kilobytes (KB). Esta es la sintaxis general:

`du` Si quieres comprobar cuánto espacio ocupa un archivo o un directorio, utiliza el comando du. Gracias a este comando puedes identificar qué parte del sistema utiliza excesivamente el almacenamiento.

`diff` Abreviatura de diferencia, el comando diff compara dos contenidos de un archivo línea por línea. Tras analizarlos, mostrará las partes que no coincidan.

Los programadores suelen utilizar el comando diff para modificar un programa en lugar de reescribir todo el código fuente.

`ps` El comando de estado de procesos o ps produce una instantánea de todos los procesos en ejecución en tu sistema. Los resultados estáticos se toman de los archivos virtuales del sistema de archivos /proc.

`chown` El comando chown permite cambiar la propiedad de un archivo, directorio o enlace simbólico a un nombre de usuario específico.

`jobs` Un job es un proceso que el shell inicia. El comando jobs mostrará todos los procesos en ejecución junto con sus estados. Recuerda que este comando sólo está disponible en los shells `csh`, `bash`, `tcsh` y `ksh`.

`kill` Utiliza el comando kill para terminar manualmente un programa que no responde. Este señalará a las aplicaciones que se comporten mal y les indicará que cierren sus procesos.

Para acabar un programa, debes conocer su número de identificación de proceso (PID). Si no conoces el PID, ejecuta el siguiente comando:

`ps ux`

`top` El comando top en el Terminal de Linux mostrará todos los procesos en ejecución y una vista dinámica en tiempo real del sistema actual. Este resume la utilización de recursos, desde la CPU hasta el uso de memoria.

El comando top también puede ayudarte a identificar y terminar un proceso que pueda utilizar demasiados recursos del sistema.

`history` Con history, el sistema listará hasta 500 comandos ejecutados previamente, permitiéndote reutilizarlos sin necesidad de volver a entrar. Ten en cuenta que sólo los usuarios con privilegios sudo pueden ejecutar este comando. La ejecución de esta utilidad también depende del shell de Linux que utilices.

`zip` Utiliza el comando zip para comprimir tus archivos en un archivo ZIP, un formato universal de uso común en Linux. Puedes elegir automáticamente la mejor proporción de compresión.

`unzip` Por otro lado, el comando unzip extrae los ficheros comprimidos de un archivo. Este es el formato general

`hostname` Ejecuta el comando hostname para conocer el nombre de host del sistema. Puedes ejecutarlo con o sin opción. Esta es la sintaxis general: `hostname [opción]`

`useradd ` Linux es un sistema multiusuario, lo que significa que más de una persona puede utilizarlo simultáneamente. useradd se utiliza para crear una nueva cuenta, mientras que el comando passwd permite añadir una contraseña. Sólo aquellos con privilegios de root o sudo pueden ejecutar el comando useradd.

`userdel` Para eliminar una cuenta de usuario, utiliza el comando userdel:

`apt-get` apt-get es una herramienta de línea de comandos de Linux para gestionar las bibliotecas de Advanced Package Tool (APT) en Linux. Permite recuperar información y paquetes de fuentes autenticadas para gestionar, actualizar, eliminar e instalar software y sus dependencias.

`nano` Abre el editor nano

`vi` vi utiliza dos modos de funcionamiento para trabajar: insertar y comando. insertar se utiliza para editar y crear un archivo de texto. Por otro lado, comando realiza operaciones, como guardar, abrir, copiar y pegar un archivo.

`jed` tiene una interfaz de menús desplegables que permite a los usuarios realizar acciones sin necesidad de introducir combinaciones o comandos de teclado. Al igual que vi, dispone de modos para cargar módulos o plugins para escribir textos específicos.

`htop` El comando htop es un programa interactivo que monitoriza los recursos del sistema y los procesos del servidor en tiempo real. Está disponible en la mayoría de las distribuciones de Linux y puedes instalarlo con el gestor de paquetes predeterminado.

[TOP](#comandos)
