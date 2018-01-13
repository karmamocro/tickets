<?php
/*
* Gemaakt door: Oussama EL-Hajoui.
* Gemaakt op: 17-07-2017 21:35.
* Contents: Backend om tickets toe te voegen in de database doormiddel van een post request (small api)
*/


require("../funcs.php");


if (isset($_POST["voornaam"]) && isset($_POST["bericht"]) && isset($_POST["email"])) {

  //  Data in variables zetten
  $voornaam = makeStringSafe($_POST["voornaam"]);
  $email = makeStringSafe($_POST["email"]);
  $bericht = makeStringSafe($_POST["bericht"]);
  $prioriteit = makeStringSafe($_POST["prioriteit"]);
  $onderwerp = makeStringSafe($_POST["onderwerp"]);
  $slug = makeUrlSafe($onderwerp."-".time());

  // Database query maken en de data binden met de query om het vervolgens te executen
  $database->query("INSERT INTO tickets (naam, email, bericht, prioriteit, onderwerp, slug) VALUES (:naam, :email, :bericht, :prioriteit, :onderwerp, :slug)");
  $database->bind(":naam", $voornaam);
  $database->bind(":email", $email);
  $database->bind(":bericht", $bericht);
  $database->bind(":prioriteit", $prioriteit);
  $database->bind(":onderwerp", $onderwerp);
  $database->bind(":slug", $slug);
  $database->execute();

  $ticketfk = $database->lastInsertId();
  if (isset($_FILES["bijlage"])) { #er wordt nu geen check voor beveiliging gedaan omdat hier om gevraagd werd.
    $uploads_dir = "uploads/{$slug}"; # directory waar de uploads hoort te komen wordt nu aangemaakt

    if (!file_exists($uploads_dir)) { #als de directory niet bestaat dan wordt het aangemaakt!
        mkdir($uploads_dir, 0777, true);
    }

    if (isset($_FILES["bijlage"])) {
      // var_dump($_FILES["bijlage"]);
      // continue;

      for ($i=0; $i < count($_FILES["bijlage"]["name"]) ; $i++) { # voor iedere file wordt nu de file geupload naar de server en de naam naar de database!
        # er worden nu variables aangemaakt met de naam van het bestand
        $tmp_name = $_FILES["bijlage"]["tmp_name"][$i];
        $name =  time()."_".basename($_FILES["bijlage"]["name"][$i]);
        $fullpath = "{$uploads_dir}/{$name}";
        $dbsafepath = $name;

        if (move_uploaded_file($tmp_name, $fullpath)) {
          $database->query("INSERT INTO bijlages (ticketfk, naam) VALUES (:ticketfk, :naam)");
          $database->bind(":ticketfk", $ticketfk);
          $database->bind(":naam", $name);
          $database->execute();
        }

      }
    }


  }


  // return array aanmaken om het vervolgens terug te sturen als een json object
  $return = array('success' => true );
  echo json_encode($return);
}


?>
