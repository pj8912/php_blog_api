<?php

require '../../Database/Database.php';
require '../../models/Category.php';

$database  = new Database();

$db = $database->connect();


$category = new Category($db);

$result = $category->getAllCategories();

// $num = $result->rowCount();


$row = $result->fetchAll(PDO::FETCH_ASSOC);

exit(json_encode($row));


