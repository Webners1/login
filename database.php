<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $dbhost = "localhost";
    $username = "root";
    $password = "";
    $dbname = "learningphp";
    $conn = mysqli_connect($dbhost,$username,$password,$dbname);
    if(!$conn){
echo "the data base in not connected";
    }
    
        
    
    
    
    ?>
</body>
</html>