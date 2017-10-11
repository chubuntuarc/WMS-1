<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$id = intval($_GET['code']);
require("connect.php");
$sql = "SELECT product_name, comments, pic1, pic2, pic3, pic4, pic5, pic6, coffer, driver, left_door, trunk, right_door, codriver, fuel, o.id_operative as operativo FROM warehouse w LEFT JOIN operative o ON w.operative = o.id WHERE id_product = $id";
$result=$mysqli->query($sql);
$rows = $result->num_rows;
while($row = mysqli_fetch_assoc($result)){
    $name = $row['product_name'];
    $comments = $row['comments'];
    $pic1 = $row['pic1'];
    $pic2 = $row['pic2'];
    $pic3 = $row['pic3'];
    $pic4 = $row['pic4'];
    $pic5 = $row['pic5'];
    $pic6 = $row['pic6'];
    $operativo = $row['operativo'];
    switch ($row['coffer']) {
        case '0': $coffer = 'N/A'; break;
        case '1': $coffer = 'Despegado'; break;
        case '2': $coffer = 'Roto'; break;
        case '3': $coffer = 'Sin folio / sello'; break;
        default: $coffer = $row['coffer']; break; }
    switch ($row['driver']) {
        case '0': $driver = 'N/A'; break;
        case '1': $driver = 'Despegado'; break;
        case '2': $driver = 'Roto'; break;
        case '3': $driver = 'Sin folio / sello'; break;
        default: $driver = $row['driver']; break; }
    switch ($row['left_door']) {
        case '0': $left_door = 'N/A'; break;
        case '1': $left_door = 'Despegado'; break;
        case '2': $left_door = 'Roto'; break;
        case '3': $left_door = 'Sin folio / sello'; break;
        default: $left_door = $row['left_door']; break; }
    switch ($row['trunk']) {
        case '0': $trunk = 'N/A'; break;
        case '1': $trunk = 'Despegado'; break;
        case '2': $trunk = 'Roto'; break;
        case '3': $trunk = 'Sin folio / sello'; break;
        default: $trunk = $row['trunk']; break; }
    switch ($row['right_door']) {
        case '0': $right_door = 'N/A'; break;
        case '1': $right_door = 'Despegado'; break;
        case '2': $right_door = 'Roto'; break;
        case '3': $right_door = 'Sin folio / sello'; break;
        default: $right_door = $row['right_door']; break; }
    switch ($row['codriver']) {
        case '0': $codriver = 'N/A'; break;
        case '1': $codriver = 'Despegado'; break;
        case '2': $codriver = 'Roto'; break;
        case '3': $codriver = 'Sin folio / sello'; break;
        default: $codriver = $row['codriver']; break; }
    switch ($row['fuel']) {
        case '0': $fuel = 'N/A'; break;
        case '1': $fuel = 'Despegado'; break;
        case '2': $fuel = 'Roto'; break;
        case '3': $fuel = 'Sin folio / sello'; break;
        default: $fuel = $row['fuel']; break; }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>WMS | Detalle de inventario</title>
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <!-- CSS Reset -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <!-- Milligram CSS minified -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/gallery.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="column">
                <h5 class="mainTitle"><a href="index.php">WMS</a> | Detalle de inventario</h5>
                <hr>
            </div>
            <div class="column">
                <div class="column menuOptions">
                    <a href="operative.php">Operativos</a> --
                    <a href="index.php">Inventario</a> --
                    <a href="in.php">Nueva entrada</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="column">
                <div class="row">
                    <div class="column">
                        <h2><?php echo $id; ?></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <p><?php echo $name; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <blockquote>
                            <p><em><?php echo $comments; ?></em></p>
                        </blockquote>
                        <?php echo "<p>".$operativo."</p>"; ?>
                        <?php echo '<a style="font-size:13px;" href="out.php?code='.$id.'">Registrar salida</a>'; ?>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="row">
                    <div class="column">
                        <div class="frame">
                            <div class="pics">
                                <?php
                                echo "<div class='pic pic-1'><img src='".$pic1."' /></div>";
                                echo "<div class='pic pic-2'><img src='".$pic2."' /></div>";
                                echo "<div class='pic pic-3'><img src='".$pic3."' /></div>";
                                echo "<div class='pic pic-4'><img src='".$pic4."' /></div>";
                                echo "<div class='pic pic-5'><img src='".$pic5."' /></div>";
                                echo "<div class='pic pic-6'><img src='".$pic6."' /></div>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="container">
        <div class="row">
            <div class="column">
                <h5>Relación de sellos</h5>
                <table>
                    <thead>
                        <tr>
                            <th>Cofre</th>
                            <th>Conductor</th>
                            <th>Izquierdo</th>
                            <th>Cajuela</th>
                            <th>Derecho</th>
                            <th>Copiloto</th>
                            <th>Gasolina</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            echo '<td>'.$coffer.'</td>';
                            echo '<td>'.$driver.'</td>';
                            echo '<td>'.$left_door.'</td>';
                            echo '<td>'.$trunk.'</td>';
                            echo '<td>'.$right_door.'</td>';
                            echo '<td>'.$codriver.'</td>';
                            echo '<td>'.$fuel.'</td>';
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>


<script type="text/javascript">
$('.pic').bind('click', function() {
    $('.pic').toggleClass('away');
    $(this).removeClass('away').toggleClass('active');
});
</script>
