<?php
/**
 * @param string $itemName
 * @param integer $categoryId
 * @param float $cost
 * @return bool|mysqli_result
 */
function insertItem($itemName, $categoryId, $cost)
{
    $db = mysqli_connect("localhost", "root", "");
    mysqli_set_charset($db, 'utf8');
    mysqli_select_db($db, "storage");

    $result = mysqli_query(
        $db,
        "INSERT INTO `items` (`name`,`category_id`,`cost`) VALUE ('$itemName','$categoryId','$cost')"
    );

    return $result;
}

/**
 * @return array
 */
function getItems()
{
    $pdo = new PDO("mysql:host=localhost; dbname=storage", 'root', '');
    $sql='SELECT i.id as id, i.name as `name`, c.name as category_name, i.cost as cost 
          FROM items i 
          INNER JOIN category c ON c.id=i.category_id';
    $stmt = $pdo->query($sql);
    $res = [];
    while ($row = $stmt->fetch()) {
        $res[] = [
            'id' => $row["id"],
            'name' => $row["name"],
            'category_name' => $row["category_name"],
            'cost' => $row["cost"],
        ];
    }

    return $res;
}

/**
 * @param string $categoryName
 * @return bool
 */
function itemExist($itemName)
{
    include 'connectDb.php';
    $sql = sprintf('SELECT * FROM items WHERE name = "%s"', $itemName);
    $stmt = $pdo->query($sql);
    if ($stmt->fetch()) {
        return true;
    } else {
        return false;
    }
}

/**
 * @param integer $itemId
 * @return mixed
 */
function deleteItem($itemId)
{
    include 'connectDb.php';
    $sql = 'DELETE FROM items WHERE id ='.$itemId;
    $stmt = $pdo->query($sql);

    return $stmt;
}
