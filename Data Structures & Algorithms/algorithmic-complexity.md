[Volver al Menú](./root.md)

# `Algorithmic Complexity`

”Algorithmic Complexity” refers to the computing resources needed by an algorithm to solve a problem. These computing resources can be the time taken for program execution (time complexity), or the space used in memory during its execution (space complexity). The aim is to minimize these resources, so an algorithm that takes less time and space is considered more efficient. Complexity is usually expressed using Big O notation, which describes the upper bound of time or space needs, and explains how they grow in relation to the input size. It’s important to analyze and understand the algorithmic complexity to choose or design the most efficient algorithm for a specific use-case.

## `Time vs Space Complexity`

In the context of algorithmic complexity, “time” refers to the amount of computational time that the algorithm takes to execute, while “space” refers to the amount of memory that the algorithm needs to complete its operation. The time complexity of an algorithm quantifies the amount of time taken by an algorithm to run, as a function of the size of the input to the program. The space complexity of an algorithm quantifies the amount of space or memory taken by an algorithm to run, as a function of the size of the input to the program. It’s important to note that time and space are often at odds with each other; optimizing an algorithm to be quicker often requires taking up more memory, and decreasing memory usage can often make the algorithm slower. This is known as the space-time tradeoff.

## `How to Calculate Complexity?`

The process of calculating algorithmic complexity, often referred to as Big O notation, involves counting the operations or steps an algorithm takes in function of the size of its input. The aim is to identify the worst-case, average-case, and best-case complexity. Generally, the main focus is on the worst-case scenario which represents the maximum number of steps taken by an algorithm. To calculate it, you consider the highest order of size (n) in your algorithm’s steps. For instance, if an algorithm performs a loop 5 times for ‘n’ items, and then does 3 unrelated steps, it has a complexity of O(n), because the linear steps grow faster than constant ones as n increases. Other complexities include `O(1)` for constant complexity, O(n) for linear complexity, O(n^2) for quadratic complexity, and so on, based on how the steps increase with size.

---

# `Common Runtimes`

Common runtimes are used to quantify the performance of an algorithm as the size of the input data increases. They are usually expressed in Big O.

- `O(1)`: Constant time complexity, the algorithm will always execute in the same time regardless of the size of the input data set.
- `O(log N)`: Logarithmic time complexity, the running time increases logarithmically with the size of the input data set.
- `O(N)`: Linear time complexity, the running time increases linearly with the size of the input data.
- `O(N log N)`: Quasilinear time complexity, slightly worse than linear but better than polynomial.
- `O(N^2)`: Quadratic time complexity, the running time increases quadratically with the size of the input data.
- `O(N^3)`: Cubic time complexity, the running time increases cubically with the size of the input.
- `O(2^N)`, `O(N!)`: Exponential and factorial time complexities respectively, the running time grows very quickly with the size of the input.

<img src="time-complex.png">

## `Constant`

Constant time complexity is denoted as `O(1)`. This means the running time of the algorithm remains constant, regardless of the size of the input data set. Whether you’re working with an array of 10 elements or 1 million, if an operation takes the same amount of time regardless of the size of the array, it is said to have a constant time complexity. For example, accessing any element in an array by index is an `O(1)` operation, as the access operation takes the same amount of time regardless of the position of the element in the array.

## `Logarithmic`

Logarithmic time complexity `(O(log n))` often indicates that the algorithm halves the size of the input at each step. It’s more efficient compared to linear time complexity. Binary search is a classic example of logarithmic time complexity where at every step, the algorithm breaks the list into half until it finds the desired element. As the size of the input increases, the growth of the time taken by an algorithm with logarithmic complexity grows slowly because it divides the problem into smaller parts in each step.

## `Linear`

Linear time complexity, denoted as` O(n)`, is one of the best possible algorithmic performance situations. An algorithm is said to have a linear time complexity when the running time increases at most linearly with the size of the input data. This means that if you double the size of the input, the running time will at most double as well. In an ideal situation, every single element in the data set should be viewed exactly once. Sorting algorithms such as counting sort and bucket sort have linear time complexity under certain conditions.

## `Quasilinear or Linearithmic`

Represented as `O(n*log(n))`, this is less efficient than linear runtime but still, it is considered to be fairly good and is majorly found in the divide and conquer algorithms, a very simple explanation for this is that the algorithm performs `‘N’` number of operations and each operation runs in `O(log(n))` (logarithmic) time. The famous Merge Sort algorithm runs in 'O(n\*log(n))' time

## `Polynomial`

Polynomial time complexity, denoted as `O(n^k)`, is a class of time complexity that represents the amount of time an algorithm takes to run as being proportional to the size of the input data raised to a constant power ‘k’. Polynomial time complexity includes runtimes like O(n), O(n^2), O(n^3), etc. The value ‘n’ is a representation of the size of the input, while ‘k’ represents a constant. Algorithms running in polynomial time are considered to be reasonably efficient for small and medium-sized inputs, but can become impractical for large input sizes due to the rapid growth rate of function.

## `Exponential`

Exponential time complexity is denoted as `O(2^n)`, where a growth in n leads to an exponential growth in the number of steps required to complete a task. It means that the time complexity will double with every additional element in the input set. This is seen in many recursive algorithms, where a problem is divided into two sub-problems of the same type. Examples of such algorithms include the naive recursive approach for the Fibonacci sequence or the Towers of Hanoi problem. Although exponential time complexity solutions are often simpler to implement, they are inefficient for larger input sizes.

## `Factorial`

Factorial, often denoted as `n!`, is a mathematical operation. In the context of computer science and algorithm complexity, it represents an extremely high growth rate. This occurs because of the way a factorial is calculated: The product of all positive integers less than or equal to a non-negative integer n. Thus, if an algorithm has a complexity of `O(n!)`, it means the running time increases factorially based on the size of the input data set. That is, for an input of size `n`, the algorithm does `n * (n-1) * (n-2) * … * 1` operations. `O(n!)` is essentially the worst case scenario of complexity for an algorithm and is seen in brute-force search algorithms, such as the traveling salesman problem via brute-force.

---

# `Asymptotic Notation`

In computer science, asymptotic notation is used to describe the efficiency of algorithms for large inputs. It is the mathematical notation of the growth rate of an algorithm’s time complexity. The most commonly used notations are O-notation (Big O), Ω-notation (Omega), and Θ-notation (Theta). Big O notation provides an upper bound of the complexity in the worst-case, giving an approximated maximum amount of time taken by an algorithm for any input. Omega notation provides a lower bound of the complexity in the best-case, whereas Theta notation defines a tight bound giving both the lower and upper bound. These notational systems allow for a comparison of the efficiency of algorithms without considering the effect of hardware or software related factors.

## `Big O Notation`

”Big O” notation, officially known as O-notation, is used in computer science to describe the performance or complexity of an algorithm. Specifically, it provides an upper bound on the time complexity, describing the worst-case scenario. Thus, it gives an upper limit on the time taken for an algorithm to complete based on the size of the input. The notation is expressed as O(f(n)), where f(n) is a function that measures the largest count of steps that an algorithm could possibly take to solve a problem of size n. For instance, O(n) denotes a linear relationship between the time taken and the input size, while O(1) signifies constant time complexity, i.e., the time taken is independent of input size. Remember, Big O notation is only an approximation meant to describe the scaling of the algorithm and not the exact time taken.

## `Big-θ Notation`

Big Theta (\Theta) notation is used in computer science to describe an asymptotic tight bound on a function. This essentially means it provides both an upper and lower bound for a function. When we say a function `f(n)` is `(\Theta(g(n)))`, we mean that the growth rate of `f(n)` is both bounded above and below by the function `g(n)` after a certain point. This is more precise than Big O and Big Omega notation, which provide only an upper and a lower bound, respectively. Big Theta notation tells us exactly how a function behaves for large input values. For example, if an algorithm has a time complexity of (\Theta(n^2)), it means the running time will increase quadratically with the input size.

## `Big-Ω Notation`

The Big Omega (Ω) notation is used in computer science to describe an algorithm’s lower bound. Essentially, it provides a worst-case analysis of an algorithm’s efficiency, giving us a lower limit of the performance. If we say a function `f(n)` is `Ω(g(n))`, it means that from a certain point onwards (n0 for some constant n0), the value of `g(n)` is a lower bound on `f(n)`. It implies that `f(n)` is at least as fast as `g(n)` past a certain threshold. This means that the algorithm won’t perform more efficiently than the Ω time complexity suggests.

<img src="O.gif" style="width: 900px">

[TOP](#algorithmic-complexity)
