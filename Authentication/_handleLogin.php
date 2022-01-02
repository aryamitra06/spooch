<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '../Database/_dbconnect.php';
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];

    $sql = "Select * from users where username='$username'";
    $result = mysqli_query($connection, $sql);
    $numRows = mysqli_num_rows($result);

    if($numRows==1)
    {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password']))
        {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $row['sno'];

            header("Location: /spooch/notes.php?loginsuccess");
        }
        else
        {
            header("Location: /spooch/index.php?notmatched");
        }
    }
    else
    {
        header("Location: /spooch/index.php?notmatched");    
    }

}
?>