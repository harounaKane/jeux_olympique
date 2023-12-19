<?php
include "_inc.php";


if( !empty($_POST['login']) && !empty($_POST['mdp']) ){

     $res = execReq("SELECT * FROM admin WHERE login = :log AND mdp = :mdp", [
          "log"     => $_POST['login'],
          "mdp"     => $_POST['mdp']
     ]);

     if( $res->rowCount() != 0 ){
          $_SESSION["ADMIN"] = $res->fetch();
          
          header("location: .");
          exit;
     }

}else if(!empty($_GET["action"]) && $_GET["action"] == "logout"){
     session_destroy();

     header("location: .");
     exit;
}

include ("views/_header.php");

include "views/formLogin.php";

include ("views/_footer.phtml");
