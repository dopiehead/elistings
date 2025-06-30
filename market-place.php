<?php session_start();
require 'engine/configure.php';
require 'engine/get-dollar.php';
require 'engine/get-euro.php';
require 'engine/get-pound.php';
?>
<html lang="en">
<head>
    
 
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
     <link rel="stylesheet" href="assets/css/btn_scroll.css">
      <link rel="stylesheet" href="assets/css/overlay.css">
          <link rel="stylesheet" href="assets/css/market-place.css">
    
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.lazy.min.js"></script>
    <title>Market Place</title>
    <style>
      

/*--------------------------------------------------------------
# product list
--------------------------------------------------------------*/


#priceitem{
font-family:Poppins;
font-weight: bold;
color:black;
opacity: 0.8;
text-transform:capitalize;
font-size:14px;
padding:10px;
position: relative;
margin-bottom: 8px;
}


#conitem,#locitem,#catitem{
font-size:12px;
font-family:poppins;
color: rgba(0,0,0,0.9);
padding:10px;
width:100%;
font-weight: bold;
text-transform: capitalize;

}

#nameitem a{
  font-size:12px;
  font-weight:normal;
  padding-left:10px;
  text-transform:capitalize;
  color: rgba(0,0,0,0.4);
  padding-top: 8px;
  word-wrap:break-word;
 text-align:center;
  font-family:poppins;  
}

</style>
</head>
<body>
    
    
     <?php include 'nav.php';  ?>

     <?php include 'overlay.php';?>
     
     <br><br>
     
    
    
     <div class="main d-flex justify-content-center align-items-center">
         
         <div class="d-flex flex-row flex-column g-4">        
                      <h5 class="text-white fw-bolder">Welcome to E-stores</h5>
             
                     <h2 class="text-center fw-bold text-white">Market Place</h2>
         </div>



     </div>
     <br>
     
     <div class="d-flex menu justify-content-center my-4 text-secondary pb-2">
             
        <div class="d-flex flex-row flex-column g-5">   
             
             <div class="d-flex justify-content-space-between g-5">
                 
                  <button class="btn btn-link text-secondary text-decoration-none  b_location b_ladipo"  id="ladipo">Ladipo</button>
                  <button  class="btn btn-link text-secondary text-decoration-none b_location" id="orile">Orile</button>
                  <button  class="btn btn-link text-secondary text-decoration-none  b_location" id="alaba">Alaba</button>
                  <button  class="btn btn-link text-secondary text-decoration-none  b_location" id="ikeja">Ikeja</button>
                  <button  class="btn btn-link text-secondary text-decoration-none  b_location" id="balogun">Balogun</button>
                  <button class="btn btn-link text-secondary text-decoration-none b_location" id="mile 12">Mile 12</button>

          
    </div>
    
          <div>
        
        
      
        
        
           </div>
    </div>   
    
    
     </div>     
     
     
     

     
 <div class="ladipo-container ladipo-package">
          
          
             <div class="ladipo car_engine ">
                      <h6> <a class="text-white btn-ladipo btnLadipo" id="car engine">Car Engine</a></h6>
             </div >
             <div class="ladipo gear_boxes">
                         <h6><a class="text-white btnLadipo" id="gear boxes">Gear Boxes</a></h6>
             </div >
             <div  class="ladipo lamps">
                 
                           <h6><a class="text-white btnLadipo" id="lamps">Lamps</a></h6>
              </div >
             <div class="ladipo radiators">
                          <h6><a class="text-white btnLadipo"  id="radiators">Radiators</a></h6>
               </div >
             <div class="ladipo bumper">
                          <h6><a class="text-white btnLadipo" id="bumpers">Bumpers</a></h6>
               </div >
             <div  class="ladipo windscreens">
                            <h6><a class="text-white btnLadipo" id='windscreens'>Windscreens</a></h6>
              </div >
             <div  class="ladipo mirrors">
                               <h6><a class="text-white btnLadipo"  id='mirrors'>Mirrors</a></h6>
              </div >
             <div  class="ladipo compressors">
                             <h6><a class="text-white btnLadipo" id='compressors'>Compressors</a></h6>
             </div >
             <div class="ladipo brakes">
                        <h6><a class="text-white btnLadipo" id='brakes'>Brakes</a></h6>
              </div >
             <div class="ladipo tyres">
                        <h6><a class="text-white btnLadipo" id='tyres & Rims'>Tyres & Rims</a></h6>
             </div >
             <div class="ladipo clutches">
                        <h6><a class="text-white btnLadipo" id='clutches'>Clutches</a></h6>
             </div >
             <div  class="ladipo exhausts">
                         <h6><a class="text-white btnLadipo" id='exhausts'>Exhausts</h6>
             </div >
        
             <div class="ladipo horns">
                        <h6><a class="text-white btnLadipo" id='horns'>Horns</a></h6>
             </div>
             <div  class="ladipo batteries">
                         <h6><a class="text-white btnLadipo" id='batteries'>Batteries</a></h6>
              </div>
     

  </div>



<div class="orile-container orile-package">
    
          <div class='orile tiles'>
                  <h6><a class="text-white btnOrile" id='tiles'>tiles</a></h6>
           </div>
         <div class='orile pipes' >
               <h6><a class="text-white btnOrile" id='pipes'>pipes</a></h6>
          </div>
         <div class='orile iron_door'>   
                <h6><a class="text-white btnOrile" id='iron door'>iron door</a></h6>
         </div>
         <div class='orile roofing_sheets'>
                 <h6><a class="text-white btnOrile" id='roofing sheets'>Roofing sheets</a></h6>
          </div>
         <div class='orile toilet_seats'>
                     <h6><a class="text-white btnOrile" id='toilet_seats'>Toilet seats</a></h6>
         </div>
         <div class='orile kitchen_sinks'>
                         <h6><a class="text-white btnOrile" id='kitchen sinks'> kitchen Sinks</a></h6>
          </div>
         <div class='orile water_filter'>
                    <h6><a class="text-white btnOrile" id='water filter'>   water filter</a></h6>
          </div>
         <div class='orile wash_basin'>
                       <h6><a class="text-white btnOrile" id='water basin'>  Wash hand Basin</a></h6>
        </div>
</div>

     

   
   
   <div class="balogun-container  balogun-package">
    
          <div class='balogun female_clothes'>
                  <h6><a class="text-white btnBalogun" id='female clothes'>female clothes</a></h6>
           </div>
         <div class='balogun male_clothes' >
               <h6><a class="text-white btnBalogun" id='male clothes'>male clothes</a></h6>
          </div>
          
          <div class='balogun traditional_men' >
               <h6><a class="text-white btnBalogun" id='traditional men'>traditional men</a></h6>
          </div>
          
          
         <div class='balogun traditional_women' >
               <h6><a class="text-white btnBalogun" id='traditional women'>traditional women</a></h6>
          </div>
          
          
         <div class='balogun boys'>   
                <h6><a class="text-white btnBalogun" id='boys'>boys</a></h6>
         </div>
         <div class='balogun girls'>
                 <h6><a class="text-white btnBalogun" id='girls'>girls</a></h6>
          </div>
         <div class='balogun unisex'>
                     <h6><a class="text-white btnBalogun" id='unisex'>unisex</a></h6>
         </div>
    
    </div>
   
    

<div class="alaba-container  alaba-package">
    
          <div class=' alaba television'>
                  <h6><a class="text-white btnAlaba" id='television'>television</a></h6>
           </div>

         <div class=' alaba home_theater' >
               <h6><a class="text-white btnAlaba" id='home theater'>home theater</a></h6>
          </div>

         <div class=' alaba air_conditioner'>   
                <h6><a class="text-white btnAlaba" id=' air_conditioner'> air conditioner</a></h6>
         </div>

         <div class=' alaba refrigerator'>
                 <h6><a class="text-white btnAlaba" id=' refrigerator'>refrigerator</a></h6>
          </div>

         <div class=' alaba washing_machine'>
                     <h6><a class="text-white btnAlaba" id='washing machine'>washing machine</a></h6>
         </div>

         <div class=' alaba fan'>
                         <h6><a class="text-white btnAlaba"  id=' fan'>  fan</a></h6>
          </div>

         <div class=' alaba clipper'>
                    <h6><a class="text-white btnAlaba"  id='clipper'>   clipper</a></h6>
          </div>

         <div class=' alaba microwave'>
                       <h6><a class="text-white btnAlaba" id='microwave'>  microwave</a></h6>
        </div>

        <div class='alaba blender'>
                       <h6><a class="text-white btnAlaba"  id=' blender'>   blender</a></h6>
         </div>

        <div class='alaba pressing_iron'>
                       <h6><a class="text-white btnAlaba" id='pressing iron'>pressing iron</a></h6>
        </div>

    <div class='alaba electric_kettle'>
                       <h6><a class="text-white btnAlaba" id='electric kettle'>  electric kettle</a></h6>
        </div>

    <div class='alaba generator'>
                       <h6><a class="text-white btnAlaba" id='generator'>  generator</a></h6>
        </div>

       <div class='alaba solar_panel'>
                       <h6><a class="text-white btnAlaba" id=' solar panel'>   solar panel</a></h6>
        </div>

</div>
   

   
      <div class="ikeja-container  ikeja-package">
    
          <div class='ikeja tablets '>
                  <h6><a class="text-white btnIkeja" id='tablets & laptop'>tablets & laptop</a></h6>
           </div>
    
          <div class='ikeja mobile_phones '>
                  <h6><a class="text-white btnIkeja" id='mobile phones'>mobile phones</a></h6>
           </div>    

          <div class='ikeja printers '>
                  <h6><a class="text-white btnIkeja"  id='printers & scanners'> printers & scanners</a></h6>
           </div>  
  
          <div class='ikeja accessories'>
                  <h6><a class="text-white btnIkeja" id='accessories'>accessories</a></h6>
           </div>    

          <div class='ikeja storage '>
                  <h6><a class="text-white btnIkeja" id= 'storage device'> storage device</a></h6>
           </div>    

          <div class='ikeja networking '>
                  <h6><a class="text-white btnIkeja" id='computing & networking'>computing & networking</a></h6>
           </div>
    
    </div>


   
      <div class="mile12-container  mile12-package">
    
          <div class='mile12 abatoir'>
                  <h6><a class="text-white btnMile12" id='abatoir'>abatoir</a></h6>
           </div>
    
          <div class='mile12  soup'>
                  <h6><a class="text-white  btnMile12" id='soup'>soup</a></h6>
           </div>    

          <div class='mile12  fruits'>
                  <h6><a class="text-white btnMile12"  id='fruits'> fruits</a></h6>
           </div>  
  
          <div class='mile12  grains'>
                  <h6><a class="text-white btnMile12" id='grains & swallows'>grains & swallows</a></h6>
           </div>    

          <div class='mile12  meat'>
                  <h6><a class="text-white btnMile12" id= 'meat'> meat</a></h6>
           </div>    

          <div class='mile12  oil'>
                  <h6><a class="text-white btnMile12" id='oil'>oil</a></h6>
           </div>


          <div class='mile12  peppersoup'>
                  <h6><a class="text-white btnMile12" id='peppersoup'>peppersoup</a></h6>
           </div>


          <div class='mile12  poultry'>
                  <h6><a class="text-white btnMile12" id='poultry'>poultry</a></h6>
           </div>
    

           <div class='mile12  seafood'>
              <h6><a class="text-white btnMile12" id='seafood'>seafood</a></h6>
           </div>
    </div>
    
   
     </div>
     
     
      <div class='container'>
          
      </div>


     <br><br>
  
     <?php include "footer.php"; ?>

<script>
   $(document).ready(function() {
     // Create a map of location IDs to package classes
     const packageMap = {
       'ladipo': '.ladipo-package',
       'balogun': '.balogun-package',
       'ikeja': '.ikeja-package',
       'mile 12': '.mile12-package',
       'orile': '.orile-package',
       'alaba': '.alaba-package'
     };

     $('.b_location').click(function() {
       var location = $(this).attr('id'); // Get the ID of the clicked button

       // Hide all packages first
       $(".ladipo-package, .balogun-package, .ikeja-package, .mile12-package, .orile-package, .alaba-package")
         .slideUp().css("display", "none");

       // Show the selected package if it exists in the map
       if (packageMap[location]) {
         $(packageMap[location]).css("display", "flex").slideDown();
       }
     });
   });
</script>

  
 <script>
  
    $(".btnLadipo, .btnAlaba, .btnOrile, .btnBalogun, .btnIkeja, .btnMile12").click(function(){
        let area = $(this).attr("id"); // Get the ID of the clicked button
       //  $("#q").val(area).trigger('keyup');
       window.location.href = 'shop.php?q=' + area; // Set the value of #q and trigger the keyup event
    });
</script>

  
  
<script>

$(document).ready(function() {
$(".b_ladipo").trigger('click');
});
</script>
</body>
</html>