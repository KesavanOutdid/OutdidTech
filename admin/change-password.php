<?php include('admin-server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="assets/images/icon/icon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/icon/icon.png" type="image/x-icon">
    <title>Outdidtech - Change Password</title>

    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- <script type="text/javascript">
        function preventBack() {window.history.forward()};
        setTimeout("preventBack()",0);
           window.onunload=function(){null;}
    </script> -->

</head>

<body>

    <!-- login section start -->
    <section class="log-in-section section-b-space">
        <!-- <a href="" class="logo-login"><img src="assets/images/logo/1.png" class="img-fluid"></a>  -->
        <div class="container w-100">
            <div class="row">

                <div class="col-xl-5 col-lg-6 me-auto">
                <div class="log-in-box">
                            <div class="log-in-title">
                                <!-- <h3>Welcome To Outdid Electronics</h3> -->
                                <h4>Change your password</h4>
                            </div>

                            <div class="input-box">
                            <?php
                                if($_GET['key'] || $_GET['token']){
                                $conn = mysqli_connect("localhost", "root", "", "outdidtech_electronics");
                                $email = $_GET['key'];
                                $token = $_GET['token'];
                                $query = mysqli_query($conn,
                                   "SELECT * FROM `admin_user_list` WHERE `reset_link_token`='".$token."' and `email`='".$email."';"
                                );
                                date_default_timezone_set('Asia/Kolkata');
                                $curDate = date("Y-m-d H:i:s");
                                if (mysqli_num_rows($query) > 0) {
                                $row= mysqli_fetch_array($query);
                                if($row['exp_date'] >= $curDate){ ?>

                                <form class="row g-4" action="admin_update-forget-password.php" method="post">
                                    <input type="hidden" name="email" value="<?php echo $email;?>">
                                    <input type="hidden" name="reset_link_token" value="<?php echo $token;?>">
                                        <div class="col-12">
                                            <div class="form-floating theme-form-floating log-in-form">
                                                <input type="password" class="form-control" name="password_1" id="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" required>
                                                <label for="password">Password</label>
                                            </div>
                                        </div>

                                        <!-- <div class="col-12">
                                            <div class="form-floating theme-form-floating log-in-form">
                                                <input type="password" class="form-control" name="password_2" id="password" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                                <label for="password">Confirm Password</label>
                                            </div>
                                        </div> -->

                                        <div class="col-12">
                                            <button class="btn btn-animation w-100" name="new_password">Change Password</button>
                                        </div>
                                </form>
                                <?php 
                                } 
                                } else{
                                    ?>
                                    <script type="text/javascript">
                                        alert("This link has been expired.");
                                        window.location.href = "forgot.html";
                                    </script>                  
                                    <?php
                                }
                            }
                            ?>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login section end -->

</body>

</html>