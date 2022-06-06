<?php $tab_title = "Login"; include "includes/head.php"; ?>
<?php $list = false; include "includes/navigation.php"; ?> 
    <div class="login-page">
      <div class="login-wrap">
        <div class="login-container">
          <h1>Login</h1>
          <form action="auth/login.php" method="post">
            <div class="input-groups">
              <label for="email">Email</label>
              <input type="email" name="email" placeholder="Email">
            </div>
            <div class="input-groups">
              <label for="Password">Password</label>
              <input type="password" name="password" placeholder="Password">
            </div>
            <div class="input-groups">
              <input type="submit" name="submit-login" value="Login">
            </div>
            <p>No account? Just <a href="register_form.php">Register</a></p>
          </form>
        </div>
      </div>
    </div>
    <?php include "includes/footer.php"; ?>