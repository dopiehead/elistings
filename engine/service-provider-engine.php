<?php

require 'configure.php';
$condition = "SELECT * from service_providers where sp_verified =1";
//sort by category
if (isset($_POST['sp_category'])  ) {
$sp_category = mysqli_escape_string($conn,$_POST['sp_category']);
if ($sp_category!='') {
 $condition .= " AND sp_category like '%".htmlspecialchars($sp_category)."%'";
}
}

//sort by speciality
if (isset($_POST['sp_speciality'])) {
$sp_speciality =  mysqli_escape_string($conn,$_POST['sp_speciality']);
if ($sp_speciality!='all') {
$condition .= " AND sp_speciality like '%".htmlspecialchars($sp_speciality)."%'";
}
}

//sort by location
if (isset($_POST['sp_location'])  ) {
$sp_location =   mysqli_escape_string($conn,$_POST['sp_location']);
if ($sp_location!='') {
$condition .= " AND sp_location like '%".htmlspecialchars($sp_location)."%'";
}
}

$condition .= " ORDER BY sp_id DESC"; 
$num_per_page =20;
if (isset($_POST['page'])) {
$page = $_POST['page'];
}

else{
$page = 1;  
}

//number per page
$initial_page = ($page-1)*$num_per_page; 
$condition .= " limit $initial_page,$num_per_page";
$service_providers = mysqli_query($conn,$condition);
$datafound =$service_providers->num_rows;
?>


  <h6 id="head_popular">Popular Service Providers<span style="float: right;"></span></h6><br>

<?php  

    while($row=mysqli_fetch_array($service_providers))
        {    
         
            ?>
        <?php    

//list details

    $sp_id = $row['sp_id'];
    $sp_speciality = $row['sp_speciality'];
    $sp_name = $row['sp_name']; 
    $sp_location = $row['sp_location']; 
    $sp_ratings = $row['ratings']; 
    $sp_verified = $row['sp_verified'];
    $sp_img  =  $row['sp_img'];

    echo"<div id='menu_sp_vulcanizer'>";
    
  if ($sp_verified==1) {
         echo"<span id='home_verified'><i class='fa fa-check'></i><span id='verified'>verified</span></span>";
}

$extension = strtolower(pathinfo($sp_img,PATHINFO_EXTENSION));
$image_extension  = array('jpg','jpeg','png');
if (!in_array($extension , $image_extension)) {
$sp_img = "<a id='sp_img' href='sp_details.php?sp_id=$sp_id'><i style='font-size:90px;color:black;' class='fa fa-user-alt'></i></a><br>";
echo$sp_img; }else{

echo"<a id='sp_img' href='sp_details.php?sp_id=$sp_id'><img src=".$row['sp_img']."></a><br>";}
      
      
      
      echo"<a id='sp_name' href='sp_details.php?sp_id=$sp_id'>".$row['sp_name']."</a><br>";

if ($row['sp_speciality']=='mechanic') {
      echo"<a style='word-wrap:hidden;' id='sp_speciality' href='sp_details.php?sp_id=$sp_id'>". $row['sp_speciality']."</a><br>";}

    else{
     echo"<a id='sp_speciality' href='sp_details.php?sp_id=$sp_id'>". $row['sp_speciality']."</a><br>";
   }
   echo"<a id='sp_location' href='sp_details.php?sp_id=$sp_id'>". $row['sp_location']."</a><br>";
   echo"</div>";
  ?> 
 <?php
          echo"</div>";      
                
      

}
        ?>

<?php 

require 'configure.php';

$radius=3;
$pageres = mysqli_query($conn,"SELECT * from service_providers where sp_verified=1");
$numpage = $pageres->num_rows;
$total_num_page =ceil($numpage/$num_per_page);

?>


<div align='center'>

<?php

echo "<br>";

if ($page > 1) {
$previous = $page-1;
echo'<span id="page_num"><a style="" class="btn-success prev" id="'.$previous.'">&lt;</a></span>';

}

 for ($i=1; $i<=$total_num_page; $i++) { 

if(($i >= 1 && $i <= $radius) || ($i > $page - $radius && $i < $page + $radius) || ($i <= $total_num_page && $i > $total_num_page - $radius)) {

    if($i == $page) {echo'<span id="page_num"><a class="btn-success active-button" id="'.$i.'">'.$i.'</a></span>';}
  }

  elseif($i == $page - $radius || $i == $page + $radius) {

    echo "... ";
}


elseif ($page==$i) {   
}



else{
echo'<span id="page_num"><a class="btn-success" id="'.$i.'">'.$i.'</a></span>';
}
} 

if ($page<$total_num_page) {

$next = $page+1;

  echo'<span id="page_num"><a style="" class="btn-success next" id="'.$next.'">&gt;</a></span>';
}

 ?> 

</div>





