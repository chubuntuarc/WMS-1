<?php
session_start();
require("connect.php");
$message="";
if(!empty($_POST["login"])) {
	$sql = "SELECT * FROM users WHERE username='" . $_POST["user_name"] . "' and password = '". $_POST["password"]."'";
    $result=$mysqli->query($sql);
    $rows = $result->num_rows;
    while($row = mysqli_fetch_assoc($result)){
        $_SESSION["user_id"] = $row['user_id'];
        $_SESSION["rol"] = $row['rol'];
    }
	if($_SESSION["user_id"]!="") {
    header("Location: dashboard.php");
	} else {
	$message = "Invalid Username or Password!";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>TDR | Inicio de sesión</title>
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
                <h5 class="mainTitle"><a href="index.php">TDR</a> | Inicio de sesión</h5>
            </div>
            <div class="column">

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
            <div class="column"></div>
            <div class="column">
                <p style="text-align:center;">Accede con tu usuario y contraseña</p>
                <div class="box">
                    <hr>
                    <br>
                    <form class="" action="" method="post">
                        <fieldset>
                            <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
                            <label for="nameField">Usuario</label>
                            <input type="text" name="user_name" placeholder="Nombre de usuario" id="nameField">
                            <label for="nameField">Contraseña</label>
                            <input type="password" name="password" placeholder="Clave de acceso" id="nameField">
                            <input class="button-primary" name="login" type="submit" value="Acceder">
                        </fieldset>
                    </form>
                    <hr>
                </div>
            </div>
            <div class="column"></div>
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
