//Table Records

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> -->
    <script type="text/javascript">
        $(document).ready(function() {
            $(".editorbox").hide();
            $(".text").show();
            $(".edit_tr").click(function() {
                var ID = $(this).attr('id');
                //alert(ID);
                $("#woo_"+ID).hide();
                //alert("woo_"+ID);
                // $("#last_" + ID).hide();
                $("#laa_"+ID).show();
                //$("#last_input_" + ID).show();
            }).change(function() {
                var ID = $(this).attr('id');
                var name = $("#laa_"+ID).val();
                //var last = $("#last_input_" + ID).val();
                var dataString = 'id=' + ID + '&name=' + name;


                if (name.length > 0) {
                    // alert(ID);
                    alert(name);
                    //alert(dataString);
                    var dataobj = {
                        'id': ID,
                        'name': name
                    };
                    $.ajax({
                        type: "post",
                        url: "oops.php",
                        data: {
                            'id': ID,
                            'name': name
                        },
                        success: function(data) {
                            alert(data)
                            // if(data=='done'){
                            // alert('Eurekkaa');
                            // }
                            // else if(data=='dooo'){
                            //     alert('laa');
                            // }
                            // $("#first_" + ID).html(first);
                            // $("#last_" + ID).html(last);
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
            $(".editbox").mouseup(function() {
                return false
            });

            // Outside click action
            $(document).mouseup(function() {
                $(".editorbox").hide();
                $(".text").show();
            });

        });
    </script>
</head>
<table>
    <?php
    require_once "config.php";

    $sql = "SELECT * FROM movies ";
    if ($result = $mysqli->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $id = $row['id'];
                $name = $row['name'];


                echo "<tr class='edit_tr'  id='$id'>";
                $wooid= "woo_$id";
                $laaid= "laa_$id";
                //echo "<td>" . $row['name'] . "</td>";
                echo "<td class='edit_td'>";
                
                //echo $wooid;
                echo "<span id='$wooid' class='text'>";
                echo $name;
                echo "</span>";

                echo "<input type='text' value='$name' class='editorbox' id='$laaid'>";
                echo "</td>";


                echo " <td>";
                echo "<a id='$id' href='#' title='Delete Record' class='delete_employee'><span class='glyphicon glyphicon-trash'></span></a>";
                echo "</td>";
                echo " <td>";
                echo "<a id='$id' href='#' title='Update Record' class='update'><span class='glyphicon glyphicon-pencil'></span></a>";
                echo "</td>";


                echo "</tr>";
            }

            // Free result set
            $result->free();
        }
    }

    ?>

</table>