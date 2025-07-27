[Volver al Menú](../root.md)

# `Shortcode`

The Shortcode API was introduced in WordPress 2.5.

Shortcodes are written by providing a handler function. Shortcode handlers are broadly similar to WordPress filters: they accept parameters (attributes) and return a result (the shortcode output).

# `add_shortcode`

The `add_shortcode` function is used to register a shortcode handler. It takes two parameters: the `shortcode name` (the string used in a post body), and the `callback function name`.

Three parameters are passed to the shortcode callback function. You can choose to use any number of them including none of them.

- `$atts` - an associative array of attributes, or an empty string if no attributes are given
- `$content` - the enclosed content (if the shortcode is used in its enclosing form)
- `$tag` - the shortcode tag, useful for shared callback functions

The API call to register the shortcode handler would look something like this:

```JSON
add_shortcode( 'myshortcode', 'my_shortcode_handler' );
```

---

# `do_shortcode`

Searches content for shortcodes and filter shortcodes through their hooks.

```JSON
// Use shortcodes in form like Landing Page Template.
echo do_shortcode( '[contact-form-7 id="91" title="quote"]' );
```

---

# `Shortcode attributes`

Shortcode macros may use single or double quotes for attribute values, or omit them entirely if the attribute value does not contain spaces. [myshortcode foo='123' bar=456] is equivalent to [myshortcode foo="123" bar="456"].

```JSON
[myshortcode foo="bar" bar="bing"]
```

These attributes will be converted into an associative array like the following, passed to the handler function as its $atts parameter:

```JSON
array( 'foo' => 'bar', 'bar' => 'bing' )
```

The shortcode parser does not accept square brackets within attributes. Thus the following will fail:

```JSON
[tag attribute="[Some value]"]
```

---

# `Handling Attributes - shortcode_atts()`

The raw `$atts` array may include any arbitrary attributes that are specified by the user. (In addition, the zeroeth entry of the array may contain the string that was recognized by the regex; see the note below.)

In order to help set default values for missing attributes, and eliminate any attributes that are not recognized by your shortcode, the `API` provides a `shortcode_atts()` function.

```JSON
shortcode_atts( $defaults_array, $atts );
```

```JSON
$a = shortcode_atts( array(
	'title' => 'My Title',
	'foo' => 123,
), $atts );
```

```JSON
// [bartag foo="foo-value"]
function bartag_func( $atts ) {
	$a = shortcode_atts( array(
		'foo' => 'something',
		'bar' => 'something else',
	), $atts );

	return "foo = {$a['foo']}";
}
add_shortcode( 'bartag', 'bartag_func' );
```

---

# `Output - ob_start(), ob_get_clean()`

The return value of a shortcode handler function is inserted into the post content output in place of the shortcode macro.

<p style="color:red">
Remember to use return and not echo - anything that is echoed will be output to the browser, but it won't appear in the correct place on the page.
</p>

Shortcodes are parsed after `wpautop` and `wptexturize` post formatting has been applied. This means that your shortcode output HTML won't automatically have curly quotes applied, `p` and `br tags` added, and so on. If you do want your shortcode output to be formatted, you should call `wpautop()` or `wptexturize()` directly when you return the output from your shortcode handler.

`wpautop` recognizes shortcode syntax and will attempt not to wrap `p` or `br tags` around shortcodes that stand alone on a line by themselves. Shortcodes intended for use in this manner should ensure that the output is wrapped in an appropriate block tag such as `<p>` or `<div>`.

If the shortcode produces a lot of HTML then `ob_start` can be used to capture output and convert it to a string as follows:-

```JSON
function my_shortcode() {
	ob_start();
	?> <HTML> <here> ... <?php
	return ob_get_clean();
}
```

---

# `Enclosing vs self-closing shortcodes`

The examples above show self-closing shortcode macros such as `[myshortcode]`. The API also supports enclosing shortcodes such as `[myshortcode]`content`[/myshortcode]`.

---

# `Function reference`

The following Shortcode API functions are available:

```JSON
function add_shortcode( $tag, $func )
function remove_shortcode( $tag )
function remove_all_shortcodes()
function shortcode_atts( $pairs, $atts )
function do_shortcode( $content )
```

---

# `Limitations`

The shortcode parser correctly deals with nested shortcode macros, provided their handler functions support it by recursively calling `do_shortcode()`:

```JSON
[tag-a]
   [tag-b]
      [tag-c]
   [/tag-b]
[/tag-a]
```

However the parser will fail if a shortcode macro is used to enclose another macro of the same name:

```JSON
[tag-a]
   [tag-a]
   [/tag-a]
[/tag-a]
```

---

# `Hyphens`

The behavior described below involving shortcodes with hyphens ('-') still applies in WordPress 3+. This could be due to a bug in do_shortcode() or get_shortcode_regex().

Take caution when using hyphens in the name of your shortcodes. In the following instance WordPress may see the second opening shortcode as equivalent to the first (basically WordPress sees the first part before the hyphen):

```JSON
[tag]
[tag-a]
```

To avoid this, use an underscore or simply no separator:

```JSON
[tag]
[tag_a]

[tag]
[taga]
```

[TOP](#shortcode)
