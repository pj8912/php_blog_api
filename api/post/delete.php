<?php
header('Access-Control-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require '../../Database/Database.php';
require '../../models/Post.php';

$database  = new Database();
$db = $database->connect();


$post = new Post($db);
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);


$post->pid = $request->id;

$post->deletePost();


?>
