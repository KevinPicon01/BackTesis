<?php

include "dbConnection.php";
$userName = $_POST['userName'];
$modo = $_POST['modo'];

$sql = "UPDATE game.usuarios SET $modo = $modo+1  WHERE userName = '$userName'";
$result = $pdo->query($sql);
