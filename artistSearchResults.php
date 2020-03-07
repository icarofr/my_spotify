<?php
require "mainApi.php";
searchAll($_POST['artistSearch'], "artist");
$artistJson = json_decode(file_get_contents(".temp.json"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Stupefy - Search</title>
  <link rel="stylesheet" href="tachyons.css" />
</head>

<body>
  <div id="root">
    <div class="bg-green pv5 tc white">
      <div class="f1">Stupefy!</div>
      <div class="f5">Magically iterating through all your favorite artists.</div>
    </div>
    <? foreach ($artistJson as $key => $value) {
      echo "<div class=\"db artist-result\">
        <article class=\"mw7 center bg-white br3 pa3 pa4-ns mv3 ba b--black-10\">
        <div class=\"tc\">
        <img src=\"" . $artistJson[$key]->photo . "\" class=\"br-100 h5 w5 dib\">
        <h1 class=\"f4\">" . $artistJson[$key]->name . "</h1>
        </div>
        <p class=\"lh-copy measure center f7 black-70\">
        <div class=\"b f5\">ID:</div>" . $artistJson[$key]->id . "
        <div class=\"b pt2 f5\">Description:</div>" . $artistJson[$key]->description . "
        <div class=\"b pt2 f5\">Bio:</div>" . $artistJson[$key]->bio . "
        <div class=\"b pt2 f5\">Album list:</div>" . $artistJson[$key]->artist_albums . "
        </p>
        </article>
        </div>";
    } ?>
  </div>
  <script src="react.production.min.js"></script>
  <script src="react-dom.production.min.js"></script>
  <script src="App.js"></script>
</body>

</html>