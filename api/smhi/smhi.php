<?php
$url = "https://opendata-download-metfcst.smhi.se/api/category/pmp3g/version/2/geotype/point/lon/18/lat/59/data.json";
$json = file_get_contents($url);
$dataJSON = json_decode($json);

$timeSeries = $dataJSON->timeSeries;
$tempData = [];
foreach ($timeSeries as $timeStamp) {
  $validTime = $timeStamp->validTime;
  $data->label = $validTime;

  $parameters = $timeStamp->parameters;
  $data = new stdClass();

  foreach ($parameters as $parameter) {
    if ($parameter->name == "t") {
      $temperature = $parameter->values[0];
      $data->t = $temperature;
      $tempData[] = $data;
    }
  }
}
echo json_encode($tempData);
