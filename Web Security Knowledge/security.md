[Volver al Menú](root.md)

# `Content Security Policy`

Content Security Policy (`CSP`) is a security standard designed to help prevent certain types of attacks , such as Cross-Site Scripting (XSS) is an attack in which an attacker injects malicious executable scripts into the code of a trusted application or website, clickjacking , and code injection. It is implemented through the use of a HTTP response header named "Content-Security-Policy" in modern web browsers. The `CSP` header can specify which sources of content (such as scripts, images, stylesheets, and plugins) are allowed to be loaded and executed by a web page. `CSP` is not intended to be the first line of defense against content injection vulnerabilities but rather it is best used as defense-in-depth . `CSP` can be used to supplement other security mechanisms and add an additional layer of protection against attacks.

# `Using CSP`

Configuring Content Security Policy involves adding the Content-Security-Policy HTTP header to a web page and giving it values to control what resources the user agent is allowed to load for that page. For example, a page that uploads and displays images could allow images from anywhere, but restrict a form action to a specific endpoint. A properly designed Content Security Policy helps protect a page against a cross-site scripting attack. This article explains how to construct such headers properly, and provides examples.

# `Specifying your policy`

You can use the Content-Security-Policy HTTP header to specify your policy, like this:

```
Content-Security-Policy: policy
```

The policy is a string containing the policy directives describing your Content Security Policy.

# `Examples: Common use cases`

This section provides examples of some common security policy scenarios.

### `Example 1`

A website administrator wants all content to come from the site's own origin (this excludes subdomains.)

```
Content-Security-Policy: default-src 'self'
```

### `Example 2`

A website administrator wants to allow content from a trusted domain and all its subdomains (it doesn't have to be the same domain that the CSP is set on.)

```
Content-Security-Policy: default-src 'self' example.com *.example.com
```

### `Example 3`

A website administrator wants to allow users of a web application to include images from any origin in their own content, but to restrict audio or video media to trusted providers, and all scripts only to a specific server that hosts trusted code.

```
Content-Security-Policy: default-src 'self'; img-src *; media-src example.org example.net; script-src userscripts.example.com
```

Here, by default, content is only permitted from the document's origin, with the following exceptions:

- Images may load from anywhere (note the "\*" wildcard).
- Media is only allowed from example.org and example.net (and not from subdomains of those sites).
- Executable script is only allowed from userscripts.example.com.

### `Example 4`

A website administrator for an online banking site wants to ensure that all its content is loaded using TLS, in order to prevent attackers from eavesdropping on requests.

```
Content-Security-Policy: default-src https://onlinebanking.example.com
```

The server permits access only to documents being loaded specifically over HTTPS through the single origin onlinebanking.example.com.

### `Example 5`

A website administrator of a web mail site wants to allow HTML in email, as well as images loaded from anywhere, but not JavaScript or other potentially dangerous content.

```
Content-Security-Policy: default-src 'self' *.example.com; img-src *
```

Note that this example doesn't specify a script-src; with the example CSP, this site uses the setting specified by the default-src directive, which means that scripts can be loaded only from the originating server.

[TOP](#content-security-policy)
