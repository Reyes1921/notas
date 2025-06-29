[Volver al Menú](../root.md)

# `Shell Basics`

The Linux shell is a command-line interface that acts as an intermediary between users and the system kernel. Common shells include Bash, sh, and csh. Basic operations involve navigating directories, creating/deleting files, and executing commands. Shell knowledge is fundamental for Linux administration, scripting, and automation tasks.

# `Command Path in Shell`

The command path is a variable that is used by the shell to determine where to look for the executable files to run. Linux commands are nothing but programs residing in particular directories. But, one does not have to navigate to these directories every time to run these programs. The command path comes to the rescue!

Usually, when you type a command in the terminal, the shell needs to know the absolute path of the command's executable to run it. Instead of typing the full path each time, command paths allow the shell to automatically search the indicated directories in the correct order. These paths are stored in the `$PATH` environment variable.

# `Environment Variables`

Environment variables are dynamic named values that can affect the behavior of running processes in a shell. They exist in every shell session. A shell session's environment includes, but is not limited to, the user's home directory, command search path, terminal type, and program preferences.

Environment variables help to contribute to the fantastic and customizable flexibility you see in Unix systems. They provide a simple way to share configuration settings between multiple applications and processes in Linux.

# `Command Help`

Linux command help provides documentation and usage information for shell commands. Use `man command` for detailed manuals, `help command` for shell built-ins, `command --help` for quick options, and `tldr command` for practical examples. Essential for learning command syntax, parameters, and functionality in Linux terminal environments.

# `Redirects`

The shell in Linux provides a robust way of managing input and output streams of a command or program, this mechanism is known as Redirection. Linux being a multi-user and multi-tasking operating system, every process typically has 3 streams opened:

- `Standard Input (stdin)` - This is where the process reads its input from. The default is the keyboard.
- `Standard Output (stdout)` - The process writes its output to stdout. By default, this means the terminal.
- `Standard Error (stderr)` - The process writes error messages to stderr. This also goes to the terminal by default.

# `Super User`

The Super User, also known as "root user", represents a user account in Linux with extensive powers, privileges, and capabilities. This user has complete control over the system and can access any data stored on it. This includes the ability to modify system configurations, change other user's passwords, install software, and perform more administrative tasks in the shell environment.

The usage of super user is critical to operating a Linux system properly and safely as it can potentially cause serious damage. The super user can be accessed through the `sudo` or `su` commands.

[TOP](#shell-basics)
