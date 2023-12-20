<?php

include "_inc.php";

if( !empty($_POST['score_a']) ){
     $query = "INSERT INTO resultat_match VALUES(NULL, :score_a, :score_b, :rencontre)";
     
     $res = execReq($query, [
          "score_a" => $_POST['score_a'],
          "score_b" => $_POST['score_b'],
          "rencontre" => $_POST['id_rencontre']
     ]);

     if( $res->rowCount() != 0 ){
          $_SESSION['success'] = "score ok";

          header("location: resultat.php");
          exit;
     }else{
          $_SESSION['warning'] = "scores impossible";
     }
}

$rencontres = score(); 

include ("views/_header.php");

include "views/vueResultat.php";

include ("views/_footer.phtml");