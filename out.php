<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>WMS | Salida de inventario</title>
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
                <h5 class="mainTitle"><a href="index.php">WMS</a> | Salida de inventario</h5>
                <hr>
            </div>
            <div class="column">
                <div class="column menuOptions">
                    <a href="index.php">Inventario</a> --
                    <a href="in.php">Nueva entrada</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="column">
                <h3>2780987 | Ford Mustang 2005 Negro</h3>
                <p>Este es un comentario que se realizo al vehiculo</p>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <img src="http://ford.elmejorcoche.com/comun/imagenes/3038/foto-ford-mustang-ocasion-42062_1.jpg" alt="" height="200px" width="100%">
            </div>
            <div class="column">
                <img src="http://ford.elmejorcoche.com/comun/imagenes/3038/foto-ford-mustang-ocasion-42062_1.jpg" alt="" height="200px" width="100%">
            </div>
            <div class="column">
                <img src="http://ford.elmejorcoche.com/comun/imagenes/3038/foto-ford-mustang-ocasion-42062_1.jpg" alt="" height="200px" width="100%">
            </div>
            <div class="column">
                <img src="http://ford.elmejorcoche.com/comun/imagenes/3038/foto-ford-mustang-ocasion-42062_1.jpg" alt="" height="200px" width="100%">
            </div>
        </div>
        <div class="row">
            <div class="column">
                <h5>Datos generales</h5>
                <form>
                    <fieldset>
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
                        <label for="nameField">Cliente</label>
                        <input type="text" placeholder="Nombre del cliente" id="nameField">
                        <label for="nameField">Guardias</label>
                        <input type="text" placeholder="Nombre de los guardias en turno" id="nameField">
                        <label for="commentField">Comentarios</label>
                        <textarea placeholder="Notas sobre la recepción" id="commentField"></textarea>
                    </fieldset>
                </form>
            </div>
            <div class="column">
                <form>
                    <img src="https://s2-f.scribdassets.com/images/upload/Upload_Upload.svg?1507325109" alt="" height="200px" width="200px">
                    <p>Subir imagenes</p>
            </div>
        </div>
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
                            <td>25017007</td>
                            <td>25017007</td>
                            <td>25017007</td>
                            <td>25017007</td>
                            <td>25017007</td>
                            <td>25017007</td>
                            <td>25017007</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
