<?php


?>
    <div id="editNoteModal">
        <form action="notes.php" method="post">
            <div class="modal-nav">
                <div class="modal-back" onclick="toggleEditNote()">
                    <i class="fas fa-angle-left"></i>
                </div>
                <div class="modal-save">
                    <button type="submit">Save Edited</button>
                </div>
            </div>

            <div class="modal_body">
                <div class="modal_title">
                    <textarea name="title_edit" id="title_edit" required placeholder="Title..."
                        class="modal-input-title"></textarea>
                </div>
                <div class="modal-desc">
                    <textarea name="desc_edit" id="desc_edit" required placeholder="Write something..."
                        class="modal-input-desc"></textarea>
                </div>
            </div>
        </form>
    </div>


    