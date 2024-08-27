[Volver al Menú](../root.md)

# `Keep App Running`

In Node.js, you need to restart the process to make changes take effect. This adds an extra step to your workflow. You can eliminate this extra step by using nodemon to restart the process automatically.

Since Node.js 18.11.0, you can run Node with the --watch flag to reload your app everytime a file is changed. So you don’t need to use nodemon anymore. Node.js 18.11.0 Changelog.

# `—watch`

The `--watch` flag in Node.js is a powerful feature introduced in Node.js version 19 that enables automatic reloading of your Node.js application whenever changes are detected in the specified files.

How it works

- You run your Node.js script with the `--watch` flag: $ node `--watch` your_script.js
- Node.js starts watching the specified file (or directory) for changes.
- Whenever a change is detected, Node.js automatically restarts the script

# `Nodemon`

In Node.js, you need to restart the process to make changes take effect. This adds an extra step to your workflow. You can eliminate this extra step by using nodemon or PM2 to restart the process automatically.

nodemon is a command-line interface (CLI) utility developed by @rem that wraps your Node app, watches the file system, and automatically restarts the process.

```
npm i nodemon -g
```

```
nodemon index.js
```

In package.json

```
  "scripts": {
    "dev": "nodemon index.js",
  },
```

[TOP](#keep-app-running)
