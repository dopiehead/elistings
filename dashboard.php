<?php session_start();

date_default_timezone_set('Africa/Lagos');
date_default_timezone_get();

if (isset($_SESSION["admin_email"])) { 
echo"<script>location.href='admin.php'</script>";
}

if (!isset($_SESSION["id"]) && !isset($_SESSION["business_id"]) && !isset($_SESSION["sp_id"] )) { 
echo"<script>location.href='login.php'</script>";
exit();
}

if(isset($_SESSION["id"])):
  echo"<script>location.href='profile.php'</script>";
endif;
?>

<?php 
if (!empty($_SESSION["id"])) {
$date = $_SESSION['date'];
$userId = $_SESSION['id'];
$you = $_SESSION['email'] ;
}
if (!empty($_SESSION["business_id"])) {
$business_date = $_SESSION['business_date'];
$userId = $_SESSION['business_id'];
$you = $_SESSION['business_email'] ;
}

?>


<?php 

require 'engine/configure.php';

if(isset($_SESSION['business_id'])){
$getviews =  mysqli_query($conn,"select sum(views) as views from item_detail where user_id = '".htmlspecialchars($userId)."'");
}

       while ($row = mysqli_fetch_array($getviews)) {

       $audience = round($row['views']/100);

       $percentage = 100 - ($audience);
         
       }
?>


<!DOCTYPE html>
<html>
<head>
	<title>E-stores | dashboard </title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
  <link rel="stylesheet" href="assets/css/dashboard.css">
  <link rel="stylesheet" href="assets/css/navigator.css">
  <link rel="stylesheet" href="assets/css/profile-section.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>
<style>

.progress-circle {
      position: relative;
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background: conic-gradient(
        skyblue 0% <?= $audience ?>%, 
        #ddd <?= $audience ?>% 100%
    );
  }
  
</style>
</head>
<body>


<!------------------------------------------overlay content--------------------------------------------------->

<a  class='d-md-none d-block' id="openbar" onclick="openbar()"><i class="fa fa-bars"></i></a>

<div style="overflow-y: hidden;overflow: hidden;">

<div class="row">

<div id="overlay" class="col-md-3">

<?php include ("components/navigator.php"); ?>

</div>

<div class="col-md-9">

<div class="container">

<div class=" row"> 
  
  <div class="col-md-6">
 
     <?php if (isset($_SESSION['business_id'])) {
    //Check if user is a vendor
       $username = $_SESSION['business_name'];
       $useremail = $_SESSION['business_email'];

     }

    //Check if user is a buyer
if (isset($_SESSION['id'])) {

    $username = $_SESSION['name'];
    $useremail = $_SESSION['email'];



}
?>
<br>

  <h5 style='font-weight:bold;' class='fw-bold'>Overview</h5>

</div>

<div class="col-md-6">
      <?php
        require 'engine/configure.php';   
        $vendor = mysqli_query($conn,"SELECT * FROM vendor_profile WHERE id = '$userId'");
        if ($vendor) {   
          while ($dataVendor = mysqli_fetch_array($vendor)) {
            $vendorName = $dataVendor['business_name'];
            $vendorImg = $dataVendor['business_image'] ?? "https://placehold.co/400";
          }
        }
      ?>
      <div style='gap:10px;' class="d-flex align-items-center">
        <img id="user_image" src="<?= htmlspecialchars($vendorImg); ?>" class="rounded-circle me-3" alt="Vendor Image" style="object-fit: cover;">

        <div>
          <div class="d-flex align-items-center justify-content-between">
            <span class="fw-bold user_name" id="user_name"><?= htmlspecialchars($_SESSION['business_name']); ?></span>

            <a href="vendor-notification.php" class="ms-3 text-decoration-none position-relative">
              <i class="fa-solid fa-bell"></i>
              <?php
                if (isset($_SESSION['business_id'])) {
                  $business_id = $_SESSION['business_id'];
                  $getnotification = mysqli_query($conn,"SELECT * FROM vendor_notifications WHERE pending = 0 AND recipient_id ='".htmlspecialchars($business_id)."'");
                  $countNotifications = $getnotification->num_rows;
                  if ($countNotifications > 0) {
                    echo '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">'.htmlspecialchars($countNotifications).'</span>';
                  }
                }
              ?>
            </a>
          </div>
          <small class="text-muted d-block user_email" id="user_email"><?= htmlspecialchars($_SESSION['business_email']); ?></small>
        </div>
      </div>
    </div>
<?php

require 'engine/configure.php';
if (isset($_SESSION['id'])) {
$you = $_SESSION['id'];
$getnotification = mysqli_query($conn,"select * from buyer_notifications where pending=0 and recipient_id ='".htmlspecialchars($you)."'");
echo'<a href="buyer-notifications.php"><span class="bell">&nbsp; <i class="fa-solid fa-bell"><span class="notification">';
$countNotifications = $getnotification->num_rows;
if ($countNotifications>0) {
?>
<?php echo$countNotifications;?>
   <?php   }  } ?>

   </span></i></span></a>

  </div>


</div>



<div class="">


    <div  id="label">

    <div class="row">
      
    <div class="col-md-8">
      
   
    <div id="request">

      <h6>Total request</h6>

      <p><?php echo$countNotifications?></p><br>

      <i id="deals" class="fa fa-star"></i>  <span id="star"><span style="color: red;"> -12.76</span> than last month</span>

    </div>
    
  <?php  if (isset($_SESSION['business_id'])) { ?>
 
 <div  id="request">
      
 <h6>Total listings</h6>
 <?php
   $get_listings = mysqli_query($conn,"select * from item_detail where user_id = '".$_SESSION['business_id']."' ");
 ?>
      <p><?php if($get_listings->num_rows>0){ echo $get_listings->num_rows;} else{echo"0";} ?></p><br>

      <i id="listings" class="fa fa-star"></i> <span id="star"><span style="color:green;"> +343</span> than last month</span>

    </div>

<?php
}
?> 

<div  id="request">
<?php

require 'engine/configure.php';
if (isset($_SESSION['id'])) {
$you = $_SESSION['id'];
$deals = mysqli_query($conn,"select * from buyer_notifications where recipient_id ='".htmlspecialchars($you)."' and pending = 0");
} 

if (isset($_SESSION['business_id'])) {
$you = $_SESSION['business_id'];
$deals = mysqli_query($conn,"select * from vendor_notifications where recipient_id ='".htmlspecialchars($you)."'and pending = 0");
} 

$donedeals = $deals->num_rows;
if ($donedeals>0) {
?>
<?php echo$donedeals;?>
   <?php   }  else{$donedeals="0";} ?>


       <h6>Done Deals</h6>

      <p><?php echo$donedeals?></p><br>

      <i id="deals" class="fa fa-star"></i>  <span id="star"><span style="color:red;"> -12.76</span> than last month</span>



    </div>
<?php

if(isset($_SESSION['business_id'])){

$getproduct = mysqli_query($conn, "SELECT user_id, product_name, product_price FROM item_detail WHERE user_id = '" . htmlspecialchars($_SESSION['business_id']) . "' AND sold = 0");

if ($getproduct->num_rows > 0) {
    $data = array(); // Initialize an array to store products

    while ($product = mysqli_fetch_array($getproduct, MYSQLI_ASSOC)) {
        // Build each product entry
        $entry = array(
            'product' => $product['product_name'],
            'sales' => (int)$product['product_price'] // assuming product_price is numeric
        );

        $data[] = $entry; // Add the product entry to the data array
    }
    // Convert PHP array to JSON format
    $json_data = json_encode($data);

}

}
?>

 <?php if(isset($_SESSION['business_id'])){?> 
<div id="bar-chart">
 <br> 
<?php if($getproduct->num_rows > 0){ ?>
<h6><?php if(isset($_SESSION['business_id'])){echo"Sales Data";} else{echo "Work history";}?></h6>

            <canvas id="barChart" style="width:100%;max-width:800px"></canvas>
<?php } ?>

</div>
<?php } ?>

<br><br>
    </div>
    
 <?php if(isset($_SESSION['business_id'])){?> 

   <div class="col-md-4">
     
<div style="border:2px solid rgba(0,0,0,0.1);padding: 5px;border-radius: 10px;">
     <h6>Previous month performance</h6> 

      

<div class="chart-container">

 <?php 

if(!empty($_SESSION['business_id'])) {
 
 $cart = mysqli_query($conn,"select * from checkout where seller = '".$_SESSION['business_id']."'");
if ($cart->num_rows>0) { $added = round($cart->num_rows/100);
 } else{$added = 1;}

$views =  mysqli_query($conn,"select sum(views) as views from item_detail where user_id = '".$_SESSION['business_id']."'");
if ($views->num_rows>0) {
while ($myviews = mysqli_fetch_array($views)) {
  $perview = round($myviews['views']/100);
 } 
 
}

$reviews = mysqli_query($conn,"select seller_comment.product_name, item_detail.id,item_detail.user_id from seller_comment,item_detail where item_detail.user_id = '".$_SESSION['business_id']."'");
$perReviews =round($reviews->num_rows/100); 

$remainder = 100-($perview + $added + $perReviews);
}

 ?>    




<div class="chart-container">
<?php
// Example data (replace with your actual data retrieval logic)
$piedata = [
    ['category' => 'Added to cart', 'percentage' => $added],
    ['category' => 'Views', 'percentage' => $perview],
    ['category' => 'Shares', 'percentage' => $remainder],
    ['category' => ' Reviews', 'percentage' => $perReviews],
];

// Convert PHP array to JSON format
$json_Datapie = json_encode($piedata);
?>
<script>
var jsonDatapie = <?php echo $json_Datapie; ?>;
</script>


 <canvas id="pieChart"  style="width:100%;"></canvas>


 </div> 

</div>


<div class="row">
 <div class="col-md-6 col-6"><i class="fa fa-shopping-cart"></i><span style="font-size:13px;"> Added to cart</span></div>
 <div class="col-md-6 col-6"><i class="fa fa-eye"></i> <span style="font-size:13px;">Views</span></div>
<div class="col-md-6 col-6"><i class="fa fa-share-alt"></i><span style="font-size:13px;"> Shares</span></div>
<div class="col-md-6 col-6"><i class="fa fa-comments"></i><span style="font-size:13px;"> Reviews</span></div>
</div>

</div>

    </div>



    </div>




<br>

<div class="row">
  
<div class="col-md-4" id="audience">

<div style="border:2px solid rgba(0,0,0,0.1);padding: 5px;border-radius: 10px;">
  <h6><b>Reached Audience</b></h6><br>



 <span><i id="higher" class="fa fa-circle"></i><b><?php echo$audience ?>% audience</b></span>

<br>

 <span><i id="high" class="fa fa-circle"></i><b> <?php echo $percentage?> % audience</b></span>



<div class="progress-circle">

<span class="progress-text"> <?php $getQuery = mysqli_query($conn,"select * from messages where receiver_email = '".htmlspecialchars($useremail)."'"); 
$countmessages=$getQuery->num_rows;
if ($countmessages>0) {
 $percentage_progress = ($countmessages/100);
echo ($percentage_progress)."% Interaction" ;

}     ?></span>

</div>

</div>
<br>
</div>

<div class="col-md-4" id="target">

<div style="border:2px solid rgba(0,0,0,0.1);padding: 5px;border-radius: 10px;">

  <h6><b>Target</b></h6>

 <span>

<i id="highest" class="fa fa-circle"></i><b><?php echo round($perview) ?> % Target reached</b></span>
<?php 

$graphdata = array(
    array("label" => "January", "value" => 0),
    array("label" => "February", "value" => 0),
    array("label" => "March", "value" => 3),
    // More data...
);
$graphdata = json_encode($graphdata);

?>

<canvas id="myChart" width="400" height="400"></canvas>

<script>
    var cta = document.getElementById('myChart').getContext('2d');
    var $graphdata = <?php echo $graphdata; ?>;
    var labels = $graphdata.map(entry => entry.label);
    var values = $graphdata.map(entry => entry.value);
    var myChart = new Chart(cta, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Target ',
                data: values,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</div>
<br>
</div>

<div class="col-md-4">

<div style="border:2px solid rgba(0,0,0,0.1);padding: 5px;border-radius: 10px;">

  <h6 id="Engagements"><b>Engagements</b></h6><br>

<div class="progress-circle">

<span class="progress-text"><?php if(empty($percentage_progress)){$percentage_progress=0;}  $Engagements = ($percentage_progress + $countmessages); if($Engagements>0) {echo round($Engagements)/100;}else{echo "0";} ?>% Interaction</span>

</div>
    </div>


</div>

</div>



     </div>



  </div>



</div>

</div>

<?php } ?>

<script>
        // Access jsonData variable containing PHP JSON data
        var jsonData_pie = <?php echo $json_Datapie; ?>;

        // Prepare data for Chart.js
        var labels = jsonData_pie.map(function(item) {
            return item.category;
        });
        var data = jsonData_pie.map(function(item) {
            return item.percentage;
        });

        // Create a new pie chart
        var ptx = document.getElementById('pieChart').getContext('2d');
        var myPieChart = new Chart(ptx, {
            type: 'pie',
            data: {
                labels:,
                datasets: [{
                    label: 'Previous Month performance',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw.toFixed(2) + '%';
                            }
                        }
                    }
                }
            }
        });
    </script>
    
    
    
<script>
        // Access jsonData variable containing PHP JSON data
        var jsonData = <?php echo $json_data; ?>;

        // Prepare data for Chart.js
        var labels = jsonData.map(function(item) {
            return item.product;
        });
        var data = jsonData.map(function(item) {
            return item.sales;
        });

        // Create a new bar chart
        var ctx = document.getElementById('barChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Sales Data',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
 

<script>

function openbar() {
 
 $("#overlay").toggle();  

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

</body>
</html>