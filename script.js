$(document).ready(function() {
  $("#registerForm").on("submit", function(e) {
    e.preventDefault();

    $.ajax({
      url: "submit.php",
      type: "POST",
      data: $(this).serialize(),
      success: function(response) {
        $("#result").html(response);
        $("#registerForm")[0].reset();
      },
      error: function(xhr, status, error) {
        console.log("Error:", error);
        $("#result").html("<p style='color:red;'>Error submitting the form!</p>");
      }
    });
  });
});
