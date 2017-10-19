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
    default:
        $grant = 0;
        break;
}
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>TDR | Entrada de inventario</title>
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
                <h5 class="mainTitle"><a href="index.php">TDR</a> | Entrada de inventario</h5>
                <hr>
            </div>
            <div class="column">
                <div class="column menuOptions">
                    <a href="index.php">Inventario</a> --
                    <a href="ins.php">Entrada múltiple</a> --
                    <a href="binnacle.php">Bitácora</a>
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

    <div class="container"  <?php if($grant == 0){echo "style='display:none;'";} ?>>
        <div class="row">
            <div class="column">
                <h5>Datos generales</h5>
                <form>
                    <fieldset>
                        <label for="nameField">Código</label>
                        <input type="text" placeholder="No. BIEN" id="nameField">
                        <label for="nameField">Descripción</label>
                        <input type="text" placeholder="Descripción del producto" id="nameField">
                        <label for="ageRangeField">Tipo</label>
                        <select id="ageRangeField">
                            <option value="auto">Auto</option>
                            <option value="camioneta">Camioneta</option>
                            <option value="tracto">Tracto</option>
                            <option value="otro">Otro</option>
                        </select>
                        <label for="ageRangeField">Ubicación</label>
                        <select id="ageRangeField">
                            <option value="auto">Fila 1</option>
                            <option value="camioneta">Fila 2</option>
                            <option value="tracto">Fila 3</option>
                            <option value="otro">Fila 4</option>
                        </select>
                        <label for="nameField">Guardias</label>
                        <input type="text" placeholder="Nombre de los guardias en turno" id="nameField">
                        <label for="commentField">Comentarios</label>
                        <textarea placeholder="Notas sobre la recepción" id="commentField"></textarea>
                        <div class="float-right">
                            <input type="checkbox" id="confirmField">
                            <label class="label-inline" for="confirmField">¿Municipio?</label>
                        </div>
                        <img src="https://s2-f.scribdassets.com/images/upload/Upload_Upload.svg?1507325109" alt="" height="200px" width="200px">
                        <p>Subir imagenes</p>
                    </fieldset>
                </form>
            </div>
            <div class="column">
                <h5>Relación de sellos</h5>
                <form>
                    <fieldset>
                        <label for="nameField">Cofre</label>
                        <input type="text" placeholder="Folio cofre" id="nameField">
                        <label for="nameField">Conductor</label>
                        <input type="text" placeholder="Folio conductor" id="nameField">
                        <label for="nameField">Izquierdo</label>
                        <input type="text" placeholder="Folio izquierdo" id="nameField">
                        <label for="nameField">Cajuela</label>
                        <input type="text" placeholder="Folio cajuela" id="nameField">
                        <input type="text" placeholder="Folio izquierdo" id="nameField">
                        <label for="nameField">Derecho</label>
                        <input type="text" placeholder="Folio derecho" id="nameField">
                        <label for="nameField">Copiloto</label>
                        <input type="text" placeholder="Folio copiloto" id="nameField">
                        <label for="nameField">Gasolina</label>
                        <input type="text" placeholder="Folio gasolina" id="nameField">
                        <input class="button-primary" type="submit" value="Guardar">
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
