<?php

session_start();
include 'db_conn.php';


$sql = "SELECT id from delivery_address_list";

 $result = mysqli_query($conn, $sql);

 $output = array();
 
if ($row = mysqli_fetch_array($result)) {

       $rowcountOrder = mysqli_num_rows( $result);

        $output[] = array("rowcountOrder" => $rowcountOrder);
    
}
 echo  $rowcountOrder;
// encoding array to json format
// echo json_encode($output);
 

  // // delivery order list count
  // $sql = "SELECT * from delivery_address_list";

  // if ($result = mysqli_query($conn, $sql)) {

  //     // Return the number of rows in result set
  //     $rowcountOrder = mysqli_num_rows( $result );
      
  //     // Display result
  //   //  printf("Total rows in this table :  %d\n", $rowcount);
  //   // echo  $rowcountOrder;
  //  }

 