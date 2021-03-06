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
 * @param null|int $categoryId
 * @return array
 */
function getItems($categoryId = null)
{
    $pdo = new PDO("mysql:host=localhost; dbname=storage", 'root', '');
    $sql = 'SELECT i.id as id, i.name as `name`, c.name as category_name, i.cost as cost ,c.id as category_id
          FROM items i 
          INNER JOIN category c ON c.id=i.category_id';
    if ($categoryId){
        $sql.=' WHERE c.id='.$categoryId;
    }
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
 * @return array
 */
function getItems1Cat($categoryId)
{
    $pdo = new PDO("mysql:host=localhost; dbname=storage", 'root', '');
    $sql = 'SELECT i.id as id, i.name as `name`, c.name as category_name, i.cost as cost 
        FROM items i WHERE i.category_id='.$categoryId.'
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
 * @return array
 */
function getAvailableItems()
{
    $pdo = new PDO("mysql:host=localhost; dbname=storage", 'root', '');
    $sql = 'SELECT i.id as id, i.name as `name`, c.name as category_name, i.cost as cost ,c.id as category_id
          FROM items i 
          INNER JOIN category c ON c.id=i.category_id
          INNER JOIN inventory inv ON inv.item_id=i.id';

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
 * @param string $itemName
 * @return bool
 */
function itemExist($itemName, $categoryId)
{
    include 'connectDb.php';
    $sql = sprintf('SELECT * FROM items WHERE name = "%s" AND category_id="%s"', $itemName, $categoryId);
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
    $sql = 'DELETE FROM items WHERE id =' . $itemId;
    $stmt = $pdo->query($sql);

    return $stmt;
}
