<?php 


if (isset($_GET['city'])) {
  $city = $_GET['city'];
  // $apiKey = getenv('API_KEY');
  $apiKey = $_ENV['API_KEY'];
  $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";
  
  $response = file_get_contents($apiUrl);
  $data = json_decode($response);

  if ($data->cod == 200) {
    $weather = $data->weather[0]->description;
    $temp = floor($data->main->temp);
    $name = $data->name;
    $country = $data->sys->country;
    echo "<h1>Weather now in $name, $country: $weather, Temperature: $temp °C</h1>";
  } else {
    echo "Failed to fetch weather data.";
  }
}

?>




<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <form action="index.php" method="GET">
      <label for="city">City:</label>
      <input type="text" id="city" name="city" required>
      <button type="submit">Submit</button>
    </form>

  </body>
</html>
