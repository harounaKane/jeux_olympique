<?php

include "_inc.php";

$equipes = getEquipes();

if( !empty($_POST['nom_equipe']) && empty($_POST['id_equipe']) ){
     if( !equipeExists($_POST['nom_equipe']) && nameValid($_POST['nom_equipe']) ){
          $query = "INSERT INTO equipe VALUES(NULL, :nom)";
          $res = execReq($query, ["nom" => $_POST["nom_equipe"]]);

          if( $res->rowCount() != 0 ){
               $_SESSION['success'] = "Equipe ajoutée avec success";
          
               header("location: equipe.php");
               exit;
          }else{
               $_SESSION['warning'] = "new equipe  impossible";
          }
     }else{
          $_SESSION['warning'] = "cette equipe existe déjà";
     }

}else if( isset($_GET['action']) && ctype_digit($_GET['id']) ){
     if( $_GET['action'] == "delete" ){

          if( !equipeExists($_GET['nom_equipe']) ){
               $res = execReq("DELETE FROM equipe WHERE id_equipe = :id", ['id' => $_GET['id']]);

               if( $res->rowCount() != 0 ){
                    $_SESSION['success'] = "Equipe supprimée avec success";
               
                    header("location: equipe.php");
                    exit;
               }
          }
          
          $_SESSION['warning'] = "delete equipe impossible";


     }else if( $_GET['action'] == "update" ){

          if( !empty($_POST['nom_equipe']) ){
               $query = "UPDATE equipe SET nom_equipe = :nom WHERE id_equipe = :id";

               $res = execReq($query, ['nom' => $_POST['nom_equipe'], "id" => $_POST["id_equipe"]]);

               if( $res->rowCount() != 0 ){
                    $_SESSION['success'] = "Equipe update avec success";
               
                    header("location: equipe.php");
                    exit;
               }else{
                    $_SESSION['warning'] = "update equipe impossible";
               }
          }

          $equipeToUp = execReq("SELECT * FROM equipe WHERE id_equipe = :id", ['id' => $_GET['id']])->fetch(); 
     }
}else if( isset($_POST['filtre']) ){
     $filter = $_POST['filtre'];

     if( $filter == "withMatch" ){
          $query = "SELECT DISTINCT equipe.* 
                    FROM equipe
                    INNER JOIN rencontre
                    ON equipe.id_equipe = rencontre.id_equipe_a
                    OR equipe.id_equipe = rencontre.id_equipe_b
                    WHERE date_rencontre >= now()";
          $equipes = execReq($query)->fetchAll();
     }else if( $filter == "withOutMatch" ){
          $query = "SELECT DISTINCT equipe.* 
                    FROM equipe
                    WHERE id_equipe NOT IN
                    (SELECT DISTINCT id_equipe_a 
                    FROM rencontre)
                    AND id_equipe NOT IN
                    (SELECT DISTINCT id_equipe_b 
                    FROM rencontre)";

          $equipes = execReq($query)->fetchAll();
     }

}




include ("views/_header.php");

include "views/vueEquipe.php";

include ("views/_footer.phtml");