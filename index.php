
    <?php 
    require_once 'header.php';
    ?>
<?php
if(isset($_SESSION['sessionId'])){
    echo "You are logged in";
}
else "HOME";

?>

<h1> This page is logged in Congratulation!!!!</h1>

<?php 
    require_once 'footer.php';
    ?>