<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
// header('access-control-allow-headers: Access-Control-Allow-Headers, Authorization, X-Requested-With, Content-Type');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

//instantiate database model
$database = new Database();
$db = $database->connect();

//instantiate blog post object
$post = new Post($db);

//get raw posted data
$data = json_decode(file_get_contents("php://input"), true);

$post->title = $data['title'];
$post->body = $data['body'];
$post->author = $data['author'];
$post->category_id = $data['category_id'];

//create post
if ($post->create()) {
    echo json_encode(array('message' => 'Post created'));
} else {
    echo json_encode(array('message' => 'Post not created'));
}

