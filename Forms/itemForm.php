<?php

echo '
<head>
    <title>Новий товар</title>
</head>
<div class="container">
        <form action="../itemsPage.php" method="POST" name="form" class="form-horizontal">
        <legend>НОВИЙ ТОВАР</legend>
            <div class="form-group">
                <label for="category" class="col-lg-4 control-label">Виберіть категорію товару</label>
                    <div class="col-lg-5">
                    <select name="category_id" class="form-control">';
                    foreach ($categories as $category) {
                    echo '<option value = '.$category['id'].' >'.$category['name'].'</option >';
                    }
                    echo '
                    </select><br>
                    </div>
            <div class="col-lg-5">
            <input name="name_item" type="text" class="form-control" placeholder="Найменування нового товару" maxlength="20"><br>
            <input name="cost" type="text" class="form-control" placeholder="ціна закупки" maxlength="1000">
            <br><input name="submit" type="submit" class="btn btn-success" value="занести новий товар в базу">
            <br>
            </div>
            </div>';
if (isset($validationError)) {
    echo $validationError;
};
echo '
        </form>
    </div>
</div>';

