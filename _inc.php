<?php

session_start();

$pdo = new PDO("mysql:host=localhost;dbname=23_24_b2_jeux_olympique", "root", "", [
     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

function execReq($query, $data = array()){
     global $pdo;

     $stmt = $pdo->prepare($query);

     foreach($data as $cle => $valeur){
          $data[$cle] = htmlentities($valeur);
     }

     $stmt->execute($data);

     return $stmt;
}

function getEquipes(){
     return execReq("SELECT * FROM equipe ORDER BY nom_equipe")->fetchAll();
}

function getDisciplines(){
     return execReq("SELECT * FROM type_discipline ORDER BY type")->fetchAll();
}

function equipeExists($nom){
     $res = execReq("SELECT * FROM equipe WHERE nom_equipe = :nom", ["nom" => $nom]);

     return ($res->rowCount() != 0) ? true : false;
}