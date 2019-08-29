<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/bootboxmin.js"></script>
    <script>
        $(document).ready(function() {
            $('.delete_employee').click(function(e) {
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
                                        bootbox.alert(response);
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
    </script>
</head>

<body>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once "config.php";
            $sql = "SELECT * FROM movies ";
            if ($result = $mysqli->query($sql)) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_array()) {



                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo " <td>";

                        $id = $row['id'];
                        echo $id;

                        echo "<a id='$id' href='#' title='Delete Record' class='delete_employee'><span class='glyphicon glyphicon-trash'></span></a>";
                        echo "</td>";
                        echo "</tr>";
                    }

                    // Free result set
                    $result->free();
                }
            }
            ?>


        </tbody>
    </table>
</body>

</html>