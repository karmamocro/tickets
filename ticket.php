<?php
/*
* Gemaakt door: Oussama EL-Hajoui.
* Gemaakt op: 17-07-2017
* Contents: frontend om een ticket te bekijken.
*/
require("funcs.php");
if(!isset($_GET["view"])){
  die("Please go back and choose a valid ticket!");
}
$slug = makeStringSafe($_GET["view"]);



 $database->query("SELECT * FROM tickets WHERE slug ='$slug' ORDER BY tijd DESC");
 $ticket = $database->single();
 if(!$ticket){
   die("Oops this ticket could not be found, please choose another ticket!");
 }

 $database->query("SELECT * FROM reacties WHERE ticketfk ='".$ticket["idtickets"]."'");
 $reacties = $database->resultset();

 $database->query("SELECT * FROM bijlages WHERE ticketfk ='".$ticket["idtickets"]."'");
 $bijlages = $database->resultset();


 ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=100	, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title><?php echo $ticket["onderwerp"]; ?></title>
   <link rel="stylesheet" href="assets/css/materialize.min.css" type="text/css">
   <link href="assets/css/icon.css" rel="stylesheet">
   <link rel="stylesheet" href="assets/css/sweetalert.css" type="text/css">
   <link rel="stylesheet" href="assets/css/style.css" type="text/css">
 </head>
 <body>
   <?php include("inc.nav.php"); ?>
 <div class="container">
   <div class="row">
     <h2 class="center"><?php echo $ticket["onderwerp"]; ?></h2>
   </div>
   <div class="row">
     <div class="col s12">
       <table class="striped responsive-table" id="tableData">
         <thead>
           <tr>
               <th>Prioriteit</th>
               <th>Status</th>
               <th>Naam</th>
               <th>Email</th>
               <th>Onderwerp</th>
               <th>Datum</th>
           </tr>
         </thead>

         <tbody>
           <?php
               echo "
               <tr class='homeLink' id='ticket.php?view={$ticket['slug']}'>
                 <td><span style='background: {$colorsPri[$ticket['prioriteit']]}'>{$prioriteit[$ticket["prioriteit"]]}</span></td>
                 <td><span style='background: {$colorsSta[$ticket['status']]}'>{$status[$ticket["status"]]}</span></td>
                 <td>{$ticket["naam"]}</td>
                 <td>{$ticket["email"]}</td>
                 <td>{$ticket["onderwerp"]}</td>
                 <td>{$ticket["tijd"]}</td>
               </tr>
               ";

            ?>
         </tbody>
       </table>


       <?php
          if (count($bijlages) > 0) {
            echo "<h3>>Bijlages: ".count($bijlages)."</h3>";
          }
          foreach ($bijlages as $key => $bijlage) {
            echo "<a target='_blank' title='web-bijlage' name='web-bijlage' href='api/uploads/$slug/{$bijlage["naam"]}'>{$bijlage["naam"]}</a> <span>op: {$bijlage["tijd"]}</span><br>";
          }
       ?>
     </div>
   </div>

   <div class="row">
     <div class="col s12">
       <label>Bericht:</label>
       <div class="markup">
         <?php echo nl2br($ticket["bericht"]) ?>
       </div>
     </div>
   </div>


   <div class="row">
     <div class="col s12">
       <h4>Reageer</h4>
       <form class="reactieForm" id="reactieForm" action="api/reactie.php" method="post">
         <input type="hidden" name="ticketid" id="ticketid" value="<?php echo $ticket["idtickets"] ?>">
         <input type="hidden" name="slug" id="slug" value="<?php echo $ticket["slug"] ?>">
         <div class="input-field col s12">
           <input id="voornaam" name="voornaam" type="text" class="validate" data-length="100" required>
           <label for="first_name">Voornaam</label>
         </div>
         <div class="input-field col s12">
           <input id="email" name="email" type="email" class="validate" data-length="100" required>
           <label for="email">Email adres</label>
         </div>
         <div class="input-field col s12">
           <textarea id="bericht" name="bericht" class="materialize-textarea" required></textarea>
           <label for="textarea1">Reactie</label>
         </div>
         <div class="input-field col s12">
           <div class="fileUpload waves-effect waves-light btn blue accent-1">
             <span>Kies Bijlages</span>
             <input type="file" class="upload" name="bijlage[]" id="uploadedFile" multiple />
           </div>
           <span id="fileVal" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Bestanden"></span>
         </div>
         <div class="input-field col s12">
           <button type="submit" class="waves-effect waves-light btn w100 blue accent-4" id="sendForm">Verzenden</button>
         </div>
       </form>

     </div>
   </div>
   <div class="row">
     <div class="col s12">
       <h2>Reacties: <?php echo count($reacties); ?></h2>
     </div>
   </div>
   <div class="row">
     <div class="col s12">
       <?php
          foreach ($reacties as $key => $reactie) {
            echo "
            <div class='reactie'>
              naam: {$reactie["naam"]} <br/>
              email: {$reactie["email"]} <br/>
              email: {$reactie["tijd"]} <br/>
              reactie: ".nl2br($reactie["bericht"])."
            </div>

            ";
          }
       ?>
     </div>
   </div>

 </div>




   <script src="assets/js/jquery.js" type="text/javascript"></script>
   <script src="assets/js/sweetalert.min.js" type="text/javascript"></script>
   <script src="assets/js/materialize.min.js" type="text/javascript"></script>
   <script src="assets/js/app.js" type="text/javascript"></script>
 </body>
 </html>
