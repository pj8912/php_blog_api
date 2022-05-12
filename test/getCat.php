<?php


require '../Database/Database.php';
require '../models/Category.php';

$database  = new Database();

$db = $database->connect();

$cat = new Category($db);

$result =  $cat->getAllCategories();

$num = $result->rowCount();
if ($num > 0) {

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        echo "<option style='margin:3px'  value='" . $row['c_id'] . "'> " . $row['c_name'] . " </option>";
    }
} else {
    echo "NO categories";
}


echo '<hr>';
// $conn = mysqli_connect('localhost', 'root', '', 'myblog');

// $sql = "SELECT * FROM categories";

// $result = mysqli_query($conn, $sql);


// while ($row  = mysqli_fetch_assoc($result)) {

//     echo "<option style='margin:3px'  value='" . $row['c_id'] . "'> " . $row['c_name'] . " </option>";
// }
