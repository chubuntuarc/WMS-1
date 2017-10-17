<?php
$result = $_GET['result'];

if(isset($_POST['submit'])){
        require("connect.php");
        $location = $_POST['location'];
        $description = $_POST['description'];

        $sql = "INSERT INTO binnacle(description, location, user_id) VALUES('".$description."', ".$location.", 1)";

        $result=$mysqli->query($sql);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>TDR | Nuevo registro bitácora</title>
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <!-- CSS Reset -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <!-- Milligram CSS minified -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <link rel="stylesheet" href="css/master.css">
    <!-- Exportar y manejar tablas -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>

    <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="column">
                <h5 class="mainTitle"><a href="index.php">TDR</a> | Registrar en bitácora</h5>
                <hr>
            </div>
            <div class="column">
                <div class="column menuOptions">
                    <a href="index.php">Inventario</a> --
                    <a href="operative.php">Operativos</a> --
                    <a href="in.php">Nueva entrada</a> --
                    <a href="binnacle.php">Bitácora</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="column">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="column">
                <?php
                if($result == 'ok'){
                    echo "<blockquote>";
                    echo "<p><em>Registro ingresado correctamente</em></p>";
                    echo "</blockquote>";
                }
                 ?>
                <form method="post">
                    <fieldset>
                        <label for="nameField">Responsable</label>
                        <input type="text" placeholder="Sergio Lira" id="nameField" disabled>
                        <label>Ubicación</label>
                        <select name="location">
                            <option value="10">Almacén</option>
                            <option value="11">Patio</option>
                        </select>
                        <label for="commentField">Descripción</label>
                        <textarea name="description" placeholder="Escribir actividad a registrar"></textarea>
                        <input class="button-primary" name="submit" type="submit" value="Registrar">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript">
    $( document ).ready(function() {
        $('#grid').DataTable({
            "processing": true,
            "dom": 'lBfrtip',
            "buttons": [
                {
                    extend: 'collection',
                    text: 'Exportar',
                    buttons: [
                        'copy',
                        'excel',
                        'csv',
                        'pdf',
                        'print'
                    ]
                }
            ],
            "oLanguage": {
                "sSearch": "",
                "sLengthMenu": "Ver _MENU_ ",
                'sSearchPlaceholder': 'Buscar...',
                "oPaginate":{
                    "sPrevious" : "Anterior",
                    "sNext" : "Siguiente"
                },
                "sInfo": "Mostrando _START_ al _END_ de _TOTAL_ registros",
            },
            "dataTables_filter" {
                "display": "none"
            }
        });
    });
    </script>

</body>
</html>
