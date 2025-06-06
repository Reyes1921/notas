[Volver al Menú](./root.md)

# `Sorting Algorithms`

Sorting algorithms are used to rearrange a given array or list elements according to a comparison operator on the elements. The comparison operator is used to decide the new order of element in the respective data structure. For example, the numerical order is a commonly used sequence but a lexicographical order is also a commonly used sequence type. There are several types of sorting algorithms: `quick sort`, `bubble sort`, `merge sort`, `insertion sort`, `selection sort`, `heap sort`, `radix sort`, `bucket sort` among others. Each has its own properties and are suited to specific types of tasks and data.

# `Bubble Sort`

`Bubble Sort` is a simple sorting algorithm that works by repeatedly swapping the adjacent elements if they are in the wrong order. It gets its name because with each iteration the largest element “bubbles” up to its proper location. It continues this process of swapping until the entire list is sorted in ascending order. The main steps of the algorithm are: starting from the beginning of the list, compare every pair of adjacent items and swap them if they are in the wrong order, and then pass through the list until no more swaps are needed. However, despite being simple, `Bubble Sort` is not suited for large datasets as it has a worst-case and average time complexity of `O(n²)`, where n is the number of items being sorted.

# `Merge Sort`

`Merge sort` is a type of sorting algorithm that follows the divide-and-conquer paradigm. It was invented by John von Neumann in 1945. This algorithm works by dividing an unsorted list into n partitions, each containing one element (a list of one element is considered sorted), then repeatedly merging partitions to produce new sorted lists until there is only 1 sorted list remaining. This resulting list is the fully sorted list. The process of dividing the list is done recursively until it hits the base case of a list with one item. `Merge sort` has a time complexity of `O(n log n)` for all cases (best, average and worst), which makes it highly efficient for large data sets.

# `Insertion Sort`

`Insertion sort` is a simple sorting algorithm that builds the final sorted array (or list) one item at a time. It’s much less efficient on large lists than more advanced algorithms like quicksort, heapsort, or merge sort. Still, it provides several advantages such as it’s easy to understand the algorithm, it performs well with small lists or lists that are already partially sorted and it can sort the list as it receives it. The algorithm iterates, consuming one input element each repetition and growing a sorted output list. At each iteration, it removes one element from the input data, finds the location it belongs within the sorted list and inserts it there. It repeats until no input elements remain. Has a time complexity of `O(n) O(n²)`

# `Selection Sort`

`Selection Sort` is a simple and intuitive sorting algorithm. It works by dividing the array into two parts - sorted and unsorted. Initially, the sorted part is empty and the unsorted part contains all the elements. The algorithm repeatedly selects the smallest (or largest, if sorting in descending order) element from the unsorted part and moves that to the end of the sorted part. The process continues until the unsorted part becomes empty and the sorted part contains all the elements. `Selection sort` is not efficient on large lists, as its time complexity is `O(n²)` where n is the number of items.

# `Quick Sort`

`Quicksort`, also known as partition-exchange sort, is an efficient, in-place sorting algorithm, which uses divide and conquer principles. It was developed by Tony Hoare in 1959. It operates by selecting a `‘pivot’` element from the array and partitioning the other elements into two sub-arrays, according to whether they are less than or greater than the pivot. The sub-arrays are then recursively sorted. This process continues until the base case is achieved, which is when the array or sub-array has zero or one element, hence is already sorted. `Quicksort` can have worst-case performance of `O(n^2)` if the pivot is the smallest or the largest element in the array, although this scenario is rare if the pivot is chosen randomly. The average case time complexity is `O(n log n)`.

# `Heap Sort`

`Heap Sort` is an efficient, comparison-based sorting algorithm. It utilizes a datastructure known as a ‘binary heap’, and works by dividing its input into a sorted and an unsorted region, and iteratively shrinking the unsorted region by extracting the largest element and moving that to the sorted region. It’s an in-place algorithm but not a stable sort. It involves building a Max-Heap, which is a specialized tree-based data structure, and then swapping the root node (maximum element) with the last node, reducing the size of heap by one and heapifying the root node. The maximum element is now at the end of the list and this step is repeated until all nodes are sorted. `Heap Sort` offers a good worst-case runtime of `O(n log n)`, irrespective of the input data.

[TOP](#sorting-algorithms)
