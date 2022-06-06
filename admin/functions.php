<?php
    function checkQuery($mysqliQuery, $location){
        global $connection;
        if(!$mysqliQuery){
            die("QUERY FAILED ." . mysqli_error($connection));
        }
        else{
            header("Location: $location");
        }
    }
    function confirmQuery($mysqliQuery){
        global $connection;
        if(!$mysqliQuery){
            die("QUERY FAILED ." . mysqli_error($connection));
        }
    }
    function deleteItem($GetItem,$tableName,$itemID,$headerLocation){
        global $connection;
        if(isset($_GET[$GetItem])){
            $get_gig_id = $_GET[$GetItem];
            $query = "DELETE FROM $tableName WHERE $itemID = {$get_gig_id}";
            $delete_gig = mysqli_query($connection, $query);
            checkQuery($delete_gig, $headerLocation);
        }
    }
    function nearestEvent($place,$date){
        global $connection;         
        $select_nearest_event = "SELECT * FROM gigs WHERE gig_date > NOW() ORDER BY gig_date LIMIT 1";
        $select_Event = mysqli_query($connection, $select_nearest_event);
        $row_event = mysqli_fetch_assoc($select_Event);   
        $gig_event_nearet = $row_event["gig_date"];
        $gig_event_nearet = strtotime($gig_event_nearet);

        $nearst_place = $row_event['gig_place'];
    

        $place; $date;
        if($date){
            echo  date("l jS F Y", $gig_event_nearet);
        }else if($place){
            echo  $nearst_place ;
        }
       
    }

    function deleteExpiredEvent(){
        global $connection;
        $query = "SELECT gig_date FROM gigs";
        $select_all_gigs = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_all_gigs)){
        $gig_date = $row["gig_date"];
        $current_day = date("Y-m-d");// current day
        $expired = date($gig_date); //from database
            if($expired < $current_day){
                    $query = "DELETE FROM gigs WHERE gig_date = '$expired'";
                    $delete_gig = mysqli_query($connection, $query);
                    confirmQuery($delete_gig);
            }
        }
    }

    function countNumRows($columnName, $tableName){

        global $connection;
        $query = "SELECT $columnName FROM $tableName";
        $select_all_rows = mysqli_query($connection, $query);
   
         return  mysqli_num_rows($select_all_rows);
    }
    














    // function register_user($email, $password){

    //     global $connection;
    
    //         $email    = mysqli_real_escape_string($connection, $email);
    //         $password = mysqli_real_escape_string($connection, $password);
    
    //         $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));
                
                
    //         $query = "INSERT INTO users (user_email, user_password, user_role) ";
    //         $query .= "'{$email}', '{$password}', 'subscriber' )";
    //         $register_user_query = mysqli_query($connection, $query);
    
    //         confirmQuery($register_user_query);
    
            
    
    
    
    // }
?>