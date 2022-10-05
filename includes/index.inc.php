<?php

/** GET ALL POSTS */

require "database.inc.php";

$sql = "SELECT a.username, b.title, b.body, b.created_at 
        FROM users a, posts b 
        WHERE a.id = b.user_id 
        ORDER BY created_at DESC";

//fetching data from the database

$result = mysqli_query($conn, $sql);

$arr_results = [];

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $arr_results[] = $row;
    }

}