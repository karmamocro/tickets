<!--
* Gemaakt door: Oussama EL-Hajoui.
* Gemaakt op: 17-07-2017
* Contents: frontend om een ticket toe te voegen het formulier
 -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Digifactory: Voeg ticket toe</title>
  <link rel="stylesheet" href="assets/css/materialize.min.css" type="text/css">
  <link href="assets/css/icon.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/sweetalert.css" type="text/css">
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
</head>

<body>
  <div class="wait hide"></div>
  <?php include("inc.nav.php"); ?>

  <div class="container">
    <div class="row">
      <h2 class="center">Nieuwe Ticket</h2>
    </div>

    <div class="row">
      <div class="col s12">
        <form class="newTicketForm" id="newTicketForm" action="api/new.php" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="input-field col s12">
              <input id="voornaam" name="voornaam" type="text" class="validate" data-length="100" required>
              <label for="first_name">Voornaam</label>
            </div>
            <div class="input-field col s12">
              <input id="onderwerp" name="onderwerp" type="text" class="validate" data-length="100" required>
              <label for="onderwerp">Onderwerp</label>
            </div>
            <div class="input-field col s12">
              <input id="email" name="email" type="email" class="validate" data-length="100" required>
              <label for="email">Email adres</label>
            </div>
            <div class="input-field col s12">
              <select id="prioriteit" name="prioriteit">
              <option checked=true value="3">Laag</option>
              <option value="2">Gemiddeld</option>
              <option value="1">Hoog</option>
            </select>
              <label>Prioriteit</label>
            </div>
            <div class="input-field col s12">
              <textarea id="bericht" name="bericht" class="materialize-textarea" required></textarea>
              <label for="textarea1">Bericht</label>
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
          </div>
        </form>
      </div>
    </div>

  </div>





  <script src="assets/js/jquery.js" type="text/javascript"></script>
  <script src="assets/js/materialize.min.js" type="text/javascript"></script>
  <script src="assets/js/sweetalert.min.js" type="text/javascript"></script>
  <script src="assets/js/app.js" type="text/javascript"></script>
</body>

</html>
