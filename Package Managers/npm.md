[Volver al Menú](root.md)

# `npm`

`npm` (Node Package Manager) is the standard package manager for Node.js.

It is two things: first and foremost, it is an online repository for the publishing of open-source Node.js projects; second, it is a command-line utility for interacting with said repository that aids in package installation, version management, and dependency management. A plethora of Node.js libraries and applications are published on `npm`, and many more are added every day

`npm` consists of three distinct components:

- the `website`
- the Command Line Interface (`CLI`)
- the `registry`

Use the `website` to discover packages, set up profiles, and manage other aspects of your npm experience. For example, you can set up organizations to manage access to public or private packages.

The `CLI` runs from a terminal, and is how most developers interact with npm.

The `registry` is a large public database of JavaScript software and the meta-information surrounding it.

# `Installing Packages`

## `Global Install vs Local Install`

`NodeJS` and `NPM` allow two methods of installing dependencies/packages: `Local` and `Global`. 

This is mainly used when adding a package or dependency as part of a specific project you’re working on. The package would be installed (with its dependencies) in node_modules folder under your project. In addition, in package.json file there will be a new line added for the installed dependency under the label dependencies. 

At this point - you can start using the package in your `NodeJS` code by importing the package. 

Unlike the local install, you can install packages and dependencies globally. This would install it in a system path, and these packages would be available to any program which runs on this specific computer. This method is often used for installing command line tools (for example, even `npm` program is a Globally installed `npm` package).

## `Local`

```
npm install <package_name>
```

## `Global`

```
npm install -g <package_name>
```

# `Updating Packages`

`npm` provides various features to help install and maintain the project’s dependencies. Dependencies get updates with new features and fixes, so upgrading to a newer version is recommended. We use `npm` update commands for this.

## `Updating local packages`

- `avigate to the root directory of your project and ensure it contains a package.json file:`

```
cd /path/to/project
```

- `In your project root directory, run the update command:`

```
npm update
```

- `To test the update, run the outdated command. There should not be any output.`

```
npm outdated
```

## `Updating globally-installed packages`

- `Determining which global packages need updating`

To see which global packages need to be updated, on the command line, run:

```
npm outdated -g --depth=0
```

- `Updating a single global package`

To update a single global package, on the command line, run:

```
npm update -g <package_name>
```

- `Updating all globally-installed packages`

To update all global packages, on the command line, run:

```
npm update -g
```

# `Using Packages`

### `CommonJS modules`

```
const chalk = require('chalk');
```

### `ES6 modules`

```
import chalk from 'chalk';
```

```
import { red, blue } from 'chalk';
```

# `npx`

`npx` is a very powerful command that’s been available in `npm` starting version 5.2, released in July 2017. If you don’t want to install `npm`, you can install `npx` as a standalone package. `npx` lets you run code built with Node.js and published through the `npm` registry.

`npx` is also a CLI tool whose purpose is to make it easy to install and manage dependencies hosted in the npm registry.

`npm` and `npx` are both command-line tools used in the Node.js ecosystem, but they have different functions. While `npm` is a package manager that is used to install, uninstall and manage packages, `npx` is a tool that is used to execute packages.

One of the main differences between `npm` and `npx` is that `npm` installs packages globally on the system, whereas `npx` does not. This means that if you use `npm` to install a package, it will be available to all projects running on your system, while if you use `npx`, the package will only be available within the context of the project in which it was installed.

Another difference between the two tools is that `npx` is installed automatically with `npm` version 5.2 and higher, so it is readily available without the need for an additional installation. Additionally, `npx` allows you to execute packages directly from the registry without having to install them.

Overall, while `npm` and `npx` are both command-line tools that are used in the Node.js ecosystem, they have different functions and are used for different purposes. If you need to install and manage packages, use `npm`, but if you need to execute packages or don't want to globally install them, use `npx`.