[Volver al Menú](../root.md)

# `Pattern`

Patterns are one of the most useful tools for theme development, allowing you to reuse groups of blocks across a wide variety of scenarios. Over time, you will likely use patterns more than any other theme feature available in WordPress.

Block patterns (“patterns,” for short) are one of the most powerful features at a theme author’s disposal. Introduced in WordPress 5.4, patterns made it easier for users to insert more complex layouts from the block editor while opening a world of possibilities to designers.

# `What are patterns?`

Essentially, a pattern is nothing more than one or more blocks that have been pre-configured and presented to the end-user. Think of them as reusable groups of blocks.

And that’s it. Really. Patterns are just groups of blocks.

# `Types of patterns`

Essentially, there are two types of patterns:

- `Synced`: Patterns that remain unchanged regardless of how many times or where it’s used on the website. These were formerly called “reusable blocks” in older versions of WordPress. Note: these can only be created and managed from the WordPress admin.

- `Not synced`: Patterns that, when inserted via the Block Editor, create a new instance of the pattern’s blocks. Any changes made to the inserted blocks do not affect other uses of the pattern. Changes to the pattern in the future also do not affect prior uses of it.

# `Managing patterns in the WordPress admin`

Even when building a theme, you will often build patterns directly from the admin before bundling and registering them from within the theme itself. This can also be a good way to store and manage your patterns locally until you are satisfied that they are ready to include in your theme.

### `Copying a pattern to your theme`

The Editor interface is a nice and easy method for creating patterns. But this is the Theme Handbook, so you’re probably wanting to know how to bundle this pattern that you’ve created with your theme.

There are a few different methods for copying pattern code. But the easiest way is to click the Options button (⋮ icon) at the top of the editor and select the Copy all blocks option in the dropdown menu:

```JSON
<!-- wp:cover {"overlayColor":"contrast","align":"full"} -->
<div class="wp-block-cover alignfull"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-100 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"2.5rem"}},"layout":{"type":"constrained","wideSize":"%","contentSize":"75%"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Welcome to My Site</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">This is my little home away from home. Here, you will get to know me. I'll share my likes, hobbies, and more. Every now and then, I'll even have something interesting to say in a blog post.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">See My Popular Posts →︎</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
```

# `Managing theme-bundled patterns`

There is currently no standard for theme authors to manage their patterns or port them directly to their theme without going through the process outlined above.

For the moment, it’s entirely up to you to decide how you want to integrate pattern management into your workflow. Some things to consider:

- You’ll need to manually copy and paste a pattern’s block markup from the admin UI to your theme.
- If you need to make changes to a pattern’s block markup, there’s no way to keep the pattern in your theme and the version you built in the admin in sync.

# `Registering Patterns`

[More Info](https://developer.wordpress.org/themes/patterns/registering-patterns/)

# `Using PHP in Patterns`

[More Info](https://developer.wordpress.org/themes/patterns/using-php-in-patterns/)

# `Usage in Templates`

[More Info](https://developer.wordpress.org/themes/patterns/usage-in-templates/)

# `Starter Patterns`

[More Info](https://developer.wordpress.org/themes/patterns/starter-patterns/)

# `Block Type Patterns`

## `Template Part patterns`

Because template parts are technically blocks themselves, you can also use them as a pattern’s block types. There is one limitation: only parts that use the Header and Footer template part areas are supported. But these are the most common types anyway.

[More Info](https://developer.wordpress.org/themes/patterns/block-type-patterns/)

# `Patterns and Block Locking`

What is Block Locking?
The Block Locking API lets you control how a user interacts with blocks on their site. The types of locking you can do are:

- Disabling block movement in the editor.
- Preventing a block from being removed.
- Preventing new blocks from being inserted.
- Disabling editing block settings other than content and media.

[More Info](https://developer.wordpress.org/themes/patterns/patterns-and-block-locking/)

[TOP](#pattern)
