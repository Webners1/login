
    <?php 
    require_once 'header.php';
    ?>

<h1> Log in</h1>
<p>No account? <a href="register.php">Register Now</a></p>

<form action="login-inc.php" method="post">
<input type="text" name="username" placeholder="Username">
<input type="password" name="password" placeholder="password">
<button class="btn" type="submit" name="submit">LOGIN!</button>





</form>
<?php 
    require_once 'footer.php';
    ?>