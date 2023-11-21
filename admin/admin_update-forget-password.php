<?php
if (isset($_POST['password']) || $_POST['reset_link_token'] || $_POST['email']) {
    $conn = mysqli_connect("localhost", "root", "", "outdidtech_electronics");
    $emailId  = $_POST['email'];
    $token    = $_POST['reset_link_token'];
    $password = $_POST['password_1'];
    $query    = mysqli_query($conn, "SELECT * FROM `admin_user_list` WHERE `reset_link_token`='" . $token . "' and `email`='" . $emailId . "'");
    $row      = mysqli_num_rows($query);
    if ($row) {
        mysqli_query($conn, "UPDATE admin_user_list set  password='" . $password . "', reset_link_token='" . NULL . "' ,exp_date='" . NULL . "' WHERE email='" . $emailId . "'");
        ?>
            <script type="text/javascript">
                alert("Your password has been changed successfully.");
                window.location.href = "index.html";
            </script>                  
        <?php
        
    } else {
        echo "<p>Something goes wrong. Please try again</p>";
        ?>
            <script type="text/javascript">
                alert("Something goes wrong. Please try again.");
                window.location.href = "forgot.html";
            </script>                  
        <?php
    }
}
?>
