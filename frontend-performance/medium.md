[Volver al Menú](root.md)

# `Medium Priority`

# `Keep the cookie count less than 20`

```JSON
If you are using cookies, be sure each cookie doesn’t exceed 4096 bytes and your domain name doesn’t have more than 20 cookies.
```

Cookies are exchanged in the HTTP headers between web servers and browsers. It’s important to keep the size of cookies as low as possible to minimize the impact on the user’s response time.

---

# `Cookie size should be less than 4096 bytes`

---

# `Service Workers for caching / performing heavy tasks`

You are using Service Workers in your PWA to cache data or execute possible heavy tasks without impacting the user experience of your application.

---

# `Check for performance problems in your JavaScript files`

```JSON
Check for performance problems in your JavaScript files (and CSS too)
```

JavaScript complexity can slow down runtime performance. Identifying these possible issues are essential to offer the smoothest user experience.

Use the Timeline tool in the Chrome Developer Tool to evaluate scripts events and found the one that may take too much time.

---

# `Keep your dependencies up to date`

`All JavaScript libraries used in your project are necessary (prefer Vanilla JavaScript for simple functionalities), updated to their latest version and don’t overwhelm your JavaScript with unnecessary methods.`

Most of the time, new versions come with optimization and security fix. You should use the most optimized code to speed up your project and ensure that you’ll not slow down your website or app without outdated plugin.

If your project use NPM packages, npm-check is a pretty interesting library to upgrade / update your libraries. Greenkeeper can automatically look for your dependencies and suggest an update every time a new version is out.

---

# `Avoid multiple inline JavaScript snippets <script>`

`Avoid having multiple JavaScript codes embedded in the middle of your body. Regroup your JavaScript code inside external files or eventually in the <head> or at the end of your page (before </body>).`

Placing JavaScript embedded code directly in your `<body>` can slow down your page because it loads while the DOM is being built. The best option is to use external files with async or defer to avoid blocking the DOM. Another option is to place some scripts inside your `<head>`. Most of the time analytics code or small script that need to load before the DOM gets to main processing.

Ensure that all your files are loaded using async or defer and decide wisely the code that you will need to inject in your `<head>`.

---

# `Ensure to serve images that are close to your display size`

`Ensure to serve images that are close to your display size.`

Small devices don’t need images bigger than their viewport. It’s recommended to have multiple versions of one image on different sizes.

- Create different image sizes for the devices you want to target

- Use srcset and picture to deliver multiple variants of each image.

---

# `Offscreen images are loaded lazily`

`Offscreen images are loaded lazily (A noscript fallback is always provided).`

It will improve the response time of the current page and then avoid loading unnecessary images that the user may not need.

- Use Lighthouse to identify how many images are offscreen.

- Use a JavaScript plugin like the following to lazyload your images. Make sure you target offscreen images only.

- Also make sure to lazyload alternative images shown at mouseover or upon other user actions.

---

# `Avoid using Base64 images`

`You could eventually convert tiny images to base64 but it’s actually not the best practice.`

Using Base64 encoded images in your frontend can have several drawbacks.

First, Base64 encoded images are larger in size than their binary counterparts, which can slow down the loading time of your website.

Second, because Base64 encoded images are embedded directly in the HTML or CSS, they are included in the initial page load, which can cause delays for users with slower internet connections.

Third, Base64 encoded images do not benefit from browser caching, as they are part of the HTML or CSS and not a separate resource. So, every time the page is loaded, the images will be re-downloaded, even if the user has visited the page before.

Fourth, Base64 encoded images are not compatible with some old browser versions.

Instead of using Base64 encoded images, it is generally recommended to use binary image files and reference them using an img tag in HTML, with a standard src attribute. This allows the browser to cache the image and use it for subsequent page loads, resulting in faster loading times and better user experience.

---

# `Set width and height attributes on images (aspect ratio)`

`Set width and height attributes on <img> if the final rendered image size is known.`

If height and width are set, the space required for the image is reserved when the page is loaded. However, without these attributes, the browser does not know the size of the image, and cannot reserve the appropriate space to it. The effect will be that the page layout will change during loading (while the images load).

---

# `Prefer using vector image rather than bitmap images`

`Prefer using vector image rather than bitmap images (when possible).`

Vector images (SVG) tend to be smaller than images and SVG’s are responsive and scale perfectly. These images can be animated and modified by CSS.

---

# `Use Content Delivery Network`

Use a CDN to serve your static assets. This will reduce the load on your server and improve the performance of your site.

---

# `Minified HTML - Remove comments and whitespaces`

`The HTML code is minified, comments, white spaces and new lines are removed from production files.`

Removing all unnecessary spaces, comments and attributes will reduce the size of your HTML and speed up your site’s page load times and obviously lighten the download for your user.

Most of the frameworks have plugins to facilitate the minification of the webpages. You can use a bunch of NPM modules that can do the job for you automatically.

---

[TOP](#medium-priority)
