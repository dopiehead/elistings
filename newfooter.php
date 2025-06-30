

<link rel="stylesheet" href="assets/css/visitors.css">


<div id='footer' style='background-color: rgba(192,192,192,0.5)'>
    
<div class="footer-content container g-5 d-flex justify-content-center align-items-center flex-column flex-md-row">

    <!-- About Section -->
    <div class="col-12 col-md-4 mb-4 mb-md-0">
        <h6>About</h6>
        <p>Estore.ng platforms frequently offer deals, discounts, and promotional offers to attract customers.
        These can include seasonal sales (like Black Friday or Cyber Monday), flash sales, daily deals, and discounts on bulk purchases.
        Customers can often find coupons or promotional codes that provide additional savings during checkout..</p>
        <br>
        <a href="about.php" class="btn btn-primary">Learn more</a>
    </div>

    <!-- Links Section -->
    <div class="col-12 col-md-4 mb-4 mb-md-0">
        <p><a style="color: black;opacity:0.9;" class="text-decoration-none" href="privacy.php">Privacy Policy</a></p>
        <p><a style="color: black;opacity:0.9;" class="text-decoration-none" href="terms.php">Terms and conditions</a></p>
        <p><a style="color: black;opacity:0.9;" class="text-decoration-none" href="faq.php">FAQs</a></p>
        <p><a style="color: black;opacity:0.9;" class="text-decoration-none" href="contact.php">Contact Us</a></p>
        <p><a style="color: black;opacity:0.9;" class="text-decoration-none" href="nigeria-choice.php">Nigeria's choice</a></p>
        <p><a style="color: black;opacity:0.9;" class="text-decoration-none" href="earn.php">Earn</a></p>
    </div>

    <!-- Social Media Section -->
    <div class="col-12 col-md-4">
        <h6>Follow us</h6>
        <a style="color:black !important;font-size: 21px;" href=""><i class="fa-brands fa-facebook-f"></i></a>&nbsp;
        <a style="color:black !important;font-size: 21px;" href=""><i class="fa-brands fa-instagram"></i></a>&nbsp;
        <a style="color:black !important;font-size: 21px;" href=""><i class="fa-brands fa-linkedin"></i></a>&nbsp;
        <a style="color:black !important;font-size: 21px;" href=""><i class="fa-brands fa-twitter"></i></a>&nbsp;
    </div>

</div>





<br><br>




<?php
// Function to get the user's IP address
function getUserIP() {
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    } else {
        $ip = 'Unknown';
    }
    return strtok($ip, ','); // Get the first IP if there are multiple
}

// Get the user's IP address
$ip = getUserIP();

// Check if the IP address already exists in the database
$queryip = mysqli_query($conn, "SELECT * FROM ip WHERE user_ipaddress = '$ip'");
$countip = mysqli_num_rows($queryip); // Count the number of rows for this IP

if ($countip == 0) {
    // Insert the IP address into the database if it doesn't exist
    mysqli_query($conn, "INSERT INTO ip(user_ipaddress) VALUES('$ip')");
    $numberofvisit = 1; // First visit for this IP
} else {
    // If the IP exists, it's a returning visitor
    $numberofvisit = $countip;
}

// Count all unique visitors (IPs that are different from the current IP)
$checkip = mysqli_query($conn, "SELECT DISTINCT user_ipaddress FROM ip WHERE user_ipaddress != '$ip'");
$countnewip = mysqli_num_rows($checkip); // Count the number of distinct IPs
$visitor = $countnewip; // Total number of visitors excluding the current IP

// Count returning users (how many times this IP has visited)
$checkreturningip = mysqli_query($conn, "SELECT * FROM ip WHERE user_ipaddress = '$ip'");
$getreturninguser = mysqli_num_rows($checkreturningip); // Number of times this IP has visited

if ($getreturninguser == 1) {
    $newreturningusers = $getreturninguser; // First time returning user
} elseif ($getreturninguser > 1) {
    $returningusers = $getreturninguser; // Returning user
} else {
    $returningusers = 0;
    $newreturningusers = 0; // No returning user
}

?>

       <div class='text-center my-4'>
      <input type='password' id='passwordField' class='bg-mute border-0 w-50 py-2' placeholder='Enter Password to view Statistics'>
      <button name='submit' class='btn btn-success btn-statistics text-white my-2'>Submit</button>
      </div>
 
      <div class='visitors d-none hiddenDiv text-center pr-5'>
         
             <div class='bg-white'>
                   
                   <span class='text-primary fa fa-user-alt fs-1 mb-3'></span>
                 
                 <h5>Total Visitors</h5>
                 <h2 class='text-primary fw-bold'><?php echo$numberofvisit; ?></h2>
                 
             </div>
           
           
             <div class='bg-white'>
                 
                  <span class='text-success fa fa-user-plus fs-1 mb-3 mt-2'></span>
                 
                  <h5>New Visitors</h5>
                  
                  <p>A new visitor is someone who hasn't been tracked before</p>
                  
                  <h2 class='text-success fw-bold'><?php echo$visitor;   ?></h2>
               
             </div>
           
           
             <div class='bg-white'>
                    <span class='text-info fa fa-user fs-1 mb-3 mt-2'></span>
                  <h5>Active Visitors</h5>
                  <p>Active visitors are those who have visited the site recently</p>
                  <h2 class='text-info fw-bold'><?php echo$returningusers;      ?></h2>
               
             </div>
           
           
             <div class='bg-white'>
                 
                  <h5>Returning Visitors</h5>
                  <p>A returning visitor is one who has previously visited the site, but is coming back.</p>
                  <h2 class='text-warning fw-bold'><?php echo$returningusers;      ?></h2>
               
             </div>
             
             
             <div class='bg-white'>
                 
                  <h5>Daily Visitors</h5>
                  <p>This counts unique visitors who visited the site today.</p>
                  <h2 class='text-muted fw-bold'><?php echo$newreturningusers;      ?></h2>
                  
               
             </div>
         
         
         
     </div>



</div>

<script>
    $(document).ready(function() {
        // Hide the div initially
        $(".hiddenDiv").hide();

        // Listen for keypress on the password field
        $(document).on("click",".btn-statistics" ,function(event) {
           event.preventDefault();
            var password = $("#passwordField").val();
            if (password === "12345") {  // You can change this to any other key code
                $(".hiddenDiv").removeClass('d-none');  // Show the hidden div
            }
        });
    });
</script>