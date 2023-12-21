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
     ],
     [
          "id" => 5, "role" => "entraineur"
     ],
     [
          "id" => 6, "role" => "arbitre"
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
                    'id' => $_POST['id_personnel']
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

}else if(!empty($_POST['prenom']) && empty($_POST['id_personnel'])){
     extract($_POST);
     
     if( nameValid($prenom) && nameValid($nom) ){

          $query = "INSERT INTO personnel VALUES(NULL, :pr, :nom, :sexe, :role, :equipe, 20)";

          $res = execReq($query, [
               "pr"       => $prenom,
               "nom"      => $nom,
               "sexe"     => $sexe,
               "role"     => $role,
               "equipe"   => $id_equipe,
          ]);

          if( $res->rowCount() != 0 ){
               $_SESSION['success'] = "ajout personnel ok";
         
               header("location: personnel.php");
               exit;
          }else{
               $_SESSION['warning'] = "ajout personnel impossible";
          }
     }else{
          $personnelToUp = $_POST;
          $_SESSION['warning'] = "ajout personnel impossible";
     }
}else if( isset($_POST['filtre']) ){
     $filter = $_POST['filtre'];

     $query = "SELECT p.*, e.nom_equipe 
          FROM personnel AS p 
          INNER JOIN equipe AS e
          ON e.id_equipe = p.id_equipe
          WHERE :filtre IN (p.id_personnel, p.nom, p.prenom, p.role, p.sexe, e.nom_equipe)" ;

     $personnels = execReq($query, ["filtre" => $filter])->fetchAll();

}


include ("views/_header.php");

include "views/vuePersonnel.php";

include ("views/_footer.phtml");