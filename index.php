<?php
// wir ruffen die API von Metaweather für Berlin und packen sie in die variable wetter.
$wetter = file_get_contents('https://www.metaweather.com/api/location/638242/');

// wir verwandeln Json in PHP Array
$wetter = json_decode($wetter, true);
// wir wollen das Wetter nur für heute. Array für das wetter von heute.
$wetter_heute = $wetter ['consolidated_weather'][0];
$datum = date("d.m.Y");
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
          <?php echo $datum; ?>
        </div>

      <div class="rel state">
        <img src= "img/<?php echo $wetter_heute ['weather_state_abbr']  ?>.svg"
         alt="Wetter Icon" width="200" height="200">
        <p>
          <span class="min-temp">
            <?php echo round($wetter_heute ['min_temp'],1);
             ?>
             <!-- jei parasome skaiciu 1, tada apvalina skaiciu vienas po kabelio. -->
          </span>

          <span class="max-temp">
            <?php echo round($wetter_heute ['max_temp']);
             ?>
          </span>
        </p>
        </div>

        <div class="content is-large state">
          <p class="is-size-1 is-uppercase has-text-weight-bold">
            <?php
            if ($wetter_heute ['weather_state_abbr'] == "c"){
// dviguba lygyba rodo, kad abi reikemes yra vienodai svarbios
              echo "La vie est belle";
            }
             elseif ($wetter_heute ['weather_state_abbr'] == "lr") {
               echo "Nützt ja nichts";}
            else{
                 echo "blödes Wetter";}
              ?>


          </p>
        </div>
      </div>
      </div>
    </div>
  </body>
</html>
