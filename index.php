<?php
/*
* Gemaakt door: Oussama EL-Hajoui.
* Gemaakt op: 17-07-2017
* Contents: frontend om alle tickets te bezichtegen
*/
require("funcs.php");
$database->query("SELECT * FROM tickets ORDER BY tijd DESC");
$tickets = $database->resultset();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=100	, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>DigiFactory: Oussama El-Hajoui</title>
  <link rel="stylesheet" href="assets/css/materialize.min.css" type="text/css">
  <link href="assets/css/icon.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/sweetalert.css" type="text/css">
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
</head>
<body>
  <!-- menu in laden -->
  <?php include("inc.nav.php"); ?>
<div class="container">
  <div class="row">
    <h2 class="center">Tickets: <?php echo count($tickets); ?></h2>
  </div>
  <div class="row">
    <div class="col s12">
      <table class="highlight responsive-table" id="tableData">
        <thead>
          <tr>
              <th>Prioriteit</th>
              <th>Status</th>
              <th>Naam</th>
              <th>Onderwerp</th>
              <th>Datum</th>
          </tr>
        </thead>

        <tbody>
          <?php


            foreach ($tickets as $key => $ticket) {
              echo "
              <tr class='homeLink' id='ticket.php?view={$ticket['slug']}'>
                <td><span style='background: {$colorsPri[$ticket['prioriteit']]}'>{$prioriteit[$ticket["prioriteit"]]}</span></td>
                <td><span style='background: {$colorsSta[$ticket['status']]}'>{$status[$ticket["status"]]}</span></td>
                <td>{$ticket["naam"]}</td>
                <td>{$ticket["onderwerp"]}</td>
                <td>{$ticket["tijd"]}</td>
              </tr>
              ";
            }

           ?>
        </tbody>
      </table>
    </div>
  </div>

</div>




  <script src="assets/js/jquery.js" type="text/javascript"></script>
  <script src="assets/js/materialize.min.js" type="text/javascript"></script>
  <script src="assets/js/sweetalert.min.js" type="text/javascript"></script>
  <script src="assets/js/app.js" type="text/javascript"></script>
</body>
</html>
