<?php
require_once "config.php";
$id=$_POST['id'];
$name=$_POST['name'];
$year=$_POST['year'];
$rating=$_POST['rating'];


$id=$_POST['id'];
// Attempt insert query execution

$delete="DELETE FROM actorgenre WHERE movieid='$id'";
$result= mysqli_query($mysqli, $delete) or die("database error:". mysqli_error($mysqli));
foreach ($_POST['actor'] as $selectedactor) {
    //$selector='actor';
    
    $sql = "INSERT INTO actorgenre (movieid, thevalue, selector ) VALUES ('$id', '$selectedactor', 'actor' )";
if($mysqli->query($sql) === true){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
}
foreach ($_POST['genre'] as $selectedgenre) {
    
    $sql = "INSERT INTO actorgenre(movieid, thevalue, selector ) VALUES ('$id', '$selectedgenre', 'genre')";
if($mysqli->query($sql) === true){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
}


$sql = "UPDATE movies SET name= '$name', year='$year', rating='$rating' WHERE id= '$id'";
if ($mysqli->query($sql) === true) {
    echo "Success";
} else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    
}
?>