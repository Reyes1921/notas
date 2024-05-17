[Volver al Menú](styling.md)

# `Tailwind CSS`

CSS Framework that provides atomic CSS classes to help you style components e.g. flex, pt-4, text-center and rotate-90 that can be composed to build any design, directly in your markup

Tailwind CSS works by scanning all of your HTML files, JavaScript components, and any other templates for class names, generating the corresponding styles and then writing them to a static CSS file.

# `Installation`

---

Install tailwindcss via npm, and create your `tailwind.config.js` file.

```
npm install -D tailwindcss
npx tailwindcss init
```

Add the paths to all of your template files in your `tailwind.config.js` file.

```
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}"],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

Add the @tailwind directives for each of Tailwind’s layers to your main CSS file.

```
@tailwind base;
@tailwind components;
@tailwind utilities;
```

Run the CLI tool to scan your template files for classes and build your CSS.

```
npx tailwindcss -i ./src/input.css -o ./src/output.css --watch
```

Add your compiled CSS file to the `<head>` and start using Tailwind’s utility classes to style your content.

```
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./output.css" rel="stylesheet">
</head>
<body>
  <h1 class="text-3xl font-bold underline">
    Hello world!
  </h1>
</body>
</html>
```

# `Handling Hover, Focus, and Other States`

---

- `Pseudo-classes`, like :`hover`, :`focus`, :`first-child`, and :`required`
- `Pseudo-elements`, like ::`before`, ::`after`, ::`placeholder`, and ::`selection`
- `Media and feature queries`, like responsive breakpoints, dark mode, and prefers-reduced-motion
- `Attribute selectors`, like `[dir="rtl"]` and `[open]`

```
<button class="bg-sky-500 hover:bg-sky-700 ...">
  Save changes
</button>
```

```
<button class="bg-violet-500 hover:bg-violet-600 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300 ...">
  Save changes
</button>
```

## `First, last, odd, and even`

Style an element when it is the `first-child` or `last-child` using the first and last modifiers:

```
<ul role="list" class="p-6 divide-y divide-slate-200">
  {#each people as person}
    <!-- Remove top/bottom padding when first/last child -->
    <li class="flex py-4 first:pt-0 last:pb-0">
      <img class="h-10 w-10 rounded-full" src="{person.imageUrl}" alt="" />
      <div class="ml-3 overflow-hidden">
        <p class="text-sm font-medium text-slate-900">{person.name}</p>
        <p class="text-sm text-slate-500 truncate">{person.email}</p>
      </div>
    </li>
  {/each}
</ul>
```

```
<table>
  <!-- ... -->
  <tbody>
    {#each people as person}
      <!-- Use a white background for odd rows, and slate-50 for even rows -->
      <tr class="odd:bg-white even:bg-slate-50">
        <td>{person.name}</td>
        <td>{person.title}</td>
        <td>{person.email}</td>
      </tr>
    {/each}
  </tbody>
</table>
```

## `Form states`

Style form elements in different states using modifiers like `required`, `invalid`, and `disabled`:

```
<form>
  <label class="block">
    <span class="block text-sm font-medium text-slate-700">Username</span>
    <!-- Using form state modifiers, the classes can be identical for every input -->
    <input type="text" value="tbone" disabled class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
      focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
      disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
      invalid:border-pink-500 invalid:text-pink-600
      focus:invalid:border-pink-500 focus:invalid:ring-pink-500
    "/>
  </label>
  <!-- ... -->
</form>
```

## `Before and after`

Style the `::before` and `::after` pseudo-elements using the before and after modifiers:

```
<label class="block">
  <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">
    Email
  </span>
  <input type="email" name="email" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="you@example.com" />
</label>
```

## `Prefers color scheme`

The prefers-color-scheme media query tells you whether the user prefers a light theme or dark theme, and is usually configured at the operating system level.

```
<div class="bg-white dark:bg-slate-900 rounded-lg px-6 py-8 ring-1 ring-slate-900/5 shadow-xl">
  <div>
    <span class="inline-flex items-center justify-center p-2 bg-indigo-500 rounded-md shadow-lg">
      <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><!-- ... --></svg>
    </span>
  </div>
  <h3 class="text-slate-900 dark:text-white mt-5 text-base font-medium tracking-tight">Writes Upside-Down</h3>
  <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">
    The Zero Gravity Pen can be used to write in any orientation, including upside-down. It even works in outer space.
  </p>
</div>
```

# `Responsive Design`

---

Every utility class in Tailwind can be applied conditionally at different breakpoints, which makes it a piece of cake to build complex responsive interfaces without ever leaving your HTML.

<table><thead><tr><th>Breakpoint prefix</th><th>Minimum width</th><th>CSS</th></tr></thead><tbody><tr><td><code>sm</code></td><td>640px</td><td><code>@media (min-width: 640px) { ... }</code></td></tr><tr><td><code>md</code></td><td>768px</td><td><code>@media (min-width: 768px) { ... }</code></td></tr><tr><td><code>lg</code></td><td>1024px</td><td><code>@media (min-width: 1024px) { ... }</code></td></tr><tr><td><code>xl</code></td><td>1280px</td><td><code>@media (min-width: 1280px) { ... }</code></td></tr><tr><td><code>2xl</code></td><td>1536px</td><td><code>@media (min-width: 1536px) { ... }</code></td></tr></tbody></table>

## `Working mobile-first`

By default, Tailwind uses a mobile-first breakpoint system, similar to what you might be used to in other frameworks like Bootstrap.

What this means is that unprefixed utilities (like uppercase) take effect on all screen sizes, while prefixed utilities (like md:uppercase) only take effect at the specified breakpoint and above.

## `Targeting mobile screens`

Where this approach surprises people most often is that to style something for mobile, you need to use the unprefixed version of a utility, not the sm: prefixed version. Don’t think of sm: as meaning “on small screens”, think of it as “at the small breakpoint“.

<h3 style="color: red">Don’t use sm: to target mobile devices</h3>

# `Configuration`

---

By default, Tailwind will look for an optional tailwind.config.js file at the root of your project where you can define any customizations.

```
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./src/**/*.{html,js}'],
  theme: {
    colors: {
      'blue': '#1fb6ff',
      'purple': '#7e5bef',
      'pink': '#ff49db',
      'orange': '#ff7849',
      'green': '#13ce66',
      'yellow': '#ffc82c',
      'gray-dark': '#273444',
      'gray': '#8492a6',
      'gray-light': '#d3dce6',
    },
    fontFamily: {
      sans: ['Graphik', 'sans-serif'],
      serif: ['Merriweather', 'serif'],
    },
    extend: {
      spacing: {
        '8xl': '96rem',
        '9xl': '128rem',
      },
      borderRadius: {
        '4xl': '2rem',
      }
    }
  },
}
```

## `Content`

The content section of your tailwind.config.js file is where you configure the paths to all of your HTML templates, JavaScript components, and any other source files that contain Tailwind class names.

```
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './pages/**/*.{html,js}',
    './components/**/*.{html,js}',
  ],
  // ...
}
```

## `Theme`

The theme section of your tailwind.config.js file is where you define your project’s color palette, type scale, fonts, breakpoints, border radius values, and more.

```
/** @type {import('tailwindcss').Config} */
module.exports = {
  theme: {
    screens: {
      sm: '480px',
      md: '768px',
      lg: '976px',
      xl: '1440px',
    },
    colors: {
      'blue': '#1fb6ff',
      'purple': '#7e5bef',
      'pink': '#ff49db',
      'orange': '#ff7849',
      'green': '#13ce66',
      'yellow': '#ffc82c',
      'gray-dark': '#273444',
      'gray': '#8492a6',
      'gray-light': '#d3dce6',
    },
    fontFamily: {
      sans: ['Graphik', 'sans-serif'],
      serif: ['Merriweather', 'serif'],
    },
    extend: {
      spacing: {
        '128': '32rem',
        '144': '36rem',
      },
      borderRadius: {
        '4xl': '2rem',
      }
    }
  }
}
```

## `Customizing Screens`

You define your project’s breakpoints in the theme.screens section of your tailwind.config.js file. The keys become your responsive modifiers (like md:text-center), and the values are the min-width where that breakpoint should start.

```
/** @type {import('tailwindcss').Config} */
module.exports = {
  theme: {
    screens: {
      'sm': '640px',
      // => @media (min-width: 640px) { ... }

      'md': '768px',
      // => @media (min-width: 768px) { ... }

      'lg': '1024px',
      // => @media (min-width: 1024px) { ... }

      'xl': '1280px',
      // => @media (min-width: 1280px) { ... }

      '2xl': '1536px',
      // => @media (min-width: 1536px) { ... }
    }
  }
}
```

## `Customizing Colors`

```
/** @type {import('tailwindcss').Config} */
module.exports = {
  theme: {
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      'white': '#ffffff',
      'purple': '#3f3cbb',
      'midnight': '#121063',
      'metal': '#565584',
      'tahiti': '#3ab7bf',
      'silver': '#ecebff',
      'bubble-gum': '#ff77e9',
      'bermuda': '#78dcca',
    },
  },
}
```

### `Color object syntax`

```
/** @type {import('tailwindcss').Config} */
module.exports = {
  theme: {
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      'white': '#ffffff',
      'tahiti': {
        100: '#cffafe',
        200: '#a5f3fc',
        300: '#67e8f9',
        400: '#22d3ee',
        500: '#06b6d4',
        600: '#0891b2',
        700: '#0e7490',
        800: '#155e75',
        900: '#164e63',
      },
      // ...
    },
  },
}
```

## `Customizing Spacing`

```
/** @type {import('tailwindcss').Config} */
module.exports = {
  theme: {
    spacing: {
      '1': '8px',
      '2': '12px',
      '3': '16px',
      '4': '24px',
      '5': '32px',
      '6': '48px',
    }
  }
}
```

By default the spacing scale is inherited by the `padding`, `margin`, `width`, `minWidth`, `maxWidth`, `height`, `minHeight`, `maxHeight`, `gap`, `inset`, `space`, `translate`, `scrollMargin`, and `scrollPadding` core plugins.

## `Plugins`

Extending Tailwind with reusable third-party plugins.

Overview
Plugins let you register new styles for Tailwind to inject into the user’s stylesheet using JavaScript instead of CSS.

```
const plugin = require('tailwindcss/plugin')

module.exports = {
  plugins: [
    plugin(function({ addUtilities, addComponents, e, config }) {
      // Add your custom styles here
    }),
  ]
}
```

## `Presets`

Creating your own reusable configuration presets.

```
/** @type {import('tailwindcss').Config} */
module.exports = {
  presets: [
    require('@acmecorp/tailwind-base')
  ],
  // ...
}
```

# `Layout`

---

## `container`

The `container` class sets the `max-width` of an element to match the `min-width` of the current breakpoint. This is useful if you’d prefer to design for a fixed set of screen sizes instead of trying to accommodate a fully fluid viewport.

## `Columns`

```
columns-1
columns-12
columns-auto
columns-xs
columns-sm
columns-md
columns-lg
columns-xl
```

## `Box Sizing`

```
box-border
box-content
```

## `Display`

<table class="w-full text-left border-collapse"><thead><tr><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pr-2 border-b border-slate-200 dark:border-slate-400/20">Class</div></th><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pl-2 border-b border-slate-200 dark:border-slate-400/20">Properties</div></th></tr></thead><tbody class="align-baseline"><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400">block</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300">display: block;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">inline-block</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">display: inline-block;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">inline</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">display: inline;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">flex</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">display: flex;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">inline-flex</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">display: inline-flex;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">table</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">display: table;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">inline-table</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">display: inline-table;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">table-caption</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">display: table-caption;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">table-cell</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">display: table-cell;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">table-column</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">display: table-column;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">table-column-group</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">display: table-column-group;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">table-footer-group</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">display: table-footer-group;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">table-header-group</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">display: table-header-group;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">table-row-group</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">display: table-row-group;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">table-row</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">display: table-row;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">flow-root</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">display: flow-root;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">grid</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">display: grid;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">inline-grid</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">display: inline-grid;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">contents</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">display: contents;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">list-item</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">display: list-item;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">hidden</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">display: none;
</td></tr></tbody></table>

## `Floats`

<table class="w-full text-left border-collapse"><thead><tr><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pr-2 border-b border-slate-200 dark:border-slate-400/20">Class</div></th><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pl-2 border-b border-slate-200 dark:border-slate-400/20">Properties</div></th></tr></thead><tbody class="align-baseline"><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400">float-start</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300">float: inline-start;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">float-end</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">float: inline-end;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">float-right</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">float: right;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">float-left</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">float: left;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">float-none</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">float: none;
</td></tr></tbody></table>

## `Object Fit`

<table class="w-full text-left border-collapse"><thead><tr><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pr-2 border-b border-slate-200 dark:border-slate-400/20">Class</div></th><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pl-2 border-b border-slate-200 dark:border-slate-400/20">Properties</div></th></tr></thead><tbody class="align-baseline"><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400">object-contain</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300">object-fit: contain;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">object-cover</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">object-fit: cover;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">object-fill</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">object-fit: fill;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">object-none</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">object-fit: none;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">object-scale-down</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">object-fit: scale-down;
</td></tr></tbody></table>

## `Overflow`

<table class="w-full text-left border-collapse"><thead><tr><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pr-2 border-b border-slate-200 dark:border-slate-400/20">Class</div></th><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pl-2 border-b border-slate-200 dark:border-slate-400/20">Properties</div></th></tr></thead><tbody class="align-baseline"><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400">overflow-auto</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300">overflow: auto;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">overflow-hidden</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">overflow: hidden;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">overflow-clip</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">overflow: clip;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">overflow-visible</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">overflow: visible;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">overflow-scroll</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">overflow: scroll;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">overflow-x-auto</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">overflow-x: auto;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">overflow-y-auto</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">overflow-y: auto;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">overflow-x-hidden</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">overflow-x: hidden;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">overflow-y-hidden</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">overflow-y: hidden;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">overflow-x-clip</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">overflow-x: clip;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">overflow-y-clip</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">overflow-y: clip;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">overflow-x-visible</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">overflow-x: visible;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">overflow-y-visible</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">overflow-y: visible;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">overflow-x-scroll</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">overflow-x: scroll;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">overflow-y-scroll</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">overflow-y: scroll;
</td></tr></tbody></table>

## `Position`

```
static
fixed
absolute
relative
sticky
```

## `Top / Right / Bottom / Left`

```
top-8
right-8
left-8
bottom-8
```

## `Visibility`

```
visible
invisible
collpase
```

## `Z-Index`

```
z-0
z-1
z-2
...
z-auto
```

# `Spacing`

---

## `Padding`

```
p-0
px-0 left & right
py-0 top & bottom
pb-0 bottom
pt-0 top
pl-0 left
pr-0 right
```

## `Margin`

```
m-0
mx-0 left & right
my-0 top & bottom
mb-0 bottom
mt-0 top
ml-0 left
mr-0 right
```

# `Sizing`

---

## `width`

```
w-0
w-1
w-06
w-auto
w-full
w-screen
w-min
w-max
w-fit
```

## `Min-Width`

```
min-w-0
min-w-1
min-w-06
min-w-auto
min-w-full
min-w-screen
min-w-min
min-w-max
min-w-fi
```

## `Max-Width`

```
max-w-0
max-w-1
max-w-06
max-w-auto
max-w-full
max-w-screen
max-w-min
max-w-max
max-w-fi
```

## `Height`

```
h-0
h-1
h-06
h-auto
h-full
h-screen
h-min
h-max
h-fi
```

## `Min-Height`

```
min-h-0
min-h-1
min-h-06
min-h-auto
min-h-full
min-h-screen
min-h-min
min-h-max
min-h-fi
```

## `Max-Height`

```
max-h-0
max-h-1
max-h-06
max-h-auto
max-h-full
max-h-screen
max-h-min
max-h-max
max-h-fi
```

# `Typography`

---

## `Font Family`

<table class="w-full text-left border-collapse"><thead><tr><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pr-2 border-b border-slate-200 dark:border-slate-400/20">Class</div></th><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pl-2 border-b border-slate-200 dark:border-slate-400/20">Properties</div></th></tr></thead><tbody class="align-baseline"><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400">font-sans</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300">font-family: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">font-serif</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">font-family: ui-serif, Georgia, Cambria, "Times New Roman", Times, serif;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">font-mono</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
</td></tr></tbody></table>

## `Font Size`

<table class="w-full text-left border-collapse"><thead><tr><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pr-2 border-b border-slate-200 dark:border-slate-400/20">Class</div></th><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pl-2 border-b border-slate-200 dark:border-slate-400/20">Properties</div></th></tr></thead><tbody class="align-baseline"><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400">text-xs</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300">font-size: 0.75rem;<span class="text-indigo-400"> /* 12px */</span>
line-height: 1rem;<span class="text-indigo-400"> /* 16px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">text-sm</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">font-size: 0.875rem;<span class="text-indigo-400"> /* 14px */</span>
line-height: 1.25rem;<span class="text-indigo-400"> /* 20px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">text-base</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">font-size: 1rem;<span class="text-indigo-400"> /* 16px */</span>
line-height: 1.5rem;<span class="text-indigo-400"> /* 24px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">text-lg</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">font-size: 1.125rem;<span class="text-indigo-400"> /* 18px */</span>
line-height: 1.75rem;<span class="text-indigo-400"> /* 28px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">text-xl</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">font-size: 1.25rem;<span class="text-indigo-400"> /* 20px */</span>
line-height: 1.75rem;<span class="text-indigo-400"> /* 28px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">text-2xl</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">font-size: 1.5rem;<span class="text-indigo-400"> /* 24px */</span>
line-height: 2rem;<span class="text-indigo-400"> /* 32px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">text-3xl</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">font-size: 1.875rem;<span class="text-indigo-400"> /* 30px */</span>
line-height: 2.25rem;<span class="text-indigo-400"> /* 36px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">text-4xl</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">font-size: 2.25rem;<span class="text-indigo-400"> /* 36px */</span>
line-height: 2.5rem;<span class="text-indigo-400"> /* 40px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">text-5xl</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">font-size: 3rem;<span class="text-indigo-400"> /* 48px */</span>
line-height: 1;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">text-6xl</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">font-size: 3.75rem;<span class="text-indigo-400"> /* 60px */</span>
line-height: 1;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">text-7xl</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">font-size: 4.5rem;<span class="text-indigo-400"> /* 72px */</span>
line-height: 1;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">text-8xl</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">font-size: 6rem;<span class="text-indigo-400"> /* 96px */</span>
line-height: 1;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">text-9xl</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">font-size: 8rem;<span class="text-indigo-400"> /* 128px */</span>
line-height: 1;
</td></tr></tbody></table>

## `Font Weight`

<table class="w-full text-left border-collapse"><thead><tr><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pr-2 border-b border-slate-200 dark:border-slate-400/20">Class</div></th><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pl-2 border-b border-slate-200 dark:border-slate-400/20">Properties</div></th></tr></thead><tbody class="align-baseline"><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400">font-thin</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300">font-weight: 100;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">font-extralight</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">font-weight: 200;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">font-light</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">font-weight: 300;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">font-normal</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">font-weight: 400;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">font-medium</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">font-weight: 500;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">font-semibold</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">font-weight: 600;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">font-bold</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">font-weight: 700;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">font-extrabold</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">font-weight: 800;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">font-black</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">font-weight: 900;
</td></tr></tbody></table>

## `Line Height`

<table class="w-full text-left border-collapse"><thead><tr><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pr-2 border-b border-slate-200 dark:border-slate-400/20">Class</div></th><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pl-2 border-b border-slate-200 dark:border-slate-400/20">Properties</div></th></tr></thead><tbody class="align-baseline"><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400">leading-3</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300">line-height: .75rem;<span class="text-indigo-400"> /* 12px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">leading-4</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">line-height: 1rem;<span class="text-indigo-400"> /* 16px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">leading-5</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">line-height: 1.25rem;<span class="text-indigo-400"> /* 20px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">leading-6</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">line-height: 1.5rem;<span class="text-indigo-400"> /* 24px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">leading-7</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">line-height: 1.75rem;<span class="text-indigo-400"> /* 28px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">leading-8</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">line-height: 2rem;<span class="text-indigo-400"> /* 32px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">leading-9</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">line-height: 2.25rem;<span class="text-indigo-400"> /* 36px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">leading-10</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">line-height: 2.5rem;<span class="text-indigo-400"> /* 40px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">leading-none</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">line-height: 1;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">leading-tight</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">line-height: 1.25;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">leading-snug</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">line-height: 1.375;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">leading-normal</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">line-height: 1.5;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">leading-relaxed</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">line-height: 1.625;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">leading-loose</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">line-height: 2;
</td></tr></tbody></table>

## `Text Align`

<table class="w-full text-left border-collapse"><thead><tr><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pr-2 border-b border-slate-200 dark:border-slate-400/20">Class</div></th><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pl-2 border-b border-slate-200 dark:border-slate-400/20">Properties</div></th></tr></thead><tbody class="align-baseline"><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400">text-left</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300">text-align: left;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">text-center</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">text-align: center;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">text-right</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">text-align: right;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">text-justify</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">text-align: justify;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">text-start</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">text-align: start;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">text-end</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">text-align: end;
</td></tr></tbody></table>

## `Text Color`

```
text-slate-50
text-slate-950
```

# `Background`

---

## `Background Attachment`

<table class="w-full text-left border-collapse"><thead><tr><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pr-2 border-b border-slate-200 dark:border-slate-400/20">Class</div></th><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pl-2 border-b border-slate-200 dark:border-slate-400/20">Properties</div></th></tr></thead><tbody class="align-baseline"><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400">bg-fixed</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300">background-attachment: fixed;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">bg-local</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">background-attachment: local;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">bg-scroll</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">background-attachment: scroll;
</td></tr></tbody></table>

## `Background Color`

```
bg-slate-50
bg-slate-950
```

## `Background Position`

```
bg-bottom
bg-top
bg-left
bg-right
bg-center
```

## `Background Repeat`

<table class="w-full text-left border-collapse"><thead><tr><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pr-2 border-b border-slate-200 dark:border-slate-400/20">Class</div></th><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pl-2 border-b border-slate-200 dark:border-slate-400/20">Properties</div></th></tr></thead><tbody class="align-baseline"><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400">bg-repeat</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300">background-repeat: repeat;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">bg-no-repeat</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">background-repeat: no-repeat;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">bg-repeat-x</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">background-repeat: repeat-x;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">bg-repeat-y</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">background-repeat: repeat-y;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">bg-repeat-round</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">background-repeat: round;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">bg-repeat-space</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">background-repeat: space;
</td></tr></tbody></table>

## `Background Size`

<table class="w-full text-left border-collapse"><thead><tr><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pr-2 border-b border-slate-200 dark:border-slate-400/20">Class</div></th><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pl-2 border-b border-slate-200 dark:border-slate-400/20">Properties</div></th></tr></thead><tbody class="align-baseline"><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400">bg-auto</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300">background-size: auto;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">bg-cover</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">background-size: cover;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">bg-contain</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">background-size: contain;
</td></tr></tbody></table>

## `Background Image`

<table class="w-full text-left border-collapse"><thead><tr><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pr-2 border-b border-slate-200 dark:border-slate-400/20">Class</div></th><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pl-2 border-b border-slate-200 dark:border-slate-400/20">Properties</div></th></tr></thead><tbody class="align-baseline"><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400">bg-none</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300">background-image: none;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">bg-gradient-to-t</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">background-image: linear-gradient(to top, var(--tw-gradient-stops));
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">bg-gradient-to-tr</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">background-image: linear-gradient(to top right, var(--tw-gradient-stops));
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">bg-gradient-to-r</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">background-image: linear-gradient(to right, var(--tw-gradient-stops));
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">bg-gradient-to-br</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">background-image: linear-gradient(to bottom right, var(--tw-gradient-stops));
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">bg-gradient-to-b</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">background-image: linear-gradient(to bottom, var(--tw-gradient-stops));
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">bg-gradient-to-bl</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">background-image: linear-gradient(to bottom left, var(--tw-gradient-stops));
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">bg-gradient-to-l</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">background-image: linear-gradient(to left, var(--tw-gradient-stops));
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">bg-gradient-to-tl</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">background-image: linear-gradient(to top left, var(--tw-gradient-stops));
</td></tr></tbody></table>

### `Arbitrary values`

```
<div class="bg-[url('/img/hero-pattern.svg')]">
  <!-- ... -->
</div>
```

# `Border`

---

```
rounded-sm radius
border-0 width
border-gray-950 color
border-solid style
```

# `Effects`

---

## `Opacity`

<table class="w-full text-left border-collapse"><thead><tr><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pr-2 border-b border-slate-200 dark:border-slate-400/20">Class</div></th><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pl-2 border-b border-slate-200 dark:border-slate-400/20">Properties</div></th></tr></thead><tbody class="align-baseline"><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400">opacity-0</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300">opacity: 0;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">opacity-5</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">opacity: 0.05;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">opacity-10</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">opacity: 0.1;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">opacity-15</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">opacity: 0.15;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">opacity-20</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">opacity: 0.2;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">opacity-25</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">opacity: 0.25;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">opacity-30</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">opacity: 0.3;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">opacity-35</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">opacity: 0.35;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">opacity-40</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">opacity: 0.4;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">opacity-45</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">opacity: 0.45;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">opacity-50</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">opacity: 0.5;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">opacity-55</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">opacity: 0.55;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">opacity-60</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">opacity: 0.6;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">opacity-65</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">opacity: 0.65;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">opacity-70</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">opacity: 0.7;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">opacity-75</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">opacity: 0.75;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">opacity-80</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">opacity: 0.8;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">opacity-85</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">opacity: 0.85;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">opacity-90</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">opacity: 0.9;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">opacity-95</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">opacity: 0.95;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">opacity-100</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">opacity: 1;
</td></tr></tbody></table>

# `Flexbox & Grid`

---

# `Flex`

## `Flex Direction`

```
flex-row
flex-row-reverse
flex-col
flex-col-reverse
```

## `Flex Wrap`

```
flex-wrap
flex-wrap-reverse
flex-nowrap
```

## `Flex`

```
flex-1
flex-auto
flex-initial
flex-none
```

# `Grid`

## `Grid Template Columns`

```
grid-cols-1
grid-cols-12
```

## `Gap`

<table class="w-full text-left border-collapse"><thead><tr><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pr-2 border-b border-slate-200 dark:border-slate-400/20">Class</div></th><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pl-2 border-b border-slate-200 dark:border-slate-400/20">Properties</div></th></tr></thead><tbody class="align-baseline"><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400">gap-0</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300">gap: 0px;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-0</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 0px;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-0</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 0px;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-px</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 1px;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-px</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 1px;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-px</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 1px;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-0.5</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 0.125rem;<span class="text-indigo-400"> /* 2px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-0.5</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 0.125rem;<span class="text-indigo-400"> /* 2px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-0.5</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 0.125rem;<span class="text-indigo-400"> /* 2px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-1</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 0.25rem;<span class="text-indigo-400"> /* 4px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-1</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 0.25rem;<span class="text-indigo-400"> /* 4px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-1</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 0.25rem;<span class="text-indigo-400"> /* 4px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-1.5</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 0.375rem;<span class="text-indigo-400"> /* 6px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-1.5</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 0.375rem;<span class="text-indigo-400"> /* 6px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-1.5</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 0.375rem;<span class="text-indigo-400"> /* 6px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-2</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 0.5rem;<span class="text-indigo-400"> /* 8px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-2</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 0.5rem;<span class="text-indigo-400"> /* 8px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-2</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 0.5rem;<span class="text-indigo-400"> /* 8px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-2.5</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 0.625rem;<span class="text-indigo-400"> /* 10px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-2.5</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 0.625rem;<span class="text-indigo-400"> /* 10px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-2.5</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 0.625rem;<span class="text-indigo-400"> /* 10px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-3</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 0.75rem;<span class="text-indigo-400"> /* 12px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-3</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 0.75rem;<span class="text-indigo-400"> /* 12px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-3</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 0.75rem;<span class="text-indigo-400"> /* 12px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-3.5</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 0.875rem;<span class="text-indigo-400"> /* 14px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-3.5</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 0.875rem;<span class="text-indigo-400"> /* 14px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-3.5</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 0.875rem;<span class="text-indigo-400"> /* 14px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-4</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 1rem;<span class="text-indigo-400"> /* 16px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-4</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 1rem;<span class="text-indigo-400"> /* 16px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-4</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 1rem;<span class="text-indigo-400"> /* 16px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-5</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 1.25rem;<span class="text-indigo-400"> /* 20px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-5</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 1.25rem;<span class="text-indigo-400"> /* 20px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-5</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 1.25rem;<span class="text-indigo-400"> /* 20px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-6</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 1.5rem;<span class="text-indigo-400"> /* 24px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-6</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 1.5rem;<span class="text-indigo-400"> /* 24px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-6</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 1.5rem;<span class="text-indigo-400"> /* 24px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-7</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 1.75rem;<span class="text-indigo-400"> /* 28px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-7</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 1.75rem;<span class="text-indigo-400"> /* 28px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-7</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 1.75rem;<span class="text-indigo-400"> /* 28px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-8</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 2rem;<span class="text-indigo-400"> /* 32px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-8</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 2rem;<span class="text-indigo-400"> /* 32px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-8</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 2rem;<span class="text-indigo-400"> /* 32px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-9</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 2.25rem;<span class="text-indigo-400"> /* 36px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-9</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 2.25rem;<span class="text-indigo-400"> /* 36px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-9</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 2.25rem;<span class="text-indigo-400"> /* 36px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-10</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 2.5rem;<span class="text-indigo-400"> /* 40px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-10</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 2.5rem;<span class="text-indigo-400"> /* 40px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-10</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 2.5rem;<span class="text-indigo-400"> /* 40px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-11</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 2.75rem;<span class="text-indigo-400"> /* 44px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-11</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 2.75rem;<span class="text-indigo-400"> /* 44px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-11</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 2.75rem;<span class="text-indigo-400"> /* 44px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-12</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 3rem;<span class="text-indigo-400"> /* 48px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-12</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 3rem;<span class="text-indigo-400"> /* 48px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-12</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 3rem;<span class="text-indigo-400"> /* 48px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-14</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 3.5rem;<span class="text-indigo-400"> /* 56px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-14</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 3.5rem;<span class="text-indigo-400"> /* 56px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-14</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 3.5rem;<span class="text-indigo-400"> /* 56px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-16</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 4rem;<span class="text-indigo-400"> /* 64px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-16</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 4rem;<span class="text-indigo-400"> /* 64px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-16</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 4rem;<span class="text-indigo-400"> /* 64px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-20</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 5rem;<span class="text-indigo-400"> /* 80px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-20</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 5rem;<span class="text-indigo-400"> /* 80px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-20</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 5rem;<span class="text-indigo-400"> /* 80px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-24</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 6rem;<span class="text-indigo-400"> /* 96px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-24</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 6rem;<span class="text-indigo-400"> /* 96px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-24</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 6rem;<span class="text-indigo-400"> /* 96px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-28</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 7rem;<span class="text-indigo-400"> /* 112px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-28</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 7rem;<span class="text-indigo-400"> /* 112px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-28</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 7rem;<span class="text-indigo-400"> /* 112px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-32</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 8rem;<span class="text-indigo-400"> /* 128px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-32</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 8rem;<span class="text-indigo-400"> /* 128px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-32</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 8rem;<span class="text-indigo-400"> /* 128px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-36</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 9rem;<span class="text-indigo-400"> /* 144px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-36</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 9rem;<span class="text-indigo-400"> /* 144px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-36</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 9rem;<span class="text-indigo-400"> /* 144px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-40</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 10rem;<span class="text-indigo-400"> /* 160px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-40</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 10rem;<span class="text-indigo-400"> /* 160px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-40</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 10rem;<span class="text-indigo-400"> /* 160px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-44</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 11rem;<span class="text-indigo-400"> /* 176px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-44</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 11rem;<span class="text-indigo-400"> /* 176px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-44</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 11rem;<span class="text-indigo-400"> /* 176px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-48</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 12rem;<span class="text-indigo-400"> /* 192px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-48</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 12rem;<span class="text-indigo-400"> /* 192px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-48</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 12rem;<span class="text-indigo-400"> /* 192px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-52</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 13rem;<span class="text-indigo-400"> /* 208px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-52</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 13rem;<span class="text-indigo-400"> /* 208px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-52</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 13rem;<span class="text-indigo-400"> /* 208px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-56</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 14rem;<span class="text-indigo-400"> /* 224px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-56</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 14rem;<span class="text-indigo-400"> /* 224px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-56</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 14rem;<span class="text-indigo-400"> /* 224px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-60</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 15rem;<span class="text-indigo-400"> /* 240px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-60</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 15rem;<span class="text-indigo-400"> /* 240px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-60</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 15rem;<span class="text-indigo-400"> /* 240px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-64</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 16rem;<span class="text-indigo-400"> /* 256px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-64</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 16rem;<span class="text-indigo-400"> /* 256px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-64</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 16rem;<span class="text-indigo-400"> /* 256px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-72</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 18rem;<span class="text-indigo-400"> /* 288px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-72</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 18rem;<span class="text-indigo-400"> /* 288px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-72</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 18rem;<span class="text-indigo-400"> /* 288px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-80</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 20rem;<span class="text-indigo-400"> /* 320px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-80</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 20rem;<span class="text-indigo-400"> /* 320px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-80</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 20rem;<span class="text-indigo-400"> /* 320px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-96</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">gap: 24rem;<span class="text-indigo-400"> /* 384px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-x-96</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">column-gap: 24rem;<span class="text-indigo-400"> /* 384px */</span>
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">gap-y-96</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">row-gap: 24rem;<span class="text-indigo-400"> /* 384px */</span>
</td></tr></tbody></table>

## `Justify Content`

<table class="w-full text-left border-collapse"><thead><tr><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pr-2 border-b border-slate-200 dark:border-slate-400/20">Class</div></th><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pl-2 border-b border-slate-200 dark:border-slate-400/20">Properties</div></th></tr></thead><tbody class="align-baseline"><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400">justify-normal</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300">justify-content: normal;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">justify-start</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">justify-content: flex-start;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">justify-end</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">justify-content: flex-end;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">justify-center</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">justify-content: center;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">justify-between</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">justify-content: space-between;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">justify-around</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">justify-content: space-around;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">justify-evenly</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">justify-content: space-evenly;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">justify-stretch</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">justify-content: stretch;
</td></tr></tbody></table>

## `Align Content`

<table class="w-full text-left border-collapse"><thead><tr><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pr-2 border-b border-slate-200 dark:border-slate-400/20">Class</div></th><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pl-2 border-b border-slate-200 dark:border-slate-400/20">Properties</div></th></tr></thead><tbody class="align-baseline"><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400">content-normal</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300">align-content: normal;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">content-center</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">align-content: center;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">content-start</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">align-content: flex-start;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">content-end</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">align-content: flex-end;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">content-between</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">align-content: space-between;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">content-around</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">align-content: space-around;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">content-evenly</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">align-content: space-evenly;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">content-baseline</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">align-content: baseline;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">content-stretch</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">align-content: stretch;
</td></tr></tbody></table>

## `Align Items`

<table class="w-full text-left border-collapse"><thead><tr><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pr-2 border-b border-slate-200 dark:border-slate-400/20">Class</div></th><th class="sticky z-10 top-0 text-sm leading-6 font-semibold text-slate-700 bg-white p-0 dark:bg-slate-900 dark:text-slate-300"><div class="py-2 pl-2 border-b border-slate-200 dark:border-slate-400/20">Properties</div></th></tr></thead><tbody class="align-baseline"><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400">items-start</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300">align-items: flex-start;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">items-end</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">align-items: flex-end;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">items-center</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">align-items: center;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">items-baseline</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">align-items: baseline;
</td></tr><tr><td translate="no" class="py-2 pr-2 font-mono font-medium text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400 border-t border-slate-100 dark:border-slate-400/10">items-stretch</td><td translate="no" class="py-2 pl-2 font-mono text-xs leading-6 text-indigo-600 whitespace-pre dark:text-indigo-300 border-t border-slate-100 dark:border-slate-400/10">align-items: stretch;
</td></tr></tbody></table>

[TOP](#tailwind-css)
