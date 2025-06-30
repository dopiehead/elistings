
$(document).ready(function () {
  $('#subscribe-form').on('submit', function (e) {
    e.preventDefault();
    $(".spinner-border").show();
    const form = $(this);
    const button = $('#submit-subscribe');
    const email = form.find('input[name="email"]').val();

    button.prop('disabled', true).text('Subscribing...');

    $.ajax({
      type: 'POST',
      url: 'engine/subscribe-page.php',
      data: form.serialize(),
      dataType: 'json',
      success: function (response) {
        $(".spinner-border").hide();
        if (response.status === "success") {
          swal("Success", response.message, "success");
      } else if (response.status === "info") {
          swal("Info", response.message, "info");
      } else {
          swal("Error", response.message, "error");
      }
      $("#subscribe-form")[0].reset();
      },
      error: function () {
        $(".spinner-border").hide();
        swal('An error occurred. Please try again later.');
      },
      complete: function () {
        $(".spinner-border").hide();
        button.prop('disabled', false).text('Subscribe');
        form[0].reset();
      }
    });
  });
});

