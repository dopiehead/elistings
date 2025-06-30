 <div class='nav container'>

      <div class='open_logo'>
         
         <a href='index.php'><img src="assets/icons/logo_e_stores.png" alt="estores.NG"></a>
          

         <a class='open-btn' onclick='openform()'><i class='fa fa-bars'></i></a>
     </div>

  
    
       

   

     <div class='li-content'>

         <li><a href="marketers.php">Marketers</a></li>
      
         <?php if (isset($_SESSION['id']) && isset($_SESSION['sp_id']) && isset($_SESSION['business_id']) ) {?>

         <li><a href='profile.php'>Sell a product</a></li>

         <?php } else{ ?> 
            
            <li><a href='login.php?details=post-advert.php'>Sell a product</a></li>   

            <?php } ?>

         <li>Account 
            
         <span class='dropdown-btn btn-caret-down'><i class='fa fa-caret-down'></i></span>
         <span class='dropdown-btn btn-caret-up'><i class='fa fa-caret-up'></i></span>

              <ul class='dropdown-content shadow py-2 px-4 text-center'>
                
              <?php if(isset($_SESSION['id']) && isset($_SESSION['sp_id']) && isset($_SESSION['business_id'])) { ?>  
              
              <li><a href='profile.php'>Profile</a></li>

              <?php } else { ?>
                  <li><a href='login.php'>Login</a></li>
                  <li><a href='join-us.php'>Sign up</a></li>   
             <?php }?>                  

         </ul>

        </li>  

     </div>
     

     <div class='profile_search'>

         <div class='search-container'>
             <form method="post" id="formQ">
                   <input class='border-0 bg-light' name="search" id="search" type="text" placeholder='What are you looking for?'>
                   <button  name="submit" class='btn border-0'><i class='fa fa-search'></i></button>
              </form>
         </div>

         <div class='profile_icons'>
             <a href=''><i class="far fa-heart"></i></a>  <!-- Heart Icon --> 
         </div>

     </div>


 </div>


</div>




<!-- mobile view for the navigation menu -->


<div class='mobile-overlay' id='mobile-overlay'>

         <div class='close-btn' onclick='closeform()'><i class='fa fa-times'></i></div>     
   
     <div class='mobile-nav-content list-unstyled px-2'>

         <li><a class='text-white' href='marketers.php'>Marketers</a></li>

         <li> 

            <?php if (isset($_SESSION['id']) && isset($_SESSION['business_id']) &&  isset($_SESSION['sp_id'])) { ?> 
            
                  <a class='text-white' href='post-advert.php'>Sell a product</a>

             <?php } else { ?>
       
                 <a class='text-white' href='login.php?details=post-advert.php'>Sell a product</a>
               
             <?php } ?>
        
        </li>

         <li><a class='dropdown-btn'>Account <span class='btn-caret-down'><i class='fa fa-caret-down'></i></span>   <span class='btn-caret-up'><i class='fa fa-caret-up'></i></span></a>
             
             <ul class='dropdown-content list-unstyled mx-3'>

                 <?php if(isset($_SESSION['id'])  && isset($_SESSION['business_id']) &&  isset($_SESSION['sp_id'])){?>
                     <li><a class='text-white' href='profile.php'>Profile</a></li>
                 <?php } else { ?>
                     <li><a class='text-white' href='login.php'>Login</a></li>
                     <li><a class='text-white' href='sign-up.php'>Sign up</a></li>
                 <?php } ?>

             </ul>  
               
        </li>

     </div>

</div>

<script type="text/javascript">
function openform() {
    document.getElementById("mobile-overlay").style.width = "100%";
}

function closeform() {
    document.getElementById("mobile-overlay").style.width = "0%";
}


</script>




<script>

    $(document).ready(function() {
        // Initially hide the content and the 'up' caret button
        $(".dropdown-content").hide();
        $(".btn-caret-up").hide();

        $(".dropdown-btn").on('click', function() {
            // Toggle the 'down' and 'up' caret buttons
            $(".btn-caret-down").toggle();
            $(".btn-caret-up").toggle();

            // Toggle the dropdown content visibility
            $(this).siblings('.dropdown-content').toggleClass('active').toggle();
        });
    });

</script>
