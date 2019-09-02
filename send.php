<?php
$mysqli = new mysqli("localhost", "root", "", "fuck");

//Fetching Values from URL
$random="abc";
$id=$_POST['id'];


foreach ($_POST['woolalalaa'] as $selected_option) {
    echo $selected_option;
}


//Insert query
$sql = "INSERT INTO justrandom (id, name) VALUES ('$id', '$random')";
if($mysqli->query($sql) === true){
    echo "success";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

?>