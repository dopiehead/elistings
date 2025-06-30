<?php error_reporting(E_ALL ^ E_NOTICE);?>
<h1 style="">
          <a style="color: black;z-index: 1;" class="button_navigation btn open-btn" id="open-btn" onclick="openform()" ><i class="fas fa-bars"></i></a>
        <a href="index.php" class="button_navigation"  style="text-decoration: none;display:block !important;margin-top: -5px;"><img style="height:30px;width:35px;" align="" src="assets/icons/logo_e_stores.png" height="" width=""></a>
      <form id='mysearch' style="margin-left:150px !important;" method="post" action="">
       <input name="search" id="input_search" type="search" class="button_navigation form-control" placeholder="     Search product, brand and categories"><button name="submit" id="btn-search" type="submit" class="button_navigation btn btn-primary" >Search</button>
        </form>
       <a class="button_navigation" style="display: block!important;" id="think" >Think of it? Buy it here.</a>
<!------------------------------------------Navigation bar--------------------------------------------------->
  <div style="float: right;">

 
     <a href="order-history.php#wish" class="button_navigation"  style="display: block!important;margin-left:4px;margin-top: -2.8px;" ><img id="love"  style="color: black !important;" src="assets/icons/mdi_heart-outline-black.png"></a>
      <?php
      if (isset($_SESSION['business_id'])) {
     echo'<a href="profile.php"  style="display: block!important;margin-top: -2.8px;" class="button_navigation" ><img id="user" src="assets/icons/user-black.png"></a>';
     }
     if (isset($_SESSION['sp_id'])) {
      echo'<a href="profile.php"  style="display: block!important;margin-top: -2.8px;" class="button_navigation" ><img id="user" src="assets/icons/user-black.png"></a>';
     }
     if (isset($_SESSION['id'])) {
     echo'<a href="profile.php"  style="display: block!important;margin-top: -2.8px;" class="button_navigation" ><img id="user"  src="assets/icons/user-black.png"></a>';
     }
      ?>
      <?php if (!isset($_SESSION['id']) && !isset($_SESSION['business_id']) && !isset($_SESSION["sp_id"])) {
      ?> 
     <span style="float: right;"><a href="login.php" class="nav_login button_navigation" style="text-decoration: none;display: block;">Login</a>
     <a href="join-us.php" class="nav_signup button_navigation" style="text-decoration: none; color:; display: block;">Sign up</a></span></p>
     <?php
     } ?>
  </div>
</h1>