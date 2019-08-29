<?php
require_once "config.php";

 echo "<td>";
 $sql1 = "SELECT * FROM actorsforamovie WHERE movie= hello ";
 echo $sql1;
 if ($results = $mysqli->query($sql1)) {
     echo $sql1;
     if ($results->num_rows > 0) {
         while ($row = $results->fetch_array()) {
             echo $row['actor'];
             
         }

         // Free result set
         $results->free();
     }
 }
?>