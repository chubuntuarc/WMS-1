<?php
require("connect.php");
$sql = "SELECT * FROM users WHERE user_id = $user";
//se envia la consulta
$result=$mysqli->query($sql);
$rows = $result->num_rows;
while($row = mysqli_fetch_assoc($result)){
    $name = $row["name"];
}
?>
<nav class="navbar is-transparent-is-fixed-top">
  <div class="navbar-brand ">
    <a class="navbar-item" href="dashboard.php">
      <img src="logotdr-min.png" alt="Bulma: a modern CSS framework based on Flexbox" width="35" height="28">
    </a>
    <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navbarExampleTransparentExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="dashboard.php">
        Inicio
      </a>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="index.php">
          Inventario
        </a>
        <div class="navbar-dropdown is-boxed">
          <a class="navbar-item" href="index.php">
            Actual
          </a>
          <a class="navbar-item" href="index2.php">
            Completo
          </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="/documentation/overview/start/">
          Layout
        </a>
        <div class="navbar-dropdown is-boxed">
          <a class="navbar-item" href="/documentation/overview/start/">
            Almacén
          </a>
          <a class="navbar-item" href="https://bulma.io/documentation/modifiers/syntax/">
            Patio
          </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="operative.php">
          Operativos
        </a>
        <div class="navbar-dropdown is-boxed">
          <a class="navbar-item" href="operative.php">
            Listado
          </a>
          <a class="navbar-item" href="operative_new.php">
            Nuevo
          </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="binnacle.php">
          Movimientos
        </a>
        <div class="navbar-dropdown is-boxed">
          <a class="navbar-item" href="in.php">
            Nueva entrada
          </a>
          <a class="navbar-item" href="out.php">
            Nueva salida
          </a>
          <a class="navbar-item" href="binnacle_post.php">
            Registrar en bitácora
          </a>
          <a class="navbar-item" href="visit.php">
            Visita ocular
          </a>
        </div>
      </div>

    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="field is-grouped">
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link" href="/documentation/overview/start/">
             <?php echo $name; ?>
            </a>
            <div class="navbar-dropdown is-boxed">
              <a class="navbar-item" href="/documentation/overview/start/">
                Perfil
              </a>
              <a class="navbar-item" href="https://bulma.io/documentation/modifiers/syntax/">
                Ajustes
              </a>
              <hr class="navbar-divider">
              <a class="navbar-item is-active" href="logout.php?logout=Salir">
                Cerrar sesión
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
