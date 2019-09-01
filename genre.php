<?php
$mysqli = new mysqli("localhost", "root", "", "moviesdb");

//Fetching Values from URL
$genre=$_POST['name'];


//Insert query
$sql = "INSERT INTO ag (name, category) VALUES ('$genre', 'genre')";
if($mysqli->query($sql) === true){
    echo "Add More Genre";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

?>