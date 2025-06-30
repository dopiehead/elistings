<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
     <link rel="stylesheet" href="assets/css/diaspora.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <title>Diaspora Marketplace</title>
</head>
<body>
    <div class="back-button-container">
        <a onclick="history.go(-1)" class="back-button text-gray-600 hover:text-gray-900">
            <i class='fa fa-chevron-left'></i>
        </a>
    </div>

    <div class="hero-section relative">
        <div class="container mx-auto px-4 text-center relative z-10">
            <h3 class="text-3xl font-bold text-white mb-2">Welcome to Diaspora Estores</h3>
            <p class="text-lg text-white opacity-90">Where Cultures Connect and Communities Thrive</p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <h4 class="text-2xl font-semibold text-center text-gray-800 mb-8">Marketplace</h4>

        <div class="flex flex-col md:flex-row gap-8">
            <!-- Filter Section -->
            <div class="w-full md:w-1/4 bg-white p-6 rounded-xl shadow-sm">
                <h5 class="font-semibold text-gray-800 mb-4">Filter by</h5>

                <div class="space-y-4">
                    <div class="flex gap-2">
                        <input name='q' id='q' type="text" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:border-indigo-500" placeholder="Search for anything">
                        <button id='btn-search' class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-800 transition-colors">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>

                    <div>
                        <h6 class="font-medium text-gray-700 mb-2">Choose Location</h6>
                        <div class="space-y-2">
                            <?php 
                             require("engine/connection.php");

                             $getstate = $con->prepare("SELECT DISTINCT state FROM states_in_nigeria ORDER BY state ASC");
                             $getstate->execute();
                             $data = $getstate->get_result();
                             
                             ?>
                            <select name='location' id='location' class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:border-indigo-500 capitalize mb-2">
                                <option value="">Select State</option>
                                <?php 
                                while ($datafound = $data->fetch_assoc()){?>
                                 <option value="<?= htmlspecialchars($datafound['state']);?>"><?= htmlspecialchars($datafound['state']);?></option>
                                <?php }
                                ?>
                            </select>
                            
                            <span class='mt-3' id='lg'>


                            </span>
                            
                        </div>
                    </div>

                    <div>
                        <h6 class="font-medium text-gray-700 mb-2">Price Range</h6>
                        <div class="space-y-4">
                            <input name='price_range' id='price_range' type="range" max="1000000" min="1000" class="w-full">
                            <div class="flex justify-between text-sm text-gray-600">
                                <span>₦100</span>
                                <span>₦500,000</span>
                                <span>₦1,000,000</span>
                            </div>
                        </div>
                    </div>
                   
                    <br>

                    <div>

                         <h6 class="font-medium text-gray-700 mb-2">Select Quantity</h6>
                        <div class="space-y-4">
                           <select name="treat_quantity" id="treat_quantity" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:border-indigo-500 capitalize mb-2">
                                  <option value="">Select quantity</option>

                             <?php 
                                 require("engine/configure.php");
                                 $getquantity = $conn->prepare("SELECT DISTINCT treat_quantity FROM treats");
                                 $getquantity->execute();
                                 $quantity = $getquantity->get_result();
                                  while ($quantity_is_found = $quantity->fetch_assoc()){?>
                                      <option value="<?= htmlspecialchars($quantity_is_found['treat_quantity']); ?>"><?= htmlspecialchars($quantity_is_found['treat_quantity']); ?></option>
                             <?php 
                                  }                            
                             ?>

                           </select>
                        </div>


                    </div>
                </div>
            </div>
            <div class="w-full md:w-3/4">

                 <div class='product-container'>
                                     

                 <div class="w-8 h-8 border-4 border-t-4 border-gray-300 border-solid rounded-full animate-spin border-t-secondary"></div>

                      <!-- Product Grid -->

                 </div>
    
  
            </div>
    </div>
    <script>

        $(".product-container").load("product-container.php?page=1");

        $("#btn-search").on("click", function(e){
             e.preventDefault();
             var x = $("#q").val().trim();
             if (x.length > 0) {
             getData(x); // Only search if there's something to search
        } 
                  
        });


        $("#price_range").on("change",function(e){
             e.preventDefault();
             var x = $("#q").val().trim();
             var price_range = $("#price_range").val();
             getData(x, price_range);

        });


        $("#treat_quantity").on("change",function(e){
             e.preventDefault();
             var x = $("#q").val().trim();
             var price_range = $("#price_range").val();
             var treat_quantity = $("#treat_quantity").val();
             getData(x, price_range, treat_quantity);
        });


        $(document).on("click",".pagination-btn",function(){
             var x = $("#q").val().trim();
             var price_range = $("#price_range").val();
             var treat_quantity = $("#treat_quantity").val();
             var page = $(this).attr("id");
             getData(x, price_range, treat_quantity, page);

        });


     function getData(x, price_range, treat_quantity, page){       
        $.ajax({          
             url:"product-container.php",
             method:"POST",
             data :{
                "q" : x, "price_range":price_range, "treat_quantity":treat_quantity, "page":page,
             },
             success:function(data){
                 $(".product-container").html(data);                
             }

        });

     }

    </script>

<script>
    // Clear the LGA select field initially
    $('#lg').html("<select name='lga' class='lga w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:border-indigo-500'> <option value=''>Select Area</option></select>");

    // On change event of the state dropdown
    $('#location').on('change', function() {
        var location = $(this).val(); // Get the selected state

        // If a state is selected, make the AJAX call
        if (location) {
            $.ajax({
                type: "POST",
                url: "engine/get-lga.php", // File that will return the LGAs
                data: { 'location': location }, // Send the selected state
                success: function(data) {
                    // Replace the LGA dropdown with the returned data
                    $('#lg').html(data);
                }
            });
        } else {
            // If no state is selected, reset the LGA dropdown
            $('#lg').html("<select name='lga' class='lga w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:border-indigo-500'> <option value=''>Select Area</option></select>");
        }
    });
</script>

</body>
</html>