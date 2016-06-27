
<div class="container">
    <div class="col-lg-4">
    <form action="../categoryPage.php" method="POST" name="form" class="form-horizontal">
    <legend>СТВОРИТИ КАТЕГОРІЮ</legend>
        <input name="category" type="text" class="form-control" placeholder="нова категорія товару" maxlength="200">
        <?php if (isset($validationError)) {echo $validationError;}?>
        <br><input name="submit" type="submit" class="btn btn-success" value="занести нову категорію в базу">
    </form>
        </div>
</div>

