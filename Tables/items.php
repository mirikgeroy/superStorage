<script>
    function deleteMessage($item) {
        var answer = confirm('ДІЙСНО ВИДАЛИТИ ТОВАР?')
        if (answer)
            window.location = "itemsPage.php?removed_item_id=" + $item;
    }
</script>
<?php

echo '<div class="col-lg-6 col-lg-offset-1">';
echo '<table class="table table-striped"><tr><th>#</th><th>НАЗВА КАТЕГОРІЇ</th><th>НАЗВА ТОВАРУ</th>
<th>ЗАКУПІВЕЛЬНА ЦІНА</th><th>видалення товару</th></tr>';
$i = 1;
/** @var array $itemss */
foreach ($items as $item) {
    echo '<tr>
                <td>'.$i.'</td>
                <td>'.$item['category_name'].'</td>
                <td>'.$item['name'].'</td>
                <td>'.$item['cost'].'</td>
                <td><a href="javascript: deleteMessage('.$item['id'].')">Видалити</a></td>
            </tr>';
    $i++;
}
echo '</table>';
echo '</div>';
