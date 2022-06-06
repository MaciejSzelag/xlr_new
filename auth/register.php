<?php include "../includes/db.php"?>
<?php include "../admin/functions.php"?>
<?php 
if(isset($_POST['submit-register'])){
    $user_firstname = $_POST['firstName'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $user_confirm_password = $_POST['confirm_password'];

    $user_firstname = mysqli_real_escape_string($connection, $user_firstname);
    $user_email = mysqli_real_escape_string($connection, $user_email);
    $user_password = mysqli_real_escape_string($connection, $user_password);
    $user_confirm_password =  mysqli_real_escape_string($connection, $user_confirm_password);
    if($user_password === $user_confirm_password){


        // $message =  "Password is ok and email is ok";


        $query = "SELECT randSalt FROM users";
        $select_rand_salt_query = mysqli_query($connection, $query);
        confirmQuery($select_rand_salt_query);

        $users_row = mysqli_fetch_array($select_rand_salt_query);
        $salt = $users_row['randSalt'];
        $user_password = crypt($user_password, $salt);



        if(!empty($user_firstname) && !empty($user_email) && !empty($user_password) && !empty($user_password)){

            $query = "SELECT randSalt FROM users WHERE user_email = '$user_email' ";
            $select_user_emails = mysqli_query($connection, $query);
            // check if email exist
            if($select_user_emails->num_rows > 0){

                $message_email =  "<span class='wrong'>Email exist. You have to choose different.</span>";

            }else{
            


                $query = "INSERT INTO users(user_first_name, user_email, user_password, user_role) VALUES('$user_firstname','$user_email','$user_password','subscriber')";

                $insert_new_record = mysqli_query($connection,$query);
                confirmQuery($insert_new_record);

                // $user_email = "";
    
                // $message_success = "Thank you for register. Now you can login on your account";
                checkQuery($insert_new_record, "../");

            }

        }
} 
// else{


// $message =  "<span class='wrong'> - The given passwords do not match. </span>";
// }

}

?>
