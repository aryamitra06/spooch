<?php
session_start();
include 'Database/_dbconnect.php';
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true)
{
  header("location: index.php");
  exit;
}

if(isset($_GET['delnoteid']))
{
    $del_id = $_GET['delnoteid'];
    $check_user = "SELECT * FROM `notes` WHERE sno=$del_id";
    $result_user = mysqli_query($connection, $check_user);
    while($row = mysqli_fetch_assoc($result_user)){   
        $user_id = $row['user_id'];
        }
    
    if($_SESSION['sno'] == $user_id )
    {
        
        $deletequery = "DELETE FROM notes WHERE sno = '$del_id'";
        $run_delete = mysqli_query($connection, $deletequery);
        header("location: notes.php");
    
    }
    else
    {
        header("location: index.php?error=youdonothaveaccess");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="Style/style.css">
    <title>Spooch - All Notes</title>
</head>

<body>
    <div class="notes-body" id="blur">
        <?php include 'Components/_nav.php' ?>
        <!-- viewing notes using assoc -->
<?php

    $nodata = true;

    include 'Database/_dbconnect.php';
    $sno = $_SESSION['sno'];
    $sql = "SELECT * FROM `notes` WHERE user_id= $sno";
    $result = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($result))
    {
        $title = $row['title'];
        $desc = $row['description'];
        $date = $row['date'];
        $time = $row['time'];

        $nodata = false;

        $date=date_create($date);
        $formatted_date = date_format($date,"d/m/Y");
        
        $time=date_create($time);
        $formatted_time = date_format($time, 'G:ia');

echo
'    <p class="greetings-title">My Notes</p>
        <div class="all-notes">
            <div class="note" id="note">
                <a href="viewnote.php?noteid='.$row['sno'].'">
                <div class="note-body" id="note-body">
                    <p class="note-title">'.$title.'</p>
                </div>
                </a>
                <div class="note-footer">

                    <p class="note-date">'.$formatted_date.' at '.$formatted_time.'</p>

                    <div class="note-buttons">
                      <a href="editnote.php?editnoteid='.$row['sno'].'"><i class="fas fa-edit edit"></i></a>
                        &nbsp;
                        <a href="notes.php?delnoteid='.$row['sno'].'"><i class="fas fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>';  
    }   
?>

<?php

if($nodata == true)
    {
        echo
        '
            <center>
            <img src = "Images/nodata.svg" class="nonoteimage">
            <p class="nonotepara">No notes found.</p>
            </center>
        ';
    }

?>

        
    </div>
    <?php include 'Components/_addNoteModal.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="JavaScript/script.js"></script>
</body>

</html>
