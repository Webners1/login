<?php
if(isset($_POST['submit'])){
    require 'database.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(empty($username) || empty($password)){
        header("Location:login.php?error=usernameorpasswordnotfound");
            exit();
    }
    else{
        $sql = "SELECT * FROM logdata WHERE username = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location:login.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"s" , $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $passcheck = password_verify($password,$row['password']);
                if($passcheck == false){
                    header("Location:login.php?error=WRONGPASS");
            exit();
                }
                else if($passcheck == true){
                    session_start();
                    $_SESSION['sessionId'] = $row['id'];
                    $_SESSION['sessionUser'] = $row['username'];
                    header("Location:index.php?success=Login");
            exit();
                }
                else{
                     header("Location:login.php?error=WRONGPASS");
            exit();
                }
            }
            else{
                header("Location:login.php?error=nouserfound");
            exit();
            }
        }
    }

}
else{
    header("Location:login.php?error=accessforbidden");
            exit();
}




?>