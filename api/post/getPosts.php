<?php

require '../../Database/Database.php';
require '../../models/Post.php';

$database  = new Database();

$db = $database->connect();


$post = new Post($db);

$result = $post->getPosts();

// $num = $result->rowCount();


$row = $result->fetchAll(PDO::FETCH_ASSOC);

exit(json_encode($row));


