<?php
include 'head.php';
include 'Queries/itemQueries.php';
include  'Queries/inventoryQueries.php';
if (isset($_POST['number'])) {
    if ($_POST['number'] == '' ){
        $validationError = "Введіть кількість товару";
    }
    elseif (inventoryExist($_POST['item_id'])) {
            echo "Введений товар вже існує! ДОДАТИ КІЛЬКІСТЬ?";
    }
    else {
    insertInventory($_POST['item_id'], $_POST['number'],$_POST['unit']);
        echo 'НОВА ПОСТАВКА ТОВАРУ ДОДАНА В БАЗУ';
    }
}
if (isset($_GET['removed_invent_id'])){
   deleteInvent($_GET['removed_invent_id']);
}
$items = getItems();
include 'Forms/inventoryForm.php';
$inventories=getInventory();
include 'Tables/inventory.php';
?>
