<?php
echo '
<head>
    <title>Нова категорія</title>
</head>
<div class="container">
    <form action="../Actions/categoryInsert.php" method="POST" name="form" class="form-horizontal">
    <legend>СТВОРИТИ КАТЕГОРІЮ</legend>
        <input name="category" type="text" class="form-control" placeholder="нова категорія товару" maxlength="200">
        <br><input name="submit" type="submit" class="btn btn-success" value="занести нову категорію в базу">
    </form>
</div>';

