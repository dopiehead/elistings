

           AOS.init({
            duration:1000,
            easing: 'ease-in-out',
        });

        // Initialize Flickity for sliders
        $(".other_sp").flickity({
            cellAlign: "left",
            contain: true,
            autoPlay: true,
            prevNextButtons: true,
            pageDots: false,
        });

    // javascript and jquery to render page

 $(document).ready(function() {
    let id = $("#id").val();
    let user_id =  $("#user_id").val();
    $(".spinner").show();

    $.ajax({
        type: "GET",
        url: "https://efixit.ng/api/service-provider-details.php?id=" + id,
        dataType: "json",
        success: function(response) {
            $(".spinner").hide();

            if (response.status === "success") {
                let d = response.data;
                let img = d.sp_img ? `https://efixit.ng/${d.sp_img}` : "https://placehold.co/600x400";
                let contactHtml = '';
                let account_details = '';

                if (user_id && user_id.trim() !== '') {
                    contactHtml = `
                        <p><strong>Email:</strong> <span class='fa fa-envelope'></span> 
                        <a class='text-dark text-decoration-none' href='mailto:${d.sp_email}'>${d.sp_email}</a></p>
                        <p><strong>Phone:</strong> 
                        <a class='text-dark text-decoration-none' href='tel:${d.sp_phone1}'>${d.sp_phone1}</a>
                        ${d.sp_phone2 ? ` / <a class='text-dark text-decoration-none' href='tel:${d.sp_phone2}'>${d.sp_phone2}</a>` : ''}
                        </p>`;
                } else {
                    const requestURI = encodeURIComponent(window.location.pathname + window.location.search);
                    contactHtml = `
                     <div class='d-flex justify-content-end'>
                       <a href='login.php?details=${requestURI}' class='btn btn-danger'>Login to continue</a>
                       
                    </div>`;
                }

                account_details = d.pay == 1
                    ? `<p><strong>Bank:</strong> ${d.bank_name}</p>
                       <p><strong>Account Number:</strong> ${d.account_number}</p>`
                    : `<p class='text-secondary'>Account details not provided</p>`;

                let category_html = `
                <div class='d-flex details-container flex-md-row flex-column gap-3'>   
                    <div class='product_image fade-right'>
                        <img src='${img}' class='rounded shadow' alt='${d.sp_name}' onerror="this.src='https://placehold.co/600x400';">
                    </div>
                    <div class='product_details fade-left'>
                        <h4 class='text-capitalize fw-bold'>
                            ${d.sp_name} ${d.sp_verified == 1 ? '<i class="fa fa-check-circle text-primary"></i>' : ''}
                        </h4>
                        <p><strong>Category:</strong> ${d.sp_category}</p>
                        <p><strong>Speciality:</strong> ${d.sp_speciality}</p>
                        <p><strong>Location:</strong> <span class='fa fa-map-marker text-success'></span> ${d.sp_location}</p>
                        <p><strong>Experience:</strong> ${d.sp_experience} years</p>
                        ${contactHtml}
                        <p><strong>Ratings:</strong> ${d.sp_ratings} ⭐</p>
                        <p><strong>Bio:</strong> ${d.sp_bio}</p>
                        <hr>
                        <h6>Bank Info</h6>
                        ${account_details}
                    </div>    
                </div>`;

                $(".product_category").html(category_html);

            } else {
                $(".product_category").html("<div class='alert alert-warning'>No provider data found.</div>");
            }
        },
        error: function(xhr, status, error) {
            $(".spinner").hide();
            $(".product_category").html("<div class='alert alert-danger'>Error loading provider data.</div>");
            console.error("Error fetching provider:", error);
        }
    });
});


// loading more pictures 

$(document).ready(function() {
    let id = $("#id").val();
    $(".spinner").show();
    $.ajax({
        type: "GET",
        url: "https://efixit.ng/api/more-pictures.php?sp_id=" + id,
        dataType: "json",
        success: function(response) {
            $(".spinner").hide();

            if (response.status === "success" && Array.isArray(response.data)) {
                let images = response.data;
                let imagesHTML = "";

                images.forEach(function(imageObj) {
                    let imgSrc = imageObj.image ?? "";
                    if (imgSrc !== "") {
                        imagesHTML += `
                            <div class="m-2" data-aos="zoom-in">
                                <img src="https://efixit.ng/${imgSrc}" class="img-fluid rounded" style="max-width:150px; max-height:150px;" alt="Work image">
                            </div>
                        `;
                    }
                });

                let wrapper = `
                    <div class='d-flex justify-content-center flex-wrap align-items-center'>
                        ${imagesHTML}
                    </div>
                `;

                $(".more_pictures").html(wrapper);
            } else {
                $(".more_pictures").html("<div class='alert alert-warning'>No work images found.</div>");
            }
        },
        error: function(xhr, status, error) {
            $(".spinner").hide();
            console.error("Error fetching provider:", error);
            $(".more_pictures").html("<div class='alert alert-danger'>Error loading images.</div>");
        }
    });
});


//  Experience of the service provider 

$(document).ready(function() {
    let id = $("#id").val();
    $(".spinner").show();

    $.ajax({
        url: "https://efixit.ng/api/experience.php?sp_id=" + id,
        type: "GET",
        dataType: "json",
        success: function(response) {
            $(".spinner").hide();

            if (response.status === "success") {
                let experience = response.data.experience;
                let experience_html = `
                    <div class='d-flex flex-column' data-aos='fade-up'>
                        <span>${experience}</span>
                    </div>
                `;
                $(".work_Experience").html(experience_html);
            } else {
                $(".work_Experience").html(`<div class='text-muted'>${response.message}</div>`);
                console.warn(response.message);
            }
        },
        error: function(xhr, status, error) {
            $(".spinner").hide();
            console.error("API error:", error);
            $(".work_Experience").html("<div class='text-danger'>Error loading experience.</div>");
        }
    });
 $(".history_btn").on("click",function(){
       $("#demo").toggleClass("d-none");
    });

});


// location on map marker

  $(document).ready(function() {
    let id = $("#id").val();
    $(".spinner").show();

    $.ajax({
      type: "GET",
      url: "https://efixit.ng/api/service-provider-details.php?id=" + id,
      dataType: "json",
      success: function(response) {
       
        $(".spinner").hide();

        if (response.status === "success") {
          let d = response.data;
          let location = d.sp_location;

          let location_html = `
            <iframe
              src="https://www.google.com/maps?q=${location}&output=embed"
              class="w-100 h-auto"
              style="border:0;"
              allowfullscreen=""
              loading="lazy">
            </iframe>`;

          $(".location_html").html(location_html);
        }
      }
    });
  });


// reviews

$(document).ready(function () {
    let id = $("#id").val();
    $(".spinner").show();

    $.ajax({
        url: "https://efixit.ng/api/reviews.php?sp_id=" + id,
        method: "GET",
        dataType: "json",
        success: function (response) {
            $(".spinner").hide();
            if (response.status === "success") {
                let reviews = response.data;
                if (reviews.length === 0) {
                    $(".reviews").html("<span style='font-family: poppins;font-size:14.5px;opacity:0.6;color:black'>There are no reviews for this provider</span>");
                } else {
                    let comment_html = "";
                    reviews.forEach(function (review) {
                        comment_html += `
                            <div class='review-content' data-aos='fade-in'>
                                <div>
                                    <span class='fw-bold'>
                                        <span class='rounded rounded-circle px-2 bg-secondary text-white mr-2'>B</span>
                                        ${review.sender_name}
                                    </span>
                                    <p>${review.comment}</p>
                                    <br>
                                    <i style='color:blue; font-size:14px;'>Public</i> 
                                    <i style='color:red; font-size:14px;'>${review.date}</i>
                                    <br>
                                </div>
                            </div>
                        `;
                    });

                    $(".reviews").html(comment_html);
                }
            } else {
                $(".reviews").html(`<div class="alert alert-warning">${response.message}</div>`);
            }
        },
        error: function () {
            $(".spinner").hide();
            $(".reviews").html("<div class='alert alert-danger'>Failed to load reviews</div>");
        }
    });
});

let services_html = `

<ul class="list-unstyled li-prop text-sm ">  

    <li><i class='fa fa-check'></i> Extended Warranties</li>
    <li><i class='fa fa-check'></i> Home delivery</li>
    <li><i class='fa fa-check'></i> Car Buying</li>
    <li><i class='fa fa-check'></i> Car Sourcing</li>
    <li><i class='fa fa-check'></i> Live Video Viewing</li>
    <li><i class='fa fa-check'></i> Extended warranties</li>
    <li><i class='fa fa-check'></i> Click and Collect</li>
    
</ul>`;
$(".services").html(services_html);


$(document).ready(function () {
    let id = $("#id").val();
    $(".spinner").show();
    $.ajax({
        type: "GET",
        url: "https://efixit.ng/api/service-provider-details.php?id=" + id,
        dataType: "json",
        success: function (response) {
            $(".spinner").hide();

            if (response.status === "success") {
                let d = response.data;
                let name = d.sp_name;
                let email = d.sp_email;
                let id = d.sp_id;

                let userEmail = $("#userEmail").val();
                let userName = $("#userName").val();

                let modal_html = `
<div class='shadow-lg' id="popupAbuse">
    <div class="px-5">
        <a class="btn btn-danger text-danger toggle-abuse" id="closeAbuse"><i class='fa fa-close fa-2x'></i></a> 
        <h6 class="text-center fw-bold">Add Report</h6><br>
        <form method="post" id="report-form" enctype="multipart/form-data"> 
            
            <input type="hidden" name="product_name" value="${name}">
            <input type="hidden" name="vendor_email" value="${email}">
            <input type="email" name="sender_email" placeholder="Email" value="${userEmail}" class="form-control"><br>
            <input type="hidden" name="product_id" value="${id}">
            <textarea name="issue" placeholder="Issue" rows="8" class="form-control"></textarea><br><br>
            <input type="submit" id="submit-sp" class="btn btn-warning text-white" value="Report Abuse">
        </form>
        <br>
    </div>
</div>

<div class="shadow-lg py-2" id="popup-comment">
    <a id="close-comment" class="btn close-comment toggle-comment"><i class='fa fa-close fa-2x'></i></a>
     <h6 class="text-center fw-bold">Add Comment</h6><br>
    <form method="post" id="conv">
        <input type="hidden" name="sender_email" class="form-control" value="${userEmail}">
        <input type="hidden" name="sender_name" class="form-control" value="${userName}">
        <input type="hidden" name="id" value="${id}"><br>
        <textarea class="form-control" name="comment" placeholder="...Your review" rows="4"></textarea><br>
        <button id="btn-comment" class="btn btn-warning form-control">
            <i class="fa fa-paper-plane"></i> Add comment
        </button>
        <div class="text-center" style="display: none;" id="loading-image">
            <img height="50" width="50" src="loading-image.GIF">
        </div>
    </form>
</div>
`;

                $(".popup-modals").html(modal_html);

                // Automatically open popup
            }
        },
        error: function (xhr, status, error) {
            $(".spinner").hide();
            console.error("API Error:", error);
        }
    });

    // Handle report submission
    $(document).on("submit", "#report-form", function (e) {
        e.preventDefault();
        $("#loading-image").show();
        $.post("report-page.php", $(this).serialize(), function (response) {
            $("#loading-image").hide();
            if (response == 1) {
                swal({ title: "Success", text: "Your message has been received. Thank you!", icon: "success" });
                $("#popupAbuse").removeClass("active");
                $("#report-form")[0].reset();
            } else {
                swal({ text: "Issue field is required", icon: "error" });
            }
        }).fail((jqXHR, textStatus, errorThrown) => console.error(errorThrown));
    });

    // Close buttons
    $(document).on("click", ".toggle-abuse", () => $("#popupAbuse").toggleClass("active"));
    $(document).on("click", ".toggle-comment", () => $("#popup-comment").toggleClass("active"));
});
