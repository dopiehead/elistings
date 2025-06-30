<?php session_start();  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Service</title>
</head>
<body>
<title>E-stores | Vendor services </title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>
<style type="text/css">
	
body{

	font-family: poppins;
}


#think{
margin-left: 210px !important;

}

@media only screen and (max-width:497px){
#think{
margin-left: 110px !important;

}
}






table{

	width: 100%;

	border-collapse: collapse;
}


table thead th{

	opacity: 0.3;

	font-size: 1rem;
}

table thead{

	border:1px solid rgba(0,0,0,0.2);

	border-radius:10px;

	padding: 3px;
}

table tbody tr td{

	font-size: 1rem;
}


.electrician, .mechanics, .mk_artist{

	border:1px solid transparent transparent;

	box-shadow: 0px 0px 5px rgba(0,0,0,0.4);


	padding:20px;

	border-radius: 10px;


}


.electrician h6, .mechanics h6, .mk_artist h6{

text-align: center;	

	
}


.nav_signup{


border:1px solid none;
border-left:1px solid white;
border-left-color: rgba(192,192,192,1);
margin-left:0px;



}

.nav_login{



margin-left:50px;

}




#coca_cola img{

	
width:100%;


}


.discount_main{

	padding-top: 10px;

	margin-top: 15px;

	width: 100%;

	height: 50px;

	background-color: rgba(192,192,192,0.4);


	border:1px solid transparent;

	box-shadow: 0px 0px 5px rgba(0,0,0,0.3);

	text-align: center;

	text-transform: capitalize;
}


.discount_main p{ 
font-size: 13px;
}


h6{

	text-transform: capitalize;
}


/*--------------------------------------------------------------
# navigation bar mobile
--------------------------------------------------------------*/

@media only screen and (max-width:1200px){

.button_navigation{


font-size:12px;

cursor: pointer;

color:black;

padding:5px 0px;

margin-right:10px !important;

font-weight: bold;

}


}


/*--------------------------------------------------------------
# navigation bar 
--------------------------------------------------------------*/


.button_navigation{

font-family:poppins;

float:left;

font-size:13px;

cursor: pointer;

color:black;

padding:8px 1px;

margin-right:32px;

font-weight: bold;

}



.button_navigation:hover{

opacity: 0.8;

text-decoration: none;

color: white;

}

@media only screen and (max-width:767px){

#main  .flickity-page-dots .dot{

  width:20px;
  height: 4px;
  margin: 0;
  border-radius: 0;
  
}

}






/*--------------------------------------------------------------
# navigation bar img
--------------------------------------------------------------*/


.button_navigation img{

width: 20px;
height: 18px;

}


/*--------------------------------------------------------------
# navigation search bar
--------------------------------------------------------------*/


#input_search{

font-size: 12px;

border:1px solid transparent;
font-weight: normal;

background-color: rgba(192,192,192,0.5);
border-radius: 12px;

width: 390px;


}


input[type=text]{


border:1px solid transparent;



box-shadow: 0px 3px 8px rgba(0,0,0,0.3);

border-radius: 10px;

margin:8px;

	}



input[type=text]::placeholder{

text-align: center;
	}









/*--------------------------------------------------------------
# navigation search bar button
--------------------------------------------------------------*/


#btn-search{

	font-size: 10px;
	border-radius:0px 13px 13px 0px;
	margin-left: -80px;
	padding: 7px 8px;
	position: relative;
z-index: 9;
color: white !important;
}





.category{

	margin-top: 15px;

	margin:10px;

	margin-right: 10px;

	font-size: 12px;

	border:1px solid rgba(0,0,0,0.2);

	padding: 2px 10px;

	border-radius: 15px;

	text-transform: capitalize;

	color: black;

	text-decoration: none;


}


@media only screen and (max-width:480px){


.category{



	margin-right:5px;

	font-size: 12px;

	border:1px solid rgba(0,0,0,0.2);

	padding: 2px 10px;

	border-radius: 15px;

	text-transform: capitalize;

	color: black;

	text-decoration: none;


}





}





.category:hover{

	
background-color: skyblue;

color:white;

text-decoration: none;

transition: 0.3s ease-in-out;

}


.category nth-child(3){

	background-color: rgba(192,192,192,0.4);
}



/*--------------------------------------------------------------
# footer
--------------------------------------------------------------*/

.footer h6{

  font-weight: bold;

  font-size: 16px;

  margin-bottom: 10px;
}


.footer p{

  font-size: 13px;
}


.footer{
  padding: 10px 20px;

  background-color: rgba(192,192,192,0.5);
}


.footer img{

width: 140px;

}

.footer button{

  font-size: 13px;

  border:1px solid transparent;

  background-color: rgba(0,0,0,0.6);

  color: white;

  margin-bottom: 8px;


}

.footer{

	margin-top: 30px;
}






@media only screen and (max-width:1200px){

.button_navigation{

display: none;

}


.open-btn{display: block !important;font-size: 16px; margin-top: -6px;color: black;}


}






</style>

<!-------------------------------Header--------------------------------------------------------------------------->

<?php include 'nav.php'; ?>

<br><br><br><br>

<div class="container">


<div class="row">

<div id="coca_cola" class="col-md-6">

	<img src="assets/img/coca_cola.png">

</div>


<div id="coca_cola" class="col-md-6">

	<img src="assets/img/coca_cola.png">


</div>

</div>

<br><br>



<input type="text" class="form-control" id="myInput" onkeyup="myFunction()" name="search_service" placeholder="    &#xF002; Search service  " style="font-family: arial,fontawesome">

<br><br>

<h6><b>Notice:</b></h6>

<p>Note that before a service provider is sent to you, you must pay for the call out charge
of that service provider. </p><hr>



<div class="electrician">

	<h6><b>Electrician</b></h6><br>

<table class="table-hoverable">

<thead>
	
	<tr>
		
       <th>Description</th>

        <th>Call out charge</th>

         <th>Labor Charge</th>



	</tr>

</thead>

<tbody id='myTable'>

	<tr>

       <td><li>Fixing of wires</li></td>

        <td>#3,000</td>

         <td>#6,000 - 8,000</td>

    </tr>


	<tr>
		
       <td><li>Lorem ipsum dolor sit amet
consectetur. </li></td>

        <td>#3,000</td>

         <td>#6,000 - 8,000</td>

    </tr>

    	<tr>
		
       <td><li>Lorem ipsum dolor sit amet
consectetur. </li></td>

        <td>#3,000</td>

         <td>#6,000 - 8,000</td>

    </tr>

    	<tr>
		
       <td><li>Lorem ipsum dolor sit amet
consectetur. </li></td>

        <td>#3,000</td>

         <td>#6,000 - 8,000</td>

    </tr>

    	<tr>
		
       <td><li>Lorem ipsum dolor sit amet
consectetur. </li></td>

        <td>#3,000</td>

         <td>#6,000 - 8,000</td>

    </tr>

    	<tr>
		
       <td><li>Lorem ipsum dolor sit amet
consectetur. </li></td>

        <td>#3,000</td>

         <td>#6,000 - 8,000</td>

    </tr>

    	<tr>
		
       <td><li>Lorem ipsum dolor sit amet
consectetur. </li></td>

        <td>#3,000</td>

         <td>#6,000 - 8,000</td>

    </tr>

</tbody>

</table>

</div>





<br><br>










</div>





























<!-------------------------------Footer--------------------------------------------------------------------------->

<?php include 'footer.php'; ?>




<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>







</body>
</html>