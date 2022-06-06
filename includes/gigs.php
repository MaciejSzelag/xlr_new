<section class="main-section">
                <div class="article">
                    <div class="list-wrap">
                    <?php 
                        deleteExpiredEvent();
                            //select all gigs 
                            $query = "SELECT * FROM gigs ORDER BY gig_date";
                            $select_all_gigs = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($select_all_gigs)){
                                $gig_id = $row["gig_id"];
                                $gig_date = $row["gig_date"];
                                $gig_place = $row["gig_place"];
                                $gig_start = $row["gig_start"];
                                $gig_end = $row["gig_end"];
                                $gig_cost = $row["gig_cost"];
                                $gig_date = strtotime($gig_date);

                            ?>
                        <div class="list-container">
                            <ul>
                                <li class="li-1"><?php echo  date("l jS F Y",$gig_date);?></li>
                                <li><?php echo  $gig_place;?></li>
                                <li><span>Start: </span><?php echo  $gig_start;?></li>
                                <li><span>Finish: </span><?php if($gig_end == 00 ) echo "Midnight"; else echo $gig_end;?></li>
                                <li>Enter: <span><?php echo  $gig_cost;?></span> </li>
                            </ul>
                        </div>

                        <?php } ?>
              
                    </div>
                </div>

            </section>