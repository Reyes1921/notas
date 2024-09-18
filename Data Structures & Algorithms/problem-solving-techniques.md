[Volver al Menú](./root.md)

# `Problem Solving Techniques`

“Problem Solving Techniques” is a topic that explore various methods used to solve problems in computing and mathematics. They are approaches and procedures that help in the systematic identification and resolution of complex issues. Some of these techniques include “Divide and Conquer” where a problem is split into subproblems to make it easier to solve, “Dynamic Programming” which solves problems by dividing them into smaller similar sub-problems and storing the solutions of these subproblems to avoid unnecessary calculations, “Greedy Algorithms” which make the globally optimal choice at each step, “Backtracking” is used when problem can be solved incrementally, “Branch and Bound” method is used for optimization problems. These techniques are designed to efficiently solve problems by significantly reducing the time and computational effort required.

# `Brute Force`

`”Brute Force”` is a straightforward method to solve problems. It involves trying every possible solution until the right one is found. This technique does not require any specific skills or knowledge and the approach is directly applied to the problem at hand. However, while it can be effective, it is not always efficient since it often requires a significant amount of time and resources to go through all potential solutions. In terms of computational problems, a brute force algorithm examines all possibilities one by one until a satisfactory solution is found. With growing complexity, the processing time of brute force solutions dramatically increases leading to combinatorial explosion. Brute force is a base for complex problem-solving algorithms which improve the time and space complexity by adding heuristics or rules of thumb.

# `Greedy Algorithms`

Greedy algorithms follow the problem-solving heuristic of making the locally optimal choice at each stage with the hope of finding a global optimum. They are used for optimization problems. An optimal solution is one where the value of the solution is either maximum or minimum. These algorithms work in a ” greedy” manner by choosing the best option at the current, disregarding any implications on the future steps. This can lead to solutions that are less optimal. Examples of problems solved by greedy algorithms are Kruskal’s minimal spanning tree algorithm, Dijkstra’s shortest path algorithm, and the Knapsack problem.

# `Divide and Conquer`

Divide and conquer is a powerful algorithm design technique that solves a problem by breaking it down into smaller and easier-to-manage sub-problems, until these become simple enough to be solved directly. This approach is usually carried out recursively for most problems. Once all the sub-problems are solved, the solutions are combined to give a solution to the original problem. It is a common strategy that significantly reduces the complexity of the problem.

# `Dynamic Programming`

Dynamic Programming is a powerful problem-solving method that solves complex problems by breaking them down into simpler subproblems and solving each subproblem only once, storing their results using a memory-based data structure (like an array or a dictionary). The principle of dynamic programming is based on Bellman’s Principle of Optimality which provides a method to solve optimization problems. In practical terms, this approach avoids repetitive computations by storing the results of expensive function calls. This technique is widely used in optimization problems where the same subproblem may occur multiple times. Dynamic Programming is used in numerous fields including mathematics, economics, and computer science.

# `Backtracking`

Backtracking is a powerful algorithmic technique that aims to solve a problem incrementally, by trying out an various sequences of decisions. If at any point it realizes that its current path will not lead to a solution, it reverses or “backtracks” the most recent decision and tries the next available route. Backtracking is often applied in problems where the solution requires the sequence of decisions to meet certain constraints, like the 8-queens puzzle or the traveling salesperson problem. In essence, it involves exhaustive search and thus, can be computationally expensive. However, with the right sorts of constraints, it can sometimes find solutions to problems with large and complex spaces very efficiently.

# `Randomised Algorithms`

Randomised algorithms are a type of algorithm that employs a degree of randomness as part of the logic of the algorithm. These algorithms use random numbers to make decisions, and thus, even for the same input, can produce different outcomes on different executions. The correctness of these algorithms are probabilistic and they are particularly useful when dealing with a large input space. There are two major types of randomised algorithms: Las Vegas algorithms, which always give the correct answer, but their running time is a random variable; and Monté Carlo algorithms, where the algorithm has a small probability of viability or accuracy.

# `Recursion`

Recursion is a method where the solution to a problem depends on solutions to shorter instances of the same problem. It involves a function calling itself while having a condition for its termination. This technique is mostly used in programming languages like C++, Java, Python, etc. There are two main components in a recursive function: the base case (termination condition) and the recursive case, where the function repeatedly calls itself. All recursive algorithms must have a base case to prevent infinite loops. Recursion can be direct (if a function calls itself) or indirect (if the function A calls another function B, which calls the first function A).

# `Two Pointer Technique`

The two-pointer technique is a strategy that can be used to solve certain types of problems, particularly those that involve arrays or linked lists. This technique primarily involves using two pointers, which navigate through the data structure in various ways, depending on the nature of the problem. The pointers could traverse the array from opposite ends, or one could be moving faster than the other - often referred to as the slow and fast pointer method. This technique can greatly optimize performance by reducing time complexity, often enabling solutions to achieve `O(n)` time complexity.

# `Sliding Window Technique`

The Sliding Window Technique is an algorithmic paradigm that manages a subset of items in a collection of objects, like an array or list, by maintaining a range of elements observed, which is referred to as the ‘window’. The window ‘slides’ over the data to examine different subsets of its contents. This technique is often used in array-related coding problems and is particularly useful for problems that ask for maximums or minimums over a specific range within the dataset. This technique can help to greatly reduce the time complexity when dealing with problems revolving around sequential or contiguous data. Common examples of its application are in solving problems like maximum sum subarray or minimum size subsequence with a given sum.

[TOP](#problem-solving-techniques)
