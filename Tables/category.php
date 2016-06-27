<script>
    function deleteMessage($category) {
        var answer=confirm('ДІЙСНО ВИДАЛИТИ КАТЕГОРІЮ?')
        if (answer)
            window.location="categoryPage.php?removed_category_id="+$category;
    }
</script>
<?php

echo '<div class="col-lg-6 col-lg-offset-1">';
echo '<table class="table table-striped"><tr><th>#</th><th>НАЗВА КАТЕГОРІЇ</th><th></th></tr>';
$i = 1;
/** @var array $categories */
foreach ($categories as $category) {
    echo '<tr>
                <td>' . $i . '</td>
                <td>' . $category['name'] . '</td>
                <td><a href="javascript: deleteMessage(' . $category['id'] . ')">Видалити</a></td>
            </tr>';
    $i++;
}
echo '</table>';
echo '</div>';
