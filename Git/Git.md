[Volver al Menú](root.md)

# `Git - the stupid content tracker`

Git es un sistema de control de revisiones rápido, escalable y distribuido, con un conjunto de comandos inusualmente rico que proporciona tanto operaciones de alto nivel como acceso completo a las funciones internas.

## `Modified, staged, committed`

- `Modified`: The file is in the repository and modified but not staged

- `Staged`: The file is in the repository, but not committed

- `Committed`: The file is in the repository and committed

## `git init`

Create an empty Git repository or reinitialize an existing one

Start a new Git repository for an existing code base

```
$ cd /path/to/my/codebase
$ git init      (1)
$ git add .     (2)
$ git commit    (3)
```

## `git clone <repository url>`

Clone a repository into a new directory

## `git add <file.ext>`

- Add file contents to the index

## `git add .`

- Add all files in the current directory to the index

## `git commit -m "<message>"`

- Record changes to the repository

## `git commit -a`

- commit all local changes in tracked files

- is used to stage all modified and deleted files for commit

- this is useful if you have modified or deleted existeng files, but not added any new files

## `git commit -am "<message>"`

- Add all files in the current directory to the index and record changes to the repository

## `git commit --amend`

- Modifica el último commit con los cambios actuales en el index.

```
git commit -m 'initial commit'
git add forgotten_file
git commit --amend
```

Al final terminarás con una sola confirmación - la segunda confirmación reemplaza el
resultado de la primera.

## `git status`

- Show the working tree status

## `git status -s o git status --short`

Obtendrás una salida mucho más simplificada.

```
$ git status -s
M README
MM Rakefile
A lib/git.rb
M lib/simplegit.rb
?? LICENSE.txt
```

## `git push`

- Update remote refs along with associated objects

## `git push -u origin master`

- Update remote refs along with associated objects and set upstream for the current branch

- The -u tells Git to remember the parameters, so that next time we can simply run `git push` and Git will know what to do.

## `git diff`

- Show changes between commits, commit and working tree, etc

- Es importante resaltar que al llamar a git diff sin parámetros no verás los cambios
  desde tu última confirmación - solo verás los cambios que aun no están preparados.
  Esto puede ser confuso porque si preparas todos tus cambios, git diff no te devolverá
  ninguna salida.

## `git rm`

- Remove files from the working tree and from the index

- Al comando git rm puedes pasarle archivos, directorios y patrones glob.

## `git mv`

- Move or rename a file, a directory, or a symlink

`git mv file_from file_to`

## `git pull`

- Fetch from and integrate with another repository or a local branch

## `Merge conflicts`

- Merge conflicts happen when you merge branches that have competing commits, and Git needs your help to decide which changes to incorporate in the final merge.

Example:

```
a = 1
<<<<< HEAD
b = 2  --> My changes
=======
b = 0 --> Changes from the other branch
>>>>>> 5765816313646666asd5465616546546 --> The commit id
c = 3
d = 4
e = 5
```

## `git log`

- Show commit logs

- Por defecto, si no pasas ningún parámetro, git log lista las confirmaciones hechas sobre
  ese repositorio en orden cronológico inverso. Es decir, las confirmaciones más recientes
  se muestran al principio.

## `git remote`

- Manage set of tracked repositories

- También puedes pasar la opción -v, la cual muestra las URLs que Git ha asociado
  al nombre y que serán usadas al leer y escribir en ese remoto

## `git remote add <repository>`

## `git config --get remote.origin.url`

Obtener la url del respositorio actual

## `git remote -v`

you will get a list of handles and associated URLs

## `git remote remove origin`

To remove your handler, use the remove command on remote, followed by the handler name – which, in our case, is origin.

## `git reset`

- Reset current HEAD to the specified state

## `git reset --hard <commit>`

- Reset current repository to the specified commit id

## `git reset --hard origin/master`

- Reset current repository to the specified branch in the remote repository

## `git branch`

- List, create, or delete branches

## `git branch -a`

- List all branches

## `git branch -d <branch>`

- Delete the specified branch

## `git branch -D <branch>`

- Force delete the specified branch

## `git checkout <branch>`

- Switch branches or restore working tree files

- Es importante entender que git checkout `-- [archivo]` es un
  comando peligroso. Cualquier cambio que le hayas hecho a ese
  archivo desaparecerá - acabas de sobreescribirlo con otro archivo.
  Nunca utilices este comando a menos que estés absolutamente
  seguro de que ya no quieres el archivo.

## `git checkout -b <branch>`

- Create and checkout a new branch

## `git merge <branch>`

- Join two or more branches together

# `Configuración`

## `git config --global user.name "John Doe"`

Name user

## ` git config --global user.email johndoe@example.com`

Email user

<h2 style="color: red">Nota</h2>

Your username and email address should be the same as the one used with your git hosting provider i.e. github, bitbucket, gitlab etc

## `git config --global core.editor "vim"`

Change default editor to vim.

## `git config --global color.ui auto`

Enables helpful colorization of command line output

## `git config --list`

Check config

```
git config --list
user.name=John Doe
user.email=johndoe@example.com
color.status=auto
color.branch=auto
color.interactive=auto
color.diff=auto
```

Si quieres sobrescribir esta información con otro nombre o dirección de correo para
proyectos específicos, puedes ejecutar el comando sin la opción `--global` cuando estés en
ese proyecto.

Puede que veas claves repetidas, porque Git lee la misma clave de distintos archivos
(`/etc/gitconfig` y `~/.gitconfig`, por ejemplo). En estos casos, Git usa el último valor
para cada clave única que ve.

## `Help`

```
git help <verb>
$ git <verb> --help
$ man git-<verb>
```

# `Ignorar Archivos`

Las reglas sobre los patrones que puedes incluir en el archivo .gitignore son las
siguientes:

- Ignorar las líneas en blanco y aquellas que comiencen con `#`.

- Emplear patrones glob estándar que se aplicarán recursivamente a todo el directorio
  del repositorio local.

- Los patrones pueden comenzar en barra `(/)` para evitar recursividad.

- Los patrones pueden terminar en barra `(/)` para especificar un directorio.

- Los patrones pueden negarse si se añade al principio el signo de exclamación `(!).`

Los patrones glob son una especie de expresión regular simplificada usada por los
terminales. Un asterisco `(*)` corresponde a cero o más caracteres; `[abc]` corresponde a
cualquier caracter dentro de los corchetes `(en este caso a, b o c)`; el signo de
interrogación `(?)` corresponde a un caracter cualquiera; y los corchetes sobre caracteres
separados por un guión (`[0-9]`) corresponde a cualquier caracter entre ellos (en este
caso del `0` al `9`). También puedes usar dos asteriscos para indicar directorios anidados;
`a/\*\*/z` coincide con `a/z, a/b/z, a/b/c/z`, etc.

Ejemplo

```
# ignora los archivos terminados en .a
*.a
# pero no lib.a, aun cuando había ignorado los archivos terminados en .a en la línea
anterior
!lib.a
# ignora unicamente el archivo TODO de la raiz, no subdir/TODO
/TODO
# ignora todos los archivos del directorio build/
build/
# ignora doc/notes.txt, pero no este: doc/server/arch.txt
doc/*.txt
# ignora todos los archivos .txt del directorio doc/
doc/**/*.txt
```

## `gitignore templates`

[Templates](https://github.com/github/gitignore)
