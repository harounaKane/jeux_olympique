<?php
include "_inc.php";


if( !empty($_POST['equipe_a']) && empty($_POST['id_rencontre'])){
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
}else if( isset($_GET['action']) && ctype_digit($_GET['id'])){
     $action = $_GET['action'];


     if( $action == "delete" ){
          $query = "DELETE FROM rencontre WHERE id_rencontre = :id";
          $res = execReq($query, ["id" => $_GET['id']]);

          if( $res->rowCount() != 0 ){
               $_SESSION['success'] = "suppression ok";

               header("location: rencontre.php");
               exit;
          }else{
               $_SESSION['warning'] = "suppression impossible";
          }


     }else if( $action == "update" ){

          if( !empty($_POST['equipe_a']) ){
               
               $query = "UPDATE rencontre 
                         SET lieu = :lieu, id_equipe_a = :ea, id_equipe_b = :eb,
                              date_rencontre = :dt
                         WHERE id_rencontre = :id";

               $res = execReq($query, [
                    "lieu" => $_POST['lieu'],
                    "ea"=> $_POST["equipe_a"],
                    "eb"=> $_POST["equipe_b"],
                    "dt"=> $_POST["date_rencontre"],
                    'id' => $_POST['id_rencontre']
                    ]);

               if( $res->rowCount() != 0 ){
                    $_SESSION['success'] = "update ok";
     
                    header("location: rencontre.php");
                    exit;
               }else{
                    $_SESSION['warning'] = "update impossible";
               }
                    
          }

          $query = "SELECT rencontre.*, ea.nom_equipe AS equipe_a, eb.nom_equipe AS equipe_b
          FROM rencontre
          INNER JOIN equipe ea
          ON ea.id_equipe = id_equipe_a
          INNER JOIN equipe eb
          ON eb.id_equipe = id_equipe_b
          WHERE id_rencontre = :id";

          $rencontreToUp = execReq($query, ['id' => $_GET['id']])->fetch();

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