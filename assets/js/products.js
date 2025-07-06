$('.featured').flickity({
 cellAlign: 'left',
// contain: true,
autoPlay:true,
wrapAround: true,
});
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/667aba429d7f358570d3336e/1i17mf66d';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();

$(document).ready(function () {
    // Initial load
    $(".table-container").load("engine/get-products.php");
    // Search input handler
    $("#search").on("keyup", function () {
        const search = $("#search").val().trim();
            getData(search);      
    });    
    // Get value of condition on change
    $(document).on("change", "#condition", function () {
      const search = $("#search").val().trim();
      const condition = $("#condition").val().trim();
            getData(search, condition);  
    });
    $(document).on("change", "#category", function () {
      const search = $("#search").val().trim();
      const condition = $("#condition").val().trim();
      const category = $("#category").val().trim();
            getData(search, condition, category);   
    });
    $(document).on("change", "#location", function () {
      const search = $("#search").val().trim();
      const condition = $("#condition").val().trim();
      const category = $("#category").val().trim();
      const location = $("#location").val().trim();
            getData(search, condition, category, location);   
    });
    $(document).on("change", "#featured", function () {
      const search = $("#search").val().trim();
      const condition = $("#condition").val().trim();
      const category = $("#category").val().trim();
      const location = $("#location").val().trim();
      const featured = $("#featured").val().trim();
            getData(search, condition, category, location, featured);   
    });  
    $(document).on("change", "#discounted", function () {
      const search = $("#search").val().trim();
      const condition = $("#condition").val().trim();
      const category = $("#category").val().trim();
      const location = $("#location").val().trim();
      const featured = $("#featured").val().trim();
      const discount = $("#discounted").val().trim();
            getData(search, condition, category, location, featured, discount);   
    });
     
    $(document).on("change", "#sort", function () {
      const search = $("#search").val().trim();
      const condition = $("#condition").val().trim();
      const category = $("#category").val().trim();
      const location = $("#location").val().trim();
      const sort = $("#sort").val().trim();
      const featured = $("#featured").val().trim();
      const discount = $("#discounted").val().trim();
            getData(search, condition, category, location, featured, discount, sort);   
    });

        $(document).on("click", ".btn-dark", function () {
      const search = $("#search").val().trim();
      const condition = $("#condition").val().trim();
      const category = $("#category").val().trim();
      const location = $("#location").val().trim();
      const sort = $("#sort").val().trim();
      const featured = $("#featured").val().trim();
      const discount = $("#discounted").val().trim();
      const page = $(this).attr("id");
            getData(search, condition, category, location, featured, discount, sort, page);    
    });
    function getData(search = "", condition="", category="", location="", featured="", discount="", sort="", page="") {
        $(".spinner-border").show();
        $.ajax({
            url: "engine/get-products.php",
            type: "POST",
            data: { search: search, condition:condition, category:category, location:location, featured:featured, discount:discount, sort:sort, page:page },
            success: function (data) {
                $(".spinner-border").hide();
                $(".table-container").html(data).show();
            },
            error: function (err) {
                $(".spinner-border").hide();
                console.error("Error fetching data:", err);
            }
        });
    }
});



$(document).ready(function() {
    const search = $("#searchValue").val();
    $("#search").val(search);
    setTimeout(() => {
        $("#search").trigger("keyup");
    }, 300);
});



