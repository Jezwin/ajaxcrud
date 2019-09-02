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
    <script src="/addactorgenre.js"></script>
    <script>


        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#refresh tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });



        $(document).ready(function() {
            home();

        });
        var home = () => {
            $("#hereitgoes").load("tableload.php");
        }
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
                        <input type="text" id="myInput" placeholder="Search">

                        <a href="create.php" class="btn btn-success pull-right">Add Movie</a>
                    </div>
                    <div id="hereitgoes"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>