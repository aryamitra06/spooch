<?php

echo
'
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form action="Authentication/_handleLogin.php" method="POST">
                <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="loginUsername" required>
                <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="loginPassword" required>
                <label for="floatingPassword">Password</label>
                </div>
                <button type="submit" class="btn btn-dark mt-4 float-end login-btn">Login</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
'
?>