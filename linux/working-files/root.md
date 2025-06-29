[Volver al Menú](../root.md)

# `Working with Files`

Working with files is an essential part of Linux and it's a skill every Linux user must have. In Linux, everything is considered a file: texts, images, systems, devices, and directories. Linux provides multiple command-line utilities to create, view, move or search files. Some of the basic commands for file handling in Linux terminal include `touch` for creating files, `mv` for moving files, `cp` for copying files, `rm` for removing files, and `ls` for listing files and directories.

# `File Permissions`

Linux file permissions control read (r), write (w), and execute (x) access for owner, group, and others using octal or symbolic notation. Format `-rwxr--r--` shows file type and permissions. Use `chmod` to change permissions, `chown` for ownership, `chgrp` for group ownership. Essential for system security and proper access control.

# `Archiving and Compressing`

Linux archiving combines multiple files into single archives using `tar`, while compression reduces file sizes with `gzip` and `bzip2`. Use `tar cvf` to create archives, `tar xvf` to extract, and `tar cvzf` for gzip-compressed archives. These separate processes are often combined for efficient backup and distribution, with `tar.gz` and `tar.bz2` being common formats.

# `Copying and Renaming Files`

Essential Linux file operations use `cp` to copy files and `mv` to move/rename them. The `cp` command copies files from source to destination, while `mv` moves or renames files/directories. Both commands use the syntax `command source destination`. These case-sensitive commands are fundamental for daily file management tasks in Linux systems.

# `Soft and Hard Links`

Linux supports two types of file links. Hard links share the same inode and data as the original file - if the original is deleted, data remains accessible. Soft links (symbolic links) are shortcuts pointing to the original file path - they break if the original is removed. Create with `ln` for hard links and `ln -s` for soft links.

[TOP](#working-with-files)
