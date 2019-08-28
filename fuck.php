<?php
$mysqli = new mysqli("localhost", "root", "", "moviesdb");

//Fetching Values from URL
$actor=$_POST['name1'];
echo $actor;

//Insert query
$sql = "INSERT INTO actortable (actor) VALUES ('$actor')";
if($mysqli->query($sql) === true){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
//$query = mysql_query("insert into actortable(name) values ('$name2')");
//echo "Form Submitted Succesfully";
//mysql_close($mysqli); // Connection Closed
?>