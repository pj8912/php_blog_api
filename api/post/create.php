<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require '../../Database/Database.php';
require '../../models/Post.php';

$database  = new Database();

$db = $database->connect();


$post = new Post($db);


$postdata = file_get_contents("php://input");
$request = json_decode($postdata);


$title = $request->title;
$body = $request->body;
$author  = $request->author;
$cid = $request->category;



$post->title  = $title;
$post->body = $body;
$post->author = $author;
$post->cid = $cid;


$post->createPost();


// if ($post->createPost()) {
//     json_encode(
//         array('message' => 'Post Created')
//     );
// } else {
//     json_encode(
//         array('message' => 'Post Not Created')
//     );
// }
