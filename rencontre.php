<?php
include "_inc.php";

if( !empty($_POST['equipe_a']) ){
     extract($_POST);

     $query = "INSERT INTO rencontre VALUES(NULL, :lieu, :type, :ea, :eb, :dt)";
     $res = execReq($query, [
          "lieu"   => $lieu,
          "type"    => $type,
          "ea"      => $equipe_a,
          "eb"      => $equipe_b,
          "dt"      => $date_rencontre
     ]);

     if( $res->rowCount() != 0 ){
          $_SESSION['success'] = "Rencontre programmée ok";

          header("location: rencontre.php");
          exit;
     }else{
          $_SESSION['warning'] = "rencontre impossible";
     }
}


$query = "SELECT rencontre.*, ea.nom_equipe AS equipe_a, eb.nom_equipe AS equipe_b
          FROM rencontre
          INNER JOIN equipe ea
          ON ea.id_equipe = id_equipe_a
          INNER JOIN equipe eb
          ON eb.id_equipe = id_equipe_b";

$rencontres = execReq($query)->fetchAll();

$equipes = getEquipes();

$types = getDisciplines();

//var_dump($equipes);

include ("views/_header.php");

include "views/vueRencontre.php";

include ("views/_footer.phtml");