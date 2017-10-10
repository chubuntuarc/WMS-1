<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>WMS | Inventario</title>
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <!-- CSS Reset -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <!-- Milligram CSS minified -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <link rel="stylesheet" href="css/master.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="column">
                <h5 class="mainTitle"><a href="index.php">WMS</a> | Inventario</h5>
                <hr>
            </div>
            <div class="column">
                <div class="column menuOptions">
                    <a href="in.php">Nueva entrada</a> --
                    <a href="out.php">Nueva salida</a> --
                    <a href="#!">Exportar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <form class="searchBox">
                    <fieldset>
                        <input type="text" placeholder="Buscar.." id="nameField">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <hr>

    <div class="container">
        <div class="row">
            <div class="column">
                <?php
                //tomamos los datos del archivo conexion.php
                require("connect.php");
                $sql = "SELECT w.id_product, w.product_name, c.name as categoria, w.location, l.name as location FROM warehouse w LEFT JOIN categories c ON w.category = c.id_category LEFT JOIN locations l ON w.location = l.id_location";
                //se envia la consulta
                $result=$mysqli->query($sql);
                $rows = $result->num_rows;
                    //se despliega el resultado
                    echo '<table>';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Código</th>';
                    echo '<th>Descripción</th>';
                    echo '<th>Categoría</th>';
                    echo '<th>Ubicación</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr>';
                        echo '<td><a href="detail.php">'.$row['id_product'].'</a></td>';
                        echo '<td>'.$row['product_name'].'</td>';
                        echo '<td>'.$row['categoria'].'</td>';
                        echo '<td>'.$row['location'].'</td>';
                        echo '</tr>';
                    }
                    echo '<tr>';
                    echo '<td><a href="detail.php">25017007</a></td>';
                    echo '<td>ARA25017007</td>';
                    echo '<td>Camioneta</td>';
                    echo '<td>Fila 1</td>';
                    echo '</tr>';
                    echo '</tbody>';
                    echo '</table>';
                    ?>
                </div>
            </div>
        </div>

    </body>
    </html>
