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
    $sql = 'SELECT i.id as id, i.number as `number`, i.unit as unit, it.name as item_name, c.name as category_name
          FROM inventory i 
          INNER JOIN items it ON it.id=i.item_id
          INNER JOIN category c ON c.id=it.category_id';
    $stmt = $pdo->query($sql);
    $res = [];
    while ($row = $stmt->fetch()) {
        $res[] = [
            'id' => $row["id"],
            'item_name' => $row["item_name"],
            'unit' => $row["unit"],
            'number' => $row["number"],
            'category_name' => $row["category_name"]
        ];
    }

    return $res;
}

/**
 * @param string $itemId
 * @return bool
 */
function inventoryExist($itemId, $number, $unit)
{
    include 'connectDb.php';
    $sql = sprintf('SELECT * FROM inventory WHERE item_id = "%s"', $itemId);
    $stmt = $pdo->query($sql);
    if ($stmt->fetch()) {
        $sql = sprintf(
            'UPDATE inventory 
             SET number = number+"%s"
             WHERE item_id="%s" AND unit="%s"',
            $number,
            $itemId,
            $unit
        );
        $stmt = $pdo->query($sql);
        return true;
    } else {
        return false;
    }
}

function removeInventory($itemId, $number, $unit)
{
    include 'connectDb.php';
    $sql = sprintf('SELECT * FROM inventory WHERE item_id = "%s"', $itemId);
    $stmt = $pdo->query($sql);
    if ($row = $stmt->fetch()) {
        if ($row['number'] >= $number) {
            $sql = sprintf(
                'UPDATE inventory 
             SET number = number-"%s"
             WHERE item_id="%s" AND unit="%s"',
                $number,
                $itemId,
                $unit
            );
            if ($pdo->query($sql)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}

/**
 * @param integer $itemId
 * @return mixed
 */
function deleteInvent($id)
{
    include 'connectDb.php';
    $sql = 'DELETE FROM inventory WHERE id =' . $id;
    $stmt = $pdo->query($sql);

    return $stmt;
}
