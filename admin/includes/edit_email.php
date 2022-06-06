

<div class="form-box">


    <?php
    $query = "SELECT * FROM users";
    $select_email = mysqli_query($connection,$query);
    $user_row = mysqli_fetch_assoc($select_email);
    $admin_mail = $user_row["user_email"];
    $admin_id= $user_row["user_id"];



    if(isset($_POST["submit"])){
        $new_email = $_POST['new_email'];      
        $confirm_new_email = $_POST['confirm_new_email'];  
        $new_email = mysqli_real_escape_string($connection, $new_email);
        $confirm_new_email = mysqli_real_escape_string($connection, $confirm_new_email);
            if($new_email===$confirm_new_email){

                $query = "UPDATE users SET 	user_email = '$new_email' WHERE user_id = $admin_id";
                $update_email = mysqli_query($connection, $query);
        
                confirmQuery($update_email);


                
                echo "<div class='alert success' >Your Email has been updated</div>";
        

            }else{
                echo "<div class='alert danger' >Emails are different. Try again!</div>";
            }
   



    }
?>
<h1>Edit email</h1>
        <form action="" method="post">
            <div class="input-groups">
                <label for="">Current email</label>
                <input type="text" name="email" value="<?php echo $admin_mail;?>" readonly>
            </div>
            <div class="input-groups">
                <label for="">New email</label>
                <input type="text" name="new_email" placeholder="New email">
            </div>
            <div class="input-groups">
                <label for="">Confirm new email</label>
                <input type="text" name="confirm_new_email" placeholder="Confirm new email">
            </div>
            <div class="input-groups">
                <input type="submit" name="submit" value="Submit">
            </div>
            <div class="input-groups">
                <input type="submit" name="cancel" value="Clear">
            </div>
        </form>
    </div>

<?php 
    if(isset($_POST["cancel"])){
        $cancel = $_POST["cancel"];
        if($cancel){
            $new_email = $_POST['new_email'];      
            $confirm_new_email = $_POST['confirm_new_email'];  
            $new_email = null;
            $confirm_new_email = null;
        }
    }

?>