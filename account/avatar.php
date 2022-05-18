<?php
    session_start();
?> 
    <div id="edit-avatar-modal" class="modal-container" style="display: none;">
      <div class="modal-content-wrapper">

        <div class="modal-content" style="height: 500px;">
          <h2>Change your picture</h2>
          <form action="../php/new_avatar.php" class="edit_user" enctype="multipart/form-data" id="edit_user" method="post">
              <div style="margin:0;padding:0;display:inline">
                  <input name="utf8" type="hidden" value="✓">
                  <input name="_method" type="hidden" value="put">
                  <input name="authenticity_token" type="hidden">
              </div>
              <input id="next" name="next" type="hidden" >
              
              <p>
                <?php
                      if($_SESSION['source'] == "google")
                      {
                  ?>
                          <img id="new_avatar"  alt="" class="avatar-img"  src="<?php echo ($_SESSION['avatar']);?>" style="width: 200px !important;height: 200px !important;">
                  <?php
                      }
                  ?>
                  <?php
                      if($_SESSION['avatar'] && !isset($_SESSION['source']))
                      {
                  ?>
                          <img id="new_avatar" alt="" class="avatar-img"  src="data:image/png;base64,<?php echo base64_encode($_SESSION['avatar']);?>" style="width: 200px !important;height: 200px !important;">
                  <?php
                      }
                      if($_SESSION['avatar']==null)
                      {
                  ?>
                          <img id="new_avatar" alt="" class="avatar-img" src="/assets/avatar.png" style="width: 200px !important;height: 200px !important;">
                  <?php
                      }
                  ?>
              <!--<img alt="" id="new_avatar" class="avatar-center avatar-img" src="" width="200" height="200">-->
              </p>
              <p class="font-light">JPG or PNG. Max size 300K</p>

              <div class="field file">
              <div class="fake">
                  <label class="input-group-btn" style="border-left=10px;">
                    <input type="hidden" name="size" value="1000">
                    <span class="btn btn-primary btn-file">
                        Choose file... <input accept="image/*" class="inputfile" type="file" 
                        name="Imagen" id="Imagen" onchange="readURL(this)" >
                    </span>
                  </label>
              </div>
              </div>

              <p class="field submit form-buttons">
                <button type="submit" class="btn btn-secondary">Update your picture</button>
              </p>
          </form>
          <a class="modal-close-x" onclick="CloseNewAvatar()">×</a>
        </div>

        <div class="modal-bg-close"></div>
      </div>
      <div class="modal-bg-close"></div>
    </div>