<?php
include "dbConnection.php";
$userName = $_POST['userName'];

$sql = "SELECT recompensa from game.usuarios where userName = '$userName'";
$result = $pdo->query($sql);
$r = $result->fetchAll();
$date2 = new DateTime("now");
$date1 = new DateTime($r[0]['recompensa']);
$diff = $date1->diff($date2);
if($r[0]['recompensa']==null  || $diff->format('%d')>=1)
{
    $data = array('dailyReward' => true);
}
else{
    $data = array('dailyReward' => false);
}
echo json_encode($data);
exit();



