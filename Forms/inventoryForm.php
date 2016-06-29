<?php

echo '
<head>
    <title>Кількість товару</title>
</head>
<div class="container">
    <form action="../inventoryPage.php" method="POST" name="formInput" class="form-horizontal" style="float: left">
        <legend>НОВА ПОСТАВКА ТОВАРУ НА СКЛАД</legend>
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
            <input name="number" type="text" class="form-control" placeholder="Кількість товару" maxlength="20"><br>
            <input name="submit" type="submit" class="btn btn-success" value="занести нову поставку товару в базу"><br>
            </div>
        </div>';
    if (isset($validationError)) {
        echo $validationError;
    };
    echo '
    </form>
    <form action="../inventoryPage.php" method="POST" name="formOutput" class="form-horizontal" style="float: right">
        <legend>ВІДВАНТАЖЕННЯ ТОВАРУ ЗІ СКЛАДУ</legend>
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
            <input name="number" type="text" class="form-control" placeholder="Кількість товару" maxlength="20"><br>
            <input name="submit" type="submit" class="btn btn-success" value="видалити товар з бази"><br>
            </div>
        </div>';
    if (isset($validationError)) {
        echo $validationError;
    };
    echo '
    </form>
</div>';

