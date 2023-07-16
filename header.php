<header>

  <div>
    <div class="topOnMobile">
      <a href="<?php echo $pos ?>index.php" class="headerLogo">My Unsplash</a>
      <div class="showWhenMobile" id="menuToggleBtn"></div>

    </div>
    <div class="search">
      <input type="search" placeholder="Search By Name" name="searchInput" id="searchInput">
      <label for="searchInput">
        <i class="fa-solid fa-magnifying-glass" class="searchIcon"></i>
      </label>
    </div>

  </div>

  <div
    class="actionBtns"
    style="display: flex;
    align-items: center;
    gap: 1rem;">

    <button id="addAPhotoDesk" class="addAPhoto showWhenDesk" onclick="addPhotoPopup();">Add A Photo</button>
    <button id="addAPhotoMobile" class="addAPhoto showWhenMobile" onclick="addPhotoPopup();"> <i class="fa-solid fa-plus"></i></button>

    <?php

    if (isset($_SESSION['username'])) {
      ?>

      <button class="logout" id="logoutPopupBtn" onclick="logoutPopup()">
        <?php echo $_SESSION['username'] ?>
      </button>

      <?php
    } else {
      ?><a href="login" class="loginBtn">Login</a>
      <?php
    }

    ?>
  <div class="showWhenMobile" id="menuCloseBtn"></div>

  <script>

const menuCloseBtn = document.querySelector('#menuCloseBtn')
const menuToggleBtn = document.querySelector('#menuToggleBtn')

   let anim = 1
   let menuCloseAnimation = lottie.loadAnimation({
      container: menuCloseBtn,
      path: '<?php echo $pos ?>images/menuV2.json',
      renderer: 'svg',
      autoplay: false,
      loop: false
   })

   let menuToggleAnimation = lottie.loadAnimation({
      container: menuToggleBtn,
      path: '<?php echo $pos ?>images/menuV2.json',
      renderer: 'svg',
      autoplay: false,
      loop: false
   })

   if (menuCloseBtn.classList.contains('active')) {
      animation.setDirection(1)
      anim = 0
      animation.play()
   }

menuCloseBtn.addEventListener('click', () => {
   if (anim === 1) {
      menuCloseAnimation.setDirection(1)
      menuToggleAnimation.setDirection(1)
      anim = 0
      menuCloseAnimation.play()
      menuToggleAnimation.play()
   } else if (anim === 0) {
      menuCloseAnimation.setDirection(-1)
      menuToggleAnimation.setDirection(-1)
      anim = 1
      menuCloseAnimation.play()
      menuToggleAnimation.play()
   }
   menuCloseBtn.classList.toggle('active')
   menuToggleBtn.classList.toggle('active')
   menuToggle();
      })
// ;;;
  menuToggleBtn.addEventListener('click', () => {
   if (anim === 1) {
      menuCloseAnimation.setDirection(1)
      menuToggleAnimation.setDirection(1)
      anim = 0
      menuCloseAnimation.play()
      menuToggleAnimation.play()
   } else if (anim === 0) {
      menuCloseAnimation.setDirection(-1)
      menuToggleAnimation.setDirection(-1)
      anim = 1
      menuCloseAnimation.play()
      menuToggleAnimation.play()
   }
   menuCloseBtn.classList.toggle('active')
   menuToggleBtn.classList.toggle('active')
   menuToggle();
      })
        
const actionBtns = document.querySelector('.actionBtns')

      function menuToggle(){
        actionBtns.classList.toggle('active')
      }
  </script>
  </div>

</header>