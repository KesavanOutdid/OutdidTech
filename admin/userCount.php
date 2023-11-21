<?php

// session_start();
include 'db_conn.php';

$sql = "SELECT id from user_list";

 $result = mysqli_query($conn, $sql);

 $output = array();
 
if ($row = mysqli_fetch_array($result)) {

       $rowcountUser = mysqli_num_rows( $result);

        $output[] = array("rowcountUser" => $rowcountUser);
    
}
echo  $rowcountUser;


 