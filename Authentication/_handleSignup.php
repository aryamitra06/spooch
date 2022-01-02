<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '../Database/_dbconnect.php';
    $name = $_POST['signupName'];
    $username = $_POST['signupUsername'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupConfirmPassword'];

    $existSql = "select * from `users` where username = '$username'";
    $result = mysqli_query($connection, $existSql);
    $numRows = mysqli_num_rows($result);

    //checking for any other email existance
    if($numRows>0){
        header("Location: /spooch/index.php?userexists");
    }
    else
    {
        if($pass == $cpass)
        {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`name`, `username`, `password`, `timestamp`) VALUES ('$name', '$username', '$hash', current_timestamp());";
            $result = mysqli_query($connection, $sql);
            header("Location: /spooch/index.php?signupsuccess");
            exit();     
        }
        else
        {
            header("Location: /spooch/index.php?passnotmatch");
        }
    }

}    
?>