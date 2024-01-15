[Volver al Menú](../root.md)

# `Forms and Validations`

Before submitting data to the server, it is important to ensure all required form controls are filled out, in the correct format. This is called client-side form validation, and helps ensure data submitted matches the requirements set forth in the various form controls.

# `What is form validation?`

Go to any popular site with a registration form, and you will notice that they provide feedback when you don't enter your data in the format they are expecting. You'll get messages such as:


- "This field is required" (You can't leave this field blank).

- "Please enter your phone number in the format xxx-xxxx" (A specific data format is required for it to be considered valid).

- "Please enter a valid email address" (the data you entered is not in the right format).

- "Your password needs to be between 8 and 30 characters long and contain one uppercase letter, one symbol, and a number." (A very specific data format is required for your data).

This is called form validation. When you enter data, the browser and/or the web server will check to see that the data is in the correct format and within the constraints set by the application. Validation done in the browser is called client-side validation, while validation done on the server is called server-side validation. In this chapter we are focusing on client-side validation.

#  `Forms and Validations`

<table class="ws-table-all notranslate">
<tbody><tr>
<th style="width:25%">Attribute</th>
<th>Description</th>
</tr>
<tr>
<td>disabled</td>
<td>Specifies that the input element should be disabled</td>
</tr>
<tr>
<td>max</td>
<td>Specifies the maximum value of an input element</td>
</tr>
<tr>
<td>min</td>
<td>Specifies the minimum value of an input element</td>
</tr>
<tr>
<td>pattern</td>
<td>Specifies the value pattern of an input element</td>
</tr>
<tr>
<td>required</td>
<td>Specifies that the input field requires an element</td>
</tr>
<tr>
<td>type&nbsp;</td>
<td>Specifies the type of an input element</td>
</tr>
</tbody></table>

# `Constraint Validation CSS Pseudo Selectors`

<table class="ws-table-all notranslate">
<tbody><tr>
<th style="width:25%">Selector</th>
<th>Description</th>
</tr>
<tr>
<td>:disabled</td>
<td>Selects input elements with the "disabled" attribute specified</td>
</tr>
<tr>
<td>:invalid</td>
<td>Selects input elements with invalid values</td>
</tr>
<tr>
<td>:optional</td>
<td>Selects input elements with no "required" attribute specified</td>
</tr>
<tr>
<td>:required</td>
<td>Selects input elements with the "required" attribute specified</td>
</tr>
<tr>
<td>:valid</td>
<td>Selects input elements with valid values</td>
</tr>
</tbody></table>

# `Different types of client-side validation`

There are two different types of client-side validation that you'll encounter on the web:

- Built-in form validation uses HTML form validation features, which we've discussed in many places throughout this module. This validation generally doesn't require much JavaScript. Built-in form validation has better performance than JavaScript, but it is not as customizable as JavaScript validation.

- JavaScript validation is coded using JavaScript. This validation is completely customizable, but you need to create it all (or use a library).

[TOP](#forms-and-validations)