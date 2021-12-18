# liveWeather

Web application that outputs the next six day/night weather forcasts using a user inputed address and online APIs.

1) An address is inputed by a user ,and with the help of a Google API, converts that address into latitude and longitude coordinates. 
2) The coordinates are then passed onto another API that convertes them to specfic X, Y gridpoints.
3) Those gridpoints are then passed onto another API that finds the nearest weather station to its location, and acquires the next six forecasts in real time. 
