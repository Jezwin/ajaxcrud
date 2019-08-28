<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#submit").click(function() {
        var name = $("#name").val();

        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'name1=' + name;
        if (name == '') {
          alert("Please Fill All Fields");
        } else {
          // AJAX Code To Submit Form.
          $.ajax({
            type: "POST",
            url: "fuck.php",
            data: dataString,
            cache: false,
            success: function(result) {
              alert(result);
            }
          });
        }
        return false;
      });
    });
  </script>

</head>

<body>

  <input type="button" value="Add Movie" onclick="window.location.href='addmovie.html'" />


  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
    Add Actor
  </button>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="mainform">
            <h2>Submit Form Using AJAX and jQuery</h2> <!-- Required div Starts Here -->
            <div id="form">
              <h3>Fill Your Information !</h3>
              <div>
                <label>Name :</label>
                <input id="name" type="text">

                <input id="submit" type="button" value="Submit">
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>




  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
    Add Genre
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="actionpage.php" method="post">
            Genre:<br>
            <input type="text" name="genre"><br><br>
            <input type="submit" class="btn btn-secondary" value="Submit">

          </form>
        </div>

      </div>
    </div>
  </div>




 
</body>

</html>