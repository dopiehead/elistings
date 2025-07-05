
              <div class="overlay-content">
                  <a href="index.php" class="button_home" ><i class='fa fa-home'></i> Home<span id="date"><?= htmlspecialchars(date("F d, Y"));?></span></a><br>
                  <a href="dashboard.php" class="button_dashboard"><i class="fa fa-th-large"></i> Dashboard</a><br>
                  <a href="postadvert.php"><i class='fa fa-upload'></i> Post product<i class="fa fa-caret"></i> </a><br>
                  <a href="mylistings.php"><i class='fa fa-shopping-cart'></i> My listing</a><br>
                  <a href="profile.php"><i class='fa fa-user'></i> Profile</a><br>
                  <?php 
                   require 'engine/configure.php';
                   $getQuery = "select * from messages where receiver_email = '$user_email' and is_receiver_deleted = 0 and has_read = 0 group by sender_email"; 
                   $messages = mysqli_query($conn,$getQuery); 
                   if($messages->num_rows>0){ 
                       $inbox =$messages->num_rows;
                    }
                   else{
                       $inbox=0;
                   } ?>
                    <a style='color:white !important;' href="messages.php"><i class="fa fa-envelope"></i> Messages(<?= htmlspecialchars($inbox)  ?>)</a><br>
                   <hr>

                   <br>
                     <a href="logout.php" class="button_logout"><i class='fa fa-sign-out'></i> Logout</a><br>

               </div>
               <br><br>

            