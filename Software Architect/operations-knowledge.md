[Volver al Menú](./root.md)

# `Operations knowledge`

# `Infrastructure as Code`

Sometimes referred to as IaC, this section refers to the techniques and tools used to define infrastructure, typically in a markup language like YAML or JSON. Infrastructure as code allows DevOps Engineers to use the same workflows used by software developers to version, roll back, and otherwise manage changes.

The term Infrastructure as Code encompasses everything from bootstrapping to configuration to orchestration, and it is considered a best practice in the industry to manage all infrastructure as code. This technique precipitated the explosion in system complexity seen in modern DevOps organizations.

# `Cloud providers`

# `Serverless Concepts`

Serverless is a cloud-native development model that allows developers to build and run applications without having to manage servers.

There are still servers in serverless, but they are abstracted away from app development. A cloud provider handles the routine work of provisioning, maintaining, and scaling the server infrastructure. Developers can simply package their code in containers for deployment.

# `Linux / Unix`

Knowledge of UNIX is a must for almost all kind of development as most of the codes that you write is most likely going to be finally deployed on a UNIX/Linux machine. Linux has been the backbone of the free and open source software movement, providing a simple and elegant operating system for almost all your needs.

# `Service Mesh`

A Service Mesh is a dedicated infrastructure layer for handling service-to-service communication. It’s responsible for the reliable delivery of requests through the complex topology of services that comprise a modern, cloud native application. In layman’s terms, it’s a tool which helps you to control how different services communicate with each other.

# `CI / CD`

`CI/CD` is a method to frequently deliver apps to customers by introducing automation into the stages of app development. The main concepts attributed to `CI/CD` are `continuous integration, continuous delivery`, and continuous deployment. `CI/CD` is a solution to the problems integrating new code can cause for development and operations teams (AKA “integration hell”).

`CI/CD` falls under DevOps (the joining of development and operations teams) and combines the practices of continuous integration and continuous delivery. `CI/CD` automates much or all of the manual human intervention traditionally needed to get new code from a commit into production, encompassing the build, test (including integration tests, unit tests, and regression tests), and deploy phases, as well as infrastructure provisioning. With a `CI/CD` pipeline, development teams can make changes to code that are then automatically tested and pushed out for delivery and deployment. Get `CI/CD` right and downtime is minimized and code releases happen faster.

## `CI/CD fundamentals`

There are eight fundamental elements of CI/CD that help ensure maximum efficiency for your development lifecycle. They span development and deployment. Include these fundamentals in your pipeline to improve your DevOps workflow and software delivery:

- `A single source repository`
  Source code management (SCM) that houses all necessary files and scripts to create builds is critical. The repository should contain everything needed for the build. This includes source code, database structure, libraries, properties files, and version control. It should also contain test scripts and scripts to build applications.

- `Frequent check-ins to main branch`
  Integrate code in your trunk, mainline or master branch — i.e., trunk-based development — early and often. Avoid sub-branches and work with the main branch only. Use small segments of code and merge them into the branch as frequently as possible. Don't merge more than one change at a time.

- `Automated builds`
  Scripts should include everything you need to build from a single command. This includes web server files, database scripts, and application software. The CI processes should automatically package and compile the code into a usable application.

- `Self-testing builds`
  CI/CD requires continuous testing. Testing scripts should ensure that the failure of a test results in a failed build. Use static pre-build testing scripts to check code for integrity, quality, and security compliance. Only allow code that passes static tests into the build.

- `Frequent iterations`
  Multiple commits to the repository results in fewer places for conflicts to hide. Make small, frequent iterations rather than major changes. By doing this, it's possible to roll changes back easily if there's a problem or conflict.

- `Stable testing environments`
  Code should be tested in a cloned version of the production environment. You can't test new code in the live production version. Create a cloned environment that's as close as possible to the real environment. Use rigorous testing scripts to detect and identify bugs that slipped through the initial pre-build testing process.

- `Maximum visibility`
  Every developer should be able to access the latest executables and see any changes made to the repository. Information in the repository should be visible to all. Use version control to manage handoffs so developers know which is the latest version. Maximum visibility means everyone can monitor progress and identify potential concerns.

- `Predictable deployments anytime`
  Deployments should be so routine and low-risk that the team is comfortable doing them anytime. CI/CD testing and verification processes should be rigorous and reliable, giving the team confidence to deploy updates at any time. Frequent deployments incorporating limited changes also pose lower risks and can be easily rolled back.

[Mas Información](https://about.gitlab.com/topics/ci-cd/)

# `Containers`

Los contenedores son tecnología que se usa para agrupar una aplicación con todos sus archivos necesarios en un entorno de ejecución. Como una sola unidad, el contenedor puede moverse con facilidad y ejecutarse en cualquier sistema operativo en cualquier contexto.

Al usar contenedores, los usuarios evitan que se produzcan bloqueos debido a entornos incompatibles y obtienen un rendimiento uniforme en todos los equipos. Los desarrolladores pueden entonces enfocarse en la propia aplicación y no en la corrección de errores o en reescribirla para diferentes entornos de servidores. Y, sin sistema operativo, los contenedores ofrecen una manera eficiente de que los desarrolladores puedan desplegarlos en clúster, donde los contenedores individuales contienen componentes únicos de aplicaciones complejas. Al dividir los componentes en contenedores separados, los desarrolladores también pueden actualizar componentes individuales en lugar de reprocesar toda la aplicación.

# `Cloud Design Patterns`

These design patterns are useful for building reliable, scalable, secure applications in the cloud.

The link below has cloud design patterns where each pattern describes the problem that the pattern addresses, considerations for applying the pattern, and an example based on Microsoft Azure. Most patterns include code samples or snippets that show how to implement the pattern on Azure. However, most patterns are relevant to any distributed system, whether hosted on Azure or other cloud platforms.

[TOP](#operations-knowledge)
