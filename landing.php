<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/bootboxmin.js"></script>
    <script>
        //Data Tables
        // $(document).ready(function() {
        //     $('#refresh').DataTable();
        // });


        //Edit


        $(document).ready(function() {
            home();

        });
        var home = () => {
            $("#hereitgoes").load("tableload.php");
        }



       

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
                    <div id="hereitgoes"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>