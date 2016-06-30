<script>
    function deleteMessage($inventory) {
        var answer = confirm('ДІЙСНО ВИДАЛИТИ ПОЗИЦІЮ?')
        if (answer)
            window.location = "inventoryPage.php?removed_invent_id=" + $inventory;
    }
</script>
<?php

echo '<div class="col-lg-10 col-lg-offset-1">';
echo '<table class="table table-striped"><tr><th>#</th><th>категорія</th></th><th>НАЗВА ТОВАРУ</th><th>Одиниця виміру</th>
<th>КІЛЬКІСТЬ</th><th>видалення товару</th></tr>';
$i = 1;
/** @var array $inventories */
foreach ($inventories as $inventory) {
    echo '<tr>
                <td>'.$i.'</td>
                <td>'.$inventory['category_name'].'</td>
                <td>'.$inventory['item_name'].'</td>
                <td>'.$inventory['unit'].'</td>
                <td>'.$inventory['number'].'</td>
                <td><a href="javascript: deleteMessage('.$inventory['id'].')">Видалити</a></td>
            </tr>';
    $i++;
}
echo '</table>';
echo '</div>';
