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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="shortcut icon" href="apple-icon-57x57.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
</head>
<body>
	<?php include("navigation_login.php"); ?>
<section class="wrap">
		<div class="columns">
			<div class="column is-3"></div>
			<div class="columns">
				<p>Ingresa tu usuario y contraseña</p>
				<form class="" action="" method="post" style="margin-top:20%;">
					<div class="field">
						<div class="control has-icons-left has-icons-right">
							<input class="input is-success" type="text" placeholder="Usuario" name="user_name">
							<span class="icon is-small is-left">
								<i class="fa fa-user"></i>
							</span>
						</div>
					</div>
					<div class="field">
						<div class="control has-icons-left has-icons-right">
							<input class="input is-success" type="password" placeholder="Contraseña" name="password">
							<span class="icon is-small is-left">
								<i class="fa fa-key"></i>
							</span>
						</div>
					</div>
					<button class="button is-primary" name="login" value="Acceder" type="submit">Acceder
					</button>
				</form>
			</div>
		</div>
	</section>

</body>
</html>
