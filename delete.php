<?php
require_once "config.php";
if($_REQUEST['id']) {
$woo=$_REQUEST['id'];
$sql = "DELETE FROM movies WHERE id='$woo'";
$resultset = mysqli_query($mysqli, $sql) or die("database error:". mysqli_error($mysqli));
if($resultset) {
echo "Record Deleted";
}
}
?>