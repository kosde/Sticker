<?php
    session_start();
?>
<div class="modal-container" id="newEmail" style="display: none;padding: 50px 35% 20% 35%;"> 
<div class="modal-content" style="height: 350px;">
    <form action="../php/new_email_f.php" class="edit_user" enctype="multipart/form-data" id="edit_user" method="post">
        <h3 >Change your email</h3>
        <div class="field">
            <div class="above">
                <div class="labels">
                    <span class="label">
                        <label for="" id="currentEmailLabel">Current email</label>
                    </span>
                </div>
            </div>
            <div class="input">
                <div class="tooltipWrapper">
                    <input type="hidden" class=" input" id="currentEmail" name="currentEmail" aria-labelledby="currentEmailLabel" value="<?php echo $_SESSION['email'];?>">
                </div>
                <p class="regular"><?php echo $_SESSION['email'];?></p>
            </div>
        </div>
        <div class="field">
            <div class="  above">
                <div class="  labels">
                    <span class="  label">
                        <label for="newEmail" >New email</label>
                    </span>
                </div>
            </div>
            <div class="  input">
                <div class=" tooltipWrapper">
                    <input type="email" class=" input" style="display: block;margin: auto;" id="newEmail" name="newEmail" required="" placeholder="Your new email">
                </div>
            </div>
        </div>
        <button type="submit" class="button primary large fullWidth" style="margin: auto;display: block;">
            <span class="  content">
                <span class=" ">Submit</span>
            </span>
        </button>
        <button style="display:none" type="submit" hidden=""></button>
    </form>
    <a class="modal-close-x" onclick="CloseNewEmail()">×</a>
</div>
</div>