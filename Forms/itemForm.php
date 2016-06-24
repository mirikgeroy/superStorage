<?php

echo '
<head>
    <title>Новий товар</title>
</head>
<div class="container">
    <form action="../Actions/itemInsert.php" method="POST" name="form" class="form-horizontal">
    <legend>НОВИЙ ТОВАР</legend>
        <input name="id_category" type="text" class="form-control" placeholder="Категорія товару" maxlength="20"><br>
        <input name="nameitem" type="text" class="form-control" placeholder="Найменування нового товару" maxlength="20"><br>
        <input name="number" type="text" class="form-control" placeholder="кількість" maxlength="1000"><br>
        <input name="cost" type="text" class="form-control" placeholder="ціна закупки" maxlength="1000">
        <br><input name="submit" type="submit" class="btn btn-success" value="занести новий товар в базу">
    </form>
</div>';

