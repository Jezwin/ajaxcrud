<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "moviesdb");

// Check connection
if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Escape user inputs for security
$name = $mysqli->real_escape_string($_REQUEST['name']);
//$actor = $mysqli->real_escape_string($_REQUEST['actor']);
$rating = $mysqli->real_escape_string($_REQUEST['rating']);
$yearofrelease = $mysqli->real_escape_string($_REQUEST['yearofrelease']);
//$genre = $mysqli->real_escape_string($_REQUEST['genre']);
//$thumbnail= $_POST['thumbnail'];
$id=$_POST['id'];
// Attempt insert query execution

foreach ($_POST['actor'] as $selectedactor) {
    
    $sql = "UPDATE actorsforamovie SET movie='$name', year='$yearofrelease', rating='$rating',actor='$selectedactor' WHERE id='$id'";
if($mysqli->query($sql) === true){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
}
foreach ($_POST['genre'] as $selectedgenre) {
    
    
    $sql = "UPDATE genresforamovie SET movie='$name', year='$yearofrelease', rating='$rating', genre='$selectedgenre' WHERE id='$id'";
if($mysqli->query($sql) === true){
    
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
}

$sql = "UPDATE movies SET name='$name', rating='$rating', year='$yearofrelease'  WHERE id='$id'";
if ($mysqli->query($sql) === true) {
    echo "Records updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
echo "<br>";
echo "<a href='landing.php' class='btn btn-default'>HomePage</a>";
?>
