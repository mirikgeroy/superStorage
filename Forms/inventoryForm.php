<?php
function renderInvenroryForm($action)
{
$items = getItems();
    echo '
<head>
    <title>Рух товару</title>
</head>
<div class="container">
    <form action="../inventoryPage.php" method="POST" name="form" class="form-horizontal">
        <legend>РУХ ТОВАРУ ПО СКЛАД</legend>
        <div class="form-group">
            <label for="item_id" class="col-lg-4 control-label">Виберіть товар</label>
            <div class="col-lg-4">
            <select name="item_id" class="form-control">';
    foreach ($items as $item) {
        echo '<option value = '.$item['id'].' >'.$item['name'].'<option >';
    }
    echo '
            </select>
            </div>
            <br>
        </div>
        <div class="form-group">
            <label for="unit" class="col-lg-4 control-label">Одиниця виміру</label>
               <div class="col-lg-4">
               <select name="unit" class="form-control">
                    <option>штук</option>
                    <option>метр</option>
                    <option>кілограм</option>
                    </select>
               </div><br>
            </div>
            <div class="form-group">
            <div class="col-lg-4 control-label" >
            <input name="number" type="text" class="form-control" placeholder="Кількість товару" maxlength="20"><br>';
    sprintf('<input type=«hidden» name="operation" value=«%s»>', $action);
        echo '<input name="submit" type="submit" class="btn btn-success" value="Виконати рух товару"><br>
            </div>
        </div>';
    if (isset($validationError)) {
        echo $validationError;
    };
    echo '
    </form>
</div>';
}
