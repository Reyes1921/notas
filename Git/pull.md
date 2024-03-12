[Volver al Menú](root.md)

# `Pull Request - PR`

# `Realicemos un fork del repositorio`

Realiza un fork del repositorio haciendo un clic en el botón fork de la parte superior de la página. Esto creará una instancia del repositorio completo en tu cuenta.

# `Clona el repositorio`

Una vez que el repositorio esté en tu cuenta, clónalo a tu computador para trabajarlo localmente.

```
git clone [DIRECCIÓN HTTPS]
```

```
git clone https://github.com/Reyes1921/developer-roadmap.git
```

# `Crea una rama`

Es una buena práctica crear una rama (branch) nueva cuando trabajas con repositorios, ya sea que se trate de un proyecto pequeño o estés contribuyendo en un equipo de trabajo.

El nombre de la rama debe ser breve y debe reflejar el trabajo que estamos haciendo.

```
git checkout -b [Nombre de la Rama]
```

```
git checkout -b 'fix/express-js'
```

# `Realiza cambios y confírmalos`

```
git status
git add .
git commit -m 'fixing broken link in node-js/express-js'
```

# `Revisar los cambios en Source Control y verificar`

Verificar que se hicieron solo los cambios necesarios. Evitar añadir otros cambios como identación.

# `Envía los cambios a GitHub`

Para enviar los cambios a GitHub, debemos identificar el nombre del repositorio remoto.

```
git remote
```

Para este repositorio el nombre es "origin".

Luego de identificar el nombre podemos enviar en forma segura los cambios a GitHub.

```
git push origin [Nombre de la Rama]
```

```
git push origin 'fix/express-js'
```

# `Crea un pull request`

Ve a tu repositorio en GitHub y verás un botón llamado "Pull request", has clic en él.

Por favor, provee todos los detalles necesarios de lo que has hecho (puedes referenciar problemas utilizando "#"). Ahora, envía el pull request.

# `Si ya haz clonado el repositorio y necesitas hacer una pr debes actualizar primero tu respositorio`

# `Sincroniza tu rama maestra con la del repositorio original`

Antes de enviar cualquier pull request al repositorio original debes sincronizar tu repositorio con aquel.

Incluso si no vas a enviar un pull request al repositorio original, es mejor efectuar la sincronización, ya que pueden haberse agregado algunas prestaciones o funciones adicionales y haberse corregido algunos errores desde la vez que realizaste un fork de aquel repositorio.

```
git branch
git checkout master
git remote add upstream [HTTPS]
git fetch upstream
git merge upstream/master
git push origin master
```

`NOTA`: Luego de sincronizar tu rama maestra puedes eliminar el repositorio upstream, si lo desea. Pero lo necesitará para actualizar/sincronizar tu repositorio en el futuro, por lo que es una buena práctica conservarlo.

# `Elimina ramas innecesarias`

Las ramas son creadas para propósitos especiales. Una vez que ese propósito se cumple, aquellas ramas ya no son necesarias, por lo que puedes eliminarlas.

```
git branch -d [Nombre de la Rama]
```

Aquí, `[HTTPS]` es el URL que debes copiar del repositorio del propietario.

[INFO](https://www.freecodecamp.org/espanol/news/como-hacer-tu-primer-pull-request-en-github/)

[TOP](#pull-request---pr)
