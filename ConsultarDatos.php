<?php

include "dbConnection.php";





$sql = "SELECT name, last_name,document, userName, derivadas,record_derivadas, funciones,record_funciones, limites, record_limites, ultima_conexion, recompensa FROM game.usuarios ";


if (isset($_GET['name'])) {
    if ($_GET['name'] != "") {
        $sql .= "WHERE userName = '" . $_GET['name'] . "'";
    }
}
if (isset($_GET['Date'])){
    if ($_GET['Date'] != ""){
        $sql .= "AND ultima_conexion <= '" . $_GET['Date'] . "'";
    }
}
if (isset($_GET['Date2'])){
    if ($_GET['Date2'] != ""){
        $sql .= "AND ultima_conexion >= '" . $_GET['Date2'] . "'";
    }
}




if (isset($_GET['name']) && isset($_GET['Date']) && isset($_GET['Date2'])) {
    if ($_GET['Date'] != "" && $_GET['Date2'] != "" && $_GET['name'] != "") {
        $name = $_GET['name'];
        $date = $_GET['Date'];
        $date2 = $_GET['Date2'];
        $sql = "SELECT name, last_name,document,userName, derivadas,record_derivadas, funciones,record_funciones, limites, record_limites, ultima_conexion, recompensa 
FROM game.usuarios WHERE userName = '$name' AND ultima_conexion BETWEEN '$date' AND '$date2'";
    }elseif ($_GET['Date'] != "" && $_GET['Date2'] != "" ){
        $date = $_GET['Date'];
        $date2 = $_GET['Date2'];
        $sql = "SELECT name, last_name,document, userName, derivadas,record_derivadas, funciones,record_funciones, limites, record_limites, ultima_conexion, recompensa 
FROM game.usuarios WHERE ultima_conexion BETWEEN '$date' AND '$date2'";
    }elseif ($_GET['name'] != ""){
        $name = $_GET['name'];
        $sql = "SELECT name, last_name,document, userName, derivadas,record_derivadas, funciones,record_funciones, limites, record_limites, ultima_conexion, recompensa 
FROM game.usuarios WHERE userName = '$name'";
    }else{
        $sql = "SELECT name, last_name,document, userName, derivadas,record_derivadas, funciones,record_funciones, limites, record_limites, ultima_conexion, recompensa 
FROM game.usuarios";
    }
}


$result = $pdo->query($sql);
$r = $result->fetchAll();

?>
<!DOCTYPE html>
<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
      .overflow-x{
        overflow-x: auto;
      }
    </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 py-3">
    <div class="container">
      <a class="navbar-brand" href="#">NPC</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Reporte</a>
          </li>

        </ul>

      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-3">
        <div class="card ">
          <div class="card-header">
            <h2>Consultar Datos</h2>
          </div>
          <div class="card-body">
            <form action="">
              <label class="form-label" for="name">Nombre:</label>
              <input class="form-control" id="name" value="<?= $_GET['name'] ?? "" ?>" type="text" name="name">
              <br>
              <label class="form-label" for="Date">Fecha Inicial:</label>
              <input class="form-control" id="Date" value="<?= $_GET['Date'] ?? "" ?>" type="datetime-local"
                name="Date">
              <br>
              <label class="form-label" for="Date2">Fecha Final:</label>
              <input class="form-control" id="Date2" value="<?= $_GET['Date2'] ?? "" ?>" type="datetime-local"
                name="Date2">
              <input class="btn btn-primary col-12 mt-3" type="submit" value="Consultar">
            </form>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-9 mt-5 mt-lg-0">
        <div class="card ">
          <div class="card-header py-3 bg-primary text-white">
            <h3 class="mb-0">Usuarios</h3>
          </div>
          <div class="card-body overflow-x">
            <table class="table table-hover table-striped ">
              <tr class="table-dark">
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Documento</th>
                <th>Usuario</th>
                <th>Derivadas</th>
                <th>Rec Derivadas</th>
                <th>Limites</th>
                <th>Rec Limites</th>
                <th>Funciones</th>
                <th>Rec Funciones</th>
                <th >Ultima Conexion</th>
                <th >

                </th>
                <th>Ultima Recompensa</th>
              </tr>
              <?php foreach ($r as $v) { ?>
              <tr>
                <td>
                  <?= $v['name'];  ?>
                </td><td>
                  <?= $v['last_name'];  ?>
                </td><td>
                  <?= $v['document'];  ?>
                </td>
                  <td>
                  <?= $v['userName'];  ?>
                </td>
                <td>
                  <?= $v['derivadas'];  ?>
                </td>
                <td>
                  <?= $v['record_derivadas'];  ?>
                </td>
                <td>
                  <?= $v['limites'];  ?>
                </td>
                <td>
                  <?= $v['record_limites'];  ?>
                </td>
                <td>
                  <?= $v['funciones'];  ?>
                </td>
                <td>
                  <?= $v['record_funciones'];  ?>
                </td>
                <td colspan="2">
                  <?= $v['ultima_conexion'];  ?>
                </td>
                <td>
                  <?= $v['recompensa'];  ?>
                </td>
              </tr>
              <?php } ?>
            </table>
          </div>


        </div>
      </div>
    </div>
  </div>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>