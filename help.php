<?php
$wetter = file_get_contents('https://www.metaweather.com/api/location/638242/');

$wetter = json_decode($wetter, true);

$wetter_heute = $wetter ['consolidated_weather'][0];
// jei pasakau true, gausiu viska perdarytus i array.
 ?>
<!-- html tag, pre macht formatierung -->
 <pre>
<?php
print_r($wetter ['consolidated_weather'][0]);

 ?>

 </pre>
