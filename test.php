<html>

<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			$("button#submit").click(function() {
				$.ajax({
					type: "POST",
					url: "actor.php",
					data: $('form.feedback').serialize(),
					success: function() {
						alert("Success")
						$("#feedback").html(message)
						$("#feedback-modal").modal('hide');
					},
					error: function() {
						alert("Error");
					}
				});
			});
		});

		$(document).ready(function() {
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
	</script>
</head>

<body>

	<input type="button" value="Add Movie" onclick="window.location.href='addmovie.html'" />


	<button id="feedback" type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedback-modal">Add Actors</button>
	<div id="feedback-modal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a class="close" data-dismiss="modal">×</a>
				</div>
				<div class="modal-body">
					<form class="feedback" name="feedback">
						<strong>Name</strong>
						<br />
						<input type="text" name="name" class="input-xlarge" value="Laeeq">
					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" id="submit">Send</button>
					<a href="#" class="btn" data-dismiss="modal">Close</a>
				</div>
			</div>
		</div>
	</div>

	<button id="feedback1" type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedback-modal1">Add Genre</button>
	<div id="feedback-modal1" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a class="close" data-dismiss="modal">×</a>
				</div>
				<div class="modal-body">
					<form class="feedback1" name="feedback">
						<strong>Genre</strong>
						<br />
						<input type="text" name="name" class="input-xlarge" value="Laeeq">
					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" id="submit1">Send</button>
					<a href="#" class="btn" data-dismiss="modal">Close</a>
				</div>
			</div>
		</div>
	</div>
<?php
	/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "moviesdb");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
$sql = "SELECT * FROM movies";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    echo "<div class='container'>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<div style='width:400px; background-color:grey; border:1px solid white; '>";
		echo $row["name"]."<br>";
		echo $row["actor"]."<br>"."<br>" ;
		echo $row["rating"]."<br>" ;
		echo $row["year"]."<br>" ;
		echo $row["genre"]."<br>" ;
		echo $row["thumbnail"]."<br>" ;
		echo "<a class='ajax-action-links' onclick='deleteRecord(<?php echo $posts[$k]['id']; ?>);'> Delete </a>";
        // echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' <span class='glyphicon glyphicon-trash'></span></a>";
		
		echo "</div>";
    }
    echo "</div>";
} else {
    echo "0 results";
}

$mysqli->close();

?>
</body>

</html>