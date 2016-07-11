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

    return $result;
}

/**
 * @return array
 */
function getCategories()
{
    $pdo = new PDO("mysql:host=localhost; dbname=storage", 'root', '');
    $stmt = $pdo->query(
        'SELECT c.name,c.id, COUNT(i.id) AS `count_items`, SUM(i.cost*inv.number) AS money
                          FROM category c
                          LEFT JOIN items i ON i.category_id=c.id
                          LEFT JOIN inventory inv ON inv.item_id=i.id
                          GROUP BY c.id
                          ORDER BY money DESC'
    );
    $res = [];
    while ($row = $stmt->fetch()) {
        $res[] = [
            'id' => $row["id"],
            'name' => $row["name"],
            'count_items' => $row["count_items"],
            'money' => $row["money"],
        ];
    }

    return $res;
}

/**
 * @param string $categoryName
 * @return bool
 */
function categoryExist($categoryName)
{
    include 'connectDb.php';
    $sql = sprintf('SELECT * FROM category WHERE name = "%s"', $categoryName);
    $stmt = $pdo->query($sql);
    if ($stmt->fetch()) {
        return true;
    } else {
        return false;
    }
}

function deleteCategory($categoryId)
{
    include 'connectDb.php';
    $sql = 'DELETE FROM category WHERE id ='.$categoryId;
    $stmt = $pdo->query($sql);

    return $stmt;
}
