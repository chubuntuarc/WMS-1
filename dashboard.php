<?php
require("session_check.php");error_reporting(0); setlocale(LC_ALL,”es_ES”);
require("connect.php");
$sql = "SELECT COUNT(*) as cantidad, (SELECT COUNT(*) FROM warehouse WHERE status = 0 AND category = 1) as autos,
(SELECT COUNT(*) FROM warehouse WHERE status = 0 AND category = 2) as camionetas,
(SELECT COUNT(*) FROM warehouse WHERE status = 0 AND category = 3) as tractos,
(SELECT COUNT(*) FROM warehouse WHERE status = 0 AND category = 4) as remolques,
(SELECT COUNT(*) FROM warehouse WHERE status = 0 AND category = 5) as montacargas,
(SELECT COUNT(*) FROM warehouse WHERE status = 0 AND category = 6) as chatarra,
(SELECT COUNT(*) FROM warehouse WHERE status = 0 AND category = 7) as maquinaria,
(SELECT COUNT(*) FROM warehouse WHERE status = 0 AND category = 8) as cajas,
(SELECT COUNT(*) FROM warehouse WHERE status = 0 AND category = 9) as otros,
(SELECT COUNT(*) FROM warehouse WHERE status = 0 AND category = 10) as contenedor,
(SELECT COUNT(*) FROM warehouse WHERE status = 0 AND category = 11) as camion
FROM warehouse WHERE status = 0";
$result=$mysqli->query($sql);
$rows = $result->num_rows;
while($row = mysqli_fetch_assoc($result)){
    $cantidad = $row["cantidad"];
    $autos = $row["autos"];
    $camionetas = $row["camionetas"];
    $tractos = $row["tractos"];
    $remolques = $row["remolques"];
    $montas = $row["montacargas"];
    $chatarra = $row["chatarra"];
    $maquinaria = $row["maquinaria"];
    $cajas = $row["cajas"];
    $otros = $row["otros"];
    $contenedor = $row["contenedor"];
    $camion = $row["camion"];
}
$porcentaje = number_format(($cantidad * 100 ) / 480 , 2, '.', '');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel de control</title>
    <link rel="shortcut icon" href="logotdr-min.png">
    <link rel="apple-touch-icon" sizes="57x57" href="tdr-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="tdr-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="tdr-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="tdr-icon-144x144.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
    <!--<link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/stats.css">-->
</head>
<body>
    <?php include("navigation.php"); ?>

    <section class="hero is-info">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Panel de control
                </h1>
                <h2 class="subtitle">
                    Vista general del almacén
                </h2>
            </div>
        </div>
    </section>

    <br>

    <section>
        <nav class="level">
            <div class="level-item has-text-centered">
                <div>
                    <h4>Ocupación en patio</h4>
                    <p style="font-size:10px;">Porcentaje estimado</p>
                    <h2 class="title"><a href="layout.php"><?php echo $porcentaje; ?>%</a></h2>
                    <p style="font-size:8px;">Calculo en base a la capacidad estimada de 480 vehiculos.</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <h4>Cantidad de vehículos</h4>
                    <p style="font-size:10px;">Inventario total en patio</p>
                    <h2 class="title"><a href="index.php"><?php echo $cantidad; ?></a></h2>
                    <p style="font-size:8px;">Inventario total registrado en patio de resguardo.</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <h4>Vehículos por tipo</h4>
                    <p style="font-size:10px;">Clasificación en base a tipo de vehículo</p>
                    <p <?php if($autos == 0){echo 'style="display:none;"';}?>><a href="#"><?php echo $autos; ?></a><span> <?php if($autos >= 2){echo "Autos";}else{echo "Auto";} ?></span></p>
                        <p <?php if($camionetas == 0){echo 'style="display:none;"';}?>><a href="#"><?php echo $camionetas ?></a><span> <?php if($camionetas >= 2){echo "Camionetas";}else{echo "Camioneta";} ?></span></p>
                            <p <?php if($camion == 0){echo 'style="display:none;"';} ?>><a href="#"><?php echo $camion ?></a><span> <?php if($camion >= 2){echo "Camiones";}else{echo "Camión";} ?></span></p>
                                <p <?php if($montas == 0){echo 'style="display:none;"';} ?>><a href="#"><?php echo $montas ?></a><span> Montacargas</span></p>
                                    <p <?php if($tractos == 0){echo 'style="display:none;"';} ?>><a href="#"><?php echo $tractos ?></a><span> <?php if($tractos >= 2){echo "Tractocamiones";}else{echo "Tractocamion";} ?></span></p>
                                        <p <?php if($cajas == 0){echo 'style="display:none;"';} ?>><a href="#"><?php echo $cajas ?></a><span> <?php if($cajas >= 2){echo "Cajas secas";}else{echo "Caja seca";} ?></span></p>
                                            <p <?php if($contenedor == 0){echo 'style="display:none;"';} ?>><a href="#"><?php echo $contenedor ?></a><span> <?php if($contenedor >= 2){echo "Contenedores de carga";}else{echo "Contenedor de carga";} ?></span></p>
                                                <p <?php if($remolques == 0){echo 'style="display:none;"';} ?>><a href="#"><?php echo $remolques ?></a><span> <?php if($remolques >= 2){echo "Remolques";}else{echo "Remolque";} ?></span></p>
                                                    <p <?php if($chatarra == 0){echo 'style="display:none;"';} ?>><a href="#"><?php echo $chatarra ?></a><span> <?php if($chatarra >= 2){echo "Chatarras";}else{echo "Chatarra";} ?></span></p>
                                                        <p <?php if($maquinaria == 0){echo 'style="display:none;"';} ?>><a href="#"><?php echo $maquinaria ?></a><span> <?php if($maquinaria >= 2){echo "Maquinas";}else{echo "Maquina";} ?></span></p>
                                                            <p <?php if($otros == 0){echo 'style="display:none;"';} ?>><a href="#"><?php echo $otros ?></a><span> <?php if($otros >= 2){echo "Otros";}else{echo "Otro";} ?></span></p>
                                                                <p style="font-size:8px;">Clasificación en base a tipo de vehículo</p>
                                                            </div>
                                                        </div>
                                                    </nav>
                                                </section>

                                                <br><hr>

                                                <section class="container">
                                                    <h3>Entradas</h3>
                                                    <table class="table is-hoverable" id="grid">
                                                        <thead>
                                                            <tr>
                                                                <th>BIEN</th>
                                                                <th>Descripción</th>
                                                                <th>Ubicacion</th>
                                                                <th>Fecha</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><a>2845434</a></td>
                                                                <td>Dodge RAM 1500 2002 Blanco</td>
                                                                <td>Fila 7</td>
                                                                <td>2017-10-25 12:30:00</td>
                                                            </tr><tr>
                                                                <td><a>2845434</a></td>
                                                                <td>Dodge RAM 1500 2002 Blanco</td>
                                                                <td>Fila 7</td>
                                                                <td>2017-10-25 12:30:00</td>
                                                            </tr><tr>
                                                                <td><a>2845434</a></td>
                                                                <td>Dodge RAM 1500 2002 Blanco</td>
                                                                <td>Fila 7</td>
                                                                <td>2017-10-25 12:30:00</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <a class="button is-info" href="in.php">Nueva entrada</a>
                                                </section>

                                                <hr>

                                                <section class="container">
                                                    <h3>Salidas</h3>
                                                    <table class="table is-hoverable" id="grid">
                                                        <thead>
                                                            <tr>
                                                                <th>BIEN</th>
                                                                <th>Descripción</th>
                                                                <th>Fecha</th>
                                                                <th>Cliente</th>
                                                                <th>Comentarios</th>
                                                                <th>Foto</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            //tomamos los datos del archivo conexion.php
                                                            $sql = "SELECT o.id_product, w.product_name, w.exit_date, w.client, w.exit_comments, w.exit_pic FROM warehouse w INNER JOIN outs o WHERE w.id_product = o.id_product ORDER BY o.id_out DESC LIMIT 5";
                                                            //se envia la consulta
                                                            $result=$mysqli->query($sql);
                                                            $rows = $result->num_rows;
                                                            while($row = mysqli_fetch_assoc($result)){
                                                                echo '<tr>';
                                                                echo '<td><a href="detail.php?code='.$row['id_product'].'">'.$row['id_product'].'</a></td>';
                                                                echo '<td>'.$row['product_name'].'</td>';
                                                                echo '<td>'.$row['exit_date'].'</td>';
                                                                echo '<td>'.$row['client'].'</td>';
                                                                echo '<td>'.$row['exit_comments'].'</td>';
                                                                echo '<td><img src="'.$row['exit_pic'].'" height="100px" width="150px" style="box-shadow:2px 2px 4px grey"></td>';
                                                                echo '</tr>';
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <a class="button is-info" href="out.php">Nueva salida</a>
                                                </section>

                                                <hr>

                                                <section class="container">
                                                    <h3>Próximos eventos</h3>
                                                    <table class="table is-hoverable" id="grid">
                                                        <thead>
                                                            <tr>
                                                                <th>Fecha</th>
                                                                <th>Descripción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            //tomamos los datos del archivo conexion.php
                                                            $sql = "SELECT b.id, b.event_date, b.description FROM diary b WHERE event_date >= CURDATE() ORDER BY id DESC LIMIT 10";
                                                            //se envia la consulta
                                                            $result=$mysqli->query($sql);
                                                            $rows = $result->num_rows;
                                                            while($row = mysqli_fetch_assoc($result)){
                                                                echo '<tr>';
                                                                echo '<td>'.$row['event_date'].'</td>';
                                                                echo '<td>'.$row['description'].'</td>';
                                                                echo '</tr>';
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <a class="button is-info" href="new_event.php">Nuevo evento</a>

                                                    <br><br>

                                                    <h4>Bitácora de eventos</h4>
                                                    <table class="table is-hoverable" id="grid">
                                                        <thead>
                                                            <tr>
                                                                <th>Fecha</th>
                                                                <th>Descripción</th>
                                                                <th>Ubicación</th>
                                                                <th>Responsable</th>
                                                                <th>Evidencia</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            //tomamos los datos del archivo conexion.php
                                                            require("connect.php");
                                                            $sql = "SELECT b.id, b.date, b.description, l.name as loca, u.name as usuario, b.picture FROM binnacle b LEFT JOIN users u ON b.user_id = u.clave LEFT JOIN locations l ON b.location = l.id_location ORDER BY b.date DESC LIMIT 5";
                                                            //se envia la consulta
                                                            $result=$mysqli->query($sql);
                                                            $rows = $result->num_rows;
                                                            while($row = mysqli_fetch_assoc($result)){
                                                                echo '<tr>';
                                                                echo '<td>'.$row['date'].'</td>';
                                                                echo '<td>'.$row['description'].'</td>';
                                                                echo '<td>'.$row['loca'].'</td>';
                                                                echo '<td>'.$row['usuario'].'</td>';
                                                                echo '<td><img style="height:60px;" src="'.$row['picture'].'" height="60px"></td>';
                                                                echo '</tr>';
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </section>


                                                <?php include("footer.php"); ?>


                                            </body>
                                            </html>
