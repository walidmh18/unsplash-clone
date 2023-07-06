<header>
    <div>

      <a href="<?php echo $pos ?>index.php" class="headerLogo">My Unsplash</a>

      <div class="search">
        <input type="search" placeholder="Search By Name" name="searchInput" id="searchInput">
        <label for="searchInput">
          <i class="fa-solid fa-magnifying-glass" class="searchIcon"></i>
        </label>
      </div>


    </div>

    <div class="actionBtns" style="display: flex;    align-items: center;
   gap: 1rem;">

      <button id="addAPhotoDesk" class="addAPhoto showWhenDesk" onclick="addPhotoPopup();">Add A Photo</button>
      <button id="addAPhotoMobile" class="addAPhoto showWhenMobile" onclick="addPhotoPopup();"><i class="fa-solid fa-plus"></i></button>

      <?php
      // echo $_SESSION['username'];
      if (isset($_SESSION['username'])) {
      ?>

        <button class="logout" id="logoutPopupBtn" onclick="logoutPopup()"><?php echo $_SESSION['username'] ?></button>

      <?php
      } else {
      ?><a href="login" class="loginBtn">Login</a><?php
                                                    }

                                                      ?>

    </div>
  </header>
