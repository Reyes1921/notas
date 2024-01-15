[Volver al Menu](../root.md)

# `Display`

The display CSS property sets whether an element is treated as a block or inline box and the layout used for its children, such as flow layout, grid or flex.

# `Syntax`

The CSS display property is specified using keyword values.

```
/* precomposed values */
display: block;
display: inline;
display: inline-block;
display: flex;
display: inline-flex;
display: grid;
display: inline-grid;
display: flow-root;

/* box generation */
display: none;
display: contents;

/* multi-keyword syntax */
display: block flow;
display: inline flow;
display: inline flow-root;
display: block flex;
display: inline flex;
display: block grid;
display: inline grid;
display: block flow-root;

/* other values */
display: table;
display: table-row; /* all table elements have an equivalent CSS display value */
display: list-item;

/* Global values */
display: inherit;
display: initial;
display: revert;
display: revert-layer;
display: unset;

```

# `Grouped values`

The keyword values can be grouped into six value categories.

## `Outside`

These keywords specify the element's outer display type, which is essentially its role in flow layout:

- `block`

The element generates a block box, generating line breaks both before and after the element when in the normal flow.

- `inline`

The element generates one or more inline boxes that do not generate line breaks before or after themselves. In normal flow, the next element will be on the same line if there is space.

## `Inside`

These keywords specify the element's inner display type, which defines the type of formatting context that its contents are laid out in (assuming it is a non-replaced element):

- `flow Experimental`
The element lays out its contents using flow layout (block-and-inline layout).

    If its outer display type is inline or run-in, and it is participating in a block or inline formatting context, then it generates an inline box. Otherwise it generates a block container box.

    Depending on the value of other properties (such as position, float, or overflow) and whether it is itself participating in a block or inline formatting context, it either establishes a new block formatting context (BFC) for its contents or integrates its contents into its parent formatting context.

- `flow-root`
The element generates a block box that establishes a new block formatting context, defining where the formatting root lies.

- `table`
These elements behave like HTML `<table>` elements. It defines a block-level box.

- `flex`
The element behaves like a block-level element and lays out its content according to the flexbox model.

- `grid`
The element behaves like a block-level element and lays out its content according to the grid model.

- `ruby Experimental`
The element behaves like an inline-level element and lays out its content according to the ruby formatting model. It behaves like the corresponding HTML `<ruby>` elements.

[TOP](#display)