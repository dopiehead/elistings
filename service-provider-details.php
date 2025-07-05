<?php session_start();
$id = isset($_GET['id']) && !empty($_GET['id']) ? $_GET['id'] : null;
$user_id = isset($_SESSION['business_id']) ? $_SESSION['business_id'] : "";
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : " ";
$userEmail = $_SESSION['email'] ?? $_SESSION['sp_email'] ?? '';
$userName = $_SESSION['name'] ?? $_SESSION['sp_name'] ?? '';

?>

<html lang="en">
<head>
    <?php include("components/links.php") ?>
    <title> Service provider Details page</title>
    <link rel="stylesheet" href="assets/css/overlay.css">
    <link rel="stylesheet" href="assets/css/service-provider-details.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body class='bg-white'>

     <?php include("components/header.php") ?>

    <div class='px-3 mt-3'>

        <div class='product_category'>

             <div class='spinner' role="loading">

                <span class='spinner-border text-secondary fs-5'></span>

             </div>

        </div>

    </div>


    <div class="more px-3"  data-aos='zoom-in'>

         <div class='more_pictures'>

         </div>

     </div>


<div class='px-2 mt-5 px-3'  data-aos='fade-up'>

      <h5 class='fw-bold'>Our Services</h5>

      <hr>

      <div class="services">

      </div>

</div>

<div class='d-flex justify-content-between align-items-center px-3 py-2 shadow bg-light history_btn'>

     <h6 class='fw-bold'>Work History </h6>
     <span class='fa fa-caret-down'></span>

</div>


<div id="demo" class="d-none px-3">

    <div class='work_Experience'>

    </div>

</div>

     <!-- working hours -->

    <div class="d-flex working-container px-3 mt-5 flex-md-row flex-column"  data-aos='fade-in'>
          
          <div class='working_hrs col-md-6  w-100 px-3'>

         <?php
             $days = [
                ["weekday" => "Monday", "time" => "10:00 - 15:00"],
                ["weekday" => "Tuesday", "time" => "10:00 - 15:00"],
                ["weekday" => "Wednesday", "time" => "10:00 - 15:00"],
                ["weekday" => "Thursday", "time" => "10:00 - 15:00"],
                ["weekday" => "Friday", "time" => "10:00 - 15:00"],
                ["weekday" => "Saturday", "time" => "10:00 - 15:00"]
            ];
         ?>
           <?php foreach ($days as $day) { ?>
            <div class='d-flex justify-content-between'>
              <span><?= htmlspecialchars($day['weekday']) ?></span>
              <span><?= htmlspecialchars($day['time']) ?></span>
            </div>
          <?php   } ?>        
        </div>


        <div class='location_html col-md-6'>     
             

        </div>

    </div>

     <!-- Reviews -->
     
     <div class="px-3 mt-4" data-aos="fade-up">
      
         <h5 class='fw-bold'>Reviews</h5>
       
         <div class='reviews'>


         </div>

     </div>

     
<?php
$user_id = $_SESSION['id'] ?? null; // make sure it's defined
$user_id = $_SESSION['business_id'] ?? null; 
$current_page = urlencode($_SERVER['REQUEST_URI']); // capture current URI
?>

<div class="px-3 my-5">
  <div class='d-flex justify-content-between flex-wrap gap-2'>

    <?php if (!empty(trim($user_id))) : ?>
      <button class='btn btn-warning text-white px-3 py-2 toggle-abuse' data-aos="fade-right">
        Report Abuse
      </button>
      <button class='btn text-primary border border-2 border-primary px-3 py-2 toggle-comment' data-aos='fade-left'>
        Post Comment
      </button>
    <?php else : ?>
      <a class='btn btn-warning text-white px-3 py-2' href="login.php?details=<?= $current_page ?>" data-aos="fade-right">
        Report Abuse
      </a>
      <a class='btn text-primary border border-2 border-primary px-3 py-2' href="login.php?details=<?= $current_page ?>" data-aos='fade-left'>
        Post Comment
      </a>
    <?php endif; ?>

  </div>
</div>



     <div class='banner-container container mb-4' data-aos='fade-up'>

        <h6 class='text-white fw-bold fs-3'>See stores</h6>

        <p class='text-white mt-2 text-sm'>Buy your building materials from stores around you!</p>

        <a href='https://estores.ng/market-place.php' class='btn border-0 bg-white text-primary fs-5 fw-bold px-3 py-2 shadow-sm mt-2'>See stores</a>

     </div>

     <hr>

     <br>


     <h5 class=" px-3 mt-4 mb-3">Other Service Providers Near You</h5>

     <div class='other_sp px-3 mt-2'>

   <?php
     $services = [
  ["title" => "Panel Beater", "img" => "Rectangle1.png", "slug" => "panel beater"],
  ["title" => "Electrician", "img" => "Rectangle2.png", "slug" => "electrician"],
  ["title" => "Vulcanizer", "img" => "Rectangle3.png", "slug" => "vulcanizer"],
  ["title" => "Plumber", "img" => "Rectangle4.png", "slug" => "plumber"],
  ["title" => "Mechanic", "img" => "Rectangle2.png", "slug" => "mechanic"],
  ["title" => "Web Developer", "img" => "Rectangle4.png", "slug" => "web developer"]
];

foreach ($services as $service) { ?>
    
    <div class="sp_package">
        <a href='service-providers.php?work=<?= htmlspecialchars($service['slug']) ?>'> <img src="https://efixit.ng/assets/img/<?= htmlspecialchars($service['img']) ?>" alt="<?= htmlspecialchars($service['title']) ?>"></a>
        <h6 class='fw-bold'><?= htmlspecialchars($service['title']) ?></h6>
        <div class='d-flex flex-column flex-row'>
          <span>
              <b>100%</b> 
              <span class='text-sm'>verified</span>
          </span>
          <span class='verified'>
            <i class='fa fa-check'></i>
            <span class='check'>
                <span style='visibility:hidden;'>1</span>
            </span>
          </span>
       </div>
    </div>
    
<?php } ?>

</div>


<div class='popup-modals'>

</div>


<br><br>

<?php include("footer.php")?>
<input type="hidden" id='id' value="<?= htmlspecialchars($id) ?>">
<input type="hidden" id='user_id' value="<?= htmlspecialchars($user_id) ?>">
<input type="hidden" id='userEmail' value="<?= htmlspecialchars($userName) ?>">
<input type="hidden" id='userName' value="<?= htmlspecialchars($userEmail) ?>">
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="assets/js/service-provider-details.js"></script>

</body>
</html>