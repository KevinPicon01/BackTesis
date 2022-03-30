<?php
include "dbConnection.php";


$userName = $_POST['userName'];
$date = $_POST['date'];
$mult = $_POST['mult'];

$sql = "UPDATE game.usuarios  SET Multiplicador = '$mult', dateDB = '$date' where userName = '$userName'";

$result = $pdo->query($sql);

