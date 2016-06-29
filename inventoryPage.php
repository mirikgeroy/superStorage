<?php
include 'head.php';
include 'Queries/itemQueries.php';
include  'Queries/inventoryQueries.php';
if (isset($_POST['number'])) {
    if ($_POST['number'] == '' ){
        $validationError = "Введіть кількість товару";
    }
    elseif (inventoryExist($_POST['item_id'], $_POST['number'],$_POST['unit'])) {
            echo "Введений товар вже існує!Введену КІЛЬКІСТЬ ДОДАНО";
        
    }
//    else {
//    insertInventory($_POST['item_id'], $_POST['number'],$_POST['unit']);
//        echo 'НОВА ПОСТАВКА ТОВАРУ ДОДАНА В БАЗУ';
//    }
}
if (isset($_GET['removed_invent_id'])){
   deleteInvent($_GET['removed_invent_id']);
}
include 'Forms/inventoryForm.php';
renderInvenroryForm("add_item");
renderInvenroryForm("remove_item");
if (isset($_POST['operation'])) {
    insertInventory($_POST['item_id'], $_POST['number'],$_POST['unit']);
    echo 'НОВА ПОСТАВКА ТОВАРУ ДОДАНА В БАЗУ';
}
if (isset($_POST[''])){
    removeInvent($_POST['']);
}
$inventories=getInventory();
include 'Tables/inventory.php';
?>
