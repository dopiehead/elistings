

<div class='service-providers'>


</div>


<script>
$(document).ready(function () {
    $(".spinner").show();

    $.ajax({
        type: "GET",
        url: "https://efixit.ng/api/search.php",
        dataType: "json",
        success: function (response) {
            $(".spinner").hide();

            if (response.products && response.products.length > 0) {
                let providers = response.products;
                let category_html = `
                <div class="container doctor-container">
                    <div class="header">
                        <h2>Recommended Providers <span>(${providers.length})</span></h2>
                        <a href="service-providers.php" class="view-all">View All</a>
                    </div>
                    <div class="doctors-grid">`;

                providers.forEach(d => {
                    let img = d.product_image
                        ? d.product_image
                        : "https://placehold.co/600x400";

                    category_html += `
                    <a class='text-decoration-none' href='service-provider-details.php?id=${d.id}'><div class="doctor-card">
                        <div class="heart-icon outline">♡</div>
                        <div class="doctor-image doctor-1  text-capitalize"><img src="https://efixit.ng/${img}" alt="${d.product_name}" /></div>
                        <div class="doctor-name  text-capitalize">${d.product_name}</div>
                        <div class="doctor-specialty  text-capitalize">${d.product_category}</div>
                        <div class="doctor-price text-danger text-capitalize">₦${d.product_price}</div>
                        <div class="doctor-location  text-capitalize"><span class='text-secondary fa fa-map-marker'></span>  ${d.product_location}</div>
                    </div></a>`;
                });

                category_html += `</div></div>`;

                $(".service-providers").html(category_html);
            } else {
                $(".service-providers").html("<div class='alert alert-warning'>No provider data found.</div>");
            }
        },
        error: function (xhr, status, error) {
            $(".spinner").hide();
            $(".product_category").html("<div class='alert alert-danger'>Error loading provider data.</div>");
            console.error("Error fetching provider:", error);
        }
    });
});
</script>