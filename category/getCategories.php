<?php


// $conn = mysqli_connect('localhost', 'root', '', 'myblog');

// $sql = "SELECT * FROM categories";

// $res = mysqli_query($conn, $sql);

// $row = mysqli_fetch_all($res, MYSQLI_ASSOC);


require '../Database/Database.php';
require '../models/Category.php';

$database  = new Database();

$db = $database->connect();

$cat = new Category($db);

$result =  $cat->getAllCategories();

$row = $result->fetchAll(PDO::FETCH_ASSOC);

exit(json_encode($row));
