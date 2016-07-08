<?php
include 'head.php';
include 'Queries/itemQueries.php';
include 'Queries/inventoryQueries.php';
$validationError = false;
if (isset($_POST['number'])) {
    if ($_POST['number'] == '') {
        $validationError = "<span class='bg-danger'> Введіть кількість товару</span>";
    } elseif ($_POST['operation'] == "add_item") {
        $exist = inventoryExist($_POST['item_id'], $_POST['number'], $_POST['unit']);
        if (!$exist) {
            insertInventory($_POST['item_id'], $_POST['number'], $_POST['unit']);
            echo 'НОВА ПОСТАВКА ТОВАРУ ДОДАНА В БАЗУ';
        } else {
            echo 'Введений товар вже існує!Введену КІЛЬКІСТЬ ДОДАНО';
        }
    } elseif ($_POST['operation'] == "remove_item") {
        $remove = removeInventory($_POST['item_id'], $_POST['number'], $_POST['unit']);
        if ($remove) {
            
            echo 'ВВЕДЕНА КІЛЬКІСТЬ ТОВАРУ ВИДАЛЕНА';
        } else {
            echo 'НЕДОСТАТНЬО ТОВАРУ НА СКЛАДІ';
        }
    }
}
if (isset($_GET['removed_invent_id'])) {
    deleteInvent($_GET['removed_invent_id']);
}
include 'Forms/inventoryForm.php';
renderInvenroryForm('add_item', $validationError);
renderInvenroryForm('remove_item', $validationError);
$inventories = getInventory();
include 'Tables/inventory.php';
?>
