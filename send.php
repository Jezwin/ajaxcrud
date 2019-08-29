<?php
$mysqli = new mysqli("localhost", "root", "", "fuck");

//Fetching Values from URL
$random="abc";
$id=$_POST['id'];
//$random[] = $_POST['random'];
// for ($x = 0; $x <= count($random); $x++) {
//     echo $random[$x];
// }
// foreach ($_POST['random'] as $name){
// echo $name;
// }
// $cars = $_POST['random'];
// print_r ($cars);



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