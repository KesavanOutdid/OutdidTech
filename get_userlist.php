
<?php

include 'db_conn.php';

if (isset($_POST['data'])) {

    $email=$_POST['data'];

}

$sql="SELECT * FROM `user_list` WHERE email = '".$email."'";
$result = mysqli_query($conn, $sql);

$output = array();

while ($row = mysqli_fetch_array($result)) {

        $output[] = array(
            "id" => $row['id'], "name" => $row['name'], "email" => $row['email'], "password" => $row['password'], "phone" => $row['phone'],
            "gender" => $row['gender'], "birthday" => $row['birthday'], "user_profile" => $row['user_profile'], "address" => $row['address'],
             "country" => $row['country'], "city" => $row['city'],  "pincode" => $row['pincode']
        );
}
// encoding array to json format
echo json_encode($output);

?>