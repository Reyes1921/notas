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

# `React Testting Library`

[TOP](#testing)