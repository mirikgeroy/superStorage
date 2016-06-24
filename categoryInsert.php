<?php

include 'includeBootst.php';

if (isset($_POST['category'])) {
    $name = $_POST['category'];
}
    $db = mysqli_connect("localhost", "root", "");
    mysqli_set_charset($db, 'utf8');
    mysqli_select_db($db, "storage");

    $result = mysqli_query($db, "INSERT INTO category (category) VALUE ('$name')");
    if ($result == 'true') {
        echo "інфо в базу добалено успішно!";
    } else {
        echo "інфо в базу не добалено!";
    }
    $pdo = new PDO("mysql:host=localhost; dbname=storage", 'root', '');
//
//$allowed = array("category");
//$sql = "INSERT INTO category SET ".pdoSet($allowed,$values);
//$stm = $pdo->prepare($sql);
//$stm->execute($values);

$stmt = $pdo->query('SELECT * FROM category');
while ($row = $stmt->fetch())
{
    echo '<table class="table table-condensed">
             <tr class="success">
                <td>'.$row["id"].'</td>
                <td>'.$row["category"].'</td>
            </tr>
          </table>';
}
