<?php

require("connect.php");
$operative = $_POST["id_operative"];
$initial = $_POST["initial_date"];
$final = $_POST["final_date"];
$operative_value = $_POST["operative_value"];

$sql_operative = "INSERT INTO operative(id_operative, initial_date, final_date, status) VALUES('$operative', '$initial', '$final', 2)";
$mysqli->query($sql_operative);

//obtenemos el archivo .csv
$tipo = $_FILES['archivo']['type'];

$tamanio = $_FILES['archivo']['size'];

$archivotmp = $_FILES['archivo']['tmp_name'];

//cargamos el archivo
$lineas = file($archivotmp);

//inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
$i=0;



//Recorremos el bucle para leer línea por línea
foreach ($lineas as $linea_num => $linea)
{
   //abrimos bucle
   /*si es diferente a 0 significa que no se encuentra en la primera línea
   (con los títulos de las columnas) y por lo tanto puede leerla*/
   if($i != 0)
   {
       //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
       /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá
       leyendo hasta que encuentre un ; */
       $datos = explode(",",$linea);

       //Almacenamos los datos que vamos leyendo en una variable
       //usamos la función utf8_encode para leer correctamente los caracteres especiales
       $id_product = $datos[0];
       $product_name = utf8_encode($datos[1]);
       $serial = utf8_encode($datos[2]);
       $category = $datos[3];

       //guardamos en base de datos la línea leida
       $sql = "INSERT INTO warehouse(id_product, product_name, serial, category, operative, status) VALUES($id_product, '$product_name', '$serial', $category,$operative_value, 2)";
       $mysqli->query($sql);

       //cerramos condición
   }

   /*Cuando pase la primera pasada se incrementará nuestro valor y a la siguiente pasada ya
   entraremos en la condición, de esta manera conseguimos que no lea la primera línea.*/
   $i++;
   //cerramos bucle
}
header("Location: operative.php");
?>
