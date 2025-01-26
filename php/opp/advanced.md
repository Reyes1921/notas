[Volver al Menú](./oop.md)

# `More OOP Concepts`

# `Polymorphism`

Polymorphism is a core concept in object-oriented programming that PHP supports. It provides a mechanism to use one interface for different underlying forms, enabling different objects to process differently based on their data type. In PHP, polymorphism can be achieved through inheritance and interfaces. For example, you may have a parent class ‘Shape’ and child classes ‘Circle’, ‘Rectangle’, etc. They all can have a method ‘draw’ but with different implementations. It’s not limited to classes; you can also use polymorphism with interfaces by implementing different classes with the same interface where each class will have different code for the same method.

Here’s a small sample code demonstrating the concept:

```json
<?php
interface Shape {
  public function draw();
}

class Circle implements Shape {
  public function draw() {
    echo "Draw a circle";
  }
}

class Rectangle implements Shape {
  public function draw() {
    echo "Draw a rectangle";
  }
}

function drawShape(Shape $shape) {
  $shape->draw();
}

drawShape(new Circle());
drawShape(new Rectangle());
?>
```

This creates a scalable way to add more shapes, as you only need to follow the ‘Shape’ interface.

# `Abstract classes`

Abstract classes in PHP are those which cannot be instantiated on their own. They are simply blueprints for other classes, providing a predefined structure. By declaring a class as abstract, you can define methods without having to implement them. Subsequent classes, when inheriting from an abstract class, must implement these undefined methods.

# `Interfaces`

Interfaces in PHP serve as a blueprint for designing classes. They ensure that a class adheres to a certain contract, all without defining how those methods should function. As PHP is not a strictly typed language, interfaces can be particularly useful in large codebases to maintain continuity and predictability. For example, in PHP, an interface ‘iTemplate’ could be defined with methods ‘setVariable’ and ‘getHtml’. Any class that implements this interface must define these methods.

Here is a snippet:

```json
interface iTemplate {
    public function setVariable($name, $var);
    public function getHtml($template);
}

class Template implements iTemplate {
    private $vars = array();

    public function setVariable($name, $var) {
        $this->vars[$name] = $var;
    }

    public function getHtml($template) {
        foreach($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }
        return $template;
    }
}
```

# `Traits`

Traits is a concept in PHP that allows code reusability by enabling developers to create reusable pieces of code which can be used in classes to extend functionality. They are a way to reduce intricacies of single inheritance by enabling a developer to reuse sets of methods freely in several independent classes.

```json
trait Greeting {
    public function sayHello() {
        return "Hello";
    }
}
class User {
    use Greeting;
}
$user = new User();
echo $user->sayHello(); // Outputs: Hello
```

In the above code snippet, the `Greeting` trait is being used in the `User` class, and we are able to use its methods as if they were defined in the `User` class.

# `Namespaces`

Namespaces in PHP are a way of encapsulating items so that name collisions won’t occur. When your code expands, there could be a situation where classes, interfaces, functions, or constants might have the same name, causing confusion or errors. Namespaces come to the rescue by grouping these items. You declare a namespace using the keyword ‘namespace’ at the top of your PHP file. Every class, function, or variable under this declaration is a part of the namespace until another namespace is declared, or the file ends. It’s like creating a new room in your house solely for storing sports equipment. This makes it easier to find your tennis racket, as you won’t have to rummage around in a closet full of mixed items.

Here’s a quick example:

```json
namespace MyNamespace\SubNamespace;
function displayGreeting() {
     echo 'Hello World!';
}
```

# `Magic methods`

PHP Magic Methods, often considered the hooks of the language, provide developers a way to change how objects will respond to particular language constructs. Magic methods are special functions that start with `__` such as `__construct()`, `__destruct()`, `__call()`, `__get()`, `__set()`and more. They enable us to perform certain tasks automatically when specific actions occur. For example,`__construct()`executes when an object is created while`__destruct()`triggers when an object is no longer needed. Let’s see the`__construct` magic method in action:

```json
class Car {
    public $color;
    public function __construct($color) {
        $this->color = $color;
    }
}
$blueCar = new Car("Blue"); // This will call the __construct() method.
echo $blueCar->color;  // Outputs "Blue".
```

# `Dependency Injection`

Dependency injection is a design pattern used mainly for managing class dependencies. Here, instead of a class being responsible for creating its dependencies on its own, an injector (the “client”) passes the requirements to the class (the “service”), centralizing control and encouraging code to follow the single responsibility principle. As a simple example, consider a situation where class B needs to utilize class A’s methods. Instead of creating an object of class A within B, with dependency injection, we pass an instance of class A to B.

```json
class A {
    function display(){
        echo 'Hello, PHP dependency injection!';
    }
}

class B {
    private $a;

    public function __construct(A $classAInstance) {
        $this->a = $classAInstance;
    }

    public function callDisplayOwn() {
        $this->a->display();
    }
}

$instanceA = new A();
$instanceB = new B($instanceA);
$instanceB->callDisplayOwn();  // Outputs: "Hello, PHP dependency injection!"
```

# `Type Declarations`

Type declarations, also known as type hints, are a feature in PHP that provides you options to specify the type of variable that a function is expected to receive or the type of value that it should return. Not only does it help to debug code quickly, it also makes the code more readable. In PHP, type declarations can be for both parameters in a function (parameter type declarations) and return values from a function (return type declarations). They can apply to classes, interfaces, callable, and scalar types (int, float, string, bool).

Here’s an example:

```json
function add(int $a, int $b): int {
    return $a + $b;
}

echo add(1, 2);  // prints: 3
```

In this example, the function ‘add’ only accepts integers and also returns an integer.

[TOP](#more-oop-concepts)
