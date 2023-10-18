<?php

$host = "localhost";
$db = "tp_1";
$user = "root";
$password = "321312";

$dsn = "mysql:host=$host; dbname=$db; charset=UTF8";

global $dbcon;
try {
    $dbcon = new PDO($dsn, $user);
    if ($dbcon) {
        echo "Connected to database $db";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}


require_once "./class/maison.php";

$maisons = new maison;

//  GET ALL MAISON
// $AllMaison = $maisons->getAllMaison();
// foreach($AllMaison as $maiz){
//     echo "<br>";
//     print_r ($maiz);
// }

// $maisonById = $maisons->getMaisonByMatricule(1);
// print_r($maisonById);


//  CREATE MAISON
// $maison_to_insert = [
//     "prix" => 20000,
//     "annee_construite" => 1999,
//     "pied_carre" => 3000,
//     "nb_chambre" => 4
// ];

// $maison_add = $maisons->createMaison($maison_to_insert);
// var_dump($maison_add);
// print_r($maison_add);


//  UPDATE MAISON
$data = [
    'prix' => 2,
    'annee_construite' => 3,
    'pied_carre' => 4,
    'nb_chambre' => 5
];

$updatedMaison = $maisons->updateMaison(2, $data);
$getUpdatedMaison = $maisons->getMaisonByMatricule(2);
print_r($getUpdatedMaison);



// $deletedMaison = $maisons->deleteMaison(44);
// $getallmaison = $maisons->getAllMaison();
// foreach($getallmaison as $m){
//     echo "<br>";
//     print_r($m);
// }


?>