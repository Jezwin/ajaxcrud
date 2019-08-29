<?php
// Include config file
require_once "config.php";
$id = $_GET['id'];
$actordrop = $mysqli->query("SELECT actor FROM actortable");
$genredrop = $mysqli->query("SELECT genre FROM genretable");

//Attempt select query execution
$sql = "SELECT * FROM movies WHERE id= $id ";
if ($result = $mysqli->query($sql)) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {

            $id= $row['id'];
            $name= $row['name'];
            $actor= $row['actor'];
            $year= $row['year'];
            $rating= $row['rating'];
            $genre= $row['genre'];
            $thumbnail= $row['thumbnail'];
        }

        // Free result set
        $result->free();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>

<body>


    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="updateaction.php" method="post" enctype="multipart/form-data">
                        <br>
                        <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>" >
                        <div class="form-group ">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" required>
                        </div>
                        
                        <div class="form-group  ">
                            <label>Actor</label>
                            <select name="actor" value="<?php echo $actor; ?>" required>
                                <?php
                                while($rows= $actordrop->fetch_assoc()){
                                $actor = $rows['actor'];
                                echo "<option value='$actor'>$actor</option>";
                                
                                }
                                ?>
                            </select>
                            <!-- <input type="text" name="actor" class="form-control" required> -->

                        </div>
                        <div class="form-group  ">
                            <label>Rating</label>
                            <input type="number" name="rating" min="1" max="10" name="rating" class="form-control" value="<?php echo $rating; ?>" required>

                        </div>
                        <div class="form-group  ">
                            <label>Year of Release</label>
                            <input type="number" min="1600" max="2019" name="yearofrelease" class="form-control" value="<?php echo $year; ?>" required>

                        </div>
      
                        <div class="form-group  ">
                            <label>Genre</label>
                            <select name="genre" value="<?php echo $genre; ?>" required>
                                <?php
                                while($rows= $genredrop->fetch_assoc()){
                                $genre = $rows['genre'];
                                echo "<option value='$genre'>$genre</option>";
                                
                                }
                                ?>
                            </select>
                        
                        <div class="form-group  ">
                            <label>Thumbnail URL</label>
                            <input type="url" name="thumbnail" class="form-control" value="<?php echo $thumbnail; ?>" disabled>

                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="landing.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>

    </div>

</body>

</html>