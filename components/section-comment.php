
<!---------------------------------comment section------------------------------------------>

<div class="section-comment">
  <h6><b>Review</b></h6><br>
 <div id="bom"><div id="cy">
   <div class="comments">
   <?php
   require 'engine/configure.php';
   if (isset($_GET['id'])) {
   $id= $_GET['id'];
   $yp = mysqli_query($conn,"select *from item_detail where id='".htmlspecialchars($id)."'");
    while ($row=mysqli_fetch_array($yp)) {
   if ($yp) {
   $pname=$row['product_name'];
   $product_ID = $row['id'];
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