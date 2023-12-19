<?php

include "_inc.php";

$roles = [
     [
          "id" => 1, "role" => "joueur"
     ],
     [
          "id" => 2, "role" => "medecin"
     ],
     [
          "id" => 3, "role" => "coach"
     ],
     [
          "id" => 4, "role" => "supporter"
     ]
];

$equipes = getEquipes();

$query = "SELECT p.*, e.nom_equipe 
          FROM personnel AS p 
          INNER JOIN equipe AS e
          ON e.id_equipe = p.id_equipe";

$personnels = execReq($query)->fetchAll();


if( isset($_GET['action']) && ctype_digit($_GET['id'])){
     $action = $_GET['action'];


     if( $action == "delete" ){
          $query = "DELETE FROM personnel WHERE id_personnel = :id";
          $res = execReq($query, ["id" => $_GET['id']]);

          if( $res->rowCount() != 0 ){
               $_SESSION['success'] = "suppression ok";

               header("location: personnel.php");
               exit;
          }else{
               $_SESSION['warning'] = "suppression impossible";
          }


     }else if( $action == "update" ){

          if( !empty($_POST['prenom']) ){
               $query = "UPDATE personnel SET prenom = :pr, nom = :nom WHERE id_personnel = :id";

               
               $res = execReq($query, [
                    "pr" => $_POST['prenom'],
                    "nom"=> $_POST["nom"],
                    'id' => $_GET['id']
                    ]);

               if( $res->rowCount() != 0 ){
                    $_SESSION['success'] = "update ok";
     
                    header("location: personnel.php");
                    exit;
               }else{
                    $_SESSION['warning'] = "update impossible";
               }
                    
          }

          $query = "SELECT * FROM personnel WHERE id_personnel = :id";
          $personnelToUp = execReq($query, ['id' => $_GET['id']])->fetch();
     }
}




include ("views/_header.php");

include "views/vuePersonnel.php";

include ("views/_footer.phtml");