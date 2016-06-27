<?php
/**
 * @param string $itemName
 * @param integer $categoryId
 * @param float $cost
 * @return bool|mysqli_result
 */
function insertInventory($itemId, $number, $unit)
{
    $db = mysqli_connect("localhost", "root", "");
    mysqli_set_charset($db, 'utf8');
    mysqli_select_db($db, "storage");

    $result = mysqli_query(
        $db,
        "INSERT INTO `inventory` (`item_id`,`number`,`unit`) VALUE ('$itemId','$number','$unit')"
    );

    return $result;
}

/**
 * @return array
 */
function getInventory(/**categoryId = null*/)
{
    $pdo = new PDO("mysql:host=localhost; dbname=storage", 'root', '');
    $sql = 'SELECT i.id as id, i.number as `number`, i.unit as unit, it.name as item_name
          FROM inventory i 
          INNER JOIN items it ON it.id=i.item_id';
//    if (categoryId){
//        $stmt = $pdo->query($sql);
//        $res = [];
//        while ($row = $stmt->fetch()) {
//            $res[] = [
//                'id' => $row["id"],
//                'name' => $row["name"],
//                'category_name' => $row["category_name"],
//                'cost' => $row["cost"],
//            ];
//    }
    $stmt = $pdo->query($sql);
    $res = [];
    while ($row = $stmt->fetch()) {
        $res[] = [
            'id' => $row["id"],
            'item_name' => $row["item_name"],
            'unit' => $row["unit"],
            'number' => $row["number"],
        ];
    }

    return $res;
}

/**
 * @param string $itemName
 * @return bool
 */
function inventoryExist($itemId)
{
    include 'connectDb.php';
    $sql = sprintf('SELECT * FROM items WHERE id = "%s"', $itemId);
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
function deleteInvent($id)
{
    include 'connectDb.php';
    $sql = 'DELETE FROM inventory WHERE id ='.$id;
    $stmt = $pdo->query($sql);

    return $stmt;
}