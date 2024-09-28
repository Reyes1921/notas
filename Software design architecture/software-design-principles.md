[Volver al Menú](root.md)

# `Software Design Principles`

There are many software design principles that aim to guide the development of software in a way that makes it easy to understand, maintain, and extend.

# `Composition over Inheritance`

Composition over inheritance is a programming principle that suggests that it is better to use composition, a mechanism for assembling objects, to create complex objects, rather than using inheritance, which is a mechanism for creating new classes based on existing ones.

Inheritance is a powerful mechanism for creating reusable code, but it can also lead to tightly coupled, hard-to-maintain code. This is because inherited classes are tightly bound to their parent classes and any changes made to the parent class will affect all of its child classes. This makes it hard to change or extend the code without affecting the entire class hierarchy.

# `Encapsulate What Varies`

Encapsulate what varies is a programming principle that suggests that code should be organized in such a way that the parts that are likely to change in the future are isolated from the parts that are unlikely to change. This is accomplished by creating interfaces and classes that separate the varying parts of the code from the stable parts.

Encapsulating what varies allows for more flexibility in the code. When changes are needed, they can be made to the encapsulated parts without affecting the rest of the code. This makes it easier to understand, test, and maintain the code.

# `Program Against Abstractions`

Programming against abstractions is a programming principle that suggests that code should be written in such a way that it is not tied to specific implementations, but rather to abstractions. This is accomplished by defining interfaces or abstract classes that define the behavior of a group of related classes without specifying their implementation.

Programming against abstractions allows for more flexibility in the code. When changes are needed, they can be made to the implementation of the abstractions without affecting the code that uses them. This makes it easier to understand, test, and maintain the code.

# `Hollywood Principle`

The Hollywood Principle is a software development principle that states: “Don’t call us, we’ll call you.” It suggests that high-level components should dictate the flow of control in an application, rather than low-level components.

This principle is often used in the context of inversion of control (IoC) and dependency injection. In traditional software development, low-level components are responsible for creating and managing the high-level components that they depend on. With IoC, the high-level components dictate the flow of control, and the low-level components are created and managed by a separate mechanism.

# `SOLID`

SOLID is an acronym that stands for five principles of object-oriented software development, which were first introduced by Robert C. Martin in the early 2000s. These principles are:

Robert C. Martin himself wrote :

```
“a dogmatic or religious application of the SOLID principles is neither realistic nor beneficial”
```

- `Single Responsibility Principle (SRP)`

Robert Martin summarizes this principle well by mandating that, “a class should have one, and only one, reason to change.” Following this principle means that each class only does one thing and every class or module only has responsibility for one part of the software’s functionality. More simply, each class should solve only one problem.

- `Open/Closed Principle (OCP)`

The idea of open-closed principle is that existing, well-tested classes will need to be modified when something needs to be added. Yet, changing classes can lead to problems or bugs. Instead of changing the class, you simply want to extend it. With that goal in mind, Martin summarizes this principle, “You should be able to extend a class’s behavior without modifying it.” This principle basically states that you should allow users to add new functionalities without changing existing code.

- `Liskov Substitution Principle (LSP)`

Of the five SOLID principles, the Liskov Substitution Principle is perhaps the most difficult one to understand. Broadly, this principle simply requires that every derived class should be substitutable for its parent class. The principle is named for Barbara Liskov, who introduced this concept of behavioral subtyping in 1987. Liskov herself explains the principle by saying:

The best explanation for this is if you have a parent class and a child class, then the base class and child class can be used interchangeably(indistintamente) without getting incorrect results. This might still be confusing, so let's take a look at the classic Square-Rectangle example. Mathematically, a square is a rectangle, but if you model it using the "is-a" relationship via inheritance, you quickly get into trouble.

- `Interface Segregation Principle (ISP)`

The general idea of interface segregation principle is that it’s better to have a lot of smaller interfaces than a few bigger ones. Martin explains this principle by advising, “Make fine grained interfaces that are client-specific. Clients should not be forced to implement interfaces they do not use.”

For software engineers, this means that you don’t want to just start with an existing interface and add new methods. Instead, start by building a new interface and then let your class implement multiple interfaces as needed. Smaller interfaces mean that developers should have a preference for composition over inheritance and for decoupling over coupling. According to this principle, engineers should work to have many client-specific interfaces, avoiding the temptation of having one big, general-purpose interface.

JavaScript doesn't have interfaces so this principle doesn't apply as strictly as others. However, it's important and relevant even with JavaScript's lack of type system.

ISP states that "Clients should not be forced to depend upon interfaces that they do not use." Interfaces are implicit contracts in JavaScript because of duck typing.

`Example in TypeScript`

```bash
interface CatFactData {
  facts: string[];
  color: string;
  link: string;
}

const CatFact = ({ facts }: CatFactData) => {
  return (
    <ul>
      {facts.map((fact) => (
        <li>{fact}</li>
      ))}
    </ul>
  );
};

export default () => {
  const catFactData: CatFactData = {
    facts: [
      "Cats make about 100 different sounds. Dogs make only about 10.",
      "I don't know anything about cats.",
      "Domestic cats spend about 70 percent of the day sleeping and 15 percent of the day grooming."
    ],
    color: "red",
    link: "https://github.com/"
  };

  return (
    <div>
        <CatFact {...catFactData} />
    </div>
  );
};
```

Notice the interface “CatFactData” has both a color and link in the above example, which is not being used by a “CatFact” component. Not destructing it doesn’t mean this component won’t depend on it, an interface shouldn’t have unused properties.

- `Dependency Inversion Principle (DIP)`

This principle offers a way to decouple software modules. Simply put, dependency inversion principle means that developers should “depend on abstractions, not on concretions.” Martin further explains this principle by asserting that, “high level modules should not depend upon low level modules. Both should depend on abstractions.” Further, “abstractions should not depend on details. Details should depend upon abstractions.”

This principle states two essential things:

- High-level modules should not depend on low-level modules. Both should depend on abstractions.
- Abstractions should not depend upon details. Details should depend on abstractions.

`Example in TypeScript`

```bash
//BAD
class PokemonTrainer {
    fun train(pokemon: Charizard) {
    }
}

class Charizard {
}

//GOOD
interface Pokemon {
    fun train()
}

class Charizard : Pokemon {
    override fun train() {

    }
}

class PokemonTrainer {
    fun train(pokemon: Pokemon) {
        pokemon.train()
    }
}
```

En este ejemplo, la clase PokemonTrainer tiene una dependencia directa con la clase Charizard y solo puede entrenar a ese tipo de Pokemon específico, lo cual viola el principio de inversión de dependencias ya que la clase PokemonTrainer depende directamente de la implementación concreta de una clase Charizard y no de una abstracción o interfaz que represente cualquier Pokemon.

# `DRY`

`DRY (Don’t Repeat Yourself)` is a software development principle that suggests that code should not have duplicate functionality. The idea is to keep the codebase as simple as possible by eliminating redundancy and duplication. The goal is to reduce complexity and improve maintainability by ensuring that each piece of knowledge is expressed in a single, unambiguous way within the system.

The DRY principle is closely related to the `Single Responsibility Principle (SRP)` and the `Open-Closed Principle (OCP)`, which are part of the SOLID principles. The DRY principle aims to reduce the amount of duplicate code by creating abstractions that can be reused across the system.

# `YAGNI`

`YAGNI (You Ain’t Gonna Need It)` is a software development principle that suggests that developers should not add functionality to a codebase unless it is immediately necessary. The idea is to avoid creating unnecessary complexity in the codebase by only adding features that are actually needed.

The YAGNI principle is closely related to the `Single Responsibility Principle (SRP)` and the `Open-Closed Principle (OCP)`, which are part of the SOLID principles. YAGNI aims to keep the codebase as simple as possible by avoiding the creation of unnecessary abstractions and functionality.

Este filosofía, que es uno los principios básicos del Desarrollo Ágil es muy fácil de entender en el fondo. Simplemente nos indica que debemos ser muy concienzudos a la hora de desarrollar funcionalidades, para incluir solo aquellas que realmente son estrictamente necesarias, atendiendo siempre a los requisitos del software y los objetivos de cada etapa del proyecto. La antítesis de YAGNI consiste en desarrollar funcionalidades o piezas de software que realmente no nos han solicitado, simplemente por el hecho de pensar que algún día pueden ser útiles. En este caso estaremos incurriendo en uno de los defectos más habituales en los que caemos los desarrolladores.

# `KISS`

The KISS principle in Software Development, often expanded as “`Keep It Simple, Stupid,`” (some variations use “Keep It Short and Simple” or “Keep It Super Simple”) is a design principle that advocates for simplicity in design and development processes. The core idea is to keep things as simple as possible while still achieving the desired functionality or outcome. This principle suggests that simpler solutions are typically easier to understand, implement, maintain, and use.

[TOP](#software-design-principles)
