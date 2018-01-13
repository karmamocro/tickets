<?php
/*
* Gemaakt door: Oussama EL-Hajoui.
* Gemaakt op: 17-07-2017
* Contents: Functies voor de backend en frontend.
*/
require_once("db.php");

// Array voor kleuren en teksten bij behorend bij de nummers die in de database staan
$colorsPri = array(
  '1' => '#ef5353',
  '2' => '#79bf7c',
  '3' => '#0073aa'
);
$prioriteit = array(
  '1' => 'Dringend',
  '2' => 'Normaal',
  '3' => 'Laag'
);
$colorsSta = array(
  '0' => '#79bf7c',
  '1' => '#0073aa'
);
$status = array(
  '0' => 'OPEN',
  '1' => 'IN BEHANDELING',
);


// functie waarbij ik de code encode naar values
function makeStringSafe($value){
  $value = htmlspecialchars($value);
  $value = utf8_encode($value);
  $value = htmlentities($value);
  $value = stripslashes($value);
  return $value;
}

//  functie waarbij ik de tekst url veilig maak
function makeUrlSafe($value){
  $safe = preg_replace('/^-+|-+$/', '', strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $value)));
  return $safe;
}

?>
