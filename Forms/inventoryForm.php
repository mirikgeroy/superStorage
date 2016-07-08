<?php
function renderInvenroryForm($action, $validationError)
{
    $items = ($action == 'add_item') ? getItems() : getAvailableItems();
    echo '
<div class="container">
    <div class="row">
    <div class="col-md-4">
    <form action="../inventoryPage.php" method="POST" name="form" class="form-horizontal">
        <legend>РУХ ТОВАРУ ПО СКЛАД</legend>
        <div class="form-group">
            <label for="item_id" class="control-label">Виберіть товар</label>
                        <select name="item_id" class="form-control">';
    foreach ($items as $item) {
        echo '<option value = ' . $item['id'] . ' >' . $item['name'] . '</option>';
    }
    echo '
            </select>
              <br>
              <label for="unit" class="control-label">Одиниця виміру</label>
                              <select name="unit" class="form-control">
                    <option>штук</option>
                    <option>метр</option>
                    <option>кілограм</option>
                    </select>
               <br>
            
            <input name="number" type="text" class="form-control" placeholder="Кількість товару" maxlength="20"><br>
    <input type="hidden" name="operation" value="' . $action . '">
        <input name="submit" type="submit" class="btn btn-success" value="Виконати рух товару"><br>
            </div>
        </div>';
    if (isset($validationError)) {
        echo $validationError;
    };
    echo '
    </form>
    </div>
</div>';
}
