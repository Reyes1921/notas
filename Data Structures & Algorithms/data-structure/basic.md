[Volver al Menú](./data-structure.md)

# `Basic Data Structures`

# `Array`

An Array is a linear data structure that holds elements of the same type, which means we can store only a specific type of elements in the array. It uses contiguous memory space to store elements. In an array, we can directly access any element based on its index which makes it an efficient data structure. Arrays have two types: one-dimensional and multi-dimensional. In a one-dimensional array, data is stored in a linear form while a multi-dimensional array can store data in the form of a matrix or in 3-D format.

```
let fruits = ["Apple", "Orange", "Plum"];
```

# `Linked Lists`

Linked Lists are a type of data structure used for storing collections of data. The data is stored in nodes, each of which contains a data field and a reference (link) to the next node in the sequence. Structurally, a linked list is organized into a sequence or chain of nodes, hence the name. Two types of linked lists are commonly used: singly linked lists, where each node points to the next node and the last node points to null, and doubly linked lists, where each node has two links, one to the previous node and another one to the next. Linked Lists are used in other types of data structures like stacks and queues.

```
const list = {
    head: {
        value: 6
        next: {
            value: 10
            next: {
                value: 12
                next: {
                    value: 3
                    next: null
                    }
                }
            }
        }
    }
};
```

## `An advantage of Linked Lists`

- Nodes can easily be removed or added from a linked list without reorganizing the entire data structure. This is one advantage it has over arrays.

## `Disadvantages of Linked Lists`

- Search operations are slow in linked lists. Unlike arrays, random access of data elements is not allowed. Nodes are accessed sequentially starting from the first node.
- It uses more memory than arrays because of the storage of the pointers.

## `Types of Linked Lists`

There are three types of linked lists:

- Singly Linked Lists: Each node contains only one pointer to the next node. This is what we have been talking about so far.
- Doubly Linked Lists: Each node contains two pointers, a pointer to the next node and a pointer to the previous node.
- Circular Linked Lists: Circular linked lists are a variation of a linked list in which the last node points to the first node or any other node before it, thereby forming a loop.

# `Example`

```
//Node
class ListNode {
    constructor(data) {
        this.data = data
        this.next = null
    }
}

//List
class LinkedList {
    constructor(head = null) {
        this.head = head
    }
}

//Initialazing nodes
let node1 = new ListNode(2)
let node2 = new ListNode(5)
node1.next = node2

//create a Linked list with the node1
let list = new LinkedList(node1)

//accesing
console.log(list.head.next.data) //returns 5
```

## `Some LinkedList methods`

```
size() {
    let count = 0;
    let node = this.head;
    while (node) {
        count++;
        node = node.next
    }
    return count;
}

clear() {
    this.head = null;
}

getLast() {
    let lastNode = this.head;
    if (lastNode) {
        while (lastNode.next) {
            lastNode = lastNode.next
        }
    }
    return lastNode
}

getFirst() {
    return this.head;
}
```

# `Stacks`

A `stack` is a linear data structure that follows a particular order in which the operations are performed. The order may be LIFO (Last In First Out) or FILO (First In Last Out). Mainly three basic operations are performed in the `stack`:

- Push: adds an element to the collection.

- Pop: removes an element from the collection. A pop can result in `stack` underflow if the `stack` is empty.

- Peek or Top: returns the top item without removing it from the `stack`.

The basic principle of `stack` operation is that in a `stack`, the element that is added last is the first one to come off, thus the name “Last in First Out”

# `Queues`

`Queues` are a type of data structure in which elements are held in a sequence and access is restricted to one end. Elements are added (“enqueued”) at the rear end and removed (“dequeued”) from the front. This makes `queues` a First-In, First-Out (FIFO) data structure. This type of organization is particularly useful for specific situations such as printing jobs, handling requests in a web server, scheduling tasks in a system, etc. Due to its FIFO property, once a new element is inserted into the queue, all elements that were inserted before the new element must be removed before the new element can be invoked. The fundamental operations associated with `queues` include Enqueue (insert), Dequeue (remove) and Peek (get the top element).

# `Hash Tables`

`Hash Tables` are specialized data structures that allow fast access to data based on a key. Essentially, a hash table works by taking a key input, and then computes an index into an array in which the desired value can be found. It uses a hash function to calculate this index. Suppose the elements are integers and the hash function returns the value at the unit’s place. If the given key is 22, it will check the value at index 2. Collisions occur when the hash function returns the same output for two different inputs. There are different methods to handle these collisions such as chaining and open addressing.

Hash Table is a data structure which stores data in an associative manner. In a hash table, data is stored in an array format, where each data value has its own unique index value. Access of data becomes very fast if we know the index of the desired data.

Thus, it becomes a data structure in which insertion and search operations are very fast irrespective of the size of the data. Hash Table uses an array as a storage medium and uses hash technique to generate an index where an element is to be inserted or is to be located from.

[TOP](#basic-data-structures)
