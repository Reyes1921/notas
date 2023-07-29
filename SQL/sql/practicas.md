[Volver al Menú](../root.md)

# `Practicas`

<table class="table table-striped table-condensed">
        <tbody><tr>
            <td style="width: 15%; text-align: center;">Operator</td>
            <td style="width: 60%">Condition</td>
            <td>Example</td>
        </tr>
        <tr>
            <td style="text-align: center;">=</td>
            <td>Case sensitive exact string comparison (<em>notice the single equals</em>)</td>
            <td>col_name <span class="faux-keyword">=</span> "abc"</td>
        </tr>
        <tr>
            <td style="text-align: center;">BETWEEN … AND …</td>
            <td>Number is within range of two values (inclusive)</td>
            <td>col_name <span class="faux-keyword">BETWEEN</span> 1.5 <span class="faux-keyword">AND</span> 10.5</td>
        </tr>
        <tr>
            <td style="text-align: center;">NOT BETWEEN … AND …</td>
            <td>Number is not within range of two values (inclusive)</td>
            <td>col_name <span class="faux-keyword">NOT BETWEEN</span> 1 <span class="faux-keyword">AND</span> 10</td>
        </tr>
        <tr>
            <td style="text-align: center;">!= or &lt;&gt;</td>
            <td>Case sensitive exact string inequality comparison</td>
            <td>col_name <span class="faux-keyword">!=</span> "abcd"</td>
        </tr>
        <tr>
            <td style="text-align: center;">LIKE</td>
            <td>Case insensitive exact string comparison</td>
            <td>col_name <span class="faux-keyword">LIKE</span> "ABC"</td>
        </tr>
        <tr>
            <td style="text-align: center;">NOT LIKE</td>
            <td>Case insensitive exact string inequality comparison</td>
            <td>col_name <span class="faux-keyword">NOT LIKE</span> "ABCD"</td>
        </tr>
        <tr>
            <td style="text-align: center;">%</td>
            <td>Used anywhere in a string to match 
                a sequence of zero or more characters (only with LIKE or NOT LIKE)</td>
            <td>col_name <span class="faux-keyword">LIKE</span> "%AT%"<br>
                (matches "<span class="uline">AT</span>", "<span class="uline">AT</span>TIC", "C<span class="uline">AT</span>" 
                    or even "B<span class="uline">AT</span>S")</td>
        </tr>
        <tr>
            <td style="text-align: center;">_</td>
            <td>Used anywhere in a string to match 
                a single character (only with LIKE or NOT LIKE)</td>
            <td>col_name <span class="faux-keyword">LIKE</span> "AN_"<br>
                (matches "<span class="uline">AN</span>D", but not "<span class="uline">AN</span>")</td>
        </tr>
        <tr>
            <td style="text-align: center;">IN (…)</td>
            <td>String exists in a list</td>
            <td>col_name <span class="faux-keyword">IN</span> ("A", "B", "C")</td>
        </tr>
        <tr>
            <td style="text-align: center;">NOT IN (…)</td>
            <td>String does not exist in a list</td>
            <td>col_name <span class="faux-keyword">NOT IN</span> ("D", "E", "F")</td>
        </tr>
        <tr>
            <td style="text-align: center;">LIMIT</td>
            <td>Se usa para restringir los registros que se retornan en una consulta "select"</td>
            <td>col_name <span class="faux-keyword">LIMIT</span>SELECT column_name(s)
FROM table_name
WHERE condition
LIMIT number;</td>
        </tr>
        <tr>
            <td style="text-align: center;">OFFSET</td>
            <td>The OFFSET clause specifies the number of rows to skip before starting to return rows from the query. The offset_row_count can be a constant, variable, or parameter that is greater or equal to zero.</td>
            <td>col_name <span class="faux-keyword">LIMIT</span>SELECT column, another_column, …
FROM mytable
WHERE condition(s)
ORDER BY column ASC/DESC
LIMIT num_limit OFFSET num_offset;</td>
        </tr>
    </tbody></table>

[TOP](#practicas)
