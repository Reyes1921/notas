[Volver al Menú](root.md)

# `High Priority`

# `Minimize number of iframes`

Use iframes only if you don’t have any other technical possibility. Try to avoid iframes as much as you can. Iframes are not only bad for performance, but also for accessibility and usability. Iframes are also not indexed by search engines.

---

# `Minified CSS - Remove comments, whitespaces etc`

`All CSS files are minified, comments, white spaces and new lines are removed from production files.`

When CSS files are minified, the content is loaded faster and less data is sent to the client. It’s important to always minify CSS files in production. It is beneficial for the user as it is for any business who wants to lower bandwidth costs and lower resource usage.

Use tools to minify your files automatically before or during your build or your deployment.

---

# `CSS files are non-blocking`

`CSS files need to be non-blocking to prevent the DOM from taking time to load.`

CSS files can block the page load and delay the rendering of your page. Using `preload` can actually load the CSS files before the browser starts showing the content of the page.

You need to add the `rel` attribute with the preload value and add `as="style"` on the `<link>` element.

---

# `Inline the Critical CSS (above the fold CSS)`

`The CSS critical (or “above the fold”) collects all the CSS used to render the visible portion of the page. It is embedded before your principal CSS call and between <style></style> in a single line (minified if possible).`

Inlining critical CSS help to speed up the rendering of the web pages reducing the number of requests to the server.

Generate the CSS critical with online tools or using a plugin like the one that Addy Osmani developed.

---

# `Avoid the embedded / inline CSS`

`Avoid using embed or inline CSS inside your <body> (Not valid for HTTP/2)`

One of the first reasons is because it’s a good practice to separate content from design. It also helps you have a more maintainable code and keep your site accessible. But regarding performance, it’s simply because it decreases the file size of your HTML pages and the load time.

Always use external stylesheets or embed CSS in your `<head>` (and follow the others CSS performance rules)

---

# `Analyse stylesheets complexity`

`Analyzing your stylesheets can help you to flag issues, redundancies and duplicate CSS selectors.`

Sometimes you may have redundancies or validation errors in your CSS, analysing your CSS files and removing these complexities can help you to speed up your CSS files (because your browser will read them faster).

Your CSS should be organized; using a CSS preprocessor can help you with that. Some online tools listed below can also help you analysing and correct your code.

---

# `Compress your images / keep the image count low`

`Your images are optimized, compressed without direct impact to the end user.`

Optimized images load faster in your browser and consume less data.

- Try using CSS3 effects when it’s possible (instead of a small image

- When it’s possible, use fonts instead of text encoded in your images

- Use SVG

- Use a tool and specify a level compression under 85.

---

# `Choose your image format appropriately`

`Choose your image format appropriately`

To ensure that your images don’t slow your website, choose the format that will correspond to your image. If it’s a photo, JPEG is most of the time more appropriate than PNG or GIF. However, don’t forget to look at the more modern formats that can reduce the size of your files. Each image format has pros and cons, so it’s important to know these to make the best choice possible.

Use Lighthouse to identify which images can eventually use modern formats (like JPEG 2000m, JPEG XR or WebP). Compare different formats, sometimes using PNG8 is better than PNG16, sometimes it’s not.

---

# `Minify your JavaScript`

`All JavaScript files are minified, comments, white spaces and new lines are removed from production files (still valid if using HTTP/2).`

Removing all unnecessary spaces, comments and break will reduce the size of your JavaScript files and speed up your site’s page load times and obviously lighten the download for your user.

Use the tools suggested below to minify your files automatically before or during your build or your deployment.

---

# `Non Blocking JavaScript: Use async / defer`

JavaScript files are loaded asynchronously using async or deferred using defer attribute.

```JSON
<!-- Defer Attribute -->
<script defer src="foo.js"></script>

<!-- Async Attribute -->
<script async src="foo.js"></script>
```

JavaScript blocks the normal parsing of the HTML document, so when the parser reaches a `<script>` tag (particularly is inside the `<head>`), it stops to fetch and run it. Adding async or defer are highly recommended if your scripts are placed in the top of your page but less valuable if just before your `</body>` tag. But it’s a good practice to always use these attributes to avoid any performance issue.

- Add `async` (if the script doesn’t rely on other scripts) or `defer` (if the script relies upon or is relied upon by an async script) as an attribute to your script tag.

- If you have small scripts, maybe use inline script place above async scripts.

---

# `Use HTTPs on your website`

HTTPS is not only for ecommerce websites, but for all websites that are exchanging data. Data shared by a user or data shared to an external entity. Modern browsers today limit functionalities for sites that are not secure. For example: geolocation, push notifications and service workers don’t work if your instance is not using HTTPS. And today is much more easy to setup a project with an SSL certificate than it was before (and for free, thanks to Let’s Encrypt).

---

# `Keep your page weight < 1500 KB (ideally < 500 kb)`

`Reduce the size of your page + resources as much as you can.`

Ideally you should try to target < 500 KB but the state of web shows that the median of Kilobytes is around 1500 KB (even on mobile). Depending on your target users, network connection, devices, it’s important to reduce as much as possible your total Kilobytes to have the best user experience possible.

All the listed best practices in this list will help you to reduce as much as possible your resources and your code.

---

# `Keep your page load time < 3 seconds`

`Reduce as much as possible your page load times to quickly deliver your content to your users.`

Faster your website or app is, less you have probability of bounce increases, in other terms you have less chances to lose your user or future client. Enough researches on the subject prove that point.

Use online tools like Page Speed Insights or WebPageTest to analyze what could be slowing you down and use the Front-End Performance Checklist to improve your load times.

---

# `Keep the Time To First Byte < 1.3 seconds`

Reduce as much as you can the time your browser waits before receiving data.

---

# `Minimize HTTP Requests`

Always ensure that every file requested are essential for your website or application. Combine files, Enable caching, use a content delivery network and Eliminate unnecessary resources

---

# `Serve files from the same protocol`

Avoid having your website serving files coming from source using HTTP on your website which is using HTTPS for example. If your website is using HTTPS, external files should come from the same protocol.

---

# `Avoid requesting unreachable files (404)`

`Avoid requesting unreachable files (404)`

404 request can slow down the performance of your website and negatively impact the user experience. Additionally, they can also cause search engines to crawl and index non-existent pages, which can negatively impact your search engine rankings. To avoid 404 requests, ensure that all links on your website are valid and that any broken links are fixed promptly.

---

# `Set HTTP cache headers properly`

Set HTTP headers to avoid expensive number of roundtrips between your browser and the server.

---

# `GZIP / Brotli compression is enabled`

Use a compression method such as Gzip or Brotli to reduce the size of your JavaScript files. With smaller file sizes, users will be able to download the asset faster, resulting in improved performance.

---

[TOP](#high-priority)
