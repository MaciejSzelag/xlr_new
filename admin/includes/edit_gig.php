<?php
     if(isset($_GET["get_gig_id"])){
        $get_gig_id = $_GET["get_gig_id"];
        $query = "SELECT * FROM gigs WHERE gig_id = $get_gig_id ";
        $select_to_edit = mysqli_query($connection, $query);
        $gig_row = mysqli_fetch_assoc($select_to_edit);
        $gig_id = $gig_row["gig_id"];
        $gig_date = $gig_row["gig_date"];
        $gig_place = $gig_row["gig_place"];
        $gig_start = $gig_row["gig_start"];
        $gig_end = $gig_row["gig_end"];
        $gig_cost = $gig_row["gig_cost"];
     }

?>

                        <div class="form-box">
                            <h1>Edit gig</h1>
                            <form action="" method="post">
                                <div class="input-groups">
                                    <label for="">Date</label>
                                    <input type="date" name="gig_date" placeholder="Add a new date" value="<?php echo $gig_date; ?>">
                                </div>
                                <div class="input-groups">
                                    <label for="">Place</label>
                                    <input type="text" name="gig_place" placeholder="Add a place" value="<?php echo $gig_place; ?>">
                                </div>
                                <div class="input-groups">
                                    <label for="">Start</label>
                                    <input type="time" name="gig_start_time" value="21:00" value="<?php echo $gig_start; ?>">
                                </div>
                                <div class="input-groups">
                                    <label for="">End</label>
                                    <input type="time" name="gig_end_time" value="00:00" value="<?php echo $gig_end; ?>">
                                </div>
                                <div class="input-groups">
                                    <label for="">Price</label>
                                    <input type="text" name="gig_cost" value="Fee" value="<?php echo $gig_cost; ?>">
                                </div>
                                <div class="input-groups">
                                    <input type="submit" name="submit-update-gig" value="Update">
                                </div>
                            </form>
                        </div>
                        <?php 

                            if(isset($_POST["submit-update-gig"])){


                                $gig_date = $_POST["gig_date"];
                                $gig_place = $_POST["gig_place"];
                                $gig_start = $_POST["gig_start_time"];
                                $gig_end = $_POST["gig_end_time"];
                                $gig_cost = $_POST["gig_cost"];

                                $gig_place = mysqli_real_escape_string($connection, $gig_place);
                                $gig_google_link = mysqli_real_escape_string($connection, $gig_google_link);

                                $query = "UPDATE gigs SET gig_date = '$gig_date', gig_place = '$gig_place', gig_start = '$gig_start',gig_end = '$gig_end',gig_cost = '$gig_cost' WHERE gig_id = $get_gig_id ";
                                $update_gig = mysqli_query($connection, $query);
                                checkQuery($update_gig, "index.php?source=show_table");
                            
                            }
                            ?>