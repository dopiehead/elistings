
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

            <!-- Brands Grid -->
            <div class="brands-container">
                <div class="brands-grid">
                <?php
$brands = [
    ['icon' => 'P', 'name' => 'Product', 'category' => 'Category'],
    ['icon' => 'P', 'name' => 'Product', 'category' => 'Category'],
    ['icon' => 'P', 'name' => 'Product', 'category' => 'Category'],
    ['icon' => 'P', 'name' => 'Product', 'category' => 'Category'],
    ['icon' => 'P', 'name' => 'Product', 'category' => 'Category'],
    ['icon' => 'P', 'name' => 'Product', 'category' => 'Category'],
];

foreach ($brands as $brand): ?>
    <div class="brand-card">
        <div class="brand-icon"><?= htmlspecialchars($brand['icon']) ?></div>
        <div class="brand-name"><?= htmlspecialchars($brand['name']) ?></div>
        <div class="brand-category"><?= htmlspecialchars($brand['category']) ?></div>
    </div>
<?php endforeach; ?>
                </div>

                <!-- Scrolling Brands (Alternative Layout) -->
                <div class="brands-scroll d-none">
                    <div class="brands-track">
                        <!-- First set -->
                        <?php
$brands = [
    ['icon' => 'P', 'name' => 'Product', 'category' => 'Category'],
    ['icon' => 'P', 'name' => 'Product', 'category' => 'Category'],
    ['icon' => 'P', 'name' => 'Product', 'category' => 'Category'],
    ['icon' => 'P', 'name' => 'Product', 'category' => 'Category'],
    ['icon' => 'P', 'name' => 'Product', 'category' => 'Category'],
    ['icon' => 'P', 'name' => 'Product', 'category' => 'Category'],
];

foreach ($brands as $brand): ?>
    <div class="brand-card">
        <div class="brand-icon"><?= htmlspecialchars($brand['icon']) ?></div>
        <div class="brand-name"><?= htmlspecialchars($brand['name']) ?></div>
        <div class="brand-category"><?= htmlspecialchars($brand['category']) ?></div>
    </div>
<?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- market place -->
    <div class="marketplace-container">
        <div class="container">
            <div class="row">
                <!-- Categories Sidebar -->
                <div class="col-lg-3 col-md-4">
                    <div class="categories-sidebar">
                        <h3 class="categories-title">Categories</h3>                     
                        <!-- Search Category -->
                        <div class="search-category">
                            <input type="text"  id="searchCategory" class="search-input" placeholder="Search Category" class='border-secondary' style='border:1px solid transparent !important;box-shadow:0px 0px 3px rgba(0,0,0,0.4) !important;'>                   
                        </div>
                        <!-- Category List -->
                        <ul class="category-list text-capitalize">
                        <?php

require 'engine/configure.php';
$query_category = mysqli_query($conn,"SELECT product_category, COUNT(*) AS count FROM item_detail GROUP BY product_category");
while ($row = mysqli_fetch_array($query_category)) { ?>
<br> 
<div id='categories'><span><input type="checkbox" class="checkbox" id="<?php echo$row['product_category']?>" name="<?php echo$row['product_category']?>" value="<?php echo$row['product_category']?>">
<span id='words' style='font-size:0.9em;' class='fw-normal text-sm'><?= htmlspecialchars($row['product_category']) ?> </span>
<span class="d-none select_category" id="<?= htmlspecialchars($row['product_category'])?>" name="<?php echo$row['product_category']?>" style="float: right;">

<?php echo$row['count']?> 
</span></label></span></div>
<?php } ?>
                          
                        </ul>
                    </div>
                    <span id="show_product"></span>

   <script>
      $('#searchCategory').on("keyup",function() {
      var value = $(this).val().toLowerCase();
    $("#categories span").filter(function() {  
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

    }); 

    });
</script>
                </div>

                <!-- Main Content -->
                <div class="col-lg-9 col-md-8">
                    <div class="main-content">
                        <!-- Banner Section -->
                        <div class="banner-section">
                            <div class="banner-image">
                                <div class="banner-logo">Essential nigeria</div>
                            </div>
                            <a href="#" class="post-ad-btn">
                                <i class="fas fa-plus"></i>
                                Post An Advert Here
                            </a>
                        </div>

                        <!-- Products Section -->
                        <div class="products-section">
                            <h2 class="section-title">Trending Products</h2>

                            <div class="products-grid">
                                <!-- Product 1 -->
                                <?php require("engine/configure.php");
                            $getitems = $conn->prepare("SELECT * FROM item_detail WHERE sold = 0");
                            if($getitems->execute()){
                                $result = $getitems->get_result();
                                while($row = $result->fetch_assoc()){ ?>
                                

                                <div class="product-card">
                             
                                    <div class="product-image">
                                    <?php if($row['discount'] > 0) : ?>
                                    <span style='position:absolute;top:0;right:0;' class='bg-secondary px-2 py-1 text-sm text-white'><?= htmlspecialchars($row['discount'])."%"; ?></span>
                                    <?php endif ?>
                                       
                                        <a href='product-details.php?id=<?= urlencode($row['id']) ?>'><img src ="<?= htmlspecialchars($row['product_image']) ?>" ></a>
                                        
                                    </div>
                                    <div class="product-info">
                                        <div class="product-name"><?= htmlspecialchars($row['product_name']) ?></div>
                                        <div class='d-flex justify-content-between'>
                                              <?php 
                                                $price = $row['product_price'];
                                                $discount = $row['discount'];
                                               if($row['discount'] > 0) :
                                                $discounted_price = round($price - ($price * ($discount / 100)));
                                                ?>
                                                  <div class="product-price text-danger"><i class='fa fa-naira-sign'></i> <span class='text-decoration-line-through'><?= htmlspecialchars($row['product_price']) ?></span>  <?= htmlspecialchars($discounted_price) ?></div>
                                                 <?php else : ?>
                                              <div class="product-price text-danger"><i class='fa fa-naira-sign'></i> <?= htmlspecialchars($row['product_price']) ?></div>
                                                 <?php endif; ?>
                                             <div class="product-price fw-normal"> <?= htmlspecialchars($row['product_location']) ?></div>
                                        </div>
                                <div class="product-actions">
                                            <button id='https://elistings.ng/product-details.php?share =<?= htmlspecialchars($row['product_name']) ?>' onclick='share()' target='_blank' rel='noopener noreferrer' class="action-btn">
                                                <i class="fas fa-share"></i>
                                            </button>
                                            <span class='badge bg-success text-capitalize'><?php if($row['used']==2){echo"used";} elseif($row['used']==1){echo"new";} else{echo"new";} ?></span>
                                            <span class='badge bg-primary text-capitalize'><i class='fa fa-eye'></i><?= htmlspecialchars($row['views']) ?></span>
                                        </div>
                                        <div class="progress-bar">
                                            <div class="progress-fill" style="width: 70%"></div>
                                        </div>
                                    </div>
                                </div>

                                <?php   }
                            }
                             
                            ?>
        
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- group and group parts -->

    <div class="container container-custom mt-5">
        <!-- Section Header -->
        <div class="section-header d-flex justify-content-between align-items-center">
            <h2 class="section-title fs-2">Groups you may like</h2>
            <a href="#" class="see-more">See more</a>
        </div>
        
        <!-- Groups Grid -->
        <div class="row g-3 mb-4">
            <!-- IT news group -->
            <?php
$groups = [
    'IT news',
    'Tech group',
    'Group',
    'Essential staff',
    'Health group',
    'IT group'
];

foreach ($groups as $groupTitle): ?>
    <div class="col-md-2 col-6">
        <div class="group-card">
            <div class="group-image">
                <div class="people">
                    <div class="person"></div>
                    <div class="person"></div>
                    <div class="person"></div>
                </div>
            </div>
            <div class="group-title"><?= htmlspecialchars($groupTitle) ?></div>
            <div class="group-stats">
                <span>1 Member</span>
                <span>0 Posts today</span>
            </div>
            <button class="join-btn">Join</button>
        </div>
    </div>
<?php endforeach; ?>

        </div>
        <br><br>
        
        <!-- Notification Box -->
 <div class='container px-5 px-md-4 mt-4'> 

        <div class="notification-box">
            <br>
            <div class="d-flex align-items-center flex-md-row flex-column">
                <div><a href="#" class="click-here-btn">Click Here</a></div>
                <div class="notification-text">
                    <strong>Here are some reported culprits</strong><br>
                    consectetur. Ullamcorper<br>
                    bibendum diam sapien faucibus.<br>
                    Dolor in nibh malesuada ph.
                </div>
                <div class="notification-bubble"></div>
            </div>
            <br>
        </div>
    </div>
</div>

    <!-- footer -->
     <br><br>
    <?php include("components/footer.php") ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/index.js"></script>
</body>
</html>