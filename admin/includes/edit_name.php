

<div class="form-box">


<?php
$query = "SELECT * FROM users";
$select_email = mysqli_query($connection,$query);
$user_row = mysqli_fetch_assoc($select_email);
$admin_name = $user_row["user_first_name"];
$admin_id= $user_row["user_id"];



if(isset($_POST["submit"])){
    $new_name = $_POST['new_name'];      
 
    $new_name = mysqli_real_escape_string($connection, $new_name);

        if($new_name){

            $query = "UPDATE users SET 	user_first_name = '$new_name' WHERE user_id = $admin_id";
            $update_name = mysqli_query($connection, $query);
    
            confirmQuery($update_name);


            
            echo "<div class='alert success' >Your name has been changed!</div>";
    

        }else{
            echo "<div class='alert danger' >Something gone wrong! Try again!</div>";
        }




}
?>
<h1>Edit Name</h1>
    <form action="" method="post">
        <div class="input-groups">
            <label for="Current name">Current name</label>
            <input type="text" name="name" value="<?php echo $admin_name;?>" readonly>
        </div>
        <div class="input-groups">
            <label for="Name">New name</label>
            <input type="text" name="new_name" placeholder="New name">
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
        $admin_name = $_POST['user_first_name'];      
        $admin_name = null;
 
    }
}

?>