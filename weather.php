<html>
<body>

<h2></h2>

<head> 
    <meta charset = "utf-8" /> 
    <link rel="stylesheet" href="final.css">
</head>
<body>.


<?php
$address = $_GET['address'];
$formattedAddress =  urlencode($address[0]).',+'.urlencode($address[1]).',+'.$address[2].',+'.$address[3];

function get_lat($fa)
{
    $googleURL = "https://maps.googleapis.com/maps/api/geocode/json?address=$fa&key=<enterSuperSecretGoogleAPIkeyCodeHere>";
    $location = json_decode(file_get_contents($googleURL, false), true);
    $lat = $location['results'][0]['geometry']['location']['lat'];
    return $lat;
}

function get_long($fa)
{
    $googleURL = "https://maps.googleapis.com/maps/api/geocode/json?address=$fa&key=<enterSuperSecretGoogleAPIkeyCodeHere>";
    $location = json_decode(file_get_contents($googleURL, false), true);
    $long = $location['results'][0]['geometry']['location']['lng'];
    return $long;
}

$option = array('http' => array('user_agent' => 'finalacsg540'));
$context = stream_context_create($option);


$lat = get_lat($formattedAddress);
$long = get_long($formattedAddress);


// Grid points
$noaaURL = "https://api.weather.gov/points/$lat,$long";
$region = json_decode(file_get_contents($noaaURL, false, $context), true);

$gridID = $region['properties']['gridId'];
$gridX = $region['properties']['gridX'];
$gridY = $region['properties']['gridY'];

$gridPointsNoaaURL = "https://api.weather.gov/gridpoints/$gridID/$gridX,$gridY/forecast";
$gridPoints = json_decode(file_get_contents($gridPointsNoaaURL, false, $context), true);



//Get day/night weather forecast
$forcast1 = $gridPoints['properties']['periods'][0]['name'];
$forcast1Temp = $gridPoints['properties']['periods'][0]['temperature'];
$forcast1WS = $gridPoints['properties']['periods'][0]['windSpeed'];
$forcast1WD = $gridPoints['properties']['periods'][0]['windDirection'];


$forcast2 = $gridPoints['properties']['periods'][1]['name'];
$forcast2Temp = $gridPoints['properties']['periods'][1]['temperature'];
$forcast2WS = $gridPoints['properties']['periods'][1]['windSpeed'];
$forcast2WD = $gridPoints['properties']['periods'][1]['windDirection'];


$forcast3 = $gridPoints['properties']['periods'][2]['name'];
$forcast3Temp = $gridPoints['properties']['periods'][2]['temperature'];
$forcast3WS = $gridPoints['properties']['periods'][2]['windSpeed'];
$forcast3WD = $gridPoints['properties']['periods'][2]['windDirection'];


$forcast4 = $gridPoints['properties']['periods'][3]['name'];
$forcast4Temp = $gridPoints['properties']['periods'][3]['temperature'];
$forcast4WS = $gridPoints['properties']['periods'][3]['windSpeed'];
$forcast4WD = $gridPoints['properties']['periods'][3]['windDirection'];


$forcast5 = $gridPoints['properties']['periods'][4]['name'];
$forcast5Temp = $gridPoints['properties']['periods'][4]['temperature'];
$forcast5WS = $gridPoints['properties']['periods'][4]['windSpeed'];
$forcast5WD = $gridPoints['properties']['periods'][4]['windDirection'];


$forcast6 = $gridPoints['properties']['periods'][5]['name'];
$forcast6Temp = $gridPoints['properties']['periods'][5]['temperature'];
$forcast6WS = $gridPoints['properties']['periods'][5]['windSpeed'];
$forcast6WD = $gridPoints['properties']['periods'][5]['windDirection'];
?>



<div class = "container">
  <h1>Weather Forecast</h1>

<table>
  <tr>
    <th></th>
    <th> <p> <?php echo $forcast1;?> </p> </th>
    <th> <p> <?php echo $forcast2;?> </p> </th>
    <th> <p> <?php echo $forcast3;?> </p> </th>
    <th> <p> <?php echo $forcast4;?> </p></th>
    <th> <p> <?php echo $forcast5;?> </p> </th>
    <th> <p> <?php echo $forcast6;?> </p> </th>
  </tr>
  <tr>
    <td> Temp (F)</td>
    <td><p> <?php echo $forcast1Temp;?> </p> </td>
    <td> <p> <?php echo $forcast2Temp;?> </p></td>
    <td> <p> <?php echo $forcast3Temp;?> </p></td>
    <td> <p> <?php echo $forcast4Temp;?> </p> </td>
    <td> <p> <?php echo $forcast5Temp;?> </p></td>
    <td> <p> <?php echo $forcast6Temp;?> </p></td>
  </tr>
  <tr>
    <td> Wind Speed</td>
    <td><p> <?php echo $forcast1WS;?> </p></td>
    <td><p> <?php echo $forcast2WS;?> </p></td>
    <td><p> <?php echo $forcast3WS;?> </p></td>
    <td><p> <?php echo $forcast4WS;?> </p></td>
    <td><p> <?php echo $forcast5WS;?> </p></td>
    <td><p> <?php echo $forcast6WS;?> </p></td>
  </tr>
  <tr>
    <td> Wind Direction</td>
    <td><p> <?php echo $forcast1WD;?> </p></td>
    <td><p> <?php echo $forcast2WD;?> </p></td>
    <td><p> <?php echo $forcast3WD;?> </p></td>
    <td><p> <?php echo $forcast4WD;?> </p></td>
    <td><p> <?php echo $forcast5WD;?> </p></td>
    <td><p> <?php echo $forcast6WD;?> </p></td>
  </tr>
  <tr>
    <td><form action="input.html"> <input type="submit" id="home" value="Back to Home" class="sbutton"/> </form> </td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td> </td>
  </tr>
</table>


</div>


</body>

</html>
