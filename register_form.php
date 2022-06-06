<?php $tab_title = "Register"; include "includes/head.php"; ?>
<?php $list = false; include "includes/navigation.php"; ?> 
        <div class="login-page">
            <div class="login-wrap">
                <div class="login-container">
                    <h1>Register</h1>
                    <form action="auth/register.php" method="post">
                        <div class="input-groups">
                            <label for="First name">First name</label>
                            <input type="text" name="firstName" placeholder="First name">
                        </div>
                        <div class="input-groups">
                            <label for="email">Email</label>
                            <input type="email" name="email" placeholder="Email">
                        </div>
                        <div class="input-groups">
                            <label for="Password">Password</label>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <div class="input-groups">
                            <label for="Repeat password">Re-password</label>
                            <input type="password" name="confirm_password" placeholder="Repeat password">
                        </div>
                        <div class="input-groups">
                            <input type="submit" name="submit-register" value="Submit">
                        </div>
                        <p>If you have an account just <a href="login.php">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
<?php include "includes/footer.php"; ?>