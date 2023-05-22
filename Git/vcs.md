[Volver al Menú](root.md)

# `Version Control Systems`

Version control systems allow you to track changes to your codebase/files over time. They allow you to go back to some previous version of the codebase without any issues. Also, they help in collaborating with people working on the same code – if you’ve ever collaborated with other people on a project, you might already know the frustration of copying and merging the changes from someone else into your codebase; version control systems allow you to get rid of this issue.

# `Sistemas de Control de Versiones Locales`

Un método de control de versiones, usado por muchas personas, es copiar los archivos
a otro directorio (quizás indicando la fecha y hora en que lo hicieron, si son
ingeniosos). Este método es muy común porque es muy sencillo, pero también es
tremendamente propenso a errores. Es fácil olvidar en qué directorio te encuentras y
guardar accidentalmente en el archivo equivocado o sobrescribir archivos que no
querías.

# `Sistemas de Control de Versiones Centralizados`

El siguiente gran problema con el que se encuentran las personas es que necesitan
colaborar con desarrolladores en otros sistemas. Los sistemas de Control de Versiones
Centralizados (`CVCS` por sus siglas en inglés) fueron desarrollados para solucionar este
problema. Estos sistemas, como `CVS`, `Subversion` y `Perforce`, tienen un único servidor que
contiene todos los archivos versionados y varios clientes que descargan los archivos
desde ese lugar central. Este ha sido el estándar para el control de versiones por
muchos años.

# `Sistemas de Control de Versiones Distribuidos`

Los sistemas de Control de Versiones Distribuidos (`DVCS` por sus siglas en inglés) ofrecen
soluciones para los problemas que han sido mencionados. En un `DVCS` (como `Git`,
`Mercurial`, `Bazaar` o `Darcs`), los clientes no solo descargan la última copia instantánea de
los archivos, sino que se replica completamente el repositorio. De esta manera, si un
servidor deja de funcionar y estos sistemas estaban colaborando a través de él,
cualquiera de los repositorios disponibles en los clientes puede ser copiado al servidor
con el fin de restaurarlo. Cada clon es realmente una copia completa de todos los
datos.
