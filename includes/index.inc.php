<?php

/** GET ALL POSTS */

include $_SERVER['DOCUMENT_ROOT']."/includes/database.inc.php";

function getPosts() {
    global $conn;

    $sql = "SELECT a.username, b.title, b.body, b.created_at 
    FROM users a, posts b 
    WHERE a.id = b.user_id 
    ORDER BY created_at DESC";

    $result = mysqli_query($conn, $sql);

    $arr_results = [];

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $arr_results[] = $row;
        }
    
    }

    mysqli_close($conn);

    return $arr_results;
};
