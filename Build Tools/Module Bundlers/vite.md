[Volver al Menú](root.md)

# `Vite`

`Vite` (French word for "quick", pronounced /vit/, like "`veet`") is a build tool that aims to provide a faster and leaner development experience for modern web projects. It consists of two major parts:

- A dev server that provides rich feature enhancements over native ES modules, for example extremely `fast Hot Module Replacement (HMR)`.

- A build command that bundles your code with `Rollup`, pre-configured to output highly optimized static assets for production.

`Vite` is opinionated and comes with sensible defaults out of the box, but is also highly extensible via its Plugin API and JavaScript API with full typing support.

## `Hot Module Replacement (HMR)`

Hot module replacement appears to be a feature in tools like Webpack and `Vite` that allows modules to be updated at runtime without the need for a full application reload. This can speed up the development process by allowing developers to see code changes in the browser as they make them , without having to manually refresh the page.

With hot module replacement, when changes are made to a module, the updated module is sent to the browser and replaces the existing module, without affecting the rest of the application. This allows developers to see their changes immediately and speeds up the development process. The feature can be especially helpful for large applications with complex and time-consuming builds.

Hot module replacement typically relies on a combination of server-side and client-side code, and enables the use of appropriate libraries and tools to make it work effectively.

# `Scaffolding Your First Vite Project`

With NPM:
```
$ npm create vite@latest
```

With Yarn:
```
$ yarn create vite
```

Then follow the prompts!

You can also directly specify the project name and the template you want to use via additional command line options. For example, to scaffold a Vite + Vue project, run:

```
# npm 6.x
npm create vite@latest my-vue-app --template vue

# npm 7+, extra double-dash is needed:
npm create vite@latest my-vue-app -- --template vue

# yarn
yarn create vite my-vue-app --template vue

# pnpm
pnpm create vite my-vue-app --template vue
```

# `index.html and Project Root`

One thing you may have noticed is that in a Vite project, index.html is front-and-central instead of being tucked away inside public. This is intentional: during development Vite is a server, and index.html is the entry point to your application.

Vite treats index.html as source code and part of the module graph. It resolves `<script type="module" src="...">` that references your JavaScript source code. Even inline` <script type="module">` and CSS referenced via `<link href>` also enjoy Vite-specific features. In addition, URLs inside index.html are automatically rebased so there's no need for special %PUBLIC_URL% placeholders.

Similar to static http servers, Vite has the concept of a "root directory" which your files are served from. You will see it referenced as `<root>` throughout the rest of the docs. Absolute URLs in your source code will be resolved using the project root as base, so you can write code as if you are working with a normal static file server (except way more powerful!). Vite is also capable of handling dependencies that resolve to out-of-root file system locations, which makes it usable even in a monorepo-based setup.

# `Command Line Interface`

In a project where Vite is installed, you can use the vite binary in your npm scripts, or run it directly with npx vite. Here are the default npm scripts in a scaffolded Vite project:

```
{
  "scripts": {
    "dev": "vite", // start dev server, aliases: `vite dev`, `vite serve`
    "build": "vite build", // build for production
    "preview": "vite preview" // locally preview production build
  }
}
```

# `Why Vite`

## `The Problems`

Before ES modules were available in browsers, developers had no native mechanism for authoring JavaScript in a modularized fashion. This is why we are all familiar with the concept of "bundling": using tools that crawl, process and concatenate our source modules into files that can run in the browser.

Over time we have seen tools like `webpack`, `Rollup` and `Parcel`, which greatly improved the development experience for frontend developers.

However, as we build more and more ambitious applications, the amount of JavaScript we are dealing with is also increasing dramatically. It is not uncommon for large scale projects to contain thousands of modules. We are starting to hit a performance bottleneck for JavaScript based tooling: it can often take an unreasonably long wait (sometimes up to minutes!) to spin up a dev server, and even with Hot Module Replacement (HMR), file edits can take a couple of seconds to be reflected in the browser. The slow feedback loop can greatly affect developers' productivity and happiness.

Vite aims to address these issues by leveraging new advancements in the ecosystem: the availability of native ES modules in the browser, and the rise of JavaScript tools written in compile-to-native languages.

## `Slow Server Start`

Vite improves the dev server start time by first dividing the modules in an application into two categories: `dependencies` and `source code`.

- `Dependencies` are mostly plain JavaScript that do not change often during development. Some large `dependencies` (e.g. component libraries with hundreds of modules) are also quite expensive to process. `Dependencies` may also be shipped in various module formats (e.g. ESM or CommonJS).

Vite pre-bundles `dependencies` using `esbuild`. `esbuild` is written in Go and pre-bundles `dependencies` 10-100x faster than JavaScript-based bundlers.

- `Source code` often contains non-plain JavaScript that needs transforming (e.g. JSX, CSS or Vue/Svelte components), and will be edited very often. Also, not all `source code` needs to be loaded at the same time (e.g. with route-based code-splitting).

Vite serves `source code` over native ESM. This is essentially letting the browser take over part of the job of a bundler: Vite only needs to transform and serve `source code` on demand, as the browser requests it. Code behind conditional dynamic imports is only processed if actually used on the current screen.

<img src="img1.webp" />

<img src="img2.webp" />

## `Slow Updates`

When a file is edited in a bundler-based build setup, it is inefficient to rebuild the whole bundle for an obvious reason: the update speed will degrade linearly with the size of the app.

In some bundlers, the dev server runs the bundling in memory so that it only needs to invalidate part of its module graph when a file changes, but it still needs to re-construct the entire bundle and reload the web page. Reconstructing the bundle can be expensive, and reloading the page blows away the current state of the application. This is why some bundlers support `Hot Module Replacement (HMR)`: allowing a module to "hot replace" itself without affecting the rest of the page. This greatly improves DX - however, in practice we've found that even `HMR` update speed deteriorates significantly as the size of the application grows.

In Vite, `HMR` is performed over native ESM. When a file is edited, Vite only needs to precisely invalidate the chain between the edited module and its closest `HMR` boundary (most of the time only the module itself), making `HMR` updates consistently fast regardless of the size of your application.

Vite also leverages HTTP headers to speed up full page reloads (again, let the browser do more work for us): source code module requests are made conditional via 304 Not Modified, and dependency module requests are strongly cached via Cache-Control: max-age=31536000,immutable so they don't hit the server again once cached.

Once you experience how fast Vite is, we highly doubt you'd be willing to put up with bundled development again.

## `Why Bundle for Production`

Even though native ESM is now widely supported, shipping unbundled ESM in production is still inefficient (even with HTTP/2) due to the additional network round trips caused by nested imports. To get the optimal loading performance in production, it is still better to bundle your code with tree-shaking, lazy-loading and common chunk splitting (for better caching).

Ensuring optimal output and behavioral consistency between the dev server and the production build isn't easy. This is why Vite ships with a pre-configured build command that bakes in many performance optimizations out of the box.


## `Why Not Bundle with esbuild?`

Vite's current plugin API isn't compatible with using `esbuild` as a bundler. In spite of `esbuild` being faster, Vite's adoption of Rollup's flexible plugin API and infrastructure heavily contributed to its success in the ecosystem. For the time being, we believe that Rollup offers a better performance-vs-flexibility tradeoff.

That said, `esbuild` has progressed a lot in the past years, and we won't rule out the possibility of using `esbuild` for production builds in the future. We will keep taking advantage of new capabilities as they are released, as we have done with JS and CSS minification where `esbuild` allowed Vite to get a performance boost while avoiding disruption for its ecosystem

[Mas Informacion](https://vitejs.dev/guide/)


[TOP](#vite)