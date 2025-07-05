
<?php  session_start();
 require 'engine/configure.php';  
if(isset($_POST["submit"]))   {  
if(!empty($_POST["search"]) && !empty($_POST["search_type"]))   {  
$query = str_replace(" ", "+", mysqli_real_escape_string($conn,$_POST["search"]));
if($search_type=='product'){
  header("location:products.php?search=" .htmlspecialchars($query)); 
}
else{
   header("location:service-providers.php?search=" .htmlspecialchars($query));   
}
 }  

 }  

 ?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Header</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/hero-section.css">
    <link rel="stylesheet" href="assets/css/brands.css">
    <link rel="stylesheet" href="assets/css/marketplace.css">
    <link rel="stylesheet" href="assets/css/groups.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
     <script src="assets/js/sweetalert.min.js"></script> 
     <script src="assets/js/index.js"></script> 
     <script type="text/javascript" src="assets/js/jquery.lazy.min.js"></script>
     <link rel="stylesheet" href="https://unpkg.com/flickity@2.3.0/dist/flickity.min.css">
     <link rel="stylesheet" href="https://unpkg.com/flickity-fade@1.0.0/flickity-fade.css">
     <script src="https://unpkg.com/flickity@2.3.0/dist/flickity.pkgd.min.js"></script>
     <script src="https://unpkg.com/flickity-fade@1.0.0/flickity-fade.js"></script>
    <!-- <link rel="stylesheet" href="assets/css/index.css"> -->
<style>
    body{
        font-family:"poppins",sans-serif;
    }
</style>
</head>
<body>
    <!-- Header -->
   <?php include("components/header.php"); ?>

    <!-- Search Hero Section -->
    <section class="search-hero">
        <div class="container">
            <div class="search-container">
                <!-- Search Header -->
                <div class="search-header">
                    <h1 class="search-title">
                        Find Anything In
                        <a href="#" class="location-selector bg-primary">
                            Nigeria
                            <i class="fas fa-chevron-down"></i>
                        </a>
                    </h1>
                </div>

                <!-- Search Form -->
                <form method="post" action="" class="search-form d-flex align-items-center">
                    <div class="search-input-wrapper">
                        <input 
                            name="search"
                            type="text" 
                            class="search-input" 
                            placeholder="I'm Looking For..."
                            aria-label="Search for products or services"
                        >
                    </div>

                     <div class='d-flex justify-content-end gap-1 align-items-center'>
                          <div>
                              <select name="search_type" id="search_type" class='border-0 text-secondary'>
                                 <option value="service_provider">Service provider</option>
                                 <option value="product">Products</option>        
                             </select>
                          </div>
                           <button name="submit" type="submit" class="search-btn bg-primary">
                             <i class="fas fa-search"></i>
                                 <span class="d-none d-sm-inline">Search</span>
                             </button>

                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Brand Showcase Section -->
    <section class="brand-showcase">
        <div class="container">
            <!-- Section Header -->
            <div class="section-header">
                <h2 class="section-title">
                    The world is going <span class="highlight">e</span> so are we
                </h2>
                <p class="section-subtitle text-secondary">
                    List of essential Group Brands
                </p>
            </div>

            <div id='brands'>       
                  <?php
                     for ($i=0; $i < 20 ; $i++) { ?>
                       <div style='width:200px;' class='text-center shadow p-0 me-4'>
                         <img style='height:200px;width:100%' src="https://placehold.co/400" alt="brands">
                         <h6 class='fw-bold mt-2'>Brands</h6>
                       </div> 
                    <?php }
                  ?>

            </div>


       
             


            <!-- Brands Grid -->
         
    </div>
</div>






    <!-- footer -->
     <br><br>
    <?php include("components/footer.php") ?>
    <script>
        $('#brands').flickity({
          cellAlign: 'left',
          contain: true,
          autoPlay:true,
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/index.js"></script>
</body>
</html>