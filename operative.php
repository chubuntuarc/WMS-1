<?php require("session_check.php");error_reporting(0); setlocale(LC_ALL,”es_ES”); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Operativos</title>
    <link rel="shortcut icon" href="logotdr-min.png">
    <link rel="apple-touch-icon" sizes="57x57" href="tdr-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="tdr-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="tdr-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="tdr-icon-144x144.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
    <!--<link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/stats.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/gallery.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
    </head>
<body>

    <?php include("navigation.php"); ?>

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

    <section class="hero is-info" <?php if($grant == 0){echo "style='display:none;'";} ?>>
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Operativos
                </h1>
                <h2 class="subtitle">
                    Listado de operativos SAE.
                </h2>
            </div>
        </div>
    </section>

    <br><br>

    <section class="container" <?php if($grant == 0){echo "style='display:none;'";} ?>>
        <div class="columns">
            <div class="column">
                <table class="table is-hoverable" id="grid">
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
                            }elseif ($row['status'] == 2) {
                                echo '<td>Pendiente</td>';
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
    </section>

    <br><br>

    <?php include("footer.php"); ?>

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
