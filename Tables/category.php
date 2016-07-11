<script>
    function deleteMessage($category) {
        var answer = confirm('ДІЙСНО ВИДАЛИТИ КАТЕГОРІЮ?')
        if (answer)
            window.location = "categoryPage.php?removed_category_id=" + $category;
    }
</script>
<?php
echo '<div class="col-lg-6 col-lg-offset-1">';
echo '<table class="table table-striped"><tr><th>#</th><th>НАЗВА КАТЕГОРІЇ</th><th>Кількість товарів</th><th>Бабло, грн</th><th>Видалити</th></tr>';
$i = 1;
$sum = 0;
/** @var array $categories */
foreach ($categories as $category) {
    echo '<tr>
                <td>'.$i.'</td>
                <td><a href="itemsPage.php?selected_cat='.$category['id'].'">'.$category['name'].'</a></td>
                <td>'.$category['count_items'].'</td>
                <td>'.$category['money'].'</td>             
                <td><a href="javascript: deleteMessage('.$category['id'].')">Видалити</a></td>
            </tr>';
    $sum = $sum+$category['money'];
    $i++;
}
echo '</table>';
echo '<h4>Всього товару на складі на: <strong>'.$sum.'</strong> ГРН</h4></div>';
