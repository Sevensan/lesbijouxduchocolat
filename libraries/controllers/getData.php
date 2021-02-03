<?php 
// on recupere le fichier des chocolats
require_once(dirname(__DIR__) . '/models/Chocolats.php');

$model = new Chocolats();
$sql = $model->list();

// $model->ajouterChocolat("Perle fraise", "Perle", "Une ganache chocolat noir fraise", "perlefraise.jpg");

echo json_encode($sql->fetchAll());


?>