<?php
session_start();
if($_SESSION["user_id"] == 0){
    header("Location: login.php");
}
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
        $grant = 1;
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
    <title>TDR | Operativos</title>
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
                <h5 class="mainTitle"><a href="index.php">TDR</a> | Operativos</h5>
                <hr>
            </div>
            <div class="column">
                <div class="column menuOptions">
                    <a <?php if($_SESSION["rol"] == 5){echo "style='display:none;'";} ?> href="index.php">Inventario</a>
                    <!-- <a href="in.php">Nueva entrada</a> -- -->
                    <a <?php if($_SESSION["rol"] == 5){echo "style='display:none;'";} ?>  href="binnacle.php">-- Bitácora</a>
                    &nbsp;<form class="" action="logout.php" method="post">
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

    <hr>

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
                <table id="grid">
                    <thead>
                        <tr>
                            <th>Operativo</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha de término</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //tomamos los datos del archivo conexion.php
                        require("connect.php");
                        $sql = "SELECT * FROM operative ORDER BY id_operative DESC";
                        //se envia la consulta
                        $result=$mysqli->query($sql);
                        $rows = $result->num_rows;
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<tr>';
                            echo '<td><a href="operative_detail.php?code='.$row['id_operative'].'&id='.$row['id'].'">'.$row['id_operative'].'</a></td>';
                            echo '<td>'.$row['initial_date'].'</td>';
                            echo '<td>'.$row['final_date'].'</td>';
                            if($row['status'] == 1){
                                echo '<td>Completo</td>';
                            }else{
                                echo '<td>En proceso</td>';
                            }

                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
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
            "order": [[ 0, "desc" ]],
            "oLanguage": {
                "sSearch": "",
                "sLengthMenu": "Ver _MENU_ ",
                'sSearchPlaceholder': 'Buscar...',
                "oPaginate":{
                    "sPrevious" : "Anterior",
                    "sNext" : "Siguiente"
                },
                "sInfo": "Mostrando _START_ al _END_ de _TOTAL_ registros",
            }
        });
    });
    </script>

</body>
</html>
