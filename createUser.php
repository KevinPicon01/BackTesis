<?php
include "dbConnection.php";

$data="";
$userName = $_POST['userName'];
$name = $_POST['name'];
$lastName = $_POST['lastName'];
$document = $_POST['doc'];
$email    = $_POST['email'];
$pass     = hash("sha256", $_POST['pass'] );
$mult     = 1;

$sql = "SELECT usuarios.userName From game.usuarios WHERE usuarios.userName = '$userName'";

$result = $pdo->query($sql);

if( $result->rowCount()> 0 )
{
  $data = array('done' => false , 'message'=> "Error, nombre del usuario ya existe" );
  Header('Content-Type: application/json');
  echo json_encode($data);
  exit();
}
else {
  $sql = "SELECT usuarios.email From game.usuarios WHERE usuarios.email = '$email'";
  $result = $pdo->query($sql);

  if($result->rowCount()>0)
  {
    $data = array('done' => false , 'message'=> "Error, email del usuario ya existe" );
    Header('Content-Type: application/json');
    echo json_encode($data);
    exit();
  }
  else {

    $sql = "INSERT INTO game.usuarios SET userName = '$userName', email = '$email', password = '$pass', name = '$name', last_name = '$lastName', document = '$document'";
    $pdo->query($sql);

    $data = array('done' => true, 'message'=> "Usuario creado correctamente" );
    Header('Content-Type: application/json');
    echo json_encode($data);
    exit();


  }

}

 ?>
