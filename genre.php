<?php
$mysqli = new mysqli("localhost", "root", "", "moviesdb");

//Fetching Values from URL
$genre=$_POST['name'];


//Insert query
$sql = "INSERT INTO genretable (genre) VALUES ('$genre')";
if($mysqli->query($sql) === true){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

?>