<?php session_start();
require 'engine/get-dollar.php';
$num_per_page = 10;
$page = isset($_POST['page']) ? (int) $_POST['page'] : 1;
$page = max($page, 1);
$initial_page = ($page - 1) * $num_per_page;

if (!empty($_SESSION["id"])) {
$date = $_SESSION['date'];
$myid = $_SESSION['id'];
}

elseif (!empty($_SESSION["business_id"])) {
$business_date = $_SESSION['business_date'];
$business_id = $_SESSION['business_id'];
}

elseif (!empty($_SESSION["sp_id"])) {
$sp_date = $_SESSION['sp_date'];
$sp_id = $_SESSION['sp_id'];

 }

?>

<?php 

require_once 'engine/configure.php';
$condition ="SELECT * FROM item_detail WHERE user_id = '".htmlspecialchars($business_id)."'";

//if it is set at earching for items by typing .........
if (isset($_POST['q']) && !empty($_POST['q'])) {
 $search = explode(" ",mysqli_escape_string($conn,$_POST['q'])) ;
foreach ($search as $text) {
$condition .= " AND (`product_name` LIKE '%".htmlspecialchars($text)."%' OR `product_details` LIKE '%".htmlspecialchars($text)."%' OR `product_category` LIKE '%".htmlspecialchars($text)."%' OR `product_location` LIKE '%".htmlspecialchars($text)."%' OR `product_details` LIKE '%".htmlspecialchars($text)."%' )";
}
}

//if it is set at getting items whether is is sold or not......... 
if (isset($_POST['sold'])) {
  $sold = mysqli_escape_string($conn,$_POST['sold']);
   if ($sold=='sold') {
   $condition .= " AND sold = 1";
  }
    if ($sold=='available') {
      $condition .= " AND sold = 0";
    }
}
//if it is set at getting category ofeach item available .........
if (isset($_POST['category'])) {
$category =  mysqli_escape_string($conn,$_POST['category']);
if ($category!='all') {
  $condition .= " AND product_category like '%".htmlspecialchars($category)."%'";
}
}
//if it is set at getting the price ofeach item available .........
if (isset($_POST['price'])) {
$price =  mysqli_escape_string($conn,$_POST['price']);
$condition .= " AND product_price <= '".htmlspecialchars($price)."'";
}

$discount = mysqli_query($conn,$condition);




// ---------- COUNT TOTAL RECORDS ----------
$countQuery = "SELECT COUNT(*) AS total FROM item_detail";
$countStmt = $conn->prepare($countQuery);
$countStmt->execute();
$countResult = $countStmt->get_result();
$totalRecords = $countResult->fetch_assoc()['total'];

$from = $initial_page + 1;
$to = min($initial_page + $num_per_page, $totalRecords);


if ($discount ->num_rows>0) {
echo"<p><b>".$discount ->num_rows." item(s)</b></p>";
echo "<table><tbody id='mytable' class=''>";
while($row=mysqli_fetch_array($discount))
{ ?>

<?php   
echo "<div id='package'>";
$productId = $row['id'];
$used = $row['used'];
$price = $row['product_price'];
$subscription = round((10/100)*$price); 
$dollar = round($price/$dollar_rate,2);
echo "<a class='edit btn-edit'  id ='".$productId."' ><i class='fa fa-edit'></i></a>";
if ($row['discount']>0) {
echo "<span id='discount'>-".$row['discount']."%</span>";
echo "<span class='' id='views'>".$row['views']." <i class='fa fa-eye'></i></span>";
}
if ($row['discount']==0) {
echo "<span class='' id='noviews'>".$row['views']." <i class='fa fa-eye'></i></span>";
}
echo "<a href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}' target='_blank'><div style=''><img loading='lazy' id='imgitem' width='' src=".$row['product_image'].">"." "."</div></a>";

if ($row['discount']>0) {
$price = $row['product_price'];
echo"<span style='text-decoration:line-through;' id='priceitem'>&#8358;".$price."</span> ";
echo"<span id='priceitem'>&#8358;".round(( $row['product_price'])-($row['discount']/100 * $price))."</span><br>";
echo"<span style='text-decoration:line-through;' id='priceitem'>$".($dollar)."</span>";
echo"<span id='priceitem'>$".round(($dollar)-($row['discount']/100 * $dollar),2)."</span><br>";
}
if ($row['discount']==0) {
echo"<span id='priceitem'>&#8358;".$price."</span> ";
echo" <span id='priceitem'>$".($dollar)." </span><br>";
}
echo "<span id='nameitem' style='' ><a target='_blank' href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}'>".$row['product_name']."</a></span>"."<br>";
echo"<span id='locitem'>".$row['product_location'].""."</span><br>";

if($used==1){ echo "<span id='locitem'><a class='used'><b style='color:green;cursor:pointer;'>Pending</b></a></span><br>";    }

?> 
<?php
echo"</div>";      
}?>
</tbody></table>
<?php

}
else{


}



?>

<div class="text-center mt-4">
<?php
$total_num_page = ceil($totalRecords / $num_per_page);
$radius = 2;

if ($page > 1) {
    echo '<span id="page_num"><a class="btn-dark btn-success btn-pagination prev" id="' . ($page - 1) . '">&lt;</a></span>';
}

for ($i = 1; $i <= $total_num_page; $i++) {
    if (
        $i <= $radius ||
        ($i >= $page - $radius && $i <= $page + $radius) ||
        $i > $total_num_page - $radius
    ) {
        $active = $i == $page ? 'active-button' : '';
        echo "<span id='page_num'><a class='btn-dark btn-success btn-pagination $active' id='$i'>$i</a></span>";
    } elseif ($i == $page - $radius - 1 || $i == $page + $radius + 1) {
        echo "... ";
    }
}

if ($page < $total_num_page) {
    echo '<span id="page_num"><a class="btn-dark  btn-success btn-pagination next" id="' . ($page + 1) . '">&gt;</a></span>';
}
?>
</div>


<div id="play" class='popupmodal active'>
    
<a class="closeModal used">&times;</a>
 
 <h6><b>Welcome to eStores Used Products Posting one time Subscription!</b></h6>
 
 <hr>

<p style='font-style:initial;color:red;'>To proceed to the payment page and subscribe to our service for posting used products, please continue with the following steps:</p>

<p><b>Subscription Details:</b> Choose your preferred subscription plan to start posting your used products on eStores.</p>

<p><b>Payment Information:</b> Enter your payment details securely to complete the subscription process.</p>

<p><b>Confirmation:</b> Once payment is successful, you'll gain immediate access to begin listing your used products on our platform.</p>

<p>Thank you for choosing eStores! We look forward to assisting you in selling your used products effectively.</p>

 <input type='hidden' id='phone_number' value='<?php echo$_SESSION['business_contact']; ?>'>
 
<input type='hidden' id='id' value='<?php echo$productId; ?>'>

<input type='hidden' id='subscription' value='<?php echo round((10/100)*$price); ?>'>

 <a class='btn btn-warning form-control paywithPaystack' style='font-size:13px;color:white;font-weight:bold;' id='payButton'>Proceed to pay</a><br>

   
</div>


















<!-----------------------------------Edif form --------------------------------------->

