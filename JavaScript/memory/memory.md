[Volver al Menú](../root.md)

# `Memory Management`

# `Recolección de basura`

La recolección de basura se ejecuta automáticamente. No la podemos forzar o evitar.
Los objetos se retienen en la memoria mientras son accesibles.
Ser referenciado no es lo mismo que ser accesible (desde una raíz): un conjunto de objetos interconectados pueden volverse inalcanzables como un todo.

The main things to know:

- Garbage collection is performed automatically. We cannot force or prevent it.
- Objects are retained in memory while they are reachable.
- Being referenced is not the same as being reachable (from a root): a pack of interlinked objects can become unreachable as a whole, as we’ve seen in the example above.
  Modern engines implement advanced algorithms of garbage collection.

A general book “The Garbage Collection Handbook: The Art of Automatic Memory Management” (R. Jones et al) covers some of them.

If you are familiar with low-level programming, more detailed information about V8’s garbage collector is in the article A tour of V8: Garbage Collection.

The V8 blog also publishes articles about changes in memory management from time to time. Naturally, to learn more about garbage collection, you’d better prepare by learning about V8 internals in general and read the blog of Vyacheslav Egorov who worked as one of the V8 engineers. I’m saying: “V8”, because it is best covered by articles on the internet. For other engines, many approaches are similar, but garbage collection differs in many aspects.

In-depth knowledge of engines is good when you need low-level optimizations. It would be wise to plan that as the next step after you’re familiar with the language.
