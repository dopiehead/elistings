<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
   
   <?php  
         require ("engine/configure.php");  
         require ('engine/get-dollar.php');
         require ('engine/get-euro.php');
         require ('engine/get-pound.php');  

         $query = "SELECT * FROM treats WHERE sold = 0";

          if(isset($_POST['q']) && !empty($_POST['q'])){
          
              $search = explode(" ",mysqli_escape_string($conn,$_POST['q'])) ;

               foreach ($search as $text) {
                    
                  $query .= " AND (`treat_name` LIKE '%".$text."%' OR `treat_contents` LIKE '%".$text."%' OR `treat_price` LIKE '%".$text."%' OR `treat_details` LIKE '%".$text."%')";
        
             }

        }

         if(isset($_POST['price_range']) && !empty($_POST['price_range'])){
               $price_range = floatval($_POST['price_range']);
               $query .= " AND  `treat_price` <= '".$price_range."'";
         }


         if(isset($_POST['treat_quantity']) && !empty($_POST['treat_quantity'])){
               $treat_quantity = floatval($_POST['treat_quantity']);
               $query .= " AND  `treat_quantity` LIKE '%".$treat_quantity."%'";
         }

         $num_per_page =12;
             if (isset($_POST['page'])) {
                 $page = $_POST['page'];
              }
             else{
                  $page = 1;  
             }
            
         $initial_page = ($page-1)*$num_per_page; 
         $query .= " limit $initial_page,$num_per_page";
         $stmt = $conn->prepare($query);
          $stmt->execute();
          $result =$stmt->get_result();
 
     ?>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="package bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="relative">
                   <a href='treat-details.php?id=<?= htmlspecialchars($row['treat_id']); ?>'> <img src="<?= htmlspecialchars($row['treat_image']); ?>" 
                         alt="<?= htmlspecialchars($row['treat_name']); ?>" 
                         class="w-full h-48 object-cover"></a>
                    <div class="absolute top-3 right-3">
                        <button class="bg-white p-2 rounded-full shadow-sm hover:shadow-md transition-shadow">
                            <i class="far fa-heart text-gray-600 hover:text-red-500 transition-colors"></i>
                        </button>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="font-semibold text-gray-800 line-clamp-2"><?= htmlspecialchars($row['treat_name']); ?></h3>
                        <span class="text-lg font-bold text-red-600">₦<?= number_format($row['treat_price']); ?></span>
                    </div>
                    <div class="flex items-center gap-1 mb-3">
                        <?php
                        $starCount = floor($row['ratings'] / 20);
                        for ($i = 0; $i < 5; $i++) {
                            $starClass = $i < $starCount ? 'text-yellow-400' : 'text-gray-300';
                            echo "<i class='fas fa-star $starClass'></i>";
                        }
                        ?>
                        <span class="text-sm text-gray-500 ml-2">(<?= $starCount ?>.0)</span>
                    </div>
                    <button class="w-full py-2.5 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors flex items-center justify-center gap-2">
                        <i class="fas fa-shopping-cart"></i>
                        Add to Cart
                    </button>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center items-center gap-2 py-6">
         
         <?php

         $radius=3;
         $pageres = mysqli_query($conn,"SELECT * FROM treats");
         $numpage = $pageres->num_rows;
         $total_num_page =ceil($numpage/$num_per_page);

        if ($page > 1) {
            $previous = $page - 1;
            echo '<a href="#" class="pagination-btn prev" id="' . $previous . '">
                    <i class="fas fa-chevron-left"></i>
                  </a>';
        }

        for ($i = 1; $i <= $total_num_page; $i++) {
            if (($i >= 1 && $i <= $radius) || ($i > $page - $radius && $i < $page + $radius) || ($i <= $total_num_page && $i > $total_num_page - $radius)) {
                if ($i == $page) {
                    echo '<a href="#" class="pagination-btn active" id="' . $i . '">' . $i . '</a>';
                } else {
                    echo '<a href="#" class="pagination-btn" id="' . $i . '">' . $i . '</a>';
                }
            } elseif ($i == $page - $radius || $i == $page + $radius) {
                echo '<span class="px-2 text-gray-400">...</span>';
            }
        }

        if ($page < $total_num_page) {
            $next = $page + 1;
            echo '<a href="#" class="pagination-btn next" id="' . $next . '">
                    <i class="fas fa-chevron-right"></i>
                  </a>';
        }
        ?>
    </div>