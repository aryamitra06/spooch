<?php
include 'Database/_dbconnect.php';
if(isset($_GET['editnoteid']))
{
    $edit_id = $_GET['editnoteid'];
    
    $select = "SELECT * FROM notes where sno = $edit_id";
    $run = mysqli_query($connection, $select);
    $row_note = mysqli_fetch_array($run);
    $user_id = $row_note['user_id'];
    $title = $row_note['title'];
    $desc = $row_note['description'];
}
?>

<?php
include 'Database/_dbconnect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST' || isset(($_POST['title'])))
{
    $etitle = $_POST['etitle'];
    $edesc = $_POST['edesc'];

    $update = "UPDATE `notes` SET `title` = '$etitle', `description` = '$edesc' WHERE `sno` = '$edit_id' ";
    $run_update = mysqli_query($connection, $update);
    
    header("location: notes.php");
 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="Style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <title>Spooch - Edit | <?php echo $title ?></title>
</head>

<body>
    <?php include 'Components/_navforeditnote.php' ?>
    <p class="greetings-title">Edit Note</p>
        <!--starts-->
    <div class="viewnote-center">
    <form action="" method="post">
        <div id="viewNote">
            <div class="modal-nav">
                <a href="editnote.php?editnoteid='.$note_sno.'">
                    <div class="modal-save">
                        <button type="submit">Done</button>
                    </div>
                </a>
            </div>
            <div class="modal-body">
                <textarea name="etitle" id="etitle" class="modal-input-title" required><?php echo $title ?></textarea>
                <textarea name="edesc" id="edesc" class="modal-input-desc" required><?php echo $desc ?></textarea>
            </div>
        </div>
    </form>    
    </div>
    <!-- ends -->
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
</body>

</html>