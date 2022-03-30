<?php
include "dbConnection.php";
$userName = $_POST['userName'];

$sql = "UPDATE game.usuarios SET recompensa = now() WHERE userName = '$userName'";
$result = $pdo->query($sql);




