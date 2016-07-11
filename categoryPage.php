<?php
$time= time();
echo  gmdate("Y-m-d **** H:i:s", $time);
include 'head.php';
include 'Queries/categoryQueries.php';
if (isset($_POST['category'])) {
    if (categoryExist($_POST['category'])) {
        $validationError = "Введена категорія вже існує";
    }
    elseif ($_POST['category'] == '' ){
        $validationError = "Введена категорія пуста";
    }
    else {
        insertCategory($_POST['category']);
        echo 'НОВА КАТЕГОРІЯ ДОДАНА В БАЗУ';
    }
}
if (isset($_GET['removed_category_id'])){
    deleteCategory($_GET['removed_category_id']);
}
include 'Forms/categoryForm.php';
$categories = getCategories();
include 'Tables/category.php';

?>
