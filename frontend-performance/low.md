[Volver al Menú](root.md)

# `Low Priority`

# `Keep an eye on the size of dependencies`

```JSON
Ensure to use wisely external libraries, most of the time, you can use a lighter library for a same functionality.
```

You may be tempted to use one of the 745 000 packages you can find on npm, but you need to choose the best package for your needs. For example, MomentJS is an awesome library but with a lot of methods you may never use, that’s why Day.js was created. It’s just 2kB vs 16.4kB gz for Moment.

Always compare and choose the best and lighter library for your needs. You can also use tools like npm trends to compare NPM package downloads counts or Bundlephobia to know the size of your dependencies.

---

# `Prevent Flash or Invisible Text`

Avoid transparent text until the Webfont is loaded

---

# `Keep the web font size under 300kb`

Web fonts are a great way to add style to your website. However, they can also be a major performance bottleneck. The more fonts you use, the more time it takes for the browser to download and render the page. This can lead to a poor user experience and a high bounce rate.

Webfont sizes shouldn’t exceed 300kb (all variants included) and are optimized for performance.

---

# `Use preconnect to load your fonts faster`

```JSON
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
```

When you arrived on a website, your device needs to find out where your site lives and which server it needs to connect with. Your browser had to contact a DNS server and wait for the lookup complete before fetching the resource (fonts, CSS files…). Prefetches and preconnects allow the browser to lookup the DNS information and start establishing a TCP connection to the server hosting the font file. This provides a performance boost because by the time the browser gets around to parsing the css file with the font information and discovering it needs to request a font file from the server, it will already have pre-resolved the DNS information and have an open connection to the server ready in its connection pool.

- Before prefetching your webfonts, use webpagetest to evaluate your website

- Look for teal colored DNS lookups and note the host that are being requested

- Prefetch your webfonts in your `<head>` and add eventually these hostnames that you should prefetch too

---

# `Use WOFF2 font format`

According to Google, the WOFF 2.0 Web Font compression format offers 30% average gain over WOFF 1.0. It’s then good to use WOFF 2.0, WOFF 1.0 as a fallback and TTF.

Check before buying your new font that the provider gives you the WOFF2 format. If you are using a free font, you can always use Font Squirrel to generate all the formats you need.

---

# `Remove unused CSS`

Removing unused CSS selectors can reduce the size of your files and then speed up the load of your assets.

Always check if the framework CSS you want to use don’t already has a reset / normalize code included. Sometimes you may not need everything that is inside your reset / normalize file.

---

# `Concatenate CSS into a single file`

```JSON
CSS files are concatenated in a single file (Not always valid for HTTP/2)
```

If you are still using HTTP/1, you may need to still concatenate your files, it’s less true if your server use HTTP/2 (tests should be made).

- Use online tool or any plugin before or during your build or your deployment to concatenate your files.

- Ensure, of course, that concatenation does not break your project

---

# `Pre-load URLs where possible`

```JSON
Popular browsers can use directive on <link> tag and "rel" attribute with certain keywords to pre-load specific URLs
```

Prefetching allows a browser to silently fetch the necessary resources needed to display content that a user might access in the near future. The browser is able to store these resources in its cache and speed up the way web pages load when they are using different domains for page resources. When a web page has finished loading and the idle time has passed, the browser begins downloading other resources. When a user go in a particular link (already prefetched), the content will be instantly served.

---

[TOP](#low-priority)
