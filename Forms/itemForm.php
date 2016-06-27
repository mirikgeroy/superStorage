<?php

echo '
<head>
    <title>Новий товар</title>
</head>
<div class="container">
    <div class="col-lg-4">
    <form action="../itemsPage.php" method="POST" name="form" class="form-horizontal">
    <legend>НОВИЙ ТОВАР</legend>
    <label for="category" class="col-lg-12 control-label">Виберіть категорію товару</label>
        <select name="category_id" class="form-control">';
            foreach ($categories as $category) {
                echo '<option value = '.$category['id'].' >'.$category['name'].'</option >';
            }
        echo '</select><br>
        <input name="name_item" type="text" class="form-control" placeholder="Найменування нового товару" maxlength="20"><br>
        <input name="cost" type="text" class="form-control" placeholder="ціна закупки" maxlength="1000">
        <br><input name="submit" type="submit" class="btn btn-success" value="занести новий товар в базу">
    </form>
    </div>
</div>';

