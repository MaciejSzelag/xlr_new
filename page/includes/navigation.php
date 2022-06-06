<nav class="off-anim">
            <div class="logo">
                <div class="logo-wrap">
                    <img src="../../images/favicon/android-chrome-192x192.png" alt="XLR - LOGO - favicon">
                </div>
            </div>
            <div class="ham-wrap">
                <div class="line-container">
                    <div class="line-box">
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="menu-wrap">

                <div class="menu-container">
                    <div class="menu-list">
                        <ul>
                            <?php 
                            if($list){
                            ?>
                               <li id="home"><a  href="../../" data-replace="Go home">Home</a></li>
                            <li id="about"><a  href="../../#section_about" data-replace="About Us">About</a></li>
                            <li id="gigs"><a  href="../../#section_gigs" data-replace="Our Gigs">Gigs</a></li>
                            <li id="contact"><a  href="../../#section_contact" data-replace="Contact Us">Contact</a></li>
                            <li id="gallery" class="active-li"><a  href="../gallery/" data-replace="Our images">Gallery</a></li>
                           <?php 
                                    if (isset($_SESSION['user_first_name'])){
                                ?>
                                    <li><a href="../../admin/" data-replace="Admin"><?php echo $_SESSION['user_first_name']; ?></a></li>
                                    <li><a href="../../includes/logout.php" data-replace="Bye Bye">Logout</a></li>
                                <?php } else { ?>

                                    <li><a href="../../login.php" class="<?php if(!empty($active_contact)) echo 'li-active'; ?> list-a" data-replace="Login">Login</a></li>

                                <?php } ?>


                            <?php } else{ ?>


                            <li><a href="./index.php" data-replace="Go home">Home page</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="indicator"></div>
                </div>
            </div>

        </nav>