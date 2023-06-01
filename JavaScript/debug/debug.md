[Volver al Menú](../root.md)

# `Using Chrome Dev Tools`

[More General Info](https://www.freecodecamp.org/news/mastering-chrome-developer-tools-next-level-front-end-development-techniques-3ac0b6fe8a3/)

## `Shortcuts`

`ctrl + shift + i`: Abrir o cerrar la consola

# `Debugging issues`

## `Step 1: Reproduce the bug`

## `Step 2: Get familiar with the Sources panel UI`

<img src="debug.avif">

## `Step 3: Pause the code with a breakpoint`

A common method for debugging a problem like this is to insert a lot of `console.log()` statements into the code, in order to inspect values as the script executes. For example:

```
function updateLabel() {
  var addend1 = getNumber1();
  console.log('addend1:', addend1);
  var addend2 = getNumber2();
  console.log('addend2:', addend2);
  var sum = addend1 + addend2;
  console.log('sum:', sum);
  label.textContent = addend1 + ' + ' + addend2 + ' = ' + sum;
}
```

The `console.log()` method may get the job done, but breakpoints can get it done faster. A breakpoint lets you pause your code in the middle of its execution, and examine all values at that moment in time. Breakpoints have a few advantages over the `console.log()` method:

With `console.log()`, you need to manually open the source code, find the relevant code, insert the `console.log()` statements, and then reload the page in order to see the messages in the Console. With breakpoints, you can pause on the relevant code without even knowing how the code is structured.
In your `console.log()` statements you need to explicitly specify each value that you want to inspect. With breakpoints, DevTools shows you the values of all variables at that moment in time. Sometimes there are variables affecting your code that you're not even aware of.
In short, breakpoints can help you find and fix bugs faster than the `console.log()` method.

## `Step 4: Step through the code`

One common cause of bugs is when a script executes in the wrong order. Stepping through your code enables you to walk through your code's execution, one line at a time, and figure out exactly where it's executing in a different order than you expected. Try it now:

- On the Sources panel of DevTools, click Step into next function call Step into next function call to step through the execution of the `onClick()` function, one line at a time. DevTools highlights the following line of code: `if (inputsAreEmpty()) {`

- Click Step over next function call Step over next function call.. DevTools executes `inputsAreEmpty()` without stepping into it. Notice how DevTools skips a few lines of code. This is because `inputsAreEmpty()` evaluated to false, so the if statement's block of code didn't execute.

That's the basic idea of stepping through code. If you look at the code in get-started.js, you can see that the bug is probably somewhere in the `updateLabel()` function. Rather than stepping through every line of code, you can use another type of breakpoint to pause the code closer to the probable location of the bug.

## `Step 5: Set a line-of-code breakpoint`

Line-of-code breakpoints are the most common type of breakpoint. When you've got a specific line of code that you want to pause on, use a line-of-code breakpoint:

- Look at the last line of code in updateLabel():

`label.textContent = addend1 + ' + ' + addend2 + ' = ' + sum;`

- To the left of the code you can see the line number of this particular line of code, which is 32. Click on 32. DevTools puts a blue icon on top of 32. This means that there is a line-of-code breakpoint on this line. DevTools now always pauses before this line of code is executed.

- Click Resume script execution Resume Script Execution. The script continues executing until it reaches line 32. On lines 29, 30, and 31, DevTools shows the values of addend1, addend2, and sum inline next to their declarations.

<img src="debug2.avif">

## `Step 6: Check variable values`

The values of `addend1`, `addend2`, and `sum` look suspicious. They're wrapped in quotes, which means that they're strings. This is a good hypothesis for the explaining the cause of the bug. Now it's time to gather more information. DevTools provides a lot of tools for examining variable values.

### `#Method 1: The Scope pane`

When you're paused on a line of code, the `Scope` pane shows you what local and global variables are currently defined, along with the value of each variable. It also shows closure variables, when applicable. Double-click a variable value to edit it. When you're not paused on a line of code, the `Scope` pane is empty.

<img src="debug3.avif">

### `Method 2: Watch Expressions`

The Watch Expressions tab lets you monitor the values of variables over time. As the name implies, Watch Expressions aren't just limited to variables. You can store any valid JavaScript expression in a Watch Expression. Try it now:

- Click the Watch tab.

- Click Add Expression Add Expression.

- Type typeof sum.

- Press Enter. DevTools shows typeof sum: "string". The value to the right of the colon is the result of your Watch Expression.

<img src="debug4.avif">

The screenshot above shows the Watch Expression pane (bottom-right) after creating the typeof sum watch expression. If your DevTools window is large, the Watch Expression pane is on the right, above the Event Listener Breakpoints pane.

As suspected, sum is being evaluated as a string, when it should be a number. You've now confirmed that this is the cause of the bug.

### `Method 3: The Console`

In addition to viewing console.log() messages, you can also use the Console to evaluate arbitrary JavaScript statements. In terms of debugging, you can use the Console to test out potential fixes for bugs. Try it now:

- If you don't have the Console drawer open, press Escape to open it. It opens at the bottom of your DevTools window.

- In the Console, type parseInt(addend1) + parseInt(addend2). This statement works because you are paused on a line of code where addend1 and addend2 are in scope.

- Press Enter. DevTools evaluates the statement and prints out 6, which is the result you expect the demo to produce.

<img src="debug5.avif">

### `Step 7: Apply a fix`

You've found a fix for the bug. All that's left is to try out your fix by editing the code and re-running the demo. You don't need to leave DevTools to apply the fix. You can edit JavaScript code directly within the DevTools UI. Try it now:

- Click Resume script execution Resume Script Execution.

- In the Code Editor, replace line 31, var sum = addend1 + addend2, with var sum = parseInt(addend1) + parseInt(addend2).

- Press Command + S (Mac) or Control + S (Windows, Linux) to save your change.

- Click Deactivate breakpoints Deactivate breakpoints. Its color changes to blue to indicate that it's active. While this is set, DevTools ignores any breakpoints you've set.

- Try out the demo with different values. The demo now calculates correctly.

# `Debugging Memory Leaks`

[More General Info](https://medium.com/coding-blocks/catching-memory-leaks-with-chrome-devtools-57b03acb6bb9)

# `Debugging performance`

Enter the dev tools and check out the `Lighthouse` tab. This is essentially a series of tests which analyses the currently open website on a bunch of metrics related to `performance`, `page speed`, `accessibility`, etc. Feel free to run the tests by clicking the Analyse Page Load button (you might want to do this in an incognito tab to avoid errors arising from extensions you’re using). Once you have the results, take your time and read through them (and do click through to the reference pages mentioned alongside each test result to know more about it!)


[TOP](#shortcuts)