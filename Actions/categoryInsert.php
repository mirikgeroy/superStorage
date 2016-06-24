<?php
include '../head.php';
include '../Queries/categoryQueries.php';
if (!isset($_POST['category'])) {
    echo "Введіть найменування категорії товару";

} elseif (categoryExist($_POST['category'])) {
    echo "Введена категорія вже існує";
} else {
    insertCategory($_POST['category']);
    echo "Категорія успішно добавлена!";
}
include '../Forms/categoryForm.php';
$categories = getCategories();
include '../Tables/category.php';
