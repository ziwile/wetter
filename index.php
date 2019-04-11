<?php

// Wir holen uns die Wetterdaten von metaweather für Berlin (WOEID 638242) ; return JSON Array
$wetter = file_get_contents("https://www.metaweather.com/api/location/638242/");

// Umwandlung von JSON in PHP Arrays
$wetter = json_decode($wetter, true);

// Nur consolidated_weather und nur Daten für heute
$wetterdaten = $wetter['consolidated_weather'][0];

$forecast = $wetter['consolidated_weather'];

$datum = date("H:i j.n.Y");

function weatherTagline($weatherstate_abbr = ""){

  if ($weatherstate_abbr === "c"):
    return "Love is in the air";

  elseif ($weatherstate_abbr === "sn"):
    return "Winter is Coming";

  elseif ($weatherstate_abbr === "lc"):
    return "Ganz OK";

  else:
    return "Bonjour Tristess";

  endif;
}





?>


<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nicht so tolle Wetter App</title>

    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="hero is-fullheight is-dark is-bold">
      <div class="container has-text-centered">
        <div class="content is-small">
          <span>Berlin</span>
          <?php
            echo $datum;
           ?>
        </div>

      <div class="rel state">
        <img src="img/<?php echo $wetterdaten['weather_state_abbr']?>.svg" alt="" width="200" height="200">
        <p>
          <span class="min-temp">
            <?php echo round($wetterdaten['min_temp']) . " °C"?>
          </span>

          <span class="max-temp">
            <?php echo round($wetterdaten['max_temp']) . " °C"?>
          </span>
        </p>
        </div>

        <div class="content is-large state">
          <p class="is-size-1 is-uppercase has-text-weight-bold">
            <?php  echo weatherTagline($wetterdaten['weather_state_abbr']); ?>
          </p>
        </div>

      </div>

      <div class="forecast">
        <?php
          for ($i=1; $i < count($forecast) ; $i++) { ?>
            <div class="daily">
              <img src="img/<?php echo $forecast[$i]['weather_state_abbr']  ?>.svg" alt="" width="200" height="200">
              <p>
                <?php echo $forecast[$i]['max_temp']; ?>
              </p>
            </div>
          <?php } ?>
      </div>
      </div>
    </div>
  </body>
</html>
