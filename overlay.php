 
<div id="myform" class="overlay" id="overlay">

 <button class="btn close-btn" onclick="closeform()"><img src="assets/icons/filter_icon.png"></button> 
 <br>
 <?php if (!isset($_SESSION['id']) && !isset($_SESSION['business_id']) && !isset($_SESSION["sp_id"])) {
      ?> 
     <span style="float: right;"><a href="login.php" class=" button_navigation" style="text-decoration: none;display: block;color:white !important;border:1px solid white;padding:2px 5px;">Login</a>
     <a href="join-us.php" class=" button_navigation" style="text-decoration: none; color:white !important; display: block;border:1px solid white;padding:2px 5px;">Sign up</a></span></p>
     <?php
     }
     
     else{
       ?>  
        <span style="float: right;"><a href="profile.php" class=" button_navigation" style="text-decoration: none;display: block;color:white !important;border:1px solid white;padding:2px 5px;"><i class="fa fa-user-alt"></i></a></span> 
      <?php   
     }
     ?><br>
 
<div class="overlay-content">

<a href="discount-page.php" class="active-link" >Discount deals</a>

<a href="service-provider.php" class="active-link" >Service Providers<i class="fa fa-caret"></i> </a>

<?php  if (date('N') == 7) { // 'N' returns the ISO-8601 numeric representation of the day of the week (1 for Monday, 7 for Sunday)?>
 <a href="white-sunday.php" class="active-link" > &nbsp;White Sunday&nbsp;&nbsp;</a>
 <?php } ?>


 <a href="gift-picks.php" class="active-link" > &nbsp;Gift Picks&nbsp;&nbsp;</a>

  <a href="deals.php" class="active-link" > &nbsp;Deals&nbsp;&nbsp;</a>
  
<a   href=" <?php if(!empty($_SESSION['id']) &&!empty($_SESSION['business_id']) &&!empty( $_SESSION["sp_id"])) {echo"postadvert.php";} else{echo"postadvert.php?step=postadvert";} ?>" class="" >&nbsp;Sell a product&nbsp;&nbsp;</a>

<a href="customer-support.php" class="active-link" >&nbsp;Customer support&nbsp;&nbsp;</a>

</div>



 </div>