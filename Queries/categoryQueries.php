<?php
/**
 * @param string $Category
 */
function insertCategory($Category)
{
    $db = mysqli_connect("localhost", "root", "");
    mysqli_set_charset($db, 'utf8');
    mysqli_select_db($db, "storage");

    $result = mysqli_query($db, "INSERT INTO `category` (`name`) VALUE ('$Category')");
    if ($result == 'true') {
        echo "інфо в базу добалено успішно!";
    } else {
        echo "інфо в базу не добалено!";
    }
}

/**
 * @return array
 */
function getCategories()
{
    $pdo = new PDO("mysql:host=localhost; dbname=storage", 'root', '');
    $stmt = $pdo->query('SELECT * FROM category');
    $res = [];
    while ($row = $stmt->fetch()) {
        $res[] = ['id' => $row["id"], 'name' => $row["name"]];
    }
    return $res;
}

/**
 * @param string $categoryName
 * @return bool
 */
function categoryExist($categoryName)
{
    $pdo = new PDO("mysql:host=localhost; dbname=storage", 'root', '');
    $sql=sprintf('SELECT * FROM category WHERE name = "%s"', $categoryName);
    $stmt = $pdo->query($sql);
    if ($stmt->fetch()) {
        return true;
    } else {
        return false;
    }
}
