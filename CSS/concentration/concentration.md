[Volver al Menú](../root.md)

# `Concentration`

```
outline: solid red;
```

En tu página web, haces clic en un vínculo que lleva al usuario al contenido principal del sitio web. Con frecuencia, se los conoce como vínculos de navegación o vínculos de anclaje. Cuando ese vínculo se activa a través de un teclado, con las teclas Tab y, luego, Intro, el contenedor de contenido principal tiene un anillo de enfoque a su alrededor. ¿A qué se debe?

Como desarrollador web, tu trabajo es hacer que un sitio web sea inclusivo y accesible para todos. La creación de estados de enfoque accesibles con CSS es parte de esta responsabilidad.

Crear un estado de enfoque que contraste con el estado predeterminado de un elemento es increíblemente importante. Los estilos predeterminados del navegador ya lo hacen por ti, pero si quieres cambiar este comportamiento, recuerda lo siguiente:

Evita usar outline: none en un elemento que pueda recibir el enfoque del teclado.
Evita reemplazar los diseños de outline por box-shadow. ya que no aparecen en el modo de contraste alto de Windows.
Solo establece un valor positivo para tabindex en un elemento HTML si es necesario.
Asegúrate de que el estado del enfoque sea muy claro en comparación con el estado predeterminado.