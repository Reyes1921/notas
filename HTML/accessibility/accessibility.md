[Volver al Menú](../root.md)

# `Accessibility`

Web accessibility means that websites, tools, and technologies are designed and developed in such a way that people with disabilities can use them easily.

# `So what is accessibility?`

Accessibility is the practice of making your websites usable by as many people as possible. We traditionally think of this as being about people with disabilities, but the practice of making sites accessible also benefits other groups such as those using mobile devices, or those with slow network connections.

You might also think of accessibility as treating everyone the same, and giving them equal opportunities, no matter what their ability or circumstances. Just as it is wrong to exclude someone from a physical building because they are in a wheelchair (modern public buildings generally have wheelchair ramps or elevators), it is also not right to exclude someone from a website because they have a visual impairment. We are all different, but we are all human, and therefore have the same human rights.

Accessibility is the right thing to do. Providing accessible sites is part of the law in some countries, which can open up some significant markets that otherwise would not be able to use your services or buy your products.# `

## `Associate a label with every form control`

Use a for attribute on the `<label>` element linked to the id attribute of the form element, or using WAI-ARIA attributes. In specific situations it may be acceptable to hide `<label>` elements visually, but in most cases labels are needed to help all readers understand the required input.

## `Include alternative text for images`

## `Identify page language and language changes`

## `Use mark-up to convey meaning and structure`

Use appropriate mark-up for headings, lists, tables, etc. HTML5 provides additional elements, such as `<nav>` and `<aside>`, to better structure your content. WAI-ARIA roles can provide additional meaning, for example, using role="search" to identify search functionality. Work with designers and content writers to agree on meanings and then use them consistently.

## `Help users avoid and correct mistakes`

Provide clear instructions, error messages, and notifications to help users complete forms on your site. When an error occurs:

- Help users find where the problem is

- Provide specific, understandable explanations

- Suggest corrections

Be as forgiving of format as possible when processing user input. For example, accept phone numbers that include spaces and delete the spaces as needed.

## `Reflect the reading order in the code order`

Ensure that the order of elements in the code matches the logical order of the information presented. One way to check this is to remove CSS styling and review that the order of the content makes sense.

## `Write code that adapts to the user’s technology`

Use responsive design to adapt the display to different zoom states and viewport sizes, such as on mobile devices and tablets. When font size is increased by at least 200%, avoid horizontal scrolling and prevent any clipping of content. Use progressive enhancement to help ensure that core functionality and content is available regardless of technology being used.

## `Provide meaning for non-standard interactive elements`

Use WAI-ARIA to provide information on function and state for custom widgets, such as accordions and custom-made buttons. For example, role="navigation" and aria-expanded="true". Additional code is required to implement the behavior of such widgets, such as expanding and collapsing content or how the widget responds to keyboard events.

## `Ensure that all interactive elements are keyboard accessible`

Think about keyboard access, especially when developing interactive elements, such as menus, mouseover information, collapsable accordions, or media players. Use tabindex="0" to add an element that does not normally receive focus, such as `<div>` or `<span>`, into the navigation order when it is being used for interaction. Use scripting to capture and respond to keyboard events.

## `Avoid CAPTCHA where possible`

CAPTCHAs create problems for many people. There are other means of verifying that user input was generated by a human that are easier to use, such as automatic detection or interface interactions. If CAPTCHA really needs to be included, ensure that it is simple to understand and includes alternatives for users with disabilities, such as:


- Providing more than two ways to solve the CAPTCHAs

- Providing access to a human representative who can bypass CAPTCHA

- Not requiring CAPTCHAs for authorized users.

[More info](https://www.smashingmagazine.com/2021/03/complete-guide-accessible-front-end-components/)