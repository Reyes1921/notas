[Atrás](root.md)

# `Basics`

# `How Computers Are Architected`

The central processing unit (CPU) of a computer is in charge of all computation. It’s the big cheese. The shazam alakablam. It starts chugging as soon as you start your computer, executing instruction after instruction after instruction.

The first mass-produced CPU was the Intel 4004, designed in the late 60s by an Italian physicist and engineer named Federico Faggin. It was a 4-bit architecture instead of the 64-bit systems we use today, and it was far less complex than modern processors, but a lot of its simplicity does still remain.

The “instructions” that CPUs execute are just binary data: a byte or two to represent what instruction is being run (the opcode), followed by whatever data is needed to run the instruction. What we call machine code is nothing but a series of these binary instructions in a row. Assembly is a helpful syntax for reading and writing machine code that’s easier for humans to read and write than raw bits; it is always compiled to the binary that your CPU knows how to read.

RAM is your computer’s main memory bank, a large multi-purpose space which stores all the data used by programs running on your computer. That includes the program code itself as well as the code at the core of the operating system. The CPU always reads machine code directly from RAM, and code can’t be run if it isn’t loaded into RAM.

Linux is just a kernel and needs plenty of userland software like shells and display servers to be usable. The kernel in macOS is called XNU and is Unix-like, and the modern Windows kernel is called the NT Kernel.

# `Two Rings to Rule Them All`

The mode (sometimes called privilege level or ring) a processor is in controls what it’s allowed to do. Modern architectures have at least two options: kernel/supervisor mode and user mode. While an architecture might support more than two modes, only kernel mode and user mode are commonly used these days.

In kernel mode, anything goes: the CPU is allowed to execute any supported instruction and access any memory. In user mode, only a subset of instructions is allowed, I/O and memory access is limited, and many CPU settings are locked. Generally, the kernel and drivers run in kernel mode while applications run in user mode.

# `What Even is a Syscall?`
