[Volver al Menú](../root.md)

# `Global Settings and Styles theme.json`

As you learned in Theme Structure, theme.json is a standard file that WordPress looks for in your theme. While it is not technically required for a block theme, it is almost always necessary to configure various settings and styles for your theme.

# `What is theme.json?`

theme.json is a configuration file that tells WordPress what settings you want to enable, how to style specific elements and blocks, and which templates and template parts to register.

Some of the things you can do with theme.json are:

- Enable or disable features like drop caps, padding, margin, and line-height.
- Add a color palette, gradients, duotones, and shadows.
- Configure typographical features like font families, sizes, and more.
- Add CSS custom properties.
- Register custom templates and assign parts to template part areas.

Your theme.json configuration will be reflected in what you see in places like the post, template, and site editors in the WordPress admin. Custom styles, in particular, will be reflected in the Styles interface:

---

# `theme.json structure`

A theme.json file can be as little as a few lines of code, such as this example that enables the appearance tools for blocks:

```JSON
{
	"$schema": "https://schemas.wp.org/trunk/theme.json",
	"version": 2,
	"settings": {
		"appearanceTools": true
	}
}
```

Or it can be a massively complex file that spans 1,000s of lines of code. How many of the features you want to configure is entirely up to you.

The starting point is understanding the top-level properties that can be configured. Here is an outline of what this looks like:

```JSON
{
	"$schema": "https://schemas.wp.org/trunk/theme.json",
	"version": 2,
	"settings": {},
	"styles": {},
	"customTemplates": {},
	"templateParts": {},
	"patterns": []
}
```

Here are what each of these properties define:

- $schema: Used for defining the supported JSON schema, which will integrate with many code editors to give you on-the-fly hints and error reporting.
- version: The theme.json schema version you are building for. The latest version is 2 and can always be found in the theme.json Living Reference, a document that lists the most up-to-date properties you can set.
- settings: Used to define your block controls and color palettes, font sizes, and more.
- styles: Used to apply colors, font sizes, custom CSS, and more to the website and blocks.
- customTemplates: Metadata for custom templates defined in your theme’s /templates folder.
- templateParts: Metadata for template parts defined in your theme’s /parts folder.
- patterns: An array of pattern slugs to be registered from the Pattern Directory.

---

# `Adding a version`

At the very least, you should set the version property in your theme.json file. This should be an integer that matches the API version used to read and understand your theme.json code.

The API is currently at version 2. You can always find the most up-to-date version via the theme.json Living Reference document.

The bear minimum code that your theme.json file should have is:

```JSON
{
	"version": 2
}
```

---

# `Adding a JSON schema`

An optional property that you can add to your theme.json is a URL to the JSON schema. This can be particularly helpful when working with any modern code editor. Adding the $schema property will give you on-the-fly hints and error reporting in many code editors and is highly recommended.

```JSON
{
	"$schema": "https://schemas.wp.org/trunk/theme.json",
	"version": 2
}
```

---

# `Settings`

The settings property in theme.json lets you configure a wide range of settings for a WordPress install. It covers everything from color presets, to enabling typography design tools, to layout, and a little bit of everything in between.

```JSON
{
	"version": 2,
	"settings": {
		"appearanceTools": false,
		"border": {},
		"color": {},
		"custom": {},
		"dimensions": {},
		"layout": {},
		"position": {},
		"shadow": {},
		"spacing": {},
		"typography": {},
		"useRootPaddingAwareAlignments": false,
		"blocks": {}
	}
}
```

[More Info](https://developer.wordpress.org/themes/global-settings-and-styles/settings/)

---

# `Styles`

The `styles` property in `theme.json` lets you configure settings at the global level, for individual elements, and individual blocks. WordPress supports a standard subset of the CSS specification, but also allows you to add custom CSS directly in your `theme.json` file.

```JSON
{
	"version": 2,
	"styles": {
		"color": {
			"text": "#000000",
			"background": "#ffffff"
		},
		"elements": {
			"button": {
				"color": {
					"text": "#ffffff",
					"background": "#000000"
				}
			}
		},
		"blocks": {
			"core/code": {
				"color": {
					"text": "#ffffff",
					"background": "#000000"
				}
			}
		}
	}
}
```

---

# `Custom Templates`

WordPress lets you register custom templates in theme.json. More specifically, you can register single post, page, or CPT (custom post type) templates via the customTemplates property.

## `Adding custom templates`

You can register custom templates via the customTemplates property in theme.json. It accepts an array of template objects, each defining an individual template.

Each object passed to the customTemplates array supports these properties:

- `name`: The name of your template file without the file extension.
- `title`: A human-readable title for your template, which may be translated.
- `postTypes`: An array of post type slugs that the template is usable on. This is an optional setting and defaults to the page post type.

---

# `Patterns`

patterns is an optional property that lets you bundle as many or as few patterns as you’d like with your theme. The property accepts an array of pattern slugs, and as long as those patterns exist in the Patterns Directory, they will appear in the Patterns inserter in the WordPress editors.

```JSON
{
	"version": 2,
	"patterns": [
		"fullscreen-cover-image-gallery",
		"hero-banner-with-overlap-images",
		"mixed-shape-gallery"
	]
}
```

---

# `Template Parts`

Template parts are small sections (i.e., parts) that you can include in top-level templates. Following the DRY (Don’t Repeat Yourself) principle, they are generally used as sections that need to be reused across multiple templates. Instead of writing the code multiple times, you can break it apart into a single file and include it when needed.

## `Registering template parts`

Technically, you can use custom template parts without ever registering them via theme.json. But registering them has some distinct advantages:

- You can give the part a translatable title that is more appealing in the user interface.
- You can assign each part to an area, creating a nicer user experience in the Site Editor.
- It plays more nicely with plugins, style variations, and child themes that may grab, filter, or otherwise use the registered metadata in some way.

To register template parts, you must pass an array of objects to the templateParts property in theme.json. Each object in the array accepts three key/value pairs:

- area: The area that the template part belongs to. The default options are header, footer, and uncategorized. You can also assign it to any custom area.
- name: The filename of your template part without the extension.
- title: A human-readable title for your template, which may be translated.

---

# `Style Variations`

Unlike most things here in the Global Settings and Styles documentation, style variations are not things you define within `theme.json`. Instead, they are “variations” to your existing `theme.json` file that you can offer to users.

## `What are style variations?`

Style variations are essentially alternative versions of theme.json that you can ship with your theme. They are custom-named JSON files that are stored in your theme’s /styles folder. Any setting or style that you can add to theme.json can also be added to your style variation JSON file.

This lets your users pick and choose which variation they want to use on their site. In a way, they are “skins” for your theme.

For example, suppose you’ve created a restaurant theme and have kept the colors and typography pretty basic so that it covers a lot of different restaurant site designs. Further suppose that you wanted to offer more variety, variations on that initial design. You could create a style variation that caters more toward seafood restaurants with fun fonts and an ocean-oriented color palette. Or maybe you want to set the mood for coffee shops that might be running your theme.

## `Adding custom style variations`

The style variations feature is relatively straightforward if you already understand how `theme.json` works, but there are a couple of differences.

The first difference between `theme.json` and style variations are their names and placement in your theme’s folder structure. `theme.json` lives in the root of your theme folder and is considered the default variation. But custom variations must have a unique filename and be placed in the /styles folder.

```JSON
/your-theme-folder
	/styles
		/latte.json
		/swashbuckler.json
	/theme.json
```

Style variations are simply variations of theme.json, so you have full access to everything in the theme.json specification at your fingertips.

The second difference between theme.json and style variations is the variation title. You can configure this by adding the title property to your custom JSON files.

Building off the Latte variation example above, you would open your /styles/latte.json file and add it, as shown in this code snippet:

```JSON
{
	"version": 2,
	"title": "Latte",
	"settings": {},
	"styles": {}
}
```

## `Style variations vs. child themes`

The most obvious difference is that a style variation is limited to a single JSON file that overrides the primary theme.json, whereas a child theme can override anything from its parent theme. So it’s probably better to look at the one area they are similar: the JSON file itself.

In a child theme, the theme.json simply overrides its parent’s theme.json file. In a style variation—and this is where the major difference occurs—the variation’s JSON file overrides the theme.json file and its data is saved to the database.

---

# `Settings and styles hierarchy`

The `theme.json` file in your theme is only one level in a hierarchy of setting and style configurations for a website. This means it can be overridden under certain circumstances.

The order of this hierarchy from lowest to highest is:

- `WordPress theme.json`: WordPress has its own theme.json file that defines the default settings and styles.
- `Theme theme.json`: Anything you define in your theme’s theme.json file overrides the WordPress defaults.
- `Child theme theme.json`: If active, a child theme’s theme.json takes priority over the main or “parent” theme.
- `User configuration`: Users can further customize how their site works under Appearance > Editor in the WordPress admin, and the JSON data is saved in their site’s database. Their choice takes priority over all other levels in the hierarchy.

[TOP](#global-settings-and-styles-themejson)
