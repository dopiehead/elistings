function openform() {
  document.getElementById("myform").
  style.height="49%";
}


function closeform() {
  document.getElementById("myform").
  style.height="0%";
}


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
               $('#show_product').html('<div class="container">'+response+'<div class="btn-home"><button class=" btn btn-primary btn-close">&times</button></div></div>').slideDown();

               $('.btn-close').click(function(e) {

                e.preventDefault();

                 
                 $('#show_product').hide();
                 
               });

             }

});


});



var instance = $("img.lazy").Lazy({chainable: false});
$("img.lazy").Lazy();
var instance = $("img.lazy").data("plugin_lazy");

$('#loader-image').hide();
$('.numbering').load('engine/item-numbering.php');
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
     text:"Message was sent successfully",
     });

    $("#request_form")[0].reset();
    }

    else{

     swal({

      icon:"error",

      text:response


     });

    }
     

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

</script>