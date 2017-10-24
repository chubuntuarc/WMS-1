<?php
session_start();
if($_SESSION["user_id"] == 0){
    header("Location: login.php");
}
$rol = $_SESSION["rol"];
switch ($rol) {
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

$comment1 = '';
$comment2 = '';
$comment3 = '';
$comment_count = 1;


$id = intval($_GET['code']);
require("connect.php");
$sql = "SELECT product_name, comments, pic1, pic2, pic3, pic4, pic5, pic6, coffer, driver, left_door, trunk, right_door, codriver, fuel, o.id_operative as operativo, w.status, w.serial, w.comment1 , w.comment1_date, w.comment1_pic, w.comment2 , w.comment2_date, w.comment2_pic, w.comment3 , w.comment3_date, w.comment3_pic, w.exit_comments, w.enter_date, w.exit_date FROM warehouse w LEFT JOIN operative o ON w.operative = o.id WHERE id_product = $id";
$result=$mysqli->query($sql);
$rows = $result->num_rows;
while($row = mysqli_fetch_assoc($result)){
    $enter = $row['enter_date'];
   $exit = $row['exit_date'];
    $name = $row['product_name'];
    $comments = $row['comments'];
    $exit_comments = $row['exit_comments'];
    $comment1 = $row['comment1'];
    $comment1_date = $row['comment1_date'];
    $comment1_pic = $row['comment1_pic'];
    $comment2 = $row['comment2'];
    $comment2_date = $row['comment2_date'];
    $comment2_pic = $row['comment2_pic'];
    $comment3 = $row['comment3'];
    $comment3_date = $row['comment3_date'];
    $comment3_pic = $row['comment3_pic'];
    $pic1 = $row['pic1'];
    $pic2 = $row['pic2'];
    $pic3 = $row['pic3'];
    $pic4 = $row['pic4'];
    $pic5 = $row['pic5'];
    $pic6 = $row['pic6'];
    $status = $row['status'];
    $serial = $row['serial'];
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
                                <title>TDR | Detalle de inventario</title>
                                <!-- Google Fonts -->
                                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
                                <!-- CSS Reset -->
                                <link rel="stylesheet" href="https://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
                                <!-- Milligram CSS minified -->
                                <link rel="stylesheet" href="https://cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                                <link rel="stylesheet" href="css/master.css">
                                <link rel="stylesheet" href="css/modal.css">
                                <link rel="stylesheet" href="css/gallery.css">
                            </head>
                            <body>

                                <div class="container">
                                    <div class="row">
                                        <div class="column">
                                            <h5 class="mainTitle"><a href="index.php">TDR</a> | Detalle de inventario</h5>
                                            <hr>
                                        </div>
                                        <div class="column">
                                            <div class="column menuOptions">
                                                <a <?php if($rol == 5){echo "style='display:none;'";} ?> href="index.php">Inventario</a>
                                                <a <?php if($rol == 5){echo "style='display:none;'";} ?>  href="layout.php"> -- Layout </a>
                                                <a <?php if($rol == 5){echo "style='display:none;'";} ?>  href="operative.php">-- Operativos </a>
                                                <a <?php if($rol != 5){echo "style='display:none;'";} ?>  href="operative.php">Operativos </a>

                                                <!-- <a href="in.php">Nueva entrada</a> -- -->
                                                <a <?php if($rol == 5){echo "style='display:none;'";} ?> href="binnacle.php">-- Bitácora</a>
                                                <form class="" action="logout.php" method="post">
                                                    <input style="position:relative;left:80%;top:-32px;margin-bottom:-30px;" class="button button-clear" type="submit" name="logout" value="Salir">
                                                </form>
                                            </div>
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
                                            <div class="row">
                                                <div class="column">
                                                    <h2><?php echo $id; ?></h2>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="column">
                                                    <p><?php echo $name; ?></p>
                                                    <p style="font-size:12px;margin-top:-20px;"><?php echo "NS: " . $serial; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="column">
                                                    <blockquote>
                                                        <p><em><?php echo $comments; ?></em></p>
                                                    </blockquote>
                                                    <?php echo "<p>".$operativo."</p>"; ?>
                                                    <?php if($enter != 0){echo "<p style='font-size:13px;margin-top:-15px;'>Entrada ".$enter."</p>";} ?>
                                                    <?php if($exit != 0){echo "<p style='font-size:13px;margin-top:-20px;'>Salida ".$exit."</p>";} ?>
                                                    <?php if($status == 0 && $rol == 1 || $status == 9 && $rol == 1 || $status == 0 && $rol == 3 || $status == 9 && $rol == 5){echo "<a href='ticket.php?code=$id' style='font-size:13px;'>Generar etiqueta </a></br>";} ?>
                                                    <?php if($status == 0 && $rol == 1 || $status == 9 && $rol == 1 || $status == 0 && $rol == 3){echo '<a  class="modal-opener" style="font-size:13px;" href="out.php?code='.$id.'">Nuevo evento</a></br>';} ?>
                                                    <?php if($status == 9 && $rol == 5){echo '<a  class="modal-opener" style="font-size:13px;" href="out.php?code='.$id.'">Salida de operativo</a></br>';} ?>
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
                                                            echo "<div style='z-index:900;' class='pic pic-4'><img src='".$pic4."' /></div>";
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

                                <div class="container"  <?php if($grant == 0){echo "style='display:none;'";} ?>>
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
                                    <div class="row" <?php if($comment1 == '' && $exit_comments == '' && $status == 0 || $status == 9){echo "style='display:none;'";} ?>>
                                        <div class="column">
                                            <h5>Registro de eventos</h5>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Fecha</th>
                                                        <th>Cliente</th>
                                                        <th>Comentarios</th>
                                                        <th>Fotos</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <?php
                                                        $sql = "SELECT exit_date , client, exit_comments, exit_pic, comment1, comment1_date, comment1_pic,  comment2, comment2_date, comment2_pic,  comment3, comment3_date, comment3_pic FROM warehouse WHERE id_product = " . $id;
                                                        $result=$mysqli->query($sql);
                                                        $rows = $result->num_rows;
                                                        while($row = mysqli_fetch_assoc($result)){
                                                            if($row['comment1'] != ''){
                                                                echo '<tr>';
                                                                echo '<td>'.$row['comment1_date'].'</td>';
                                                                echo '<td></td>';
                                                                echo '<td>'.$row['comment1'].'</td>';
                                                                echo '<td><img src="'.$row['comment1_pic'].'" height="100px" width="150px" style="box-shadow:2px 2px 4px grey"></td>';
                                                                echo '</tr>';
                                                            }
                                                            if($row['comment2'] != ''){
                                                                echo '<tr>';
                                                                echo '<td>'.$row['comment2_date'].'</td>';
                                                                echo '<td></td>';
                                                                echo '<td>'.$row['comment2'].'</td>';
                                                                echo '<td><img src="'.$row['comment2_pic'].'" height="100px" width="150px" style="box-shadow:2px 2px 4px grey"></td>';
                                                                echo '</tr>';
                                                            }
                                                            if($row['comment3'] != ''){
                                                                echo '<tr>';
                                                                echo '<td>'.$row['comment3_date'].'</td>';
                                                                echo '<td></td>';
                                                                echo '<td>'.$row['comment3'].'</td>';
                                                                echo '<td><img src="'.$row['comment3_pic'].'" height="100px" width="150px" style="box-shadow:2px 2px 4px grey"></td>';
                                                                echo '</tr>';
                                                            }
                                                            if($row['exit_comments'] != ''){
                                                                echo '<tr>';
                                                                echo '<td>'.$row['exit_date'].'</td>';
                                                                echo '<td>'.$row['client'].'</td>';
                                                                echo '<td>'.$row['exit_comments'].'</td>';
                                                                echo '<td><img src="'.$row['exit_pic'].'" height="100px" width="150px" style="box-shadow:2px 2px 4px grey"></td>';
                                                                echo '</tr>';
                                                            }
                                                        }
                                                         ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="global-modal">
                                    <div class="overlay"></div>
                                    <div class="global-modal_contents modal-transition">
                                        <div class="global-modal-header">
                                            <span class="mobile-close"> X </span>
                                            <h4 style="text-align:center;margin-top:10px;margin-bottom:10px;">Registrar nuevo evento</h4>
                                        </div>
                                        <div class="global-modal-body" style="padding-left:30px;padding-right:30px;margin-top:20px;">
                                            <form class="" action="picture_upload.php" method="post" enctype="multipart/form-data">
                                                <fieldset>
                                                    <?php
                                                    if($comment2 == ''){
                                                        $comment_count = 1;
                                                    }elseif ($comment3 == '' ) {
                                                        $comment_count = 2;
                                                    }else{
                                                        $comment_count = 3;
                                                    } ?>
                                                    <input type="hidden" name="id" <?php echo "value='$id'"; ?>>
                                                    <input type="hidden" name="comment_count" <?php echo "value='$comment_count'"; ?>>
                                                    <label for="nameField">Cliente</label>
                                                    <input type="text" name="client" placeholder="Nombre del cliente" id="nameField" <?php if($comment_count == 3){echo "required";} ?>>
                                                    <label for="commentField">Comentarios</label>
                                                    <textarea placeholder="Registrar comentarios del evento" id="commentField" name="comments" required></textarea>
                                                    <label for="fileToUpload">Foto evidencia</label>
                                                    <input type="file" name="photo" id="fileToUpload" required>
                                                    <br><br>
                                                    <div class="float-right">
                                                      <input type="checkbox" id="confirmField" name="exit" <?php if($comment_count == 3){echo "checked";} ?>>
                                                      <label class="label-inline" for="confirmField">Registrar como salida de inventario</label>
                                                    </div>
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

                            </body>
                            </html>

                            <script type="text/javascript">
                            var globalModal = $('.global-modal');
                            $( ".modal-opener" ).on( "click", function(e) {
                                e.preventDefault();
                                $( globalModal ).toggleClass('global-modal-show');
                            });
                            $( ".overlay" ).on( "click", function() {
                                $( globalModal ).toggleClass('global-modal-show');
                            });
                            $( ".global-modal_close" ).on( "click", function() {
                                $( globalModal ).toggleClass('global-modal-show');
                            });
                            $(".mobile-close").on("click", function(){
                                $( globalModal ).toggleClass('global-modal-show');
                            });
                            </script>


                            <script type="text/javascript">
                            $('.pic').bind('click', function() {
                                $('.pic').toggleClass('away');
                                $(this).removeClass('away').toggleClass('active');
                            });
                            </script>
