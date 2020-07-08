<?php

if(isset($_POST['submit'])){
//ADD DATABASE CONNECTION
require 'database.php';
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$confirmpassword = $_POST['confirmpassword'];

    if(empty($username) || empty($password) || empty($confirmpassword)){
        header("Location:register.php?error=emptyfields&username=".$username.$email);
    exit();
    
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*/",$username)){
        header("Location:register.php?error=invalidusername&username=".$username.$email);
    exit();
    }
    elseif ($password !== $confirmpassword){
header("Location:register.php?error=passwordsdontmatch&username=".$username.$email);
    exit();

    }
    else{
        $sql = "SELECT username FROM logdata WHERE username = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location:register.php?error=sqlerror&username=".$username);
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss",$username,$email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowcount  =mysqli_stmt_num_rows($stmt);

            if($rowcount > 0){
            header("Location:register.php?error=usernameorinvalidemailtaken&username=".$username.$email);
            exit();    
            }
            else{
               $sql =  "INSERT INTO logdata (username, email, password) VALUES (?, ?,?)";
               $stmt = mysqli_stmt_init($conn);
               if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location:register.php?error=sqlerror&username=".$username);
                    exit();
                }
                else{

                     $hashedpass  =password_hash($password, PASSWORD_DEFAULT);
                     mysqli_stmt_bind_param($stmt, "sss",$username,$email,$hashedpass);
                     mysqli_stmt_execute($stmt);
                     header("Location:register.php?success=registered");
                     exit();
                }
            }

        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}








?>