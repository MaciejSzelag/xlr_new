<?php 
ob_start(); 
?>

<?php include "../includes/db.php"?>
<?php include "functions.php"?>

<?php session_start(); ?>
<?php 
if(isset($_SESSION['user_role'])) {

    if($_SESSION['user_role'] == "xlr_admin"){
        // header("location: ../admin/");
    }else {

        header("location: ../index.php");


}

} else{
    header("location: ../login.php");
}

?>
    


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>XLR | Admin</title>
        <link rel="stylesheet" href="css/admin-style.css">
        <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
        <link rel="manifest" href="images/favicon/site.webmanifest">
        <!-- fontawsome -->
        <link rel="stylesheet" href="css/all.min.css">
        <!-- <link rel="stylesheet" href="css/fontawesome.min.css"> -->

        <script src="https://kit.fontawesome.com/419ae1959f.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <nav>
            <!-- <div class="logo">
                <div class="logo-wrap">
                    <img src="/images/favicon/android-chrome-192x192.png" alt="XLR - LOGO - favicon">
                </div>
            </div> -->
            <div class="ham-wrap">
                <div class="line-container">
                    <div class="line-box">
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="menu-wrap">

                <div class="menu-container">
                    <div class="menu-list">
                        <ul>
                            <li><a href="../" data-replace="Go home">Front Page</a></li>
                            <li><a href="index.php?source=show_table" data-replace="Show gigs">Show all gigis</a></li>
                            <li><a href="index.php" data-replace="Admin-Home">Dashboard</a></li>
                            <li><a href="../includes/logout.php" data-replace="Bye Bye">Logout</a></li>
                            <!-- <li><a href="index.php?source=" data-replace="Admin-Home">Dashboard</a></li> -->

                        </ul>
                    </div>
                </div>
            </div>

        </nav>