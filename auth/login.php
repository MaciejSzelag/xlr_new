
<?php include "../includes/db.php"?>
<?php include "../admin/functions.php"?>
<?php 
if(isset($_POST["submit-login"])){
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $user_email = trim($user_email);
    $user_password = trim($user_password);
    $user_email = mysqli_real_escape_string($connection, $user_email);
    $user_password = mysqli_real_escape_string($connection, $user_password);
    $query = "SELECT * FROM users WHERE user_email = '$user_email'";
    $select_user_email = mysqli_query($connection, $query);
    confirmQuery($select_user_email);

    while($user_row = mysqli_fetch_array($select_user_email)){
        $db_user_name = $user_row['user_first_name'];
        $db_user_email = $user_row['user_email'];
        $db_user_password = $user_row['user_password'];
        $db_user_role = $user_row['user_role'];
    }
    //checking password
            $user_password = crypt($user_password, $db_user_password);
             if($user_email === $db_user_email && $user_password === $db_user_password && $db_user_role === "xlr_admin" ){
                session_start();
                $_SESSION['user_first_name'] = $db_user_name;
                $_SESSION['user_email'] = $db_user_email;
                $_SESSION['user_password'] = $db_user_password;
                $_SESSION['user_role'] = $db_user_role;
                header("location: ../admin/");  
            }else{
                header("location: ../login.php"); 
            }
    
}
?>