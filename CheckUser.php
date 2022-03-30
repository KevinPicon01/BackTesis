<?php

include "dbConnection.php";


$userName = $_POST['userName'];
$pass     = hash("sha256", $_POST['pass'] );

$sql = "SELECT usuarios.userName From game.usuarios WHERE usuarios.userName = '$userName' AND usuarios.password = '$pass'";
$result = $pdo->query($sql);

if($result->rowCount() > 0)
{
  $data = array('done' => true , 'message'=> "Bienvenido");
  $sql = "UPDATE game.usuarios SET ultima_conexion = now() WHERE userName = '$userName'";
  $pdo->query($sql);
  Header('Content-Type: application/json');
  echo json_encode($data);
  exit();

}
else {
  $data = array('done' => false , 'message'=> "Error nombre de usuario o contraseña incorrecta " );
  Header('Content-Type: application/json');
  echo json_encode($data);
  exit();


}



?>
