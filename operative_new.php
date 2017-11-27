<?php require("session_check.php");error_reporting(0); setlocale(LC_ALL,”es_ES”); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar operativo</title>
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
                    Nuevo Operativo
                </h1>
                <h2 class="subtitle">
                    Registro de operativo de recepción de BIENES de SAE.
                </h2>
            </div>
        </div>
    </section>

    <br><br>

    <section class="container" <?php if($grant == 0){echo "style='display:none;'";} ?>>
        <div class="columns">
            <div class="column">
                <form class="" action="operative_save.php" enctype="multipart/form-data" method="post">
                    <?php
                    //tomamos los datos del archivo conexion.php
                    require("connect.php");
                    $sql = "SELECT id FROM operative ORDER BY id DESC LIMIT 1";
                    //se envia la consulta
                    $result=$mysqli->query($sql);
                    $rows = $result->num_rows;
                    while($row = mysqli_fetch_assoc($result)){
                        $value = $row['id'] + 1;
                        echo '<input name="operative_value" type="hidden" value="'.$value.'">';
                    }
                    ?>
                    <div class="field">
                        <label class="label">Nombre</label>
                        <div class="control">
                            <input name="id_operative" class="input" type="text" placeholder="Clave operativo">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Fecha de inicio</label>
                        <div class="control">
                            <input name="initial_date" class="input" type="date" placeholder="Clave operativo">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Fecha de término</label>
                        <div class="control">
                            <input name="final_date" class="input" type="date" placeholder="Clave operativo">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Cargar archivo</label>
                        <input id="archivo" accept=".csv" name="archivo" type="file" />
                        <input name="MAX_FILE_SIZE" type="hidden" value="20000" />
                    </div>
                     <input class="button is-primary" type="submit" value="Guardar operativo">
                </form>
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
