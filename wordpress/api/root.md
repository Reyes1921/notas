[Volver al Menú](../root.md)

# `API Rest`

The WordPress REST API provides an interface for applications to interact with your WordPress site by sending and receiving data as JSON (JavaScript Object Notation) objects. It is the foundation of the WordPress Block Editor, and can likewise enable your theme, plugin or custom application to present new, powerful interfaces for managing and publishing your site content.

WordPress already provides a rich set of tools and interfaces for building sites, and you should not feel pressured to use the REST API if your site is already working the way you expect. You do not need to use the REST API to build a WordPress theme or plugin.

Even if you’re using vanilla JavaScript or jQuery within a theme or plugin the REST API provides a more predictable and structured way to interact with your site’s content than admin-ajax, enabling you to spend less time accessing the data you need and more time creating better user experiences.

---

# `Endpoints`

- `wp-json/wp/v2/posts`

---

# `Authentication`

Cookie authentication is the standard authentication method included with WordPress. When you log in to your dashboard, this sets up the cookies correctly for you, so plugin and theme developers need only to have a logged-in user.

However, the REST API includes a technique called nonces to avoid CSRF issues. This prevents other sites from forcing you to perform actions without explicitly intending to do so. This requires slightly special handling for the API.

## `Basic Authentication with Application Passwords`

As of 5.6, WordPress has shipped with Application Passwords, which can be generated from an Edit User page (wp-admin -> Users -> Edit User).

The credentials can be passed along to REST API requests served over https:// using Basic Auth / RFC 7617

---

# `Global Parameters`

The API includes a number of global parameters (also called “meta-parameters”) which control how the API handles the request/response handling.

## `_fields`

A REST resource like a Post contains a large quantity of data: basic information such as content, title, and author ID, but also registered metadata and fields, media information, and links to other resources. Your application may not need all of this information on every request.

To instruct WordPress to return only a subset of the fields in a response, you may use the \_fields query parameter.

```JSON
/wp/v2/posts?_fields=author,id,excerpt,title,link
```

You may alternatively provide that same list using query parameter array syntax instead of a comma-separated list:

```JSON
/wp/v2/posts?_fields[]=author&_fields[]=id&_fields[]=excerpt&_fields[]=title&_fields[]=link
```

When \_fields is provided then WordPress will skip unneeded fields when generating your response object, avoiding potentially expensive internal computation or queries for data you don’t need. This also means the JSON object returned from the REST API will be smaller, requiring less time to download and less time to parse on your client device.

Carefully design your queries to pull in only the needed properties from each resource to make your application faster to use and more efficient to run.

As of WordPress 5.3 the \_fields parameter supports nested properties. This can be useful if you have registered many meta keys, permitting you to request the value for only one of the registered meta properties:

```JSON
?_fields=meta.one-of-many-keys
```

## `_embed`

Most resources include links to related resources. For example, a post can link to the parent post, or to comments on the post. To reduce the number of HTTP requests required, clients may wish to fetch a resource as well as the linked resources. The \_embed parameter indicates to the server that the response should include these embedded resources

## `_method (or X-HTTP-Method-Override header)`

Some servers and clients cannot correctly process some HTTP methods that the API makes use of. For example, all deletion requests on resources use the DELETE method, but some clients do not provide the ability to send this method.

To ensure compatibility with these servers and clients, the API supports a method override. This can be passed either via a \_method parameter or the X-HTTP-Method-Override header, with the value set to the HTTP method to use.

## `_envelope`

Similarly to \_method, some servers, clients, and proxies do not support accessing the full response data. The API supports passing an \_envelope parameter, which sends all response data in the body, including headers and status code.

## `_jsonp`

The API natively supports JSONP responses to allow cross-domain requests for legacy browsers and clients. This parameter takes a JavaScript callback function which will be prepended to the data. This URL can then be loaded via a `<script>` `tag`.

---

# `Linking and Embedding`

The WP REST API incorporates hyperlinking throughout the API to allow discoverability and browsability, as well as embedding related resources together in one response. While the REST API does not completely conform to the entire HAL standard, it implements the .`_links` and .`_embedded` properties from that standard as described below.

## `Links`

The `_links` property of the response object contains a map of links to other API resources, grouped by “relation.” The relation specifies how the linked resource relates to the primary resource.

Examples include:
– `author` – describing a relationship between a resource and its author
– `wp:term` – describing the relationship between a post and its tags or categories

A typical single post request (/wp/v2/posts/42):

```JSON
{
  "id": 42,
  "_links": {
    "collection": [
      {
        "href": "https://example.com/wp-json/wp/v2/posts"
      }
    ],
    "author": [
      {
        "href": "https://example.com/wp-json/wp/v2/users/1",
        "embeddable": true
      }
    ]
  }
}
```

## `Embedding`

Optionally, some linked resources may be included in the response to reduce the number of HTTP requests required. These resources are “embedded” into the main response.

Example Response

```JSON
{
  "id": 42,
  "_links": {
    "collection": [
      {
        "href": "https://example.com/wp-json/wp/v2/posts"
      }
    ],
    "author": [
      {
        "href": "https://example.com/wp-json/wp/v2/users/1",
        "embeddable": true
      }
    ]
  },
  "_embedded": {
    "author": {
      "id": 1,
      "name": "admin",
      "description": "Site administrator"
    }
  }
}
```

---

# `Pagination`

WordPress sites can have a lot of content—far more than you’d want to pull down in a single request. The API endpoints default to providing a limited number of items per request, the same way that a WordPress site will default to 10 posts per page in archive views.

## `Pagination Parameters`

Any API response which contains multiple resources supports several common query parameters to handle paging through the response data:

`?page`=: specify the page of results to return.

    - For example, /wp/v2/posts?page=2 is the second page of posts results

    - By retrieving /wp/v2/posts, then /wp/v2/posts?page=2, and so on, you may access every available post through the API, one page at a time.

`?per_page`=: specify the number of records to return in one request, specified as an integer from 1 to 100.

    - For example, /wp/v2/posts?per_page=1 will return only the first post in the collection

`?offset`=: specify an arbitrary offset at which to start retrieving posts

    - For example, /wp/v2/posts?offset=6 will use the default number of posts per page, but start at the 6th post in the collection

    - ?per_page=5&page=4 is equivalent to ?per_page=5&offset=15

Large queries can hurt site performance, so per_page is capped at 100 records. If you wish to retrieve more than 100 records, for example to build a client-side list of all available categories, you may make multiple API requests and combine the results within your application.

To determine how many pages of data are available, the API returns two header fields with every paginated response:

- X-WP-Total: the total number of records in the collection
- X-WP-TotalPages: the total number of pages encompassing all available records

By inspecting these header fields you can determine how much more data is available within the API.

## `Ordering Results`

In addition to the pagination query parameters detailed above, several other parameters control the order of the returned results:

`?order`=: control whether results are returned in ascending or descending order

    - Valid values are ?order=asc (for ascending order) and ?order=desc (for descending order).

    - All native collections are returned in descending order by default.

`?orderby`=: control the field by which the collection is sorted

    - The valid values for orderby will vary depending on the queried resource; for the /wp/v2/posts collection, the valid values are “date,” “relevance,” “id,” “include,” “title,” and “slug”

    - All collections with dated resources default to orderby=date

---

# `Extending the REST API`

[Info](https://developer.wordpress.org/rest-api/extending-the-rest-api/)

---

# `Reference`

[Info](https://developer.wordpress.org/rest-api/reference/)

---

# `Tips`

- If you get a 404 error when trying to access http://oursite.com/wp-json/, consider enabling pretty permalinks or try using the rest_route parameter instead.

---

# `FAQs`

#### `What happened to the ?filter= query parameter?`

When the REST API was merged into WordPress core the ?filter query parameter was removed to prevent future compatibility and maintenance issues. The ability to pass arbitrary WP_Query arguments to the API using a ?filter query parameter was necessary at the genesis of the REST API project, but most API response filtering functionality has been superseded by more robust query parameters like ?categories=, ?slug= and ?per_page=.

[More Info](https://developer.wordpress.org/rest-api/frequently-asked-questions/)

[TOP](#api-rest)
