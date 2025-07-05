
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
                if (response.total_results !== undefined) {
                    totalPages = response.total_pages || Math.ceil(response.total_results / 6);
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
                            <a href='service-provider-details.php?id=${product_id}'>
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
                    totalCount: response.total_results,
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

    AOS.init({
        duration: 1000, // Trigger animations after scrolling 200px
       // Delay before starting animation
   // Duration of the animation
      easing: 'ease-in-out', // Easing function

    });
 