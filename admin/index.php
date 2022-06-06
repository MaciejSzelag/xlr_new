<?php include "includes/head_admin.php"; ?>
        <div class="admin-wrap">
            <div class="front-dashboard">
                <div class="feed-wrap">
                    <div class="feed-container container-row">
                     <?php 
                     if(isset($_GET['source'])){
                         $source = $_GET['source'];
                        }else{ 
                            $source = '';
                        }
                        switch($source){
                                case "show_table";
                                include "includes/table_gig.php";
                                break;
                                case "edit_gig";
                                include "includes/edit_gig.php";
                                break;
                                case "email";
                                include "includes/edit_email.php";
                                break;
                                case "user_name";
                                include "includes/edit_name.php";
                                break;
                                case "password";
                                include "includes/edit_password.php";
                                break;

                                default:
                                include "includes/dashboard_front.php";


                        }
                     ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include "includes/footer_admin.php"; ?>