[Volver al Menú](root.md)

# `git - the stupid content tracker`

<table>
  <thead>
    <tr>
      <th>Término</th>
      <th>Qué representa</th>
      <th>Dónde vive</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><span class="tag">Local</span></td>
      <td>Tu computadora.</td>
      <td>🏠 En tu escritorio.</td>
    </tr>
    <tr>
      <td><span class="tag">Master / Main</span></td>
      <td>Tu rama de trabajo principal.</td>
      <td>💻 En tu PC.</td>
    </tr>
    <tr>
      <td><span class="tag">Origin</span></td>
      <td>El alias de la URL de GitHub.</td>
      <td>☁️ En la nube.</td>
    </tr>
    <tr>
      <td><span class="tag">Remote</span></td>
      <td>Cualquier servidor fuera de tu PC.</td>
      <td>🌐 Internet.</td>
    </tr>
  </tbody>
</table>

## `SSH Key`

Crear llave en tu pc

```sh
ssh-keygen -t ed25519 -C "tu-correo-personal@ejemplo.com" -f ~/.ssh/nombre_del_archivo
```

Copia el contenido del archivo que creaste y págalo en SSH Keys en tu cuenta de github

```sh
cat ~/.ssh/nombre_del_archivo.pub
```

Para que tu computadora sepa qué llave usar para cada cuenta, debes crear (o editar) el archivo config en tu carpeta .ssh:

```sh
nano ~/.ssh/config
```

Y añade algo como esto (ajustando las rutas, revisa que el Host no choque con otra llave):

```sh
Host github.com
  HostName github.com
  User git
  IdentityFile ~/.ssh/nombre_del_archivo
```

Ejecuta este comando para confirmar que tu archivo config está usando la identidad correcta

```sh
ssh -T git@nombre_del_host(ejemplo: github.com)
```

## `Configuration`

```sh
git init

git clone [url] (Preferiblemente con SSH)

git config --list

git config --global user.name "Tu Nombre"

git config --global user.email "tu@email.com"
```

## `Daily`

```sh
git status

git add [archivo]
git add .

git commit -m "Mensaje descriptivo"
git commit --amend -m "Nuevo mensaje corregido"
git revert [hash-del-commit]
git restore .

git push origin [branch name]
git push -u origin [branch name]
git push
```

## `Branches`

```sh
git branch: Lista

git branch [nombre-de-la-rama]: crea

git branch -d [branch_name]: borra
git push origin --delete [branch_name]: Remote

git switch [nombre-de-la-rama]

git switch -c [nombre-de-la-rama]: crea y cambia de rama

git merge [nombre-de-la-rama]: Fusiona el historial de la rama especificada con la rama en la que te encuentras actualmente (generalmente se hace estando en main para integrar características nuevas).

git branch -r: Lista las ramas en remote
```

## `Remote`

```sh
git remote

git remote -v

git remote add origin [url]

git remote set-url origin [url]

git fetch [remote_name]: Trae la información de remote sin tocar código

git pull [remote_name] [remote_branch]

git remote rm [remote_name]
```

## `Stashes`

```sh
git stash

git stash pop
```

## `File Operations`

```sh
git rm <file(s)>: Remove files from working tree and staging area

git mv [old_file] [new_file]: Move or rename a file

git diff: Show differences between working tree and last commit
```

## `Commit History`

```sh
git log

git log --oneline

git log --author=<author_name>

git log --since=<date>

git log --until=<date>
```

## `Merge conflicts`

```sh
a = 1
<<<<< HEAD
b = 2  --> Mis cambios
=======
b = 0 --> Cambios de otra rama
>>>>>> 5765816313646666asd5465616546546 --> El commit id
c = 3
d = 4
e = 5
```


[TOP](#git---the-stupid-content-tracker)