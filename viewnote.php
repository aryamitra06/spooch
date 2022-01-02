<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true)
{
  header("location: index.php");
  exit;
}

include 'Database/_dbconnect.php';
$noteid = $_GET['noteid'];
$sql = "SELECT * FROM `notes` WHERE sno=$noteid";
$result = mysqli_query($connection, $sql);

while($row = mysqli_fetch_assoc($result)){   
$title = $row['title'];
$desc = $row['description'];
$date = $row['date'];
$time = $row['time'];
$user_id = $row['user_id'];
$note_sno = $row['sno'];

$date=date_create($date);
$formatted_date = date_format($date,"d/m/Y");

$time=date_create($time);
$formatted_time = date_format($time, 'G:ia');

}
echo
'<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="Style/style.css">
    <title> Spooch - View | '.$title.'</title>
</head>

<body>';

include 'Components/_navforviewnote.php';

echo
'<p class="greetings-title">View Note</p>';

//fetch assoc function is already defined top of the page!

if($user_id == $_SESSION['sno'])
{
    echo
    '<div class="viewnote-center">
    <div id="viewNote">
                <div class="modal-nav">
                    <a href="notes.php">
                    <div class="modal-back">
                        <i class="fas fa-angle-left"></i>
                    </div>
                    </a>

                    <a href="editnote.php?editnoteid='.$note_sno.'">
                    <div class="modal-save">
                        <button type="submit">Edit</button>
                    </div>
                    </a>

                   
                </div>
        <div class="modal-body">
            <div class="modal-title">
                '.$title.'
            </div>
            <div class="modal-date">
            Created '.$formatted_date.' at '.$formatted_time.'
            </div>
            <div class="modal-desc">
            '.$desc.'
            </div>
        </div>
    </div>
    </div>';
}
else
{
    header("location: index.php?error=youdonothaveaccess");
}
?>



    </div>
    <?php include 'Components/_addNoteModal.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="JavaScript/viewnote.js"></script>
</body>

</html>