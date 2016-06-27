<?php
include 'head.php';
include 'Queries/itemQueries.php';
include  'Queries/categoryQueries.php';
if (isset($_POST['name_item'])) {
    if (itemExist($_POST['name_item'],$_POST['category_id'])) {
        $validationError = "Введений товар вже існує";
    }
    elseif ($_POST['name_item'] == '' ){
        $validationError = "Введіть найменування товару";
    }
    elseif ($_POST['cost'] == ''){
        $validationError = "Введіть ціну закупки товару";
    }

    else {
        insertItem($_POST['name_item'], $_POST['category_id'],$_POST['cost']);
        echo 'НОВИЙ ТОВАР ДОДАНО В БАЗУ';
    }
}
if (isset($_GET['removed_item_id'])){
    deleteItem($_GET['removed_item_id']);
}
$categories=getCategories();

include 'Forms/itemForm.php';
$items = getItems();
include 'Tables/items.php';
?>
