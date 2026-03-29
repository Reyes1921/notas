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

## `Configuration`

```sh
git init

git clone <url> (Preferiblemente con SSH)

git config --list

git config --global user.name "Tu Nombre"

git config --global user.email "tu@email.com"

git remote -v
```

## `Daily`

```sh
git status

git add [archivo]
git add .

git commit -m "Mensaje descriptivo"

git push origin [branch name]
git push -u origin [branch name]
git push

git log
```

## `Branches`

```sh
git branch: list

git branch [nombre-de-la-rama]: crea

git branch -d [branch_name]: borra

git switch [nombre-de-la-rama]

git switch -c [nombre-de-la-rama]: crea y  cambia de rama

git merge [nombre-de-la-rama]: Fusiona el historial de la rama especificada con la rama en la que te encuentras actualmente (generalmente se hace estando en main para integrar características nuevas).

git branch -r: Lista las ramas en remote
```

## `Remote`

```sh


```


[TOP](#git---the-stupid-content-tracker)