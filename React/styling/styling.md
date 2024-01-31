[Volver al Menú](../root.md)

# `Styling`

Material UI is an open-source React component library that implements Google's Material Design. It's comprehensive and can be used in production out of the box.

# `Material UI`

# `Installation`

```
npm install @mui/material @emotion/react @emotion/styled
```

## `Roboto Font`

```
npm install @fontsource/roboto
```

## `Icons`

```
npm install @mui/icons-material
```

# `CssBaseline`

`Material UI` provides an optional `CssBaseline` component. It fixes some inconsistencies across browsers and devices while providing resets that are better tailored to fit `Material UI` than alternative global style sheets like normalize.css.

# `How to customize`

 ## `The sx prop` 

 The `sx` prop is the best option for adding style overrides to a single instance of a component in most cases. It can be used with all Material UI components.

 ```
 <Slider
  defaultValue={30}
  sx={{
    width: 300,
    color: 'success.main',
  }}
/>
 ```

# `Theme scoping`

Learn how to use multiple styling solutions in a single Material UI app.

Create the theme

```
import { createTheme } from "@mui/material";

export const purpleTheme = createTheme({
    palette: {
        primary: {
            main: '#262254',
        },
        secondary: {
            main: '#543884',
        },
        error: {
            main: red.A400,
        }
    }
})
```

Use ThemeProvider with the theme we created

```
import { ThemeProvider } from "@emotion/react"
import { purpleTheme } from "./purpleTheme"


export const AppTheme = ({ children }) => {
    return (
        <ThemeProvider theme={purpleTheme}>
            {/* CssBaseline kickstart an elegant, consistent, and simple baseline to build upon. */}
            <CssBaseline />
            {children}
        </ThemeProvider>
    )
}

```

Now wrap the components where we want to use the theme

```
import { AppTheme } from './theme'

export const JournalApp = () => {
    return (
        <>
            <AppTheme >

                <AppRouter />

            </AppTheme>
        </>
    )
}

```

# `Breakpoints`

Each breakpoint (a key) matches with a fixed screen width (a value):

- `xs` extra-small: 0px
- `sm` small: 600px
- `md` medium: 900px
- `lg` large: 1200px
- `xl` extra-large: 1536px

```
<Box sx={(theme) => ({ color: 'red', [theme.breakpoints.up('xs')]: { color: 'blue' } })}>
    Text for extra small screens
</Box>
```

```
<Box component='nav' sx={{ width: { sm: drawerWidth }, flexShrink: { sm: 0 } }}>
    Text for extra small screens
</Box>
```

# `Components`

## `Grid`

The `Grid` component works well for a layout with known columns. The columns can be configured in multiple breakpoints which you have to specify the column span of each child.

### `How it works`

- It uses CSS's Flexible Box module for high flexibility.
- The grid is always a flex item. Use the container prop to add flex container to it.
- Item widths are set in percentages, so they're always fluid and sized relative to their parent element.
- Integer values can be given to each breakpoint, indicating how many of the 12 available columns are occupied by the component when the viewport width satisfies the breakpoint constraints.
- It uses negative margin and padding technique to create gap-like between children.
- It does not have the concept of rows. Meaning, you can't make the children span to multiple rows. If you need to do that, we recommend to use CSS Grid instead.
- It does not offer auto-placement children feature. It will try to fit the children one by one and if there is not enough space, the rest of the children will start on the next line and so on. If you need the auto-placement feature, we recommend to use CSS Grid instead.

```
<Grid container spacing={2}>
  <Grid xs={8}>
    <Item>xs=8</Item>
  </Grid>
  <Grid xs={4}>
    <Item>xs=4</Item>
  </Grid>
  <Grid xs={4}>
    <Item>xs=4</Item>
  </Grid>
  <Grid xs={8}>
    <Item>xs=8</Item>
  </Grid>
</Grid>
```

### `Responsive values is supported by:`

- `columns`
- `columnSpacing`
- `direction`
- `rowSpacing`
- `spacing`

## `Container`

The container centers your content horizontally. It's the most basic layout element.

```
      <Container maxWidth="sm">
        <Box sx={{ bgcolor: '#cfe8fc', height: '100vh' }} />
      </Container>
```

## `Box`

The `Box` component is a generic, theme-aware container with access to CSS utilities from MUI System.

The `Box` component is a generic container for grouping other components. It's a fundamental building block—you can think of it as a `<div>` with special features (like access to your app's theme and the sx prop).

The `Box` component renders as a `<div>` by default, but you can swap in any other valid HTML tag or React component using the component prop. The demo below replaces the `<div>` with a `<section>` element:

```
import * as React from 'react';
import Box from '@mui/system/Box';

export default function BoxBasic() {
  return (
    <Box component="section" sx={{ p: 2, border: '1px dashed grey' }}>
      This is a section container
    </Box>
  );
}
```

### `Some props`

```
<Box height={20} width={20} my={4} display="flex" alignItems="center" gap={4}>
```

## `Stack`

Stack is a container component for arranging elements vertically or horizontally.

```
<Stack spacing={2}>
  <Item>Item 1</Item>
  <Item>Item 2</Item>
  <Item>Item 3</Item>
</Stack>
```

### `Stack vs. Grid`

`Stack` is concerned with one-dimensional layouts, while Grid handles two-dimensional layouts. The default direction is column which stacks children vertically.

### `Some props`

```
<Stack direction="row" spacing={2} useFlexGap flexWrap="wrap">
```


[TOP](#styling)
