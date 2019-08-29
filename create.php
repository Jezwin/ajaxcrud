<?php
// Include config file
require_once "config.php";
//$id = $_GET['id'];
$actordrop = $mysqli->query("SELECT actor FROM actortable");
$genredrop = $mysqli->query("SELECT genre FROM genretable");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                    <form action="actionpage.php" method="post" enctype="multipart/form-data">
                        <br>
                        <input type="hidden" name="id" class="form-control" value="<?php echo uniqid(); ?>" >
                        <div class="form-group ">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group  ">
                            <label>Actor</label>
                            <select name="actor[]" multiple required>
                                <?php
                                while ($rows = $actordrop->fetch_assoc()) {
                                    $actor = $rows['actor'];
                                    echo "<option value='$actor'>$actor</option>";
                                }
                                ?>
                            </select>

                        </div>
                        <div class="form-group  ">
                            <label>Rating</label>
                            <input type="number" name="rating" min="1" max="10" name="rating" class="form-control" required>

                        </div>
                        <div class="form-group  ">
                            <label>Year of Release</label>
                            <input type="number" min="1600" max="2019" name="yearofrelease" class="form-control" required>

                        </div>
                        <div class="form-group  ">
                            <label>Genre</label>
                            <select name="genre[]" multiple required>
                                <?php
                                while ($rows = $genredrop->fetch_assoc()) {
                                    $genre = $rows['genre'];
                                    echo "<option value='$genre'>$genre</option>";
                                }
                                ?>
                            </select>

                        </div>
                        <div class="form-group  ">
                            <label>Thumbnail URL</label>
                            <input type="url" name="thumbnail" class="form-control" value="https://picsum.photos/200" required>

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