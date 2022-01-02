<?php
include 'Components/_loginModal.php';
include 'Components/_signupModal.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"/>
    <link rel="stylesheet" href="Style/style.css">
    <title>Spooch - Secured Notes | Login or Signup</title>
</head>

<body>

    <div class="index-container">
        <div class="child-1">
            <img src="Images/vector.svg" alt="" srcset="" class="index-vector">
        </div>

        <div class="child-2">
            <h1 class="index-heading">Spooch</h1>
            <h1 class="index-sub">The end-to-end encrypted free and secured cloud based note app.</h1>
            <h1 class="index-sub">Supports speech to write, easy to use!</h1>
            <button class="login" id="loginBtn" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
            <button class="signup" id="signupBtn" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
        </div>
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" 
    integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>


<?php
//Authentication alerts
if(isset($_GET['signupsuccess'])){
    echo
   '<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script>
        var notyf = new Notyf();
        notyf.success("Success: Login to get started.");
    </script>';
  }   
?>


<?php
  if(isset($_GET['userexists'])){
    echo
    '<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script>
        var notyf = new Notyf();
        notyf.error("Error: Username already exists.");
    </script>';
  }  
?>


<?php
  if(isset($_GET['passnotmatch'])){
    '<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script>
        var notyf = new Notyf();
        notyf.error("Error: Passwords do not match.");
    </script>';
  }  
?>

<?php
  if(isset($_GET['notmatched'])){
    '<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script>
        var notyf = new Notyf();
        notyf.error("Error: Username or password do not match.");
    </script>';
}

?>





</body>

</html>