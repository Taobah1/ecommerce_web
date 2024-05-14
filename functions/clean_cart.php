<?php
// include_once('../includes/dbconn.php');

$fiveMinutesAgo = strtotime("-5 minutes");

$sql = "DELETE FROM carts WHERE user_id IS NULL AND created_at < FROM_UNIXTIME($fiveMinutesAgo)";
$result = mysqli_query($conn, $sql);

$sql_whish = "DELETE FROM wish_list WHERE user_id IS NULL AND created_at < FROM_UNIXTIME($fiveMinutesAgo)";
$result_wish = mysqli_query($conn, $sql_whish);



?>