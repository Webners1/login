
    <?php 
    require_once 'header.php';
    ?>

<h1> Register</h1>
<p>Already have an account?!<a href="login.php">LOGIN</a></p>

<form action="register-inc.php" method="post">
<input type="text" name="username" placeholder="Username">
<input type="password" name="password" placeholder="password">
<input type="password" name="confirmpassword" placeholder="confirm password">
<input type="email" name="email" placeholder="email">
<button class="btn" type="submit" name="submit">REGISTER</button>





</form>
<?php 
    require_once 'footer.php';
    ?>