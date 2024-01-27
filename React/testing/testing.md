[Volver al Menú](../root.md)

# `Testing`

A key to building software that meets requirements without defects is testing. Software testing helps developers know they are building the right software. When tests are run as part of the development process (often with continuous integration tools), they build confidence and prevent regressions in the code.

`What is a Test Automation Pyramid?`

The Testing Pyramid is a framework that can help both developers and QAs create high-quality software. It reduces developers’ time to identify if a change they introduced breaks the code. It can also help build a more reliable test suite.

`The different levels of a Test Automation Pyramid`

This test automation pyramid or a testing pyramid operates through three levels:

- `Unit Tests`

Unit tests form the base of the test automation pyramid. They test individual components or functionalities to validate that it works as expected in isolated conditions. It is essential to run several scenarios in unit tests – happy path, error handling, etc.

    - Since this is the most significant subset, the unit test suite must be written to run as quickly as possible.
    - Remember that the number of unit tests will increase as more features are added.
    - This test suite must be run every time a new feature is added.
    - Consequently, developers receive immediate feedback on whether individual features are working as they are.

- `Integration Tests`

Unit tests verify small pieces of a codebase. However, integration tests need to be run to test how this code interacts with other code (that form the entire software). Essentially, these are tests that validate the interaction of a piece of code with external components. These components can range from databases to external services (APIs).

    - Integration tests are the second layer of the test automation pyramid. This means that it should not be run as frequently as unit tests.
    - Fundamentally, they test how a feature communicates with external dependencies.
    - Whether a call to a database or web service, the software must communicate effectively and retrieve the correct information to function as expected.

- `End-to-End Tests`

The top level of the testing pyramid is the end-to-end tests. These ensure that the entire application is functioning as required. End-to-end tests do precisely what the name suggests: test that the application works flawlessly from start to finish.

    - End-to-end tests are at the top of the testing pyramid as they take the longest to run.
    - When running these tests, it is essential to imagine the user’s perspective.
    - How would an actual user interaction with the app? How can tests be written to replicate that interaction?

# `Jest`

Jest is a delightful JavaScript Testing Framework with a focus on simplicity. It works with projects using: Babel, TypeScript, Node, React, Angular, Vue and more!

## `Install`

```
npm install --save-dev jest
```

`add this to the package JSON in the scrips section`

```
 "test": "jest --watchAll"
```

the `--watchAll` is for automatic the process

create a file with this extension example`.test.js` with this structure

```
test('adds 1 + 2 to equal 3', () => {
 
});
```

run it with npm in this case

```
npm run test
```

for hints 

```
npm install --save-dev @types/jest
```

a optional title

```
describe ('Pruebas', ()=>{
    test('adds 1 + 2 to equal 3', () => {
 
    });
})
```

## `expect`

When you're writing tests, you often need to check that values meet certain conditions. expect gives you access to a number of "matchers" that let you validate different things.

```
test('two plus two is four', () => {
  expect(2 + 2).toBe(4);
});
```

## `Common Matchers`

Jest uses "matchers" to let you test values in different ways

- `toBe` uses Object.is to test exact equality. If you want to check the value of an object, use toEqual:

- `toEqual` recursively checks every field of an object or array.

- `not` You can also test for the opposite of a matcher using `not`:

```
test('adding positive numbers is not zero', () => {
  for (let a = 1; a < 10; a++) {
    for (let b = 1; b < 10; b++) {
      expect(a + b).not.toBe(0);
    }
  }
});
```
### `Truthiness`

- `toBeNull` matches only null
- `toBeUndefined` matches only undefined
- `toBeDefined` is the opposite of toBeUndefined
- `toBeTruthy` matches anything that an if statement treats as true
- `toBeFalsy` matches anything that an if statement treats as false

### `Numbers`

- `toBeGreaterThan`
- `toBeGreaterThanOrEqual`
- `toBeLessThan`
- `toBeLessThanOrEqual`

For floating point equality, use `toBeCloseTo` instead of `toEqual`, because you don't want a test to depend on a tiny rounding error.

### `Strings`

You can check strings against regular expressions with toMatch

- `toMatch`

```
test('there is no I in team', () => {
  expect('team').not.toMatch(/I/);
});

test('but there is a "stop" in Christoph', () => {
  expect('Christoph').toMatch(/stop/);
});
```

### `Arrays and iterables`

- `toContain`

```
const shoppingList = [
  'diapers',
  'kleenex',
  'trash bags',
  'paper towels',
  'milk',
];

test('the shopping list has milk on it', () => {
  expect(shoppingList).toContain('milk');
  expect(new Set(shoppingList)).toContain('milk');
});
```

### `Exceptions`

If you want to test whether a particular function throws an error when it's called, use `toThrow`.

```
function compileAndroidCode() {
  throw new Error('you are using the wrong JDK!');
}

test('compiling android goes as expected', () => {
  expect(() => compileAndroidCode()).toThrow();
  expect(() => compileAndroidCode()).toThrow(Error);

  // You can also use a string that must be contained in the error message or a regexp
  expect(() => compileAndroidCode()).toThrow('you are using the wrong JDK');
  expect(() => compileAndroidCode()).toThrow(/JDK/);

  // Or you can match an exact error message using a regexp like below
  expect(() => compileAndroidCode()).toThrow(/^you are using the wrong JDK$/); // Test fails
  expect(() => compileAndroidCode()).toThrow(/^you are using the wrong JDK!$/); // Test pass
});
```

### `More`

- `toHaveBeenCalled()`

Also under the alias: .toBeCalled()

- `toHaveBeenCalledTimes(number)`

Also under the alias: .toBeCalledTimes(number)

Use .`toHaveBeenCalledTimes` to ensure that a mock function got called exact number of times.

- `toHaveBeenCalledWith(arg1, arg2, ...)`

Use .`toHaveBeenCalledWith` to ensure that a mock function was called with specific arguments. The arguments are checked with the same algorithm that .`toEqual` uses.

- ``

- ``

- ``

- ``

- ``

## `Assertion Count`

`expect.assertions(number)` verifies that a certain number of assertions are called during a test. This is often useful when testing asynchronous code, in order to make sure that assertions in a callback actually got called.

For example, let's say that we have a function doAsync that receives two callbacks callback1 and callback2, it will asynchronously call both of them in an unknown order. We can test this with:

```
test('doAsync calls both callbacks', () => {
  expect.assertions(2);
  function callback1(data) {
    expect(data).toBeTruthy();
  }
  function callback2(data) {
    expect(data).toBeTruthy();
  }

  doAsync(callback1, callback2);
});
```

## `Testing Asynchronous Code`

It's common in JavaScript for code to run asynchronously. When you have code that runs asynchronously, Jest needs to know when the code it is testing has completed, before it can move on to another test. Jest has several ways to handle this.

### `Promises`

```
test('the data is peanut butter', () => {
  return fetchData().then(data => {
    expect(data).toBe('peanut butter');
  });
});
```

### `Async/Await`

```
test('the data is peanut butter', async () => {
  const data = await fetchData();
  expect(data).toBe('peanut butter');
});

test('the fetch fails with an error', async () => {
  expect.assertions(1);
  try {
    await fetchData();
  } catch (error) {
    expect(error).toMatch('error');
  }
});
```

### `Callbacks`

```
// Don't do this!
test('the data is peanut butter', () => {
  function callback(error, data) {
    if (error) {
      throw error;
    }
    expect(data).toBe('peanut butter');
  }

  fetchData(callback);
});
```

The problem is that the test will complete as soon as fetchData completes, before ever calling the callback.

There is an alternate form of test that fixes this. Instead of putting the test in a function with an empty argument, use a single argument called done. Jest will wait until the done callback is called before finishing the test.

```
test('the data is peanut butter', done => {
  function callback(error, data) {
    if (error) {
      done(error);
      return;
    }
    try {
      expect(data).toBe('peanut butter');
      done();
    } catch (error) {
      done(error);
    }
  }

  fetchData(callback);
});
```

### `.resolves / .rejects`

You can also use the .resolves matcher in your expect statement, and Jest will wait for that promise to resolve. If the promise is rejected, the test will automatically fail.

```
test('the data is peanut butter', () => {
  return expect(fetchData()).resolves.toBe('peanut butter');
});
```

If you expect a promise to be rejected, use the .rejects matcher. It works analogically to the .resolves matcher. If the promise is fulfilled, the test will automatically fail.

```
test('the fetch fails with an error', () => {
  return expect(fetchData()).rejects.toMatch('error');
});
```

## `Snapshot Testing`

Snapshot tests are a very useful tool whenever you want to make sure your UI does not change unexpectedly.

A typical snapshot test case renders a UI component, takes a snapshot, then compares it to a reference snapshot file stored alongside the test. The test will fail if the two snapshots do not match: either the change is unexpected, or the reference snapshot needs to be updated to the new version of the UI component.


```
import renderer from 'react-test-renderer';
import Link from '../Link';

it('renders correctly', () => {
  const tree = renderer
    .create(<Link page="http://www.facebook.com">Facebook</Link>)
    .toJSON();
  expect(tree).toMatchSnapshot();
});
```

The first time this test is run, Jest creates a snapshot file that looks like this:

```
exports[`renders correctly 1`] = `
<a
  className="normal"
  href="http://www.facebook.com"
  onMouseEnter={[Function]}
  onMouseLeave={[Function]}
>
  Facebook
</a>
`;
```

## `Mock Functions`

Mock functions allow you to test the links between code by erasing the actual implementation of a function, capturing calls to the function (and the parameters passed in those calls), capturing instances of constructor functions when instantiated with new, and allowing test-time configuration of return values.

There are two ways to mock functions: Either by creating a mock function to use in test code, or writing a manual mock to override a module dependency.

`jest.fn();`

```
    test('no debe de llamar onNewCategory si el input esta vacio', () => {

        const onNewCategory = jest.fn();
        render(<AddCategory onNewCategory={onNewCategory} />);

        const form = screen.getByRole('form');
        fireEvent.submit(form);

        expect(onNewCategory).toHaveBeenCalledTimes(0);
    })
```

### `Mock Return Values`

Mock functions can also be used to inject test values into your code during a test:

```
const myMock = jest.fn();
console.log(myMock());
// > undefined

myMock.mockReturnValueOnce(10).mockReturnValueOnce('x').mockReturnValue(true);

console.log(myMock(), myMock(), myMock(), myMock());
// > 10, 'x', true, true
```


# `React Testing Library`

React Testing Library builds on top of DOM Testing Library by adding APIs for working with React components.

## `Install`

```
npm install --save-dev @testing-library/react
```

## `Render`

- The render function in React Testing Library is used to virtually render React components in the testing environment .
- It takes any JSX as an argument to render it as output, providing access to the React component in the test .
- After rendering the component, you can use the screen.debug() function to view the virtually rendered DOM, allowing you to inspect the HTML output of the component .
- The render function is essential for preparing the component for testing and gaining access to its rendered output for further assertions and testing .

## `Screen`

- The screen object from React Testing Library provides methods for querying the rendered elements of the DOM in order to make assertions about their text content, attributes, and more .
- It is a query interface that allows you to select DOM elements and make assertions about their presence, content, and attributes .
- The benefit of using screen is that you no longer need to keep the render call destructure up-to-date as you add/remove the queries you need. You only need to type screen. and let your editor's autocomplete take care of the rest  .

```
import {render, screen} from '@testing-library/react' // (or /dom, /vue, ...)

test('should show login form', () => {
  render(<Login />)
  const input = screen.getByLabelText('Username')
  // Events and assertions...
})
```

## `Queries`

`Difference from DOM Testing Library`

The queries returned from render in React Testing Library are the same as DOM Testing Library except they have the first argument bound to the document, so instead of getByText(node, 'text') you do getByText('text')

<table><thead><tr><th></th><th>No Match</th><th>1 Match</th><th>1+ Match</th><th>Await?</th></tr></thead><tbody><tr><td><strong>getBy</strong></td><td>throw</td><td>return</td><td>throw</td><td>No</td></tr><tr><td><strong>findBy</strong></td><td>throw</td><td>return</td><td>throw</td><td>Yes</td></tr><tr><td><strong>queryBy</strong></td><td>null</td><td>return</td><td>throw</td><td>No</td></tr><tr><td><strong>getAllBy</strong></td><td>throw</td><td>array</td><td>array</td><td>No</td></tr><tr><td><strong>findAllBy</strong></td><td>throw</td><td>array</td><td>array</td><td>Yes</td></tr><tr><td><strong>queryAllBy</strong></td><td>[]</td><td>array</td><td>array</td><td>No</td></tr></tbody></table>

<ul class=""><li><strong>ByLabelText</strong> find by label or aria-label text content<ul class=""><li>getByLabelText</li><li>queryByLabelText</li><li>getAllByLabelText</li><li>queryAllByLabelText</li><li>findByLabelText</li><li>findAllByLabelText</li></ul></li><li><strong>ByPlaceholderText</strong> find by input placeholder value<ul class=""><li>getByPlaceholderText</li><li>queryByPlaceholderText</li><li>getAllByPlaceholderText</li><li>queryAllByPlaceholderText</li><li>findByPlaceholderText</li><li>findAllByPlaceholderText</li></ul></li><li><strong>ByText</strong> find by element text content<ul class=""><li>getByText</li><li>queryByText</li><li>getAllByText</li><li>queryAllByText</li><li>findByText</li><li>findAllByText</li></ul></li><li><strong>ByDisplayValue</strong> find by form element current value<ul class=""><li>getByDisplayValue</li><li>queryByDisplayValue</li><li>getAllByDisplayValue</li><li>queryAllByDisplayValue</li><li>findByDisplayValue</li><li>findAllByDisplayValue</li></ul></li><li><strong>ByAltText</strong> find by img alt attribute<ul class=""><li>getByAltText</li><li>queryByAltText</li><li>getAllByAltText</li><li>queryAllByAltText</li><li>findByAltText</li><li>findAllByAltText</li></ul></li><li><strong>ByTitle</strong> find by title attribute or svg title tag<ul class=""><li>getByTitle</li><li>queryByTitle</li><li>getAllByTitle</li><li>queryAllByTitle</li><li>findByTitle</li><li>findAllByTitle</li></ul></li><li><strong>ByRole</strong> find by aria role<ul class=""><li>getByRole</li><li>queryByRole</li><li>getAllByRole</li><li>queryAllByRole</li><li>findByRole</li><li>findAllByRole</li></ul></li><li><strong>ByTestId</strong> find by data-testid attribute<ul class=""><li>getByTestId</li><li>queryByTestId</li><li>getAllByTestId</li><li>queryAllByTestId</li><li>findByTestId</li><li>findAllByTestId</li></ul></li></ul>


### `waitFor`

When in need to wait for any period of time you can use waitFor, to wait for your expectations to pass. Returning a falsy condition is not sufficient to trigger a retry, the callback must throw an error in order to retry the condition.

```
     test('debe de retornar un arreglo de imagenes y isLoading en false', async() => { 
        
        const { result } =  renderHook( ()=> useFetchGifs('One Punch'));
        
        await waitFor(
            ()=> expect(result.current.images.length).toBeGreaterThan(0),
        );

        const {images, isLoading} = result.current;

         expect( images.length).toBeGreaterThan(0);
         expect(isLoading).toBeFalsy();
 
      })
```

### `renderHook`

```
function renderHook(callback: (props?: any) => any, options?: RenderHookOptions): RenderHookResult
```

Renders a test component that will call the provided callback, including any hooks it calls, every time it renders.

The renderHook function returns an object that has the following properties:

```
result
{
  all: Array<any>
  current: any,
  error: Error
}
```

### `act`

This is a light wrapper around the react-dom/test-utils act function. All it does is forward all arguments to the act function if your version of react supports act

[TOP](#testing)