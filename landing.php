<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/bootboxmin.js"></script>
    <script>
        //Edit Option

        $(document).ready(function() {
            $(".editorbox").hide();
            $(".text").show();
            $(".edit_tr").click(function() {
                var ID = $(this).attr('id');

                $("#name_" + ID).hide();
                $("#nameedit_" + ID).show();
                $("#year_" + ID).hide();
                $("#yearedit_" + ID).show();
                $("#rating_" + ID).hide();
                $("#ratingedit_" + ID).show();
                $("#actor_" + ID).hide();
                $("#actoredit_" + ID).show();
                $("#genre_" + ID).hide();
                $("#genreedit_" + ID).show();

            }).change(function() {
                var ID = $(this).attr('id');
                var name = $("#nameedit_" + ID).val();
                var rating = $("#ratingedit_" + ID).val();
                var year = $("#yearedit_" + ID).val();
                var actor = $("#actoredit_" + ID).val();
                var genre = $("#genreedit_" + ID).val();
                //  alert(year);
                //  alert(rating);
                // alert(actor);
                // alert(genre);


                if (name.length > 0) {

                    $.ajax({
                        type: "post",
                        url: "oops.php",
                        data: {
                            'id': ID,
                            'name': name,
                            'year': year,
                            'rating': rating,
                            'genre': genre,
                            'actor': actor
                        },
                        success: function(data) {
                            alert(data);
                            //$("#refresh").html();
                            $("#refresh").ajax.reload();
                           // $("#refresh").load(window.location + " #refresh");
                           



                        },
                        error: function() {
                            alert("Error");

                        }
                    });
                } else {
                    alert('Enter something.');
                }

            });

            // Edit input box click action
            // $(".editorbox").mouseup(function() {
            //     return false
            // });

            // Outside click action
            $(document).mouseup(function() {
                $(".editorbox").hide();
                $(".text").show();
            });

        });



        //Delete Option
        $(document).ready(function() {
            $('.deleterecord').click(function(e) {
                e.preventDefault();
                var id = $(this).attr('id');
                //alert(id);
                var parent = $(this).parent("td").parent("tr");
                bootbox.dialog({
                    message: "Are you sure you want to Delete ?",
                    //title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
                    buttons: {
                        success: {
                            label: "No",
                            className: "btn-success",
                            callback: function() {
                                $('.bootbox').modal('hide');
                            }
                        },
                        danger: {
                            label: "Delete!",
                            className: "btn-danger",
                            callback: function() {
                                $.ajax({
                                        type: 'post',
                                        url: 'delete.php',
                                        data: 'id=' + id
                                    })
                                    .done(function(response) {
                                        //bootbox.alert(response);
                                        parent.fadeOut('slow');
                                    })
                                    .fail(function() {
                                        bootbox.alert('Error....');
                                    })
                            }
                        }
                    }
                });
            });
        });

        $(document).ready(function() {
            $("button#submit").click(function() {
                $.ajax({
                    type: "POST",
                    url: "actor.php",
                    data: $('form.feedback').serialize(),
                    success: function(message) {

                        $("#feedback").html(message)
                        $("#feedback-modal").modal('hide');
                    },
                    error: function() {
                        alert("Error");
                    }
                });
            });
        });


        $(document).ready(function() {
            $("button#submit1").click(function() {
                $.ajax({
                    type: "POST",
                    url: "genre.php",
                    data: $('form.feedback1').serialize(),
                    success: function(message) {

                        $("#feedback1").html(message)
                        $("#feedback-modal1").modal('hide');
                    },
                    error: function() {
                        alert("Error");
                    }
                });
            });
        });
    </script>
    <style type="text/css">
        .wrapper {
            width: 650px;
            margin: 0 auto;
        }

        .page-header h2 {
            margin-top: 0;
        }

        table tr td:last-child a {
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <button id="feedback" type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedback-modal">Add Actors</button>
                        <div id="feedback-modal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <a class="close" data-dismiss="modal">×</a>
                                    </div>
                                    <div class="modal-body">
                                        <form class="feedback" name="feedback">
                                            <strong>Name</strong>
                                            <br />
                                            <input type="text" name="name" value="" class="input-xlarge">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-success" id="submit">Send</button>
                                        <a href="#" class="btn" data-dismiss="modal">Close</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button id="feedback1" type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedback-modal1">Add Genre</button>
                        <div id="feedback-modal1" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <a class="close" data-dismiss="modal">×</a>
                                    </div>
                                    <div class="modal-body">
                                        <form class="feedback1" name="feedback">
                                            <strong>Genre</strong>
                                            <br />
                                            <input type="text" name="name" value="" class="input-xlarge">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-success" id="submit1">Send</button>
                                        <a href="#" class="btn" data-dismiss="modal">Close</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="create.php" class="btn btn-success pull-right">Add Movie</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";


                    // Attempt select query execution

                    $sql = "SELECT * FROM movies";
                    if ($result = $mysqli->query($sql)) {
                        if ($result->num_rows > 0) {
                            echo "<table id='refresh' class='table table-bordered table-striped'>";
                            echo "<thead>";
                            echo "<tr>";
                            //echo "<th>#</th>";
                            echo "<th>Name</th>";
                            echo "<th>Actor</th>";
                            echo "<th>Year</th>";
                            echo "<th>Genre</th>";
                            echo "<th>Rating</th>";
                            echo "<th>Thumbnail</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = $result->fetch_array()) {

                                $actordrop = $mysqli->query("SELECT actor FROM actortable");
                                $genredrop = $mysqli->query("SELECT genre FROM genretable");

                                $name = $row['name'];
                                $year = $row['year'];
                                $rating = $row['rating'];
                                $id = $row['id'];
                                $nameid = "name_$id";
                                $nameedit = "nameedit_$id";
                                $yearid = "year_$id";
                                $yearedit = "yearedit_$id";
                                $ratingid = "rating_$id";
                                $ratingedit = "ratingedit_$id";
                                $actorid = "actor_$id";
                                $actoredit = "actoredit_$id";
                                $genreid = "genre_$id";
                                $genreedit = "genreedit_$id";
                                echo "<tr class='edit_tr' id='$id'>";




                                //echo "<td>" . $row['id'] . "</td>";
                                //echo "<td class='edit_td'>" . $row['name'] . "</td>";

                                echo "<td class='edit_td'>";
                                echo "<span id='$nameid' class='text'>";
                                echo $name;
                                echo "</span>";
                                echo "<input type='text' value='$name' class='editorbox' id='$nameedit'>";
                                echo "</td>";






                                //something gonna happen here



                                echo "<td class='edit_td'>";
                                $sql1 = "SELECT thevalue FROM actorgenre WHERE movieid= '$id' AND selector='actor'";

                                echo "<span id='$actorid' class='text'>";

                                if ($result1 = $mysqli->query($sql1)) {


                                    if ($result1->num_rows > 0) {
                                        while ($row1 = $result1->fetch_array()) {
                                            echo $row1['thevalue'];
                                            echo "<br>";
                                        }

                                        // Free result set
                                        $result1->free();
                                    }
                                }
                                echo "</span>";

                                //echo "<input type='number' value='$year' min='1600' max='2019' class='editorbox' id='$yearedit'>";

                                echo "<select name='actor[]' class='editorbox' id='$actoredit' multiple required>";

                                while ($rows = $actordrop->fetch_assoc()) {

                                    $actor = $rows['actor'];
                                    echo "<option value='$actor'>$actor</option>";
                                }



                                echo "</select>";

                                echo "</td>";










                                // echo "<td class='edit_td'>" . $row['year'] . "</td>";

                                echo "<td class='edit_td'>";
                                echo "<span id='$yearid' class='text'>";
                                echo $year;
                                echo "</span>";
                                echo "<input type='number' value='$year' min='1600' max='2019' class='editorbox' id='$yearedit'>";
                                echo "</td>";


                                //something gonna happen here2
                                echo "<td class='edit_td'>";
                                $sql2 = "SELECT thevalue FROM actorgenre WHERE movieid= '$id' AND selector='genre'";
                                //echo $sql2;
                                echo "<span id='$genreid' class='text'>";

                                if ($result2 = $mysqli->query($sql2)) {


                                    if ($result2->num_rows > 0) {
                                        while ($row2 = $result2->fetch_array()) {
                                            echo $row2['thevalue'];
                                            echo "<br>";
                                        }

                                        // Free result set
                                        $result2->free();
                                    }
                                }
                                echo "</span>";

                                echo "<select name='genre[]' class='editorbox' id='$genreedit' multiple required>";

                                while ($rows = $genredrop->fetch_assoc()) {
                                    $genre = $rows['genre'];
                                    echo "<option value='$genre'>$genre</option>";
                                }

                                echo "</select>";

                                echo "</td>";



                                echo "<td class='edit_td'>";
                                echo "<span id='$ratingid' class='text'>";
                                echo $rating;
                                echo "</span>";
                                echo "<input type='number' value='$rating' min='1' max='10' class='editorbox' id='$ratingedit'>";
                                echo "</td>";



                                echo "<td><img src=\"" . $row['thumbnail'] . "\" width=\"100px\"/></td>";
                                echo "<td>";

                                echo "<a href='update.php?id=" . $row['id'] . "' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                //echo "<a href='#feedback-modal2' id='feedback2' data-toggle= 'modal' title='Delete Record' ><span class='glyphicon glyphicon-trash'></span></a>";
                                $id = $row['id'];
                                echo "<a id='$id' href='#' title='Delete Record' class='deleterecord'><span class='glyphicon glyphicon-trash'></span></a>";
                                //  <button id="feedback1" type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedback-modal1">Add Genre</button>
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            $result->free();
                        } else {
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else {
                        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                    }



                    // Close connection
                    $mysqli->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>