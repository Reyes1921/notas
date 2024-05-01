[Volver al Menú](./root.md)

# `Search Algorithms`

Search algorithms are techniques used for finding a specific item or group of items among a collection of data. They operate by checking each element in the dataset in order to locate the target selection. The primary types of search algorithms are linear search, binary search, depth-first search, and breadth-first search. Linear search scans each element in sequence, while binary search operates by splitting the dataset in half repeatedly until finding the desired element. Depth-first and breadth-first searches are both used with more intricate data structures like trees and graphs. The former explores the depth of a branch before the breadth, while the latter explores all neighboring nodes before proceeding to the nodes at the next level depth.

# `Linear Search`

`Linear search` is one of the simplest search algorithms. In this method, every element in an array is checked sequentially starting from the first until a match is found or all elements have been checked. It is also known as sequential search. It works on both sorted and unsorted lists, and does not need any preconditioned list for the operation. However, its efficiency is lesser as compared to other search algorithms since it checks all elements one by one. Time complexity of `O(n²)`

# `Binary Search`

`Binary Search` is a type of search algorithm that follows the divide and conquer strategy. It works on a sorted array by repeatedly dividing the search interval in half. Initially, the search space is the entire array and the target is compared with the middle element of the array. If they are not equal, the half in which the target cannot lie is eliminated and the search continues on the remaining half, again taking the middle element to compare to the target, and repeating this until the target is found. If the search ends with the remaining half being empty, the target is not in the array. `Binary Search` is `log(n)` as it cuts down the search space by half each step.

[TOP](#search-algorithms)
