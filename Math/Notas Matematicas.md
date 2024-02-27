[Volver al Menú](/readme.md)

# `Math`

# `Numero Naturales N`

1,2,3,4,5,6,7,8,9...

# `Numeros Enteros Z`

...-9,-8,-7,-6,-5,-4,-3,-2,-1,0,1,2,3,4,5,6,7,8,9...

# `Racionales Q (Fracciones)`

1/2,2/5,7/5,7/4... (son un cuerpo)

# `Numero Irracionales avaces con I (Numeros que no se pueden poner como fracciones)`

- `Pi` = 3,1415... (infinitos decimales sin ningun patron)
- `e` = 2,718281... (infinitos decimales sin ningun patron)

# `Numeros Reales R`

Numeros racionales e irracionales juntos. Conjunto que verifica que serie de propiedades que los hacen un cuerpo ordenado completo.

# `Numeros Complejos C o Imaginarios`

x\*\*2 = -1

i\*\*2 = -1

# `Numeros Primos`

Es un número natural mayor que 1 que tiene únicamente dos divisores positivos distintos: él mismo y el 1.

El numero 1 no es primo por convenio.

# `Número Compuesto`

Es cualquier número natural no primo, a excepción del 1. Es decir, tiene uno o más divisores distintos a 1 y a sí mismo. También se utiliza el término divisible para referirse a estos números.

# `Numeros Perfectos`

Es aquel que es igual al suma de sus divisores propios, sin contar al propio numero.

Ejemplo: 1+2+3 = 6 el 6 es un numero perfecto.

# `Numeros trascendentes`

Un numero real o complejo que no es solucion de ninguna ecuacion polinomica con coeficientes racionales se dice que es trascendente.

- `Pi` es trascendente
- `e` es trascendente

# `PI = 3,14159265359...`

Es la razon entre la longitud de cualquier circunferencia y su diametro.

`L` = `Pi` \* diametro.

# `e = 2,71828...`

En matemáticas, la constante `e` es uno de los números irracionales y los números trascendentes más importantes. Es aproximadamente 2,71828​y aparece en diversas ramas de las matemáticas, al ser la base de los logaritmos naturales y formar parte de las ecuaciones del interés compuesto y otros muchos problemas.

# `Logaritmos`

Cuantos pasos de tamano 10 tengo que dar para alcanzar un numero determinado. Esto si la base es 10.

Cuantas veces tengo que multiplicar `b` para llegar a `x`.

$\log_b n$ = x si b^x = n

Ejemplo:

`x`=10;

$\log_x 10000$ = 4 (Cuatro multiplicaciones de 10 para llegar a 10.000)

Lo mismo tambien seria

10\*\*4 = 10.000 Es otra forma de decir que el logaritmos en base 10 de 10.000 = 4;

# `Logaritmo Natural`

Es un logaritmo con base `e`.

El logaritmo natural suele denotarse por `ln(x)` o como `log base e (x)`, y en algunos casos, si la base `e` está implícita, como log(x).

# `Funciones`

Una funcion enre dos conjuntos de A y B es una asociacion de f que a casa elemento de A le asigna elemento de B.

# `Derivada`

la derivada de una función es la razón de cambio instantánea con la que varía el valor de dicha función matemática, según se modifique el valor de su variable independiente.

La derivada es el resultado de un límite y representa la pendiente de la recta tangente a la gráfica de la función en un punto.

# `Teorema de Pitagoras`

En cualquier triangulo rectangulo el cuadrado de la hipotenusa es igual a la suma de los cuadrados de los catetos.

```
A**2 + B**2 = C**2
```

A es el cateto opuesto y B es el cateto adyacente

# `Area de un circulo`

```
A = pi * r**2
```

# `Area de un cuadrado`

```
A = a**2
```

# `Area de un triangulo`

```
A = (base * altura) / 2
```

# `Sucesión de Fibonacci`

Es una secuencia infinita de números naturales cuyos dos primeros términos son 1 y 1 y tal que, cualquier otro término se obtiene sumando los dos inmediatamente anteriores. Formula:

```
n = n-1 + n-2
```

En js: (recursivamente)

```
function fibonacci(n){
    if(n>1){
        return fibonacci(n-1)+fibonacci(n-2);
    }else if(n==1){
        return 1;
    }else if(n==0){
        return 0;
    }
}
```

# `Media, Moda y Mediana`

## `Media`

Es la suma de todos los datos dividido entre el numero de datos.

## `Moda`

Es el dato que mas se repite.

## `Mediana`

Es el dato que esta en el medio de los datos ordenados.

# `Curiosidades`

- Los numeros 2 y 3 son los unicos numeros primos juntos.
- Encontrar numeros primos comenzando en el 2 y sumar de dos en dos y quitar esos numero y despues sumar de 3 en tres desde 3 y quitar esos numeros y asi hasta nueve, los que sobren son primos.
- El numero 0 es PAR. Los numeros pares son aquellos enteros que al dividirlos entre 2 su resto es 0. 0/2 su resto es 0.
- No se ha concluido todavia si el 0 es natural o no.
- 0/0 da infinito. Ejemplo: 10/10 =1; 10/5=2; 10/2.5 = 4, 10/2=5 cada vez tenemos un numero mayor a medida que nos acercamos a 0.
- La entidad de Euler (La ecuacion mas bella del mundo)
  `e**i*pi` + 1 = 0
- Nadie sabe si hay numeros perfectos impares.
