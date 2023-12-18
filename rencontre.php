<?php

$rencontres = [
     [
          "id_rencontre" => 7,
          "lieu" => "Paris",
          "type" => "Foot",
          "nom_equipe_a" => "Congo",
          "nom_equipe_b" => "Comores",
          "date_rencontre" => "15/12/2023",
          "score_e_a" => 2,
          "score_e_b" => 1
     ],
     [
          "id_rencontre" => 8,
          "lieu" => "Rabat",
          "type" => "Foot",
          "nom_equipe_a" => "Maroc",
          "nom_equipe_b" => "Mali",
          "date_rencontre" => "25/12/2023",
          "score_e_a" => null,
          "score_e_b" => null
     ],
     [
          "id_rencontre" => 9,
          "lieu" => "Dakar",
          "type" => "Foot",
          "nom_equipe_a" => "Sénégal",
          "nom_equipe_b" => "Brésil",
          "date_rencontre" => "30/12/2023",
          "score_e_a" => null,
          "score_e_b" => null
     ],
     [
          "id_rencontre" => 10,
          "lieu" => "Berlin",
          "type" => "Foot",
          "nom_equipe_a" => "Allemagne",
          "nom_equipe_b" => "Brésil",
          "date_rencontre" => "10/12/2023",
          "score_e_a" => 1,
          "score_e_b" => 0
     ]
];

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
          "id_equipe" => 25,
          "nom_equipe"   => "Benin"
     ], 
     [
          "id_equipe" => 3,
          "nom_equipe"   => "Mexique"
     ], 
     [
          "id_equipe" => 4,
          "nom_equipe"   => "Togo"
     ]
];

$types = [
     [
          "type" => "Football"
     ],
     [
          "type" => "Rugby"
     ],
     [
          "type" => "Basketball"
     ],
];

var_dump($equipes);

include ("views/_header.phtml");

include "views/vueRencontre.php";

include ("views/_footer.phtml");