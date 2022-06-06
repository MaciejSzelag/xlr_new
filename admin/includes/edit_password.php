
<div class="form-box">
    <?php
if(isset($_POST["submit"])){

    $user_password = $_POST['new_password'];
    $user_confirm_password = $_POST['confirm_new_password'];

    $user_confirm_password =  mysqli_real_escape_string($connection, $user_confirm_password);
    if($user_password === $user_confirm_password){
        
        $query = "SELECT randSalt FROM users";
        $select_rand_salt_query = mysqli_query($connection, $query);
        confirmQuery($select_rand_salt_query);
        $users_row = mysqli_fetch_array($select_rand_salt_query);
        $salt = $users_row['randSalt'];
        $user_password = crypt($user_password, $salt);

        $query = "UPDATE users SET user_password = '$user_password' WHERE user_role = 'xlr_admin'";
        $update_password__query = mysqli_query($connection, $query);
        confirmQuery($update_password__query);

        echo "<div class='alert success' >Password has been updated</div>";
        

    }else{
        echo "<div class='alert danger' >Passswords are different. Try again!</div>";
    }

}

?>
        <h1>Edit password</h1>
        <form action="" method="POST">
            <div class="input-groups">
                <label for="">New password</label>
                <input type="password" name="new_password" placeholder="New password" required>
            </div>
            <div class="input-groups">
                <label for="">Confirm new password</label>
                <input type="password" name="confirm_new_password" placeholder="Confirm new password" required>
            </div>
            <div class="input-groups">
                <input type="submit" name="submit" value="Submit">
            </div>
            <div class="input-groups">
                <input type="submit" name="cancel" value="Cancel">
            </div>
        </form>
     
    </div>

<?php 
    if(isset($_POST["cancel"])){
        $cancel = $_POST["cancel"];
        if($cancel){
            $user_password = $_POST['new_password'];
            $user_confirm_password = $_POST['confirm_new_password'];
            $user_password = null;
            $user_confirm_password = null;
        }
    }

?>
