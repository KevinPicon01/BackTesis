<?php

include "dbConnection.php";
$userName = $_POST['userName'];
$modo = $_POST['modo'];
$puntaje = $_POST['puntaje'];
$sql = "SELECT $modo From game.usuarios WHERE userName = '$userName'";
$result = $pdo->query($sql);
$r = $result->fetchAll();


if($r[0][0]< $puntaje)
{
    $sql = "UPDATE game.usuarios SET $modo = $puntaje WHERE userName = '$userName'";
    $pdo->query($sql);
    echo "Ranking actualizado";
    exit();
}
else
{
    echo "No se actualizo el ranking";
    exit();
}