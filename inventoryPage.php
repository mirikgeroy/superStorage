<?php
include 'head.php';
include 'Queries/itemQueries.php';
include  'Queries/inventoryQueries.php';
if (isset($_POST['number'])) {
    if ($_POST['number'] == '' ){
        $validationError = "Введіть кількість товару";
    }
    elseif ($_POST['operation']=="add_item") {
        inventoryExist($_POST['item_id'], $_POST['number'],$_POST['unit']);
    echo 'Введений товар вже існує!Введену КІЛЬКІСТЬ ДОДАНО';}
    elseif ($_POST['operation']=="remove_item") {
        removeInventory($_POST['item_id'], $_POST['number'],$_POST['unit']);
        echo 'ВВЕДЕНА КІЛЬКІСТЬ ТОВАРУ ВИДАЛЕНА';}
//    elseif (inventoryExist($_POST['item_id'], $_POST['number'],$_POST['unit'])) {
//            echo "";
//
//    }
    else {
    insertInventory($_POST['item_id'], $_POST['number'],$_POST['unit']);
        echo 'НОВА ПОСТАВКА ТОВАРУ ДОДАНА В БАЗУ';
    }
}
if (isset($_GET['removed_invent_id'])){
   deleteInvent($_GET['removed_invent_id']);
}
include 'Forms/inventoryForm.php';
renderInvenroryForm('add_item');
var_dump($_POST['operation']);
renderInvenroryForm('remove_item');
var_dump($_POST['operation']);
$inventories=getInventory();
include 'Tables/inventory.php';
?>
