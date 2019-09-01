<?php
require_once "config.php";
if($_REQUEST['id']) {
$woo=$_REQUEST['id'];
$sql = "DELETE FROM movies WHERE id='$woo'";
$deleteag="DELETE FROM actorgenre WHERE movieid='$woo'";
$resultag= mysqli_query($mysqli, $deleteag) or die("database error:". mysqli_error($mysqli));
$resultset = mysqli_query($mysqli, $sql) or die("database error:". mysqli_error($mysqli));
if($resultset && $resultag) {
echo "Record Deleted";
}
}
?>