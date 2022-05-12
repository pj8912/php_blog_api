<?php


$postdata =  file_get_contents("php://input");
$req = json_decode($postdata);

$cname = $req->data;


$conn = mysqli_connect('localhost', 'root', '', 'myblog');
$sql = "INSERT  INTO categories(c_name) VALUES('$cname')";
mysqli_query($conn, $sql);
exit();
