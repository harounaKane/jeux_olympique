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

function listeRencontres(){
     $query = "SELECT r.*, ea.nom_equipe AS equipe_a, 
               eb.nom_equipe AS equipe_b,
               score_equipe_a AS score_e_a,
               score_equipe_b AS score_e_b,
               rm.id_match
          FROM rencontre r
          INNER JOIN equipe ea
          ON ea.id_equipe = id_equipe_a
          INNER JOIN equipe eb
          ON eb.id_equipe = id_equipe_b
          AND ea.id_equipe != eb.id_equipe
          LEFT JOIN resultat_match rm
          ON rm.id_rencontre = r.id_rencontre";

     $rencontres = execReq($query)->fetchAll();

     return $rencontres;
}

function score(){
     $query = "SELECT 
                    r.*,
                    ea.nom_equipe AS equipe_a,
                    eb.nom_equipe AS equipe_b
               FROM rencontre r
               INNER JOIN equipe AS ea
                    ON r.id_equipe_a = ea.id_equipe
               INNER JOIN equipe AS eb
                    ON r.id_equipe_b = eb.id_equipe
               WHERE r.date_rencontre <= now()
               AND r.id_rencontre NOT IN (SELECT id_rencontre FROM resultat_match)
               ";

     $rencontres = execReq($query)->fetchAll();
     
     return $rencontres;
}

function nameValid($chaine, $taille = 2){
     $chaine = trim($chaine);

     for ($i=0; $i < strlen($chaine); $i++) { 
    
          if( !ctype_alpha($chaine[$i]) ){
               return false;
          }
     }

     return true;
}


function hasMatch($id_equipe, $date){

     $query = "SELECT date_rencontre 
               FROM rencontre 
               WHERE :id_equipe 
               IN (id_equipe_a, id_equipe_b)
               ORDER BY date_rencontre DESC";
     
     $dateBd = execReq($query, ["id_equipe" => $id_equipe])->fetch();

     if( interValJour($date, $dateBd['date_rencontre']) > 2 ){
          return true;
     }

     return false;
}

function interValJour($datePrev, $lastDateOfMatch){
     $prog = strtotime($datePrev);
     $last = strtotime($lastDateOfMatch);
     
     $j = floor(($last - $prog)/(60*60*24));

     return abs($j);
}