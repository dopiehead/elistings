
<?php

require 'configure.php';
$condition = "SELECT * from service_providers where sp_verified=1";
//sort by category

//sort by speciality
if (isset($_POST['sp_speciality'])) {
$sp_speciality =  mysqli_escape_string($conn,$_POST['sp_speciality']);
if ($sp_speciality!='') {
$condition .= " AND sp_speciality like '%".htmlspecialchars($sp_speciality)."%'";
}
}


if (isset($_POST['sp_category'])  ) {
$sp_category = mysqli_escape_string($conn,$_POST['sp_category']);
if ($sp_category!='') {
 $condition .= " AND sp_category like '%".htmlspecialchars($sp_category)."%'";
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

echo "<table class='table-responsive' style=''><tbody>";

while ($data = mysqli_fetch_array($service_providers)) {

   $sp_id = $data['sp_id'];

   $sp_speciality = $data['sp_speciality'];

   $sp_ratings = $data['ratings']; 

   echo"<div id ='menu_sp' style='margin-bottom:10px' class='menu_sp'>";


    echo"<tr><td><img  id='menu_img' src=".$data['sp_img'].">";

if ($sp_ratings>0 && $sp_ratings<=10) {     
?>

<i class="fa fa-star" style="color: orange;"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i  class="fa fa-star"></i><br>
<?php }

elseif ($sp_ratings>11 && $sp_ratings<=30) {     
?>

<i class="fa fa-star" style="color: orange;"></i><i class="fa fa-star" style="color: orange;"></i><i class="fa fa-star""color: orange;"></i><i class="fa fa-star"></i><i  class="fa fa-star"></i><br>
<?php }

elseif ($sp_ratings>31 && $sp_ratings<=50) {     
?>

<i class="fa fa-star" style="color: orange;"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i  class="fa fa-star"></i><br>
<?php }


   echo"<td id=''>&nbsp;<b id='sp_name'>". $data['sp_name']."</b><br>";
   
   $sp_name = $data['sp_name'];

   echo"<span id='sp_speciality'>&nbsp;". $data['sp_speciality']."</span><br>";

   echo"&nbsp;<i class='fa fa-map-marker '></i> <span id='sp_speciality'>". $data['sp_location']."</span><br>";

   echo"&nbsp;<i class='fa fa-envelope '></i> <span id='sp_speciality'>". $data['sp_email']."</span><br></td>";


      echo"<td style='width:30%'><i class='fa fa-share-alt share'   id='https://estores.ng/sp_speciality.php?share ={$sp_name}' onclick='share()' target='_blank' rel='noopener noreferrer'></i><br></td>";


echo "<td>";

if ($data['sp_verified']==1) {
	
     echo "<b style='font-size:12px;width:100%;'>100% verified</b>
     
     <span><i class='fa fa-check'></i><span class='check'><b style='visibility:hidden'>1</b></span></span>
     
     
     <br>
     
     <br>";


}
  
   echo"<a id='sp_button' style='padding:10px;' href='sp_details.php?sp_id=$sp_id'>View</a>";

   echo"</td></tr>";

}

?>

</tbody></table>


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
