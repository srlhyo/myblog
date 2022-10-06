<?php

/** GET ALL POSTS */

require "database.inc.php";

$sql = "SELECT a.username, b.title, b.body, b.created_at 
        FROM users a, posts b 
        WHERE a.id = b.user_id 
        ORDER BY created_at DESC";

//fetching data from the database

$result = mysqli_query($conn, $sql);
$posts = json_encode(getPosts($result));
echo $posts;

function getPosts($arr) {

    $arr_results = [];
        
    if (mysqli_num_rows($arr) > 0) {
        while($row = mysqli_fetch_assoc($arr)) {
            $arr_results[] = $row;
        }
    
    }

    return $arr_results;
};
