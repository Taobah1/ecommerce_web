<?php

//   $sn = 0;

// $start = 0;

// $rows_per_page = 5;


 $sql = "SELECT * FROM categories";
 $result = mysqli_query($conn, $sql);
 $num_of_rows = mysqli_num_rows($result);

//  $pages = ceil($num_of_rows / $rows_per_page);

//  if(isset($_GET['page_no'])){
//   $page = $_GET['page_no'] - 1;
//   $start = $page * $rows_per_page;
//   $sn = 5;
// }

//  $sql_d = "SELECT * FROM categories LIMIT $start, $rows_per_page";
 $sql_d = "SELECT * FROM categories";
 $result_d = mysqli_query($conn, $sql_d);

?>