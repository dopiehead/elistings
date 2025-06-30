<?php session_start();
$vendorLocation = 'No 32 iyalla street ikeja, Lagos State, Nigeria.';
require 'engine/configure.php'; 
require 'engine/get-dollar.php';
require 'engine/get-euro.php';
require 'engine/get-pound.php';
if(isset($_POST["submit"]))   {  
     if(!empty($_POST["search"]))   {  
         $query = str_replace(" ", "+", mysqli_real_escape_string($conn,$_POST["search"]));
         header("location:search-process.php?search=" .$query); 
     }  } 
?>


<?php      
if(isset($_GET['id'])){
$treatId = $_GET['id'];
$query = "SELECT * FROM treats WHERE treat_id = '".$treatId."'";
$sql = "UPDATE treats SET views = views +1 where treat_id ='".$treatId."'";
$incViews = mysqli_query($conn, $sql);
$result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
         $treatName = $row['treat_name'];
         $treatDetails = $row['treat_details'];
         $treatPrice = $row['treat_price'];
         $treatDiscount = $row['discount'];
         $treatviews = $row['views'];
         $treatImage = $row['treat_image'];
         $treatQuantity = $row['quantity'];
         $treatAddedDate = $row['date'];
         $treatVendorId = $row['vendor_id'];
         $treatContents = $row['treat_contents'];
}

}

}

?>

<?php

$get_productVendor = mysqli_query($conn,"select * from vendor_profile where id = '".htmlspecialchars($treatVendorId)."'");
if ($get_productVendor->num_rows>0) {
while ($dataVendor = mysqli_fetch_array($get_productVendor)) {
$vendorImage = $dataVendor['business_image'];
$vendorName = $dataVendor['business_name'];
$vendorPhone = $dataVendor['business_contact'];
$vendorLocation = $dataVendor['business_address'];
$vendorEmail = $dataVendor['business_email'];
if ($dataVendor['verified']==1) {
 $vendorVerified = $dataVendor['verified'];
}
}
}
else{
$vendorImage = "No vendor found";
$vendorName = "No vendor found";
$vendorPhone = "No vender found";
$vendorLocation =  "No vender found";
$vendorEmail =  "No vender found";

	}


?>


<!DOCTYPE html>
<html>
<head>
	 <title>E-stores | Treat details </title>
	 <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
     <script src="assets/js/jquery-1.11.3.min.js"></script>
     <script src="assets/js/sweetalert.min.js"></script> 
     <script type="text/javascript" src="assets/js/jquery.lazy.min.js"></script>
     <link rel="stylesheet" href="https://unpkg.com/flickity@2.3.0/dist/flickity.min.css">
     <link rel="stylesheet" href="https://unpkg.com/flickity-fade@1.0.0/flickity-fade.css">
     <script src="https://unpkg.com/flickity@2.3.0/dist/flickity.pkgd.min.js"></script>
     <script src="https://unpkg.com/flickity-fade@1.0.0/flickity-fade.js"></script>
     <link rel="stylesheet" href="assets/css/btn_scroll.css">
     <link rel="stylesheet" href="assets/css/nav-content.css">
     <link rel="stylesheet" href="assets/css/treat-details.css">
     <link rel="stylesheet" href="mobile-view.css">
</head>

<body>
       
     <?php include 'nav-content.php'; ?>

     <br>

<!-- end of header part -->
     <section>

         <div class='container'> 
         
             <div class='package-detail-container'>

                 <div style='margin-top:-80px;' class='col-md-8 packages-container'>

                      <div class='package-content'>

                      <?php  $getmore = mysqli_query($conn,"select * from treats_picx where treats_id = '".$treatId."'");
                          
                          if($getmore->num_rows>0){

                            while($dataMore = mysqli_fetch_array($getmore)){ ?>
                              
                                 <img src="<?php echo$dataMore['pictures']; ?>" alt="e_stores">

                       <?php     }      } else{echo "No additional images found.";}          ?>
                                   
                      </div>


                      <div class='package-main'>

                      <img src="<?php echo $treatImage; ?>" alt="e_stores">


                      </div>
                  


                 </div>
                  
                 <div class='col-md-4'>

                      <h5 class='fw-bold'><?php echo$treatName; ?></h5>

                     <div class='d-flex g-5'>

                         <span class='text-sm'>
                        
                             <span class='fa fa-star text-warning'> </span>
                             <span class='fa fa-star text-warning'> </span>
                             <span class='fa fa-star text-warning'> </span>
                             <span class='fa fa-star text-warning'> </span>
                             <span class='fa fa-star text-secondary'> </span>
                
                         </span>
                     
                         <span class='text-sm text-secondary'>(150 reviews)</span> | 

                         <span class='text-success fw-bold text-sm'>In stock</span>

                     </div>

                     <?php if($treatDiscount>0){

                          echo"<span class='text-muted' style='text-decoration:line-through'><i class='fa fa-naira-sign'></i> ";

                              echo $treatPrice;                           

                         echo "</span>";

                         echo"&nbsp;&nbsp;<span class='text-muted' style='text-decoration:line-through'><i class='fa fa-dollar-sign'></i> ";

                              echo round(($treatPrice)/$dollar_rate);                           

                         echo "</span>&nbsp;&nbsp;";

                         echo"<br>";

                         echo"<span><i class='fa fa-naira-sign'></i>";

                              echo round($treatPrice - ($treatDiscount/100 * $treatPrice));      

                         echo "</span>&nbsp;&nbsp;";


                         echo"<span><i class='fa fa-dollar-sign'></i>";

                              echo round(($treatPrice - ($treatDiscount/100 * $treatPrice))/$dollar_rate);      

                         echo "</span>";
 
                      } else { ?>

                     <?php echo"<i class='fa fa-naira-sign'></i>". $treatPrice ?></span>
                     <?php echo"<i class='fa fa-dollar-sign'></i>". round(($treatPrice)/$dollar_rate); ?></span>

                     <?php } ?>

                                      <br><br>
                     <div class='text-sm contents'>

                          <div>
                             <span>10 picture and 1 Frame   $200.00</span> 
                             <span><input type="radio" value = '<?php echo "200" * $dollar_rate; ?>'> </span>
                          </div>

                          <div>
                             <span>15 picture and 2 Frame   $300.00</span>
                             <span><input type="radio"></span>
                          </div>

                          <div>
                              <span>20 picture and 4 Frame   $600.00</span>
                             <span><input type="radio"></span>
                          </div>

                          <div>
                             <span>20 picture and 4 Frame   $600.00</span> 
                             <span><input type="radio"></span>
                         </div>

                          <div>
                              <span>20 picture and 4 Frame   $600.00</span>
                               <span><input type="radio"></span>
                         </div>

                          <div>
                              <span>20 picture and 4 Frame   $600.00</span>
                              <span><input type="radio"></span>
                         </div>
                          

                     </div>
                     <br>

                     <hr>
                        
                         <h6 class='text-danger fw-bold text-sm'>Addition</h6>

                         <div class='text-sm contents mb-4'>
                             <div>
                                 <span>Hair Stylist      $200.00</span>  
                                 <span><input type="radio"></span>
                            </div>

                             <div>
                                <span>Makeup Artist     $200.00</span> 
                                <span><input type="radio"></span>
                            </div>

                         </div>

                     <div class='buy_cart_likes mb-2'> 

                         <div class='d-flex align-items-center'>
                          
                              <input type="button" value="-" id="subs" class="btn-default border-0 bg-success px-2 text-white"  onclick="subst()">
                              <input type="text" style="width:50px;text-align: center; margin: 0px;border:1px solid skyblue;" class="onlyNumber" id="noOfItem" value="" name="noOfItem">
                              <input type="button" value="+" id="adds" onclick="add()" class=" btn-default border-0 bg-danger text-white px-2">

                         </div>

                         <div>

                             <button id='<?php echo $treatId; ?>' class='btn btn-danger btn-add border-0 text-sm '>Buy now</button>

                         </div>

                         <div>
                             
                            <span id='<?php echo $treat_id; ?>' class='border border-2 border-muted py-1 px-2'><i class='fa fa-heart'></i></span>

                         </div>

                     </div>

                     <div class='mt-4'>                    
                          
                         <?php

                              require 'engine/connection.php';
                              $getStates = mysqli_query($con,"SELECT * from states_in_nigeria GROUP by state");
                              echo'<select class="form-control bg-light text-dark border-0 location" name="location" id="location">
                                  <option value="">Entire Nigeria</option>';
                                     while ($states = mysqli_fetch_array($getStates)) {
                         ?>

                                 <option value="<?php echo $states['state']?>"><?php echo $states['state']?></option>
                         <?php	                                 }                                 ?>

                              </select><br>

                              <span class='bg-light border-0' id='lg'></span>

                                       <br>
                     </div>

                     <div class='policy border border-mute mt-4 py-3 px-2'>
                     
                         <div class='d-flex justify-content-space-between g-5'>
                            
                             <img src="assets/icons/icon-delivery.png" alt="">

                             <div class='d-flex flex-row flex-column g-3'>

                                 <span>Free delivery</span>

                                 <span class='text-sm text-decoration-underline'>Enter your postal code for Delivery Availability</span>

                             </div>

                         </div>
                          
                         <br>

                         <div class='d-flex g-5'>
                            
                            <img src="assets/icons/icon-return.png" alt="">

                            <div class='d-flex justify-content-space-between flex-row flex-column g-3'>

                                <span>Return Delivery</span>

                                <span class='text-sm text-decoration-underline'>Free 30 Days Delivery Returns. Details</span>

                            </div>


                        </div>

                     </div>

                 </div>

             </div>
             
             <br>


             <div class='mt-4'>

                  <h6 class='text-danger fw-bold container mt-2'><span class='bg-danger mr-2'><span style='visibility:hidden;'>1</span></span>Description</h6>

                  <p class='text-sm mt-4'><?php echo $treatContents ?></p>
             </div>
                 
         </div>
 
     </section>

      <br>




     

<!---------------------------------comment section------------------------------------------>
<div class='container'>

<div class="section-comment">
  <h6><b>Review</b></h6><br>
 <div id="bom"><div id="cy">
   <div class="comments"> 
   <?php
   require 'engine/configure.php';
   if (isset($_GET['id'])) {
   $id= $_GET['id'];
   $yp = mysqli_query($conn,"select *from treats where treat_id='".htmlspecialchars($treatId)."'");
    while ($row=mysqli_fetch_array($yp)) {
   if ($yp) {
   $pname=$row['treat_name'];
   $product_ID = $row['treat_id'];
   }
   }
   $query = mysqli_query($conn,"select * from seller_comment where product_name='".htmlspecialchars($product_ID)."' order by id desc");
   $product_comment=$query->num_rows;
   if ($product_comment<1) {
   echo "<span style='font-family: poppins;font-size:14.5px;opacity:0.6;color:black'>There are no reviews for this product</span>";
   }
   else{
   while ($row = mysqli_fetch_array($query)) {
   echo'<div class="comment-body">';
   echo "<span class='first-letter'>".substr($row['sender_name'],0,1)."</span>&nbsp;".$row['sender_name']."<br>";
   echo "<p>".$row['comment']."</p>";
   echo"<br><i style='color:blue; align-self:center;font-size:14px;' >Public</i>"."  "."<i style='color:red;font-size:14px;'>". $row['date']."</i><br><br>";
    echo'</div>';  
   }
   }
   }
   ?>
  </div><br>
  </div>
 </div>

<?php
if(isset($_SESSION['business_id'])){
if ($_SESSION['business_id'] != $vendorId) { ?>
<button class="btn-comment" onclick="toggle_comment()">Post comment</button>
<?php }  }
elseif(isset($_SESSION['id'])){ ?>
 <button class="btn-comment" onclick="toggle_comment()">Post comment</button>
<?php } 
elseif(isset($_SESSION['sp_id'])){ ?>
 <button class="btn-comment" onclick="toggle_comment()">Post comment</button>
<?php } 

else{ ?>   
  <button class="btn-comment" onclick="toggle_comment()">Post comment</button>   
<?php } ?>
</div>

<!------------------------------------------post comment popup--------------------------------------------------->
<div id="popup-comment">
<a id="close-comment" class="btn close-comment" onclick="toggle_comment()">&times;</a>
<h6><b>Post comment</b></h6><br>
<form method="post" id="conv">
<?php 
if(isset($_SESSION['business_email'])){
$business_email = $_SESSION['business_email']; 
$business_name = $_SESSION['business_name'];
echo'<input type="hidden" name="sender_email" maxlength="21" class="form-control" style="font-family:arial,fontawesome;font-size:13px;" placeholder="&#xF1fa; Email" value="'  .$business_email.'"><br>';
echo'<input type="hidden" maxlength="21" name="sender_name" class="form-control" style="font-family:arial,fontawesome;font-size:13px;"  placeholder="&#xF007; Name" value="'.$business_name.'">';
}
elseif (isset($_SESSION['sp_email'])){
 	$sp_email = $_SESSION['sp_email']; 
 	$sp_name = $_SESSION['sp_name'];
echo'<input type="hidden" name="sender_email" maxlength="21" class="form-control" style="font-family:arial,fontawesome;font-size:13px;" placeholder="&#xF1fa; Email" value=" '.$sp_email.'"><br>';
echo'<input type="hidden" maxlength="21" name="sender_name" class="form-control" style="font-family:arial,fontawesome;font-size:13px;"  placeholder="&#xF007; Name" value="'.$sp_name.'">';}
 elseif (isset($_SESSION['email'])){
 	$email = $_SESSION['email']; 
 	$name = $_SESSION['name'];
echo'<input type="hidden" name="sender_email" maxlength="21" class="form-control" style="font-family:arial,fontawesome;font-size:13px;" placeholder="&#xF1fa; Email" value="'.$email.'"><br>';
echo'<input type="hidden" maxlength="18" name="sender_name" class="form-control" style="font-family:arial,fontawesome;font-size:13px;"  placeholder="&#xF007; Name" value="'.$name.'">';}
else{
?>
<input type="text" maxlength="21" name="sender_name" placeholder="&#xF007; Name" class="form-control" style="font-family:arial,fontawesome;font-size:13px;" ><br>
<input type="email" name="sender_email" placeholder="&#xF1fa; Email" class="form-control" style="font-family:arial,fontawesome;font-size:13px;" ><br>
<?php
 }

?> 
<input type="hidden" name="product_ID" value="<?php echo$product_ID  ?>"><br>
<textarea class="form-control" name="comment" placeholder="...Your review" rows="4" style="font-size:13px;"></textarea><br>
<button id='btn-comment' class="btn btn-warning form-control" style=""><i class="fa fa-paper-plane"></i> Add comment</button>
<div class="text-center" style="display: none;" id="loading-image"><img id="loader" height="50" width="50" src="loading-image.GIF"></div>
</form>
</div> 

<br><br>


<!---------------------------------store address------------------------------------------>


<h6><b>Store Address</b></h6>
<br>
<div id="opening_hours" style="" class="row">
<div class="col-md-6">
<h6>Opening hours</h6>
<table style="width: 100%;">

	 <tbody>

	 <tr>

		<td>Monday</td>
		<td>10:00 - 15:00</td>
	 </tr>

	  <tr>

		<td>Tuesday</td>
		<td>10:00 - 15:00</td>
	 </tr>


 <tr>

		<td>Wednesday</td>
		<td>10:00 - 15:00</td>
	 </tr>


 <tr>

		<td>Thursday</td>
		<td>10:00 - 15:00</td>
	 </tr>


 <tr>

		<td>Friday</td>
		<td>10:00 - 15:00</td>
	 </tr>

</tbody>

</table>

</div>

<!------------------------------------------Discount deals--------------------------------------------------->
<div class="col-md-6">
	<br>
<iframe
    src="https://www.google.com/maps?q=<?php echo urlencode($vendorLocation); ?>&output=embed"
    class="w-100 h-auto"
    style="border:0;"
    allowfullscreen=""
    loading="lazy">
</iframe>

</div>
</div>
<br>	

<!---------------------------------send request------------------------------------------>
<div id="popup-messaging">
    <a onclick="messaging()" id="close-messaging">&times;</a>
    <h6 class="text-center">Send Request</h6><br>
    <div class="container">
        <?php 
            require 'engine/configure.php';
            
            // Product details retrieval with prepared statement
            if (isset($_GET['id'])) {
                $stmt = $conn->prepare("SELECT * FROM item_detail WHERE id = ?");
                $stmt->bind_param("s", $_GET['id']);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result && $row = $result->fetch_assoc()) {
                    $productname = htmlspecialchars($row['product_name']);
                    $sid = htmlspecialchars($row['user_id']);
                    $pid = htmlspecialchars($row['id']);
                }
                $stmt->close();
            }
        ?>  

        <form method="post" id="message-form" enctype="multipart/form-data"> 
            <div style="text-transform: capitalize;" class="pxname">
                Product name: <?php echo $productname; ?>
            </div>
            
            <!-- Hidden Inputs -->
            <input type="hidden" name="has" value="0">
            <input type="hidden" name="is_sender_deleted" value="0">
            <input type="hidden" name="itemid" value="<?php echo $treatId; ?>">
            <input type="hidden" name="is_receiver_deleted" value="0">

            <?php 
                if (isset($_SESSION['business_email']) || isset($_SESSION['sp_email']) || isset($_SESSION['email'])) {
                    $userEmail = $_SESSION['business_email'] ?? $_SESSION['sp_email'] ?? $_SESSION['email'];
                    $userName = $_SESSION['business_name'] ?? $_SESSION['sp_name'] ?? $_SESSION['name'];
                    
                    echo '<input type="hidden" name="sentby" value="'.htmlspecialchars($userEmail).'">';
                    echo '<input type="hidden" name="name" value="'.htmlspecialchars($userName).'">';
                } else {
            ?>
                <input type="text" name="sentby" maxlength="21" class="form-control" placeholder="Email"><br>
                <input type="text" maxlength="21" name="name" class="form-control" placeholder="Name">
            <?php
                }
            ?> 

            <input type="hidden" name="sentto" value="<?php echo htmlspecialchars($vendorEmail); ?>">
            <input type="hidden" name="subject" value="<?php echo $productname; ?>" class="form-control">
            <textarea name="message" rows="6" placeholder="e.g., phone number, price, etc." class="form-control"></textarea><br><br>

            <div class="text-center">
                <input type="submit" name="submit" id="submit-message" class="btn btn-warning form-control" value="Send">
            </div>
            <div class="text-center" style="display: none;" id="loading-image">
                <img id="loader" height="50" width="80" src="loading-image.GIF">
            </div>
        </form>
        <br>
    </div>
</div>

       <h6 style="padding: 10px;"><span id="make_request"><a style="color: skyblue;" onclick="messaging()" class="btn">Make a request</a></span> <span id="report_abuse"><a style="color:white;"  onclick='toggle()' class="btn">Report abuse</a></span></h6>
<br>

 </div>  



      <br>


     <section>

         <div class='container'>
           
              <h6 class='text-danger fw-bold container mt-4'><span class='bg-danger mr-2'><span style='visibility:hidden;'>1</span></span>Related items</h6>
             <br>

              <div class='best_selling container'>

                   <h4 style='visibility:hidden;' class='fw-bold'>Best Selling Farm Products</h4>

                   <span class='bg-danger rounded px-3 py-2'><a class='text-white' href="">View all</a></span>

              </div> 
              

              <div class='package-container container'>
         
                   <?php

                   require 'engine/get-dollar.php';

                   $condition = "SELECT * from treats order by treat_id desc limit 5";

                  $data = mysqli_query($conn,$condition);
                
                  $datafound = $data->num_rows;

                  echo "<table><tbody id='mytable' class=''>";

                 echo"<div style='float:right;margin-top:-43px;font-size:13px;font-weight:bold;'>".$datafound. " item(s)</div>";
                
                 while($row = mysqli_fetch_array($data))

                  {        
 
                 echo "<div id='package'>";

                 $price = $row['treat_price'];

                 $dollar = round($price/$dollar_rate);

                 if ($row['discount']>0) {

                 echo "<span id='discount'>-".$row['discount']."%</span>";

                  echo "<span class='' id='views'>".$row['views']." <i class='fa fa-eye'></i></span>";
                 }

                 if ($row['discount']==0) {

                 echo "<span class='' id='noviews'>".$row['views']." <i class='fa fa-eye'></i></span>";
                 }

                 echo "<a href='treat-details.php?id={$row['treat_id']}&{$row['treat_name']}&{$row['treat_details']}' target='_blank'><div style=''><img loading='lazy' id='imgitem' width='' src=".$row['treat_image'].">"." "."</div></a>";

                 echo"<span id=''><i class='fa-solid fa-check'></i>"."</span><br>";

                 if ($row['discount']>0) {
                     $price = $row['product_price'];
           echo"<span style='text-decoration:line-through;' id='priceitem'>&#8358;".$price."</span> ";
           echo"<span id='priceitem'>&#8358;".round(( $price)-($row['discount']/100 * $price))."</span><br>";
           echo"<span style='text-decoration:line-through;' id='priceitem'>$".round($dollar)."</span>";
           echo"<span id='priceitem'>$".round(($dollar)-($row['discount']/100 * $dollar))."</span><br>";
       }

       if ($row['discount']==0) {
           echo"<span id='priceitem'>&#8358;".$price."</span> ";
           echo" <span id='priceitem'>$".($dollar)." </span><br>";}
           echo "<span id='nameitem' style='' ><a target='_blank' href='details-visitor.php?id={$row['treat_id']}&{$row['treat_name']}&{$row['treat_details']}'>".$row['treat_name']."</a></span>"."<br>";
 
       ?> 

       <?php
           echo"</div>";      
          }
       ?>
   </tbody></table>      

   </div>

        </div>


     </section>



<?php include 'footer.php'; ?>

<!-- javascript section -->

<script>
  
  $('.package-container').flickity({
  cellAlign: 'left',
  contain: true,
  autoPlay:true,
  prevNextButtons: false,

  });

</script>



<script>
$('.comments').flickity({
  cellAlign: 'left',
  contain: true,
  autoPlay:true,
});

</script>

<script type="text/javascript">
	function add() {
    var a = $("#noOfItem").val();
    a++;
    if (a && a >= 1) {
        $("#subs").removeAttr("disabled");
    }
    $("#noOfItem").val(a);
};

function subst() {
    var b = $("#noOfItem").val();
    // this is wrong part
    if (b && b >= 1) {
        b--;
        $("#noOfItem").val(b);
    }
    else {
        $("#subs").attr("disabled", "disabled");
    }
};

</script>
<script type="text/javascript">
 function toggle() {
var popup = document.getElementById('popup');
popup.classList.toggle('active');
 }
</script>

<script type="text/javascript">
 function toggle_comment() {
var popup = document.getElementById('popup-comment');
popup.classList.toggle('active');
 }
</script>


<script type="text/javascript">
$('#submit').on('click',function(e){
        e.preventDefault();
  $.ajax({
           type: "POST",
            url: "report-page.php",
           data:  $("#report-form").serialize(),
            cache:false,
            contentType: "application/x-www-form-urlencoded",
            success: function(response) {
            if(response==1){

swal({
text:"Your message has been recieved. Thank you!",
icon:"success",
});

 $("#popup").hide(1000);
             }

       else { 
       
             swal({

text:"Issue field is required",
icon:"error",

});
            $("#report-form").find('input:text').val('');
            $("#report-form").find('textarea').val('');
            $('input:checkbox').removeAttr('checked');
}  
            },

            error: function(jqXHR, textStatus, errorThrown) {

                console.log(errorThrown);

            }

        })

    });
</script>
<input type="hidden" name="userid" id="seller" value="<?php echo $vendorId ?>">
<input type="hidden" name="buyer" id="buyer" value="<?php echo $buyer ?>">
<script type="text/javascript">

$(document).ready(function() {
    $('.btn-add').click(function() {

        var itemId = $(this).attr('id');
        var userid = $('#seller').val();
        var noofItem = $('#noOfItem').val();
        var location = $('#location').val();
        var buyer = $('#buyer').val();
        var lga = $('#lga').val();


      $.ajax({
            type: "POST",
            url: "engine/cart-process.php",
            data: { 'itemId': itemId, 'userid': userid, 'noofItem': noofItem,'location':location,'buyer':buyer,'lga':lga},
            cache: false,
            success: function(response) {
             

                if (response == 1) {

                    swal({
                        icon: "success",
                        text: "Item(s) has been added successfully"
                    });
                    
                    $('.numbering').load('engine/item-numbering.php');
                } else {
                    swal({

                        icon: "error",
                        text: response
                    });
                }
            }
        });
    });
});
</script>
<script type="text/javascript">
$("img.lazy").Lazy();
var instance = $("img.lazy").data("plugin_lazy");
</script>




<script type="text/javascript">
$('.numbering').load('engine/item-numbering.php');
$('.btn-compare').on('click',function() {
var id = $(this).attr('id');
var buyer =$('#buyer').val();
$(".loading-image").show();
$.ajax({
type:"POST",
url:"engine/compare-page.php",
data:{'id':id,'buyer':buyer},
success:function(data) {
$(".loading-image").hide();
window.location.href="compare-product.php?id="+id;
}
    });

});
</script>

<script type="text/javascript">
$('#submit-message').on('click',function(e){
        e.preventDefault();
        $("#loading-image").show();
          $.ajax({
           type: "POST",
           url: "engine/message-process.php",
           data:  $("#message-form").serialize(),
           cache:false,
           contentType: "application/x-www-form-urlencoded",
           success: function(response) {
           $("#loading-image").hide();
           if (response==1) {
            swal({
            text:"Message sent",
             icon:"success",
            });
                
            $("#popup-messaging").hide(1000);
            $("#message-form")[0].reset(); 
            $("#message-form").find('input:text').val('');
            $("#message-form").find('textarea').val('');
            $('input:checkbox').removeAttr('checked');
                                                        }    
            else{
            
              swal({ icon:"error",
              	     text:response
              });
           

           }

            },

            error: function(jqXHR, textStatus, errorThrown) {

                console.log(errorThrown);

            }

        })

    });
</script>

<script type="text/javascript">
$('#btn-comment').on('click',function(e){
e.preventDefault();
$("#loading-image").show();
    $.ajax({
            type: "POST",
            url: "engine/seller-comment.php",
            data:  $("#conv").serialize(),
            success: function(response) {
            $("#loading-image").hide();
            if (response==1) {
          $('#bom').load(location.href + " #cy");
          $("#conv")[0].reset();
           swal({
           	text:"Comment added successfully",
            icon:"success",
});
}
else{
swal({

    icon:"error",
	text:response
});
}         
},
           error: function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);

            }
        });

    });

</script>
<script type="text/javascript">
 function messaging() {
var popup = document.getElementById('popup-messaging');
popup.classList.toggle('active');
  }

</script>


<script type="text/javascript">

$('#lg').html("<select name='lga' id='lga' class='form-control border-0 bg-light lga'><option value=''>Choose LGA</option></select>");
	
$('#location').on('change',function() {
	
var location = $(this).val();

      $.ajax({
            type:"POST",

            url:"engine/get-lga.php",

            data:{'location':location},

            success:function(data) {

            	$('#lg').html(data);
            	
            }


     });

});

</script>

<?php

if (isset($_GET['id'])) {
	$item = $_GET['id'];
}
?>

<input type="hidden" name="itemId" id="idItem" value="<?php echo $treatId ?>">
<input type="hidden" name="buyer" id="buyer" value="<?php echo $buyer ?>">
<input type="hidden" name="userid" id="seller" value="<?php echo $vendorId ?>">

<script>
	
$('.heart').on('click',function() {

var itemId = $("#idItem").val();
var userid = $('#seller').val();
 var buyer = $('#buyer').val();

$.ajax({
            type: "POST",
            url: "engine/heart-process.php",
            data: { 'itemId': itemId, 'userid': userid,'buyer':buyer},
            cache: false,
            success: function(response) {
             

                if (response == 1) {

                    swal({
                        icon: "success",
                        text: "Item has been added to wish list"
                    });
                    
                    $('#com').load(location.href + " #my");
                
                } else {
                    swal({

                        icon: "error",
                        text: response
                    });
                }
            }
        });

});



</script>


<script>

function share() {
    var url = $('.share').attr('id');
    var encodedUrl = encodeURIComponent(url);
    var facebookShare = "https://www.facebook.com/sharer/sharer.php?u=" + encodedUrl;
    var twitterShare = "https://twitter.com/intent/tweet?url=" + encodedUrl;
    var linkedinShare = "https://www.linkedin.com/shareArticle?url=" + encodedUrl;
    window.open(facebookShare, "_blank");
    window.open(twitterShare, "_blank");
    window.open(linkedinShare, "_blank");
}
</script>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/667aba429d7f358570d3336e/1i17mf66d';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<script>
    $(document).ready(function(){
        $('#getLocation').on('click', function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                $('#output').html("Geolocation is not supported by this browser.");
            }
        });

        function showPosition(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            $('#output').html("Latitude: " + latitude + "<br>Longitude: " + longitude);
        }

        function showError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    $('#output').html("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    $('#output').html("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    $('#output').html("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    $('#output').html("An unknown error occurred.");
                    break;
            }
        }
    });
</script>

<a class="btn-down" onclick="topFunction()">&#8593;</a>
<script src="assets/js/scroll.js"></script>

</body>

</html>