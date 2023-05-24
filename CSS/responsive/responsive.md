[Volver al Menu](../root.md)

# `Responsive Web Design`

Responsive Web Designing is the technique to make your webpages look good on all screen sizes. There are certain techniques used to achieve that e.g. CSS media queries, percentage widths, min or max widths heights etc.

# `Setting The Viewport`

HTML5 introduced a method to let web designers take control over the viewport, through the `<meta>` tag.

You should include the following `<meta>` viewport element in all your web pages:

```
<meta name="viewport" content="width=device-width, initial-scale=1.0">
```
This gives the browser instructions on how to control the page's dimensions and scaling.

The width=device-width part sets the width of the page to follow the screen-width of the device (which will vary depending on the device).

The initial-scale=1.0 part sets the initial zoom level when the page is first loaded by the browser.

<p style="color: red">1. Do NOT use large fixed width elements</p> 

- For example, if an image is displayed at a width wider than the viewport it can cause the viewport to scroll horizontally. Remember to adjust this content to fit within the width of the viewport.

<p style="color: red">2. Do NOT let the content rely on a particular viewport width to render well</p> 

- Since screen dimensions and width in CSS pixels vary widely between devices, content should not rely on a particular viewport width to render well.

<p style="color: red">3. Use CSS media queries to apply different styling for small and large screens</p> 

- Setting large absolute CSS widths for page elements will cause the element to be too wide for the viewport on a smaller device. Instead, consider using relative width values, such as width: 100%. Also, be careful of using large absolute positioning values. It may cause the element to fall outside the viewport on small devices.

# `Responsive Web Design - Images`

## `Using The width Property`

If the width property is set to a percentage and the height property is set to "auto", the image will be responsive and scale up and down:

```
img {
  width: 100%;
  height: auto;
}
```

## `Using The max-width Property`

If the `max-width` property is set to 100%, the image will scale down if it has to, but never scale up to be larger than its original size:

```
img {
  max-width: 100%;
  height: auto;
}
```

# `Background Images`

Background images can also respond to resizing and scaling.

Here we will show three different methods:

1. If the `background-size property` is set to "contain", the background image will scale, and try to fit the content area. However, the image will keep its aspect ratio (the proportional relationship between the image's width and height)

2. If the `background-size` property is set to "100% 100%", the background image will stretch to cover the entire content area

3. If the `background-size` property is set to "cover", the background image will scale to cover the entire content area. Notice that the "cover" value keeps the aspect ratio, and some part of the background image may be clipped


# `Different Images for Different Devices`

A large image can be perfect on a big computer screen, but useless on a small device. Why load a large image when you have to scale it down anyway? To reduce the load, or for any other reasons, you can use media queries to display different images on different devices.

Here is one large image and one smaller image that will be displayed on different devices:

```
/* For width smaller than 400px: */
body {
  background-image: url('img_smallflower.jpg');
}

/* For width 400px and larger: */
@media only screen and (min-width: 400px) {
  body {
    background-image: url('img_flowers.jpg');
  }
}
```

# `The HTML <picture> Element`

The HTML `<picture>` element gives web developers more flexibility in specifying image resources.

The most common use of the `<picture>` element will be for images used in responsive designs. Instead of having one image that is scaled up or down based on the viewport width, multiple images can be designed to more nicely fill the browser viewport.

The `<picture>` element works similar to the `<video>` and `<audio>` elements. You set up different sources, and the first source that fits the preferences is the one being used:

```
<picture>
  <source srcset="img_smallflower.jpg" media="(max-width: 400px)">
  <source srcset="img_flowers.jpg">
  <img src="img_flowers.jpg" alt="Flowers">
</picture>
```

# `Responsive Web Design - Videos`

Almost same as images

# `Responsive Web Design vs Adaptive Design`

The difference between responsive design and adaptive design is that responsive design adapts the rendering of a single page version. In contrast, adaptive design delivers multiple completely different versions of the same page.

<img src="responsive.png">

They are both crucial web design trends that help webmasters control how their site looks on different screens, but the approach is different.

With responsive design, users will access the same basic file through their browser, regardless of device, but CSS code will control the layout and render it differently based on screen size. With adaptive design, there is a script that checks for the screen size, and then accesses the template designed for that device.

# `Flexbox Layout`

While a percentage-based layout is fluid, many designers and web developers felt it was not dynamic or flexible enough. Flexbox is a CSS module designed as a more efficient way to lay out multiple elements, even when the size of the contents inside the container is unknown.

A flex container expands items to fill available free space or shrinks them to prevent overflow. These flex containers have a number of unique properties, like justify-content, that you can’t edit with a regular HTML element.

# `CSS Units and Values for Responsive Design`

CSS has both absolute and relative units of measurement. An example of an absolute unit of length is a cm or a px. Relative units or dynamic values depend on the size and resolution of the screen or the font sizes of the root element.

`PX vs EM vs REM vs Viewport Units for responsive design`

- `PX` – a single pixel

- `EM` – relative unit based on the font-size of the element.

- `REM` – relative unit based on the font-size of the element.

- `VH`, `VW` – `%` of the viewport’s height or width.

- `%` – the percentage of the parent element.

# `Media queries`

It uses the `@media` rule to include a block of CSS properties only if a certain condition is true.

```
@media only screen and (max-width: 600px) {
  body {
    background-color: lightblue;
  }
}

@media only screen and (min-width: 600px) {
  /* For tablets: */
  .col-s-1 {width: 8.33%;}
  .col-s-2 {width: 16.66%;}
  .col-s-12 {width: 100%;}
}

@media only screen and (min-width: 768px) {
  /* For desktop: */
  .col-1 {width: 8.33%;}
  .col-2 {width: 16.66%;}
}
```

## `Typical Device Breakpoints`

There are tons of screens and devices with different heights and widths, so it is hard to create an exact breakpoint for each device. To keep things simple you could target five groups:

```
/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {...}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {...}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {...}

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {...}

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {...}
```

## `Orientation: Portrait / Landscape`

Media queries can also be used to change layout of a page depending on the orientation of the browser.

You can have a set of CSS properties that will only apply when the browser window is wider than its height, a so called "Landscape" orientation:

```
@media only screen and (orientation: landscape) {
  body {
    background-color: lightblue;
  }
}
```

## `CSS Syntax`

```
@media not|only mediatype and (mediafeature and|or|not mediafeature) {
  CSS-Code;
}
```

meaning of the `not`, `only` and and keywords:

`not`: The `not` keyword inverts the meaning of an entire media query.

`only`: The `only` keyword prevents older browsers that do not support media queries with media features from applying the specified styles. It has no effect on modern browsers.

`and`: The `and` keyword combines a media feature with a media type or other media features.

They are all optional. However, if you use `not` or `only`, you must also specify a media type.

## `Target different types of output`

If you don't specify any media type for your CSS, it will automatically have a media type value of all. These two blocks of CSS are equivalent:

```
body {
  color: black;
  background-color: white;
}

@media all {
   body {
     color: black;
     background-color: white;
   }
}
```

## `Combinations`

You can use media queries based on the height of the viewport, not just the width. This could be useful for optimizing interface content "above the fold". In the previous example, if readers are using a wide but short browser window, they have to scroll down one column and then scroll back up to get to the top of the second column. It would be safer to only apply the columns when the viewport is both wide enough and tall enough.

You can combine media queries so that the styles only apply when all the conditions are true. In this example, the viewport must be at least 50em wide and 60em tall in order for the column styles to be applied. Those breakpoints were chosen based on the amount of content.

```
@media (min-width: 50em) and (min-height: 60em) {
  article {
    column-count: 2;
  }
}
```

[TOP](#responsive-web-design)