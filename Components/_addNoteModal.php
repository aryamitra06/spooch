<?php  
include 'Database/_dbconnect.php';
$method = $_SERVER['REQUEST_METHOD'];
     if($method == 'POST')
     {   
        $title = $_POST['title'];
        $desc = $_POST['desc'];

        //saving web from XSS attack
        $title = str_ireplace("<", "&lt", $title);
        $title = str_ireplace(">", "&gt", $title);

        $desc = str_ireplace("<", "&lt", $desc);
        $desc = str_ireplace(">", "&gt", $desc);

   
         $sql = "INSERT INTO `notes` (`user_id`, `title`, `description`, `date`, `time`) VALUES ('".$_SESSION['sno']."', '$title', '$desc', current_timestamp(), current_timestamp());";
         $result = mysqli_query($connection, $sql);

         if($result)
         {
             echo
             '<script>
                window.location.href= "notes.php";                
              </script>';
         }
        
     }

     if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
     {
        echo
        '
            <div id="newNoteModal">
                <form action="" method="POST">
                    <div class="modal-nav">
                        <div class="modal-back" onclick="toggleNewNote()">
                            <i class="fas fa-angle-left"></i>
                        </div>
                        <div class="modal-save">
                            <button type="submit">Save</button>
                        </div>
                    </div>
        
                    <div class="modal_body">
                        <div class="modal_title">
                            <textarea name="title" id="title" required placeholder="Title..." class="modal-input-title"></textarea>
                        </div>
                        <div class="modal-desc">
                            <textarea name="desc" id="desc" required placeholder="Write something..." class="modal-input-desc"></textarea>
                        </div>
                    </div>
                </form>
            </div>
        ';
     }    
?>

