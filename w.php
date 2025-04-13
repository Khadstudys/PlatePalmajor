<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Weather & Water Intake Pal</title>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"/>
  <style>
    * {
      margin: 0;
      padding: 0;
      font-family: "Poppins", sans-serif;
      box-sizing: border-box;
    }

    body {
      background-color: #222;
      color: #fff;
    }

    .container {
      max-width: 500px;
      background: linear-gradient(135deg, #00feba, #5b548a);
      margin: 40px auto;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    }

    h1 {
      text-align: center;
      margin-bottom: 25px;
    }

    input, select, button {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: none;
      border-radius: 8px;
      font-size: 16px;
    }

    button {
      background-color: #cfb02c;
      color: white;
      cursor: pointer;
      font-weight: bold;
    }

    .result, .weather-details {
      margin-top: 20px;
      text-align: center;
    }

    .weather-icon {
      width: 100px;
      margin: 10px auto;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Weather & Water Intake App</h1>

    <input type="text" id="city" placeholder="Enter your city name">
    <input type="number" id="weight" placeholder="Enter your weight (kg)">
    <input type="number" id="exercise" placeholder="Exercise per day (minutes)">
    
    <select id="gender">
      <option value="">Select Gender</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
    </select>

    <button onclick="checkWeatherAndCalculate()">Check & Calculate</button>

    <div class="weather-details" id="weatherDetails" style="display:none;">
      <img src="" alt="Weather Icon" class="weather-icon" id="weatherIcon">
      <p><strong>City:</strong> <span id="weatherCity"></span></p>
      <p><strong>Temperature:</strong> <span id="weatherTemp"></span>°C</p>
      <p><strong>Humidity:</strong> <span id="weatherHumidity"></span>%</p>
      <p><strong>Wind Speed:</strong> <span id="weatherWind"></span> km/h</p>
    </div>

    <div class="result" id="resultSection" style="display:none;">
      <p><strong>Recommended Daily Water Intake:</strong></p>
      <h2 id="waterResult">0 Liters</h2>
    </div>
  </div>

  <script>
    const apikey = "c95e55a3f278b55f80714bf8d35f9f47";
    const apiUrl = "https://api.openweathermap.org/data/2.5/weather?units=metric&q=";
  
    async function checkWeatherAndCalculate() {
      const city = document.getElementById("city").value.trim();
      const weight = parseFloat(document.getElementById("weight").value);
      const exercise = parseFloat(document.getElementById("exercise").value);
      const gender = document.getElementById("gender").value;
  
      if (!city || isNaN(weight) || isNaN(exercise) || !gender) {
        alert("Please fill all fields correctly.");
        return;
      }
  
      const response = await fetch(apiUrl + city + `&appid=${apikey}`);
      if (response.status === 404) {
        alert("Invalid city name.");
        return;
      }
  
      const data = await response.json();
  
      // Display weather data
      document.getElementById("weatherCity").textContent = data.name;
      document.getElementById("weatherTemp").textContent = Math.round(data.main.temp);
      document.getElementById("weatherHumidity").textContent = data.main.humidity;
      document.getElementById("weatherWind").textContent = data.wind.speed;
  
      // Show matching weather icon
      const weatherMain = data.weather[0].main;
      let iconSrc = "wimages/clear.png"; // Default
  
      switch (weatherMain) {
        case "Clouds":
          iconSrc = "wimages/clouds.png";
          break;
        case "Rain":
          iconSrc = "wimages/rain.png";
          break;
        case "Drizzle":
          iconSrc = "wimages/drizzle.png";
          break;
        case "Mist":
          iconSrc = "wimages/mist.png";
          break;
        case "Snow":
          iconSrc = "wimages/snow.png";
          break;
        case "Wind":
          iconSrc = "wimages/wind.png";
          break;
        case "Clear":
          iconSrc = "wimages/clear.png";
          break;
        default:
          iconSrc = "wimages/clear.png";
          break;
      }
  
      document.getElementById("weatherIcon").src = iconSrc;
      document.getElementById("weatherDetails").style.display = "block";
  
      // Water intake calculation
      let waterLiters = weight * 0.033;
      waterLiters += (exercise / 30) * 0.35;
  
      if (data.main.humidity > 70) {
        waterLiters += 0.3;
      } else if (data.main.humidity < 30) {
        waterLiters += 0.5;
      }
  
      if (gender === "male") {
        waterLiters += 0.5;
      }
  
      document.getElementById("waterResult").textContent = waterLiters.toFixed(2) + " Liters";
      document.getElementById("resultSection").style.display = "block";
    }
  </script>
  

</body>
</html>

