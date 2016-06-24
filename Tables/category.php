<?php
echo '<table class="table table-striped"><tr><th>#</th><th>НАЗВА КАТЕГОРІЇ</th></tr>>';
$i = 1;
/** @var array $categories */
foreach ($categories as $category) {
    echo '<tr class="success">
                <td>' . $i . '</td>
                <td>' . $category['name'] . '</td>
            </tr>';
    $i++;
}
echo '</table>';
