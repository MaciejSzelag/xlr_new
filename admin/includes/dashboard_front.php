                        <div class="feed-box">
                            <h1>Welcome <?php echo $_SESSION['user_first_name']; ?></h1>
                            <p>Today is <?php echo date("l jS F Y"); ?></p>

                            <?php 
                            //select all gigs 
                            $query = "SELECT * FROM gigs ORDER BY gig_date";
                            $select_all_gigs = mysqli_query($connection, $query);

                            $row = mysqli_fetch_assoc($select_all_gigs);
                                $gig_id = $row["gig_id"];
                                $gig_date = $row["gig_date"];
                             
                                $gig_place = $row["gig_place"];
                                // $gig_start = $row["gig_start"];
                                // $gig_end = $row["gig_end"];
                                // $gig_cost = $row["gig_cost"];
                                $gig_date = strtotime($gig_date);

                            ?>
                                <h3>Your next gig will be on: <br> <span class=""><?php  nearestEvent(false, true); ?></span></h3>
                                <p>at  <?php echo nearestEvent(true, false) ?></p>


                         
                            <button> <a href="index.php?source=edit_gig&get_gig_id=<?php echo $gig_id?>" class="btn">Update this gig</a></button>
                        </div>
                            <?php
                            if(isset($_POST["submit-add-gig"])){
                                $gig_date = $_POST["gig_date"];
                                $gig_place = $_POST["gig_place"];
                                $gig_start = $_POST["gig_start_time"];
                                $gig_end = $_POST["gig_end_time"];
                                $gig_cost = $_POST["gig_cost"];

                                $gig_place = mysqli_real_escape_string($connection, $gig_place);
                                $gig_google_link = mysqli_real_escape_string($connection, $gig_cost);

                                $query = "INSERT INTO gigs(gig_date, gig_place, gig_start,gig_end,gig_cost) VALUES('$gig_date','$gig_place','$gig_start','$gig_end','$gig_cost')";
                                $insert_gig = mysqli_query($connection, $query);
                                checkQuery($insert_gig, "index.php");
                            }
                        ?>
                        <div class="form-box">
                            <h1>Add new gig</h1>
                            <form action="" method="post">
                                <div class="input-groups">
                                    <label for="">Date</label>
                                    <input type="date" name="gig_date" placeholder="Add a new date">
                                </div>
                                <div class="input-groups">
                                    <label for="">Place</label>
                                    <input type="text" name="gig_place" placeholder="Add a place">
                                </div>
                                <div class="input-groups">
                                    <label for="">Start</label>
                                    <input type="time" name="gig_start_time" value="21:00">
                                </div>
                                <div class="input-groups">
                                    <label for="">End</label>
                                    <input type="time" name="gig_end_time" value="00:00">
                                </div>
                                <div class="input-groups">
                                    <label for="">Price</label>
                                    <input type="text" name="gig_cost" value="Free">
                                </div>
                                <div class="input-groups">
                                    <input type="submit" name="submit-add-gig" value="Submit">
                                </div>
                            </form>
                        </div>
                        <div class="feed-box">
                            <h1>Settings</h1>
                            <button> <a href="index.php?source=email&id=<?php echo $gig_id?>" class="btn">Change your email</a></button>
                       <br>
                            <button> <a href="index.php?source=password&id=<?php echo $gig_id?>" class="btn">Change your password</a></button>
                            <br>
                            <button> <a href="index.php?source=user_name&id=<?php echo $gig_id?>" class="btn">Change your name</a></button>
                        </div>
                        