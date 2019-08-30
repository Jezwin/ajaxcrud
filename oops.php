<?php
require_once "config.php";
$id=$_POST['id'];
$name=$_POST['name'];
$year=$_POST['year'];
$rating=$_POST['rating'];
$sql = "UPDATE movies SET name= '$name', year='$year', rating='$rating' WHERE id= '$id'";
if ($mysqli->query($sql) === true) {
    echo "Success";
} else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    
}
?>