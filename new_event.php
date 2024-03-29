<?php
// Desactivar toda notificación de error
error_reporting(0);
$result = $_GET['result'];
$rol = $_SESSION["rol"];
$auth = '';

session_start();
switch ($_SESSION["rol"]) {
    case 0:
    $grant = 0;
    break;
    case 1:
    $grant = 1;
    break;
    case 3:
    $grant = 1;
    break;
    case 5:
    header("Location: operative.php");
    break;
    case 7:
    header("Location: binnacle.php");
    break;
    default:
    $grant = 0;
    break;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nuevo evento próximo</title>
    <link rel="shortcut icon" href="logotdr-min.png">
    <link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="apple-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="apple-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="apple-icon-144x144.png" />
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
                <h5 class="mainTitle"><a href="index.php">TDR</a> | Registrar evento próximo</h5>
                <hr>
            </div>
            <div class="column">
                <div class="column menuOptions">
                    <a href="index.php">Inventario -- </a>
                        <a  href="operative.php">Operativos -- </a>
                            <!-- <a href="in.php">Nueva entrada</a> -- -->
                            <a href="binnacle.php">Bitácora</a>
                                <form enctype="multipart/form-data" action="logout.php" method="post" >
                                    <input style="position:relative;left:80%;top:-32px;margin-bottom:-30px;" class="button button-clear" type="submit" name="logout" value="Salir">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                        </div>
                    </div>
                </div>

                <?php
                if($grant == 0){
                    echo "<div class='container' >";
                    echo "<div class='row' >";
                    echo "<div class='column' >";
                    echo "<h4>No cuentas con acceso a este módulo</h4>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>

                <div class="container" <?php if($grant == 0){echo "style='display:none;'";} ?>>
                    <div class="row">
                        <div class="column">
                            <form enctype="multipart/form-data" action="new_event_post.php" method="post" >
                                <fieldset>
                                    <label>Ubicación</label>
                                    <select name="location" required>
                                        <option value="10">Almacén</option>
                                        <option value="11">Patio</option>
                                    </select>
                                    <label for="commentField">Descripción</label>
                                    <textarea name="description" placeholder="Escribir actividad a registrar" required></textarea>
                                    <label for="dateField">Fecha</label>
                                    <input type="date" name="event_date" placeholder="Fecha del evento" id="dateField" required autocomplete="off">
                                    <!-- <label for="fileToUpload">Foto evidencia</label>
                                    <input type="file" name="photo" id="fileToUpload"> -->
                                    <label for="nameField">Responsable</label>
                                    <input type="text" name="personal" placeholder="Código de acceso" id="nameField" required autocomplete="off">
                                    <input class="button-primary" name="submit" type="submit" value="Registrar">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="column">
                            <br><br><hr>
                            <p style="font-size:10px;margin-top:-20px;">Desarrollado por <a href="http://proyectoalis.com">Jesus Arciniega</a> &copy; 2017</p>
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
