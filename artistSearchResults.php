<?php
require "mainApi.php";
searchAll($_POST['artistSearch'], "artist");
$artistJson = json_decode(file_get_contents(".temp.json"));
die; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Stupefy - Search</title>
  <link rel="stylesheet" href="tachyons.css" />
  <!-- <script src="App.js"></script> -->
</head>

<body>
  <div id="root" class="avenir">
    <div class="bg-green pv5 tc white">
      <div class="f1">Stupefy</div>
      <div class="f5">Magically iterating through all your favorite artists.</div>
    </div>
    <div class="db artist-result">
      <article class="mw7 center bg-white br3 pa3 pa4-ns mv3 ba b--black-10">
        <div class="tc">
          <img src="http://tachyons.io/img/avatar_1.jpg" class="br4 h5 w5 dib" title="Photo of a kitty staring at you">
          <h1 class="f4">Mimi Whitehouse</h1>
          <hr class="mw3 bb bw1 b--black-10">
        </div>
        <p class="lh-copy measure center f6 black-70">
          Quite affectionate and outgoing.
          She loves to get chin scratches and will
          roll around on the floor waiting for you give her more of them.
        </p>
      </article>
    </div>
  </div>
</body>

</html>