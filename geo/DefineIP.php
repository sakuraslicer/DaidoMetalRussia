<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
  </body>
</html>

<?php

  $ipAddress = $_SERVER['REMOTE_ADDR'];
  if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
    $ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
    //print_r($ipAddress); //- вывести ip-адрес
  }
//var_dump($ipAddress);

include("SxGeo.php");
$SxGeo = new SxGeo('SxGeoCity.dat');

$getCity = $SxGeo->getCityFull($ipAddress);
$city_ru =  $getCity['city']['name_ru'];
//echo $city_ru." ";

$getRegion = $SxGeo->getCityFull($ipAddress);
$region_ru =  $getRegion['region']['name_ru'];
//echo $region_ru." ";

$city5 = $SxGeo->getCityFull($ipAddress);
$iso_code =  $city5['region']['iso'];
//echo $iso_code;

//print_r($getCity); //- вывести весь массив
?>
