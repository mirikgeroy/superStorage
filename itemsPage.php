<?php
include 'head.php';
include 'Queries/itemQueries.php';
include  'Queries/categoryQueries.php';
if (isset($_POST['name_item'])) {
//    if (itemExist($_POST['itemName'])) {
//        $validationError = "Введений товар вже існує";
//    }
//    elseif ($_POST['categoryId'] == '' or $_POST['itemName'] == '' or $_POST['cost'] == ''){
//        $validationError = "Одне з полів пусте";
//    }
//    else {
        insertItem($_POST['name_item'], $_POST['category_id'],$_POST['cost']);
        echo 'НОВИЙ ТОВАР ДОДАНО В БАЗУ';
//    }
}
if (isset($_GET['removed_item_id'])){
    deleteItem($_GET['removed_item_id']);
}
$categories=getCategories();
include 'Forms/itemForm.php';
$items = getItems();
include 'Tables/items.php';
?>
