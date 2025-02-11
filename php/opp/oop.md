[Volver al Menú](../root.md)

# `OOP Fundamentals`

[More OOP Concepts](./advanced.md)

In PHP, Object-Oriented Programming (OOP) Fundamentals cover critical aspects like classes, objects, properties, and methods. OOP facilitates efficient code reusability and makes it easier to manage and modify code. For example, here’s a code snippet that represents a class with a method and a property in PHP:

```json
class Hello {
    public $greeting = "Hello, world!";

    public function displayGreeting() {
        echo $this->greeting;
    }
}
$hello = new Hello();
$hello->displayGreeting(); // Outputs "Hello, world!"
```

This snippet defines a class Hello with a property $greeting and a method displayGreeting(). Instances of this class can access these methods and properties. OOP Fundamentals in PHP are much more comprehensive, encompassing concepts like inheritance, encapsulation, and polymorphism.

# `Classes and Objects`

PHP supports object-oriented programming, offering a multi-paradigm way of coding through classes and objects. A class is like a blueprint for creating objects that encapsulate all faculties, properties and methods. An object, on the other hand, is an instance of a class where you can interact with the class’s methods and change its properties. PHP lets you define a class using the keyword ‘class’, set properties and methods within it, and then create an object of that class using ‘new’.

# `Constructor / Destructor`

Constructor and Destructor methods are fundamental components of Object-Oriented Programming (OOP) in PHP. A constructor is a special type of method that automatically runs upon creating an object, often used to set property values or default behaviors. On the other hand, a destructor is a method that is automatically invoked when an object is due to be destroyed, perfect for cleanup activities. Here is a basic example:

```json
class TestClass {
  public $value;

  // Constructor Method
  public function __construct($val) {
    $this->value = $val;
  }

  // Destructor Method
  public function __destruct() {
    echo "Object is being destroyed.";
  }
}

$obj = new TestClass("Hello World");
echo $obj->value;
// Displays: Hello World
// And when the script ends, "Object is being destroyed."
```

# `Properties and Methods`

Properties and Methods are fundamental components of Object-Oriented Programming (OOP) in PHP. Properties are just like variables; they hold information that an object will need to use. Methods, on the other hand, are similar to functions; they perform an action on an object’s properties. In PHP, properties are declared using visibility keywords (public, protected, or private) followed by a regular variable declaration, while methods are declared like functions but inside a class.

```json
class Car {
  public $color; // Property

  // Method
  public function setColor($color) {
    $this->color = $color;
  }
}
```

In this example, `$color` is a property and `setColor()` is a method.

# `Access Specifiers`

Access specifiers, also known as access modifiers, in PHP are keywords used in the class context which define the visibility and accessibility of properties, methods and constants. PHP supports three types of access specifiers: public, private, and protected.

`public` specified properties or methods can be accessed from anywhere.

`private` ones can only be accessed within the class that defines them.

`protected` ones can be accessed within the class itself and by inherited and parent classes.

```json
class MyClass
{
    public $public = 'Public';
    protected $protected = 'Protected';
    private $private = 'Private';

    function printHello()
    {
        echo $this->public;
        echo $this->protected;
        echo $this->private;
    }
}

$obj = new MyClass();
echo $obj->public; // Works
echo $obj->protected; // Fatal Error
echo $obj->private; // Fatal Error
$obj->printHello(); // Shows Public, Protected and Private
```

# `Static Methods and Properties`

Static methods and properties in PHP belong to the class rather than an instance of the class. This means they can be accessed without creating an object of the class. A static method is declared with the static keyword and can be invoked directly using the class name followed by the scope resolution operator. Similarly, a static property is also defined with the static keyword, but cannot be accessed directly, even from within the class methods - they must be accessed through static methods. Here’s a simple example:

```json
class MyClass {
    static $myStaticProperty = "Hello, world";

    static function myStaticMethod() {
        return self::$myStaticProperty;
    }
}

echo MyClass::myStaticMethod();
```

In this example, we’re directly accessing `myStaticMethod` from `MyClass` without an instantiation.

## `Scope Resolution Operator`

The Scope Resolution Operator (also called Paamayim Nekudotayim) or in simpler terms, the double colon, is a token that allows access to a constant, static property, or static method of a class or one of its parents. Moreover, static properties or methods can be overriden via late static binding.

```json
<?php
class MyClass {
    const CONST_VALUE = 'A constant value';
}

$classname = 'MyClass';
echo $classname::CONST_VALUE;

echo MyClass::CONST_VALUE;
?>
```

## `self`

The `self` keyword refers to the current class itself. It is used to access static properties, constants, and methods within the same class. When using `self`, the class in which the keyword is written does not change, regardless of the context or inheritance.

## `static`

The `static` keyword behaves similarly to self, but with one crucial difference. It represents the class in which it is called, rather than the class in which it is written. This allows for late `static` binding, enabling late-bound method calls and property access.

## `parent`

The `parent` keyword is used to access members of the `parent` class within a child class. It is primarily used to invoke overridden methods or access overridden properties from the `parent` class.

## `$this`

The `$this` keyword refers to the current instance of the class. It is primarily used to access non-static properties and invoke non-static methods within the class.

# `Inheritance`

Inheritance, a fundamental concept in object-oriented programming (OOP), is a feature that PHP supports. It lets us create classes which are extensions of other classes, inheriting their methods and properties. This concept allows the creation of more flexible and maintainable code, as it promotes code reuse. For instance, consider we have a ‘Vehicle’ class and we want to create a ‘Car’ class. Since cars are a type of vehicle, it would make sense for our ‘Car’ class to inherit from the ‘Vehicle’ class.

```json
class Vehicle {
  public $color;
  function drive() {
    echo "Driving...";
  }
}

class Car extends Vehicle {
  function horn() {
    echo "Beeping...";
  }
}

$myCar = new Car();
$myCar->drive(); // Inherits drive method from Vehicle
$myCar->horn(); // Unique to Car
```

In the above example, the ‘Car’ class inherits the drive method from the ‘Vehicle’ class but also has an additional method, horn. This is an illustration of how inheritance in PHP can help to organize your code efficiently and intuitively.

[TOP](#oop-fundamentals)
