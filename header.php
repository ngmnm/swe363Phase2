  <!--Header-->
  <?php
    session_start(); // starts the session
    $_SESSION['url'] = $_SERVER['REQUEST_URI'];
    
    ?>
  <div id="mySidebar" class="sidebar">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="/UserProfile/userProfile.html"><img name="My Profily" class="profile-icon" src="/images/477_profile__avatar__man_-512.webp" alt="profile-icon"></a>
      <a href="/final-version/About.php">About</a>
      <a href="/final-version/Main-page/LastDesignMain.php">Home</a>
      <a href="/final-version/Main-page/socialMedia.html">Social Media</a>
      <a href="#">Contact Us</a>
  </div>
  <div id="main">
      <button class="openbtn" onclick="openNav()">&#9776;</button>
  </div>
  <div class="Login">

      <!-- check if the user is loged in to the page -->
      <?php

        if (session_status() ==PHP_SESSION_ACTIVE) {
            // session_start(); // starts the session

            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        ?>
              <a href="../Main-page/logout.php?success=logout"><button class="buttonup logout" onclick="logout()">log out</button></a>
          <?php } else { ?>
              <button class="buttonup loged" onclick="document.getElementById('login').style.display='block'">Log In</button>
              <a href="../Main-page/signForm.php"><button class="buttonup loged">Sign Up</button></a>
      <?php }
        } else echo "kl zq" ?>

      <!-- search form  -->
      <form action="Website-design.php" method="POST" id="searchform">
          <input id="bar" type="text" name="searchbar" placeholder="Search">
          <button id="searchButton" name="searchsubmit" type="submit"><i class="fa fa-search"></i></button>
      </form>

  </div>

  <!-- login page -->
  <form id="login" class="popUp" action="login.php" method="POST">

      <input type="email" placeholder="Email" class="input-field" name="mail" required>
      <input type="password" placeholder="Password" class="input-field" name="pass" required>
      <span class="psw"> <a onclick="document.getElementById('forgetpass').style.display='block'" id="forget">Forgot password?</a></span>
      <div id="forgetpass" class="popUp">
          <h3>Forget Password ?</h3>
          <h4>Enter your email address to reset your password</h4>
          <input type="email" name="email" id="forgetEmail">
          <button type="button" onclick="document.getElementById('forgetpass').style.display='none'" class="sendbtn">Send</button>
      </div>
      <button type="submit" class="submitBtn" name="login">Login</button>
  </form>


  <div class="Header-mainpage">
      <label>KFUPM Collection</label>
  </div>

  <div class="picheader">
  </div>