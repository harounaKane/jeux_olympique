<?php

include "_inc.php";

$rencontres = [
     [
          "lieu" => "Paris",
          "type" => "Foot",
          "nom_equipe_a" => "Congo",
          "nom_equipe_b" => "Comores",
          "date_rencontre" => "15/12/2023",
          "score_e_a" => 2,
          "score_e_b" => 1
     ],
     [
          "lieu" => "Rabat",
          "type" => "Foot",
          "nom_equipe_a" => "Maroc",
          "nom_equipe_b" => "Mali",
          "date_rencontre" => "25/12/2023",
          "score_e_a" => null,
          "score_e_b" => null
     ],
     [
          "lieu" => "Dakar",
          "type" => "Foot",
          "nom_equipe_a" => "Sénégal",
          "nom_equipe_b" => "Brésil",
          "date_rencontre" => "30/12/2023",
          "score_e_a" => null,
          "score_e_b" => null
     ],
     [
          "lieu" => "Berlin",
          "type" => "Foot",
          "nom_equipe_a" => "Allemagne",
          "nom_equipe_b" => "Brésil",
          "date_rencontre" => "10/12/2023",
          "score_e_a" => 1,
          "score_e_b" => 0
     ]
];


include ("views/_header.php");

include "views/accueil.php";

include ("views/_footer.phtml");
