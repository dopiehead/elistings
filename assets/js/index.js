$('input:checkbox,.select_category').on('click',function (e) {
  $("#loading-image").show();
var category = $(this).attr('id');
  e.preventDefault();
     $.ajax({
     type: "POST",
     url: "engine/product-process.php",
     data: {'category':category},
     cache:false,
     contentType: "application/x-www-form-urlencoded",
      success: function(response) {
  $("#loading-image").hide();
               $('#show_product').html('<div class="container">'+response+'<div class="btn-home"><button class=" btn btn-primary btn-close w-100 bg-primary">&times</button></div></div>').slideDown();
               $('.btn-close').on("click",function(e) {
                e.preventDefault();               
                 $('#show_product').hide();                
               });
             }
});
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
  
$('.featured').flickity({
 cellAlign: 'left',
contain: true,
autoPlay:true,
freeScroll: true,
 friction:0.52,
wrapAround: true,
contain: true,
prevNextButtons: false,
});
$('#loader-image').hide();
$('.btn-request').on('click',function(e){
e.preventDefault();
var data = $('#request_form').serialize();
$('#loader-image').show();
$.ajax({
    type:"POST",
     url:"engine/request-page.php",
     data: $('#request_form').serialize(),
     success:function(response) {
    $('#loader-image').hide();
     if (response ==1) {
         swal({
             icon:"success",
             title:"Success",          
             text:"Message was sent successfully",
     });
    $("#request_form")[0].reset();
    }
    else{
     swal({
         icon:"error",
         text:response,
         title:"Notice",
     });
    }
     }
});
});
function share() {
    var url = $('.share').attr('id');
    var encodedUrl = encodeURIComponent(url);
    var facebookShare = "https://www.facebook.com/sharer/sharer.php?u=" + encodedUrl;
    var twitterShare = "https://twitter.com/intent/tweet?url=" + encodedUrl;
    var linkedinShare = "https://www.linkedin.com/shareArticle?url=" + encodedUrl;
    window.open(facebookShare, "_blank");
    window.open(twitterShare, "_blank");
    window.open(linkedinShare, "_blank");
}


    $('#brands').flickity({
        cellAlign: 'left',
        contain: true,
        autoPlay: true
    });


var flickity = new Flickity('.category-container', {
  cellAlign: 'left',
  contain: true,
  autoPlay: true,
  prevNextButtons:false
});


var prevButton = document.querySelector('.previous-button');
var nextButton = document.querySelector('.next-button');


if (prevButton && nextButton) {
  prevButton.addEventListener('click', function() {
    flickity.previous();
  });

  nextButton.addEventListener('click', function() {
    flickity.next(); 
  });
}




var flickity = new Flickity('.categories-container', {
    cellAlign: 'left',
    contain: true,
    autoPlay: true,
    prevNextButtons:false
  });
  
  
  var prevButton = document.querySelector('.previous');
  var nextButton = document.querySelector('.next-icon');
  
  
  if (prevButton && nextButton) {
    prevButton.addEventListener('click', function() {
      flickity.previous();
    });
  
    nextButton.addEventListener('click', function() {
      flickity.next(); 
    });
  }

