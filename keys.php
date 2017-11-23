<?php require("session_check.php");error_reporting(0); setlocale(LC_ALL,”es_ES”); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de llaves de vehiculos</title>
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
                    Llaves de vehiculos
                </h1>
                <h2 class="subtitle">
                    Asignación de llaves a vehiculos en patio.
                </h2>
            </div>
        </div>
    </section>

    <br><br>

    <section class="container">
        <h1 class="title">Vehiculos sin llave asignada</h1>
        <form class="" action="put_keys.php" method="post">
            <?php
            $sql = "SELECT id_product FROM warehouse WHERE car_key = 0 ORDER BY id_product ASC";
            $result=$mysqli->query($sql);
            $rows = $result->num_rows;
            while($row = mysqli_fetch_assoc($result)){
                echo '<label class="checkbox">';
                echo '<input name="key[]" type="checkbox" value="'.$row["id_product"].'">';
                echo $row["id_product"];
                echo '</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            }
             ?>
             <br><br><br>
             <input class="button is-primary" type="submit" value="Guardar registros">
        </form>
    </section>

    <br><br>

    <?php include("footer.php"); ?>

</body>
</html>
