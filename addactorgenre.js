$(document).ready(function() {
    $("button#submit").click(function() {
        $.ajax({
            type: "POST",
            url: "actor.php",
            data: $('form.feedback').serialize(),
            success: function(message) {

                $("#feedback").html(message)
                $("#feedback-modal").modal('hide');
            },
            error: function() {
                alert("Error");
            }
        });
    });

    $("button#submit1").click(function() {
        $.ajax({
            type: "POST",
            url: "genre.php",
            data: $('form.feedback1').serialize(),
            success: function(message) {

                $("#feedback1").html(message)
                $("#feedback-modal1").modal('hide');
            },
            error: function() {
                alert("Error");
            }
        });
    });
});
