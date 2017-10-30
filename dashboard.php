<?php
session_start();
if($_SESSION["user_id"] == 0){
    header("Location: login.php");
}
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
    header("Location: operative.php");
    break;
    case 7:
    header("Location: binnacle.php");
    break;
    default:
    $grant = 0;
    break;
}

require("connect.php");
$sql = "SELECT COUNT(*) as cantidad, (SELECT COUNT(*) FROM warehouse WHERE status = 0 AND category = 1) as autos,
(SELECT COUNT(*) FROM warehouse WHERE status = 0 AND category = 2) as camionetas,
(SELECT COUNT(*) FROM warehouse WHERE status = 0 AND category = 3) as tractos,
(SELECT COUNT(*) FROM warehouse WHERE status = 0 AND category = 4) as remolques,
(SELECT COUNT(*) FROM warehouse WHERE status = 0 AND category = 5) as montacargas,
(SELECT COUNT(*) FROM warehouse WHERE status = 0 AND category = 6) as chatarra,
(SELECT COUNT(*) FROM warehouse WHERE status = 0 AND category = 7) as maquinaria,
(SELECT COUNT(*) FROM warehouse WHERE status = 0 AND category = 8) as cajas
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
}
$porcentaje = number_format(($cantidad * 100 ) / 492 , 2, '.', '');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>TDR | Panel de control</title>
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <!-- CSS Reset -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <!-- Milligram CSS minified -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/stats.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="column">
                <h5 class="mainTitle"><a href="dashboard.php">TDR</a> | Panel de control</h5>
                <hr>
            </div>
            <div class="column">
                <div class="column menuOptions">
                    <a href="index.php">Inventario </a>
                    <a href="index2.php">-- Inventario Completo </a>
                    <a href="layout.php">-- Layout</a>
                    <a href="operative.php">-- Operativos</a>
                    <!-- <a href="in.php">Nueva entrada</a> -- -->
                    <a href="binnacle.php"> -- Bitácora</a>
                    <form class="" action="logout.php" method="post">
                        <input style="position:relative;left:80%;top:-32px;margin-bottom:-30px;" class="button button-clear" type="submit" name="logout" value="Salir">
                    </form>
                    <!-- <a href="settings.php">Ajustes</a> -->
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
                <h4>Ocupación en patio</h4>
                <p style="font-size:13px;margin-top:-20px;">Porcentaje estimado</p>
                <h2><a href="layout.php"><?php echo $porcentaje; ?>%</a></h2>
                <p style="font-size:10px;">Calculo en base a la capacidad estimada de 492 vehiculos.</p>
            </div>
            <div class="column">
                <h4>Cantidad de vehículos</h4>
                <p style="font-size:13px;margin-top:-20px;">Inventario total en patio</p>
                <h2><a href="index.php"><?php echo $cantidad; ?></a></h2>
                <p style="font-size:10px;">Inventario total registrado en patio de resguardo.</p>
            </div>
            <div class="column">
                <h4>Vehículos por tipo</h4>
                <p style="font-size:13px;margin-top:-20px;">Clasificación en base a tipo de vehículo</p>
                <p <?php if($autos == 0){echo 'style="margin-top:-20px;display:none;"';}else{echo 'style="margin-top:-20px;"';} ?>><a href="#"><?php echo $autos; ?></a><span> <?php if($autos >= 2){echo "Autos";}else{echo "Auto";} ?></span></p>
                <p <?php if($camionetas == 0){echo 'style="margin-top:-20px;display:none;"';}else{echo 'style="margin-top:-20px;"';} ?>><a href="#"><?php echo $camionetas ?></a><span> <?php if($camionetas >= 2){echo "Camionetas";}else{echo "Camioneta";} ?></span></p>
                <p <?php if($montas == 0){echo 'style="margin-top:-20px;display:none;"';}else{echo 'style="margin-top:-20px;"';} ?>><a href="#"><?php echo $montas ?></a><span> Montacargas</span></p>
                <p <?php if($tractos == 0){echo 'style="margin-top:-20px;display:none;"';}else{echo 'style="margin-top:-20px;"';} ?>><a href="#"><?php echo $tractos ?></a><span> <?php if($tractos >= 2){echo "Tractocamiones";}else{echo "Tractocamion";} ?></span></p>
                <p <?php if($cajas == 0){echo 'style="margin-top:-20px;display:none;"';}else{echo 'style="margin-top:-20px;"';} ?>><a href="#"><?php echo $cajas ?></a><span> <?php if($cajas >= 2){echo "Cajas secas";}else{echo "Caja seca";} ?></span></p>
                <p <?php if($remolques == 0){echo 'style="margin-top:-20px;display:none;"';}else{echo 'style="margin-top:-20px;"';} ?>><a href="#"><?php echo $remolques ?></a><span> <?php if($remolques >= 2){echo "Remolques";}else{echo "Remolque";} ?></span></p>
                <p <?php if($chatarra == 0){echo 'style="margin-top:-20px;display:none;"';}else{echo 'style="margin-top:-20px;"';} ?>><a href="#"><?php echo $chatarra ?></a><span> <?php if($chatarra >= 2){echo "Chatarras";}else{echo "Chatarra";} ?></span></p>
                <p <?php if($maquinaria == 0){echo 'style="margin-top:-20px;display:none;"';}else{echo 'style="margin-top:-20px;"';} ?>><a href="#"><?php echo $maquinaria ?></a><span> <?php if($maquinaria >= 2){echo "Maquinas";}else{echo "Maquina";} ?></span></p>
            </div>

        </div>
        <div class="row" style="display:none;">
            <div class="column">
                <h3>Entradas</h3>
            </div>
            <div class="column">
                <h3>Salidas</h3>
            </div>
            <div class="column">
                <h3>Proximas</h3>
            </div>
            <div class="column">
                <h3>Operativos</h3>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <hr>
                <h4>Bitácora de seguridad</h4>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <table id="grid">
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
                        $sql = "SELECT b.id, b.date, b.description, l.name as loca, u.name as usuario, b.picture FROM binnacle b LEFT JOIN users u ON b.user_id = u.clave LEFT JOIN locations l ON b.location = l.id_location LIMIT 5";
                        //se envia la consulta
                        $result=$mysqli->query($sql);
                        $rows = $result->num_rows;
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<tr>';
                            echo '<td>'.$row['date'].'</td>';
                            echo '<td>'.$row['description'].'</td>';
                            echo '<td>'.$row['loca'].'</td>';
                            echo '<td>'.$row['usuario'].'</td>';
                            echo '<td><img src="'.$row['picture'].'" height="60px"></td>';
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


</body>
</html>
