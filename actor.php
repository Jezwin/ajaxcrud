<?php
$mysqli = new mysqli("localhost", "root", "", "moviesdb");

//Fetching Values from URL
$actor=$_POST['name'];


//Insert quer
$sql = "INSERT INTO ag (name, category) VALUES ('$actor', 'actor')";
if($mysqli->query($sql) === true){
    echo "Add More Actors";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

?>