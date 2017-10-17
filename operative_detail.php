<?php
$id = $_GET['id'];
$code = $_GET['code'];
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>TDR | Detalle de operativo <?php echo $code; ?></title>
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
                <h5 class="mainTitle"><a href="index.php">TDR</a> | Operativo <?php echo $code; ?> </h5>
                <hr>
            </div>
            <div class="column">
                <div class="column menuOptions">
                    <a href="index.php">Inventario</a> --
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

    <hr>

    <div class="container">
        <div class="row">
            <div class="column">
                <table id="grid">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Categoría</th>
                            <th>Almacén</th>
                            <th>Ubicación</th>
                            <th>Entrada</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //tomamos los datos del archivo conexion.php
                        require("connect.php");
                        $sql = "SELECT w.id_product, w.product_name, c.name as categoria, (SELECT name FROM locations WHERE id_location =  w.warehouse) as warehouse, w.location, l.name as location, o.id_operative as operativo, w.enter_date FROM warehouse w LEFT JOIN categories c ON w.category = c.id_category LEFT JOIN locations l ON w.location = l.id_location LEFT JOIN operative o ON w.operative = o.id WHERE w.operative = $id";
                        //se envia la consulta
                        $result=$mysqli->query($sql);
                        $rows = $result->num_rows;
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<tr>';
                            echo '<td><a href="detail.php?code='.$row['id_product'].'">'.$row['id_product'].'</a></td>';
                            echo '<td>'.$row['product_name'].'</td>';
                            echo '<td>'.$row['categoria'].'</td>';
                            echo '<td>'.$row['warehouse'].'</td>';
                            echo '<td>'.$row['location'].'</td>';
                            echo '<td>'.$row['enter_date'].'</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
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
            }
        });
    });
    </script>

</body>
</html>
