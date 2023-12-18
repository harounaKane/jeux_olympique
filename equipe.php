<?php

$equipes = [
     [
          "id_equipe" => 1,
          "nom_equipe"   => "Allemagne"
     ], 
     [
          "id_equipe" => 5,
          "nom_equipe"   => "Caméroun"
     ], 
     [
          "id_equipe" => 10,
          "nom_equipe"   => "France"
     ], 
     [
          "id_equipe" => 15,
          "nom_equipe"   => "Chine"
     ], 
     [
          "id_equipe" => 5,
          "nom_equipe"   => "Caméroun"
     ], 
     [
          "id_equipe" => 10,
          "nom_equipe"   => "France"
     ], 
     [
          "id_equipe" => 15,
          "nom_equipe"   => "Chine"
     ]
];

include ("views/_header.phtml");

include "views/vueEquipe.php";

include ("views/_footer.phtml");