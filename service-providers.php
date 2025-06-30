<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
 session_start();
 require 'engine/configure.php'; 
 $search = isset($_GET['search']) && !empty($_GET['search']) ? $conn->real_escape_string($_GET['search']) : "";
 ?>  

<!DOCTYPE html>
<html>
<head>
	<title>E-listing</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
         <link rel="stylesheet" href="assets/css/btn_scroll.css">
                    <link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
    <link rel="stylesheet" href="assets/css/overlay.css">
    <link rel="stylesheet" href="assets/css/cart.css">
    <link rel="stylesheet" href="assets/css/service-providers.css">
             <link rel="stylesheet" href="mobile-view.css">
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>
<style>
  body{
    font-family:poppins !important;
  }
</style>
</head>
<body class='bg-white'>
<!------------------------------------------Header--------------------------------------------------->
<?php include 'components/header.php';  ?>
 <div class="back-button-container px-3 mt-2">
        <a onclick='history.go(-1)' class="back-button"><i class='fa fa-chevron-left'></i></a>
  </div>

<br><br>
 <div class='d-flex'>

     <div class='col-md-4 border-right border-2 border-mute'>

        <h4 class='fw-bold mb-2 '>Filters</h4>

 <input type="text" name="q" id="q" class="form-control mt-5" placeholder="Search for anything">
         
<h6 class='mt-4 fw-bold text-secondary' >By preference</h6>

<select name='category' id='category' class="form-select form-control">
                    <option value=''>Select Category</option>                 
                    <option value="information technology">Information technology</option>
                    <option value="mechanic">Mechanic</option>
                     <option value="vulganizer">Vulganizer</option>
                     <option value="teaching">Teaching</option>
                     <option value="plumbing services">Plumbing services</option>
                     <option value="electrical/inverter services">Electrical / Inverter services</option>
                     <option value="cleaning/laundy/fumigation">Cleaning / Laundry / Fumigation</option>
                     <option value="carpentry services">Carpentry Services</option>
                    <option value="appliances electronics">Appliances Electronics</option>
                    <option value="Ac/refrigeration services">AC /Refrigeration Services</option>

</select>


<h6 class='mt-4 fw-bold text-secondary'>By Services</h6>

<span class='bg-light text-secondary border-0 mt-2 py-2 speciality'>
                    
            
</span>

   <h6 class='mt-4 fw-bold text-secondary'>By Experience</h6>

   <select class=' text-secondary mt-2 py-2 form-control' name="experience" id="experience">
                    
                    <option value=''>Select Experience</option>
                    <option value='1-5'>1 - 5(Years)</option>
                    <option value='6-20'>6 - 20(Years)</option>
                    <option value='20-30'>20 - 30(years)</option>
                    
                   
    </select>       




<h6 class='mt-4 fw-bold text-secondary'>By State</h6>

   <select name='location' id="location" class='form-control'>
       
       <option value="">---Select state---</option>

<?php
require("engine/connection.php");
$getstate = $con->prepare("SELECT DISTINCT state FROM states_in_nigeria ORDER BY state ASC");
if ($getstate->execute()) {
  $result_state = $getstate->get_result();
  while ($data_state = $result_state->fetch_assoc()) { ?>
      <option value="<?= htmlspecialchars($data_state['state']) ?>"><?= htmlspecialchars($data_state['state']) ?></option>
  <?php }
}
?>
</select>

<div class='d-flex justify-content-between flex-wrap gap-3 mt-4 mb-2 py-4 px-3 pricing-container bg-danger'>
    
    <div class='from-container'>
       <label class='fw-bold text-secondary'>From:</label>
      <input type='number' min="0" inputmode="numeric" name="minprice" id="minprice" placeholder="Minimum Price" class='rounded form-control'>
   </div>
   
   <div class='to-container text-secondary'>
       <label class='fw-bold'>To:</label>
      <input type='number' min="0" inputmode="numeric" name="maxprice" id="maxprice" placeholder="Maximum price" class='rounded form-control'>
   </div>
   
</div>

     </div>

     <div class='col-md-8'>
        <div>
           <span style='display:none' class='spinner-border text-warning'></span>
         </div>
         <div class='d-flex justify-content-between align-items-center'>
            <h4 class='fw-bold'>Service Providers</h4>
            <select name="sort" id="sort" class='border-2 border-mute bg-light py-2'>
                <option value="">All</option>
                <option value="newest">Newest First</option>
                <option value="oldest">Oldest First</option>
            </select>
         </div>
        <div class='product-category mt-4'>

        </div>

        <div class="pagination-container mt-3"></div>

     </div>

 </div>

 <div class='mt-5'></div>

<?php include ('footer.php') ?>

<!------------------------------------------btn-scroll--------------------------------------------------->

<a class="btn-down" onclick="topFunction()">&#8593;</a>
<?php if (!empty($search)) { ?>
<script>
$(document).ready(function() {
    const search = "<?= htmlspecialchars($search, ENT_QUOTES, 'UTF-8') ?>";
    $("#q").val(search);
    setTimeout(() => {
        $("#q").trigger("q");
    }, 300);
});
</script>
<?php } ?>

<script>
$(document).ready(function() {
    let currentPage = 1;
    let totalPages = 1;
    
    // Attach listeners with debouncing for search
    let searchTimeout;
    $("#q").on("keyup input", function(e) {
        clearTimeout(searchTimeout);
        let x = $(this).val().trim();
        
        // Reset to page 1 when searching
        currentPage = 1;
        
        // Debounce the search to avoid too many API calls
        searchTimeout = setTimeout(function() {
            getData(x);
        }, 300);
    });
    
    $("#category").on("change", function(e) {
        e.preventDefault();
        currentPage = 1; // Reset to page 1
        let x = $("#q").val() || '';
        let category = $("#category").val() || '';
        getData(x, category); 
    });
     
    $("#speciality").on("change", function(e) {
        e.preventDefault();
        currentPage = 1; // Reset to page 1
        let x = $("#q").val() || '';
        let category = $("#category").val() || '';
        let speciality = $("#speciality").val() || '';
        getData(x, category, speciality); 
    });
     
    $("#location").on("change", function(e) {
        e.preventDefault();
        currentPage = 1; // Reset to page 1
        let x = $("#q").val() || '';
        let category = $("#category").val() || '';
        let speciality = $("#speciality").val() || '';
        let location = $("#location").val() || '';
        getData(x, category, speciality, location); 
    });
     
    $("#experience").on("change", function(e) {
        e.preventDefault();
        currentPage = 1; // Reset to page 1
        let x = $("#q").val() || '';
        let category = $("#category").val() || '';
        let speciality = $("#speciality").val() || '';
        let location = $("#location").val() || '';
        let experience = $("#experience").val() || '';
        getData(x, category, speciality, location, experience); 
    });
    
    
      $("#minprice").on("keyup", function(e) {
        e.preventDefault();
        currentPage = 1; // Reset to page 1
        let x = $("#q").val() || '';
        let category = $("#category").val() || '';
        let speciality = $("#speciality").val() || '';
        let location = $("#location").val() || '';
        let experience = $("#experience").val() || '';
        let minprice = $("#minprice").val() || '';
        getData(x, category, speciality, location, experience, minprice); 
    });
    
          $("#maxprice").on("keyup", function(e) {
        e.preventDefault();
        currentPage = 1; // Reset to page 1
        let x = $("#q").val() || '';
        let category = $("#category").val() || '';
        let speciality = $("#speciality").val() || '';
        let location = $("#location").val() || '';
        let experience = $("#experience").val() || '';
        let minprice = $("#minprice").val() || '';
        let maxprice = $("#maxprice").val() || '';
        getData(x, category, speciality, location, gender, minprice, maxprice); 
    });
      
     
    $("#sort").on("change", function(event) {
        event.preventDefault();
        currentPage = 1; // Reset to page 1
        let x = $("#q").val() || '';
        let category = $("#category").val() || '';
        let speciality = $("#speciality").val() || '';
        let location = $("#location").val() || '';
        let experience = $("#experience").val() || '';
        let sort = $("#sort").val() || '';
        let minprice = $("#minprice").val() || '';
        let maxprice = $("#maxprice").val() || '';
        getData(x, category, speciality, location, experience, minprice, maxprice, sort); 
    });

    function getData(x, category, speciality, location, experience, minprice, maxprice, sort, page = null) {
        // Use provided page or current page
        let requestPage = page || currentPage;
        
        // Add loading indicator
        $(".product-category").html("<p>Searching...</p>");
        
        $.ajax({
            type: "GET",
            url: "https://efixit.ng/api/search.php",
            data: { 
                q: x || '', 
                category: category || '', 
                speciality: speciality || '', 
                location: location || '', 
                experience: experience || '',
                minprice: minprice || '', 
                maxprice: maxprice || '', 
                sort: sort || '',
                page: requestPage
            },
            dataType: "json",
            timeout: 10000, // 10 second timeout
            success: function(response) {
                console.log("API Response:", response);

                // Handle different response structures
                let products = [];
                if (response && Array.isArray(response.products)) {
                    products = response.products;
                } else if (response && Array.isArray(response)) {
                    products = response;
                } else {
                    console.error("Unexpected response structure:", response);
                    $(".product-category").html("<p>No results found.</p>");
                    return;
                }

                if (products.length === 0) {
                    $(".product-category").html("<p>No results found.</p>");
                    $(".pagination-container").html(""); // Clear pagination
                    return;
                }

                // Update pagination info from response
                if (response.total_count !== undefined) {
                    totalPages = response.total_pages || Math.ceil(response.total_count / 6);
                } else {
                    // Fallback: assume more pages if we got full results
                    totalPages = products.length === 6 ? currentPage + 1 : currentPage;
                }
                currentPage = requestPage;

                let category_html = `<div class='d-flex justify-content-center justify-content-md-between  product_category  flex-md-row flex-column flex-wrap'>`;

                products.forEach(product => {
                    let product_provider = product.service_provider || "N/A";
                    let product_id = product.id || "N/A";
                    let product_name = product.product_name || "N/A";
                    let product_category = product.product_category || "N/A";
        
                    let product_location = product.product_location || "N/A";
                    let product_image = product.product_image
                        ? `https://efixit.ng/${product.product_image}`
                        : "https://placehold.co/150x100/png?text=No+Image";

                    category_html += `
                        <div class='d-flex flex-column text-center p-2 border rounded img_container mb-2'>
                            <a href='${product_provider}'>
                                <img class='product_image mb-2' src="${product_image}" alt="${product_name}" style="object-fit: cover; border-radius: 6px;">
                            </a>
                            <span class='fw-bold text-capitalize'>${product_name}</span>
                            <small>${product_category}</small>
                            <small>${product_location}</small>
                        </div>`;
                });

                category_html += `</div>`;
                $(".product-category").html(category_html);
                
                // Debug pagination info
                console.log("Pagination Info:", {
                    currentPage: currentPage,
                    totalPages: totalPages,
                    totalCount: response.total_count,
                    productsLength: products.length
                });
                
                // Generate pagination
                generatePagination();
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", { xhr: xhr, status: status, error: error });
                let errorMsg = "Failed to load results.";
                if (status === "timeout") {
                    errorMsg = "Search timed out. Please try again.";
                } else if (xhr.status === 0) {
                    errorMsg = "Network error. Please check your connection.";
                }
                $(".product-category").html(`<p class='text-danger'>${errorMsg}</p>`);
                $(".pagination-container").html(""); // Clear pagination on error
            }
        });
    }
    
    function generatePagination() {
        console.log("Generating pagination - Current:", currentPage, "Total:", totalPages);
        
        if (totalPages <= 1) {
            $(".pagination-container").html("");
            return;
        }
        
        // Ensure pagination container exists, if not create it
        if ($(".pagination-container").length === 0) {
            $(".product-category").after('<div class="pagination-container mt-3"></div>');
        }
        
        let paginationHtml = `<nav aria-label="Search results pagination">
            <ul class="pagination justify-content-center">`;
        
        // Previous button
        if (currentPage > 1) {
            paginationHtml += `<li class="page-item">
                <a class="page-link" href="#" data-page="${currentPage - 1}">Previous</a>
            </li>`;
        } else {
            paginationHtml += `<li class="page-item disabled">
                <span class="page-link">Previous</span>
            </li>`;
        }
        
        // Page numbers
        let startPage = Math.max(1, currentPage - 2);
        let endPage = Math.min(totalPages, currentPage + 2);
        
        if (startPage > 1) {
            paginationHtml += `<li class="page-item">
                <a class="page-link" href="#" data-page="1">1</a>
            </li>`;
            if (startPage > 2) {
                paginationHtml += `<li class="page-item disabled">
                    <span class="page-link">...</span>
                </li>`;
            }
        }
        
        for (let i = startPage; i <= endPage; i++) {
            if (i === currentPage) {
                paginationHtml += `<li class="page-item active">
                    <span class="page-link">${i}</span>
                </li>`;
            } else {
                paginationHtml += `<li class="page-item">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>`;
            }
        }
        
        if (endPage < totalPages) {
            if (endPage < totalPages - 1) {
                paginationHtml += `<li class="page-item disabled">
                    <span class="page-link">...</span>
                </li>`;
            }
            paginationHtml += `<li class="page-item">
                <a class="page-link" href="#" data-page="${totalPages}">${totalPages}</a>
            </li>`;
        }
        
        // Next button
        if (currentPage < totalPages) {
            paginationHtml += `<li class="page-item">
                <a class="page-link" href="#" data-page="${currentPage + 1}">Next</a>
            </li>`;
        } else {
            paginationHtml += `<li class="page-item disabled">
                <span class="page-link">Next</span>
            </li>`;
        }
        
        paginationHtml += `</ul></nav>`;
        
        $(".pagination-container").html(paginationHtml);
        
        // Attach click handlers to pagination links
        $(".pagination-container .page-link[data-page]").off("click").on("click", function(e) {
            e.preventDefault();
            let page = parseInt($(this).data("page"));
            if (page !== currentPage && page > 0 && page <= totalPages) {
                let x = $("#q").val() || '';
                let category = $("#category").val() || '';
                let speciality = $("#speciality").val() || '';
                let location = $("#location").val() || '';
                let gender = $("#gender").val() || '';
                let sort = $("#sort").val() || '';
                getData(x, category, speciality, location, gender, sort, page);
            }
        });
    }

    // Initial fetch on page load
    getData();
});
</script>


<script type="text/javascript">
$(document).ready(function() {
    const categorySpecialities = {
        "information technology": [
            { value: "web developer", label: "Web developer" },
            { value: "UI UX designer", label: "UI UX designer" },
            { value: "Graphics designer", label: "Graphics designer" }
        ],
        "mechanic": [
            { value: "motorcycles", label: "Motorcycles" },
            { value: "trucks", label: "Trucks" },
            { value: "vehicles", label: "Vehicles" },
            { value: "buses", label: "Buses" }
        ],
        "vulganizer": [
            { value: "truck", label: "Trucks" },
            { value: "buses", label: "Buses" },
            { value: "motorcycles", label: "Motorcycles" },
            { value: "vehicles", label: "Vehicles" }
        ],
        "teaching": [
            { value: "primary schools", label: "Primary schools" },
            { value: "secondary schools", label: "Secondary schools" },
            { value: "tertiary institutions", label: "Tertiary institutions" }
        ],
        "household": [
            { value: "plumber", label: "Plumber" },
            { value: "bricklayer", label: "Bricklayer" },
            { value: "painter", label: "Painter" },
            { value: "gardener", label: "Gardener" }
        ],
        "electrical/inverter services": [
            { value: "electrical installations", label: "Electrical installations" },
            { value: "electrical repairs", label: "Electrical repairs" },
            { value: "fixtures/fittings/outlets", label: "Fixtures/Fittings/Outlets" },
            { value: "inverter repair/installation", label: "Inverter repair/installation" },
            { value: "prepaid meter install", label: "Prepaid meter install" }
        ],
        "plumbing services": [
            { value: "plumbing repair/install", label: "Plumbing repair/install" },
            { value: "drain/leaks fixing", label: "Drain/leaks fixing" },
            { value: "pumping machine", label: "Pumping machine" },
            { value: "toilet repairs", label: "Toilet repairs" },
            { value: "water treatment/tank washing", label: "Water treatment/tank washing" }
        ],
        "Ac/refrigeration services": [
            { value: "ac gas filling", label: "AC gas filling" },
            { value: "ac repair and installations", label: "AC repair and installations" },
            { value: "refrigerator repair", label: "Refrigerator repair" },
            { value: "freezer repair", label: "Freezer repair" },
            { value: "water dispenser", label: "Water dispenser" },
            { value: "cold room servicing", label: "Cold room servicing" }
        ],
        "appliances electronics": [
            { value: "washing machine", label: "Washing machine" },
            { value: "blender", label: "Blender" },
            { value: "exercise equipment", label: "Exercise equipment" },
            { value: "gas/electric cooker", label: "Gas/electric cooker" },
            { value: "microwave", label: "Microwave" },
            { value: "tv-installation/mounting/repair", label: "TV installation/mounting/repair" },
            { value: "fan", label: "Fan" },
            { value: "home theater", label: "Home theater" }
        ],
        "cleaning/laundry/fumigation": [
            { value: "indoor cleaning", label: "Indoor cleaning" },
            { value: "outdoor cleaning", label: "Outdoor cleaning" },
            { value: "fumigation", label: "Fumigation" },
            { value: "laundry service", label: "Laundry service" }
        ],
        "carpentry services": [
            { value: "windows and doors", label: "Windows and doors" },
            { value: "cabinetry", label: "Cabinetry" },
            { value: "furniture", label: "Furniture" },
            { value: "roofing", label: "Roofing" }
        ]
    };

    // Default empty select
    const resetSpeciality = () => {
        $('.speciality').html('<select name="speciality" id="speciality" class="bg-light mt-2  text-secondary form-control" ><option value="">Select Speciality</option></select>');
    };

    // Change event listener
    $('#category').on('change', function() {
        const category = $(this).val();
         
        if (categorySpecialities[category]) {
            const options = categorySpecialities[category]
                .map(speciality => `<option value="${speciality.value}">${speciality.label}</option>`)
                .join('');

            $('.speciality').html(`<select name="speciality"  id="speciality" class='bg-light mt-2 text-secondary form-control'><option value="${options}">Select Speciality</option>${options}</select>`);
        } else {
            resetSpeciality();
        }
    });

    // Initial reset
    resetSpeciality();
});
</script>



    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
        duration: 1000, // Trigger animations after scrolling 200px
       // Delay before starting animation
   // Duration of the animation
      easing: 'ease-in-out', // Easing function

    });
  </script>
<script src="assets/js/scroll.js" type="text/javascript"></script>
<script src="assets/js/products.js" type="text/javascript"></script>
</body>
</html>