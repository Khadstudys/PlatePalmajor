<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="description" content="Daily Water Calculator">
  <meta name="keywords" content="Water Calculator, Water Consumption, Proper Hydration">
  <meta charset="utf-8">
  <title>Daily Water Intake Tracker</title>
  <style>
    /* Global Styles */
    body {
      font-family: 'Arial', sans-serif;
      background:linear-gradient(to right,#344742,#344742);
      color: #333;
      margin: 0;
      padding: 0;
      min-height: 100vh;
      overflow-y: auto; /* Allow vertical scrolling */
      display: flex;
      justify-content: center;
      align-items: flex-start;
    }
   

    .container {
      background: #fff;
      border-top-left-radius: 80px;
      border-bottom-right-radius: 80px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      padding: 30px 20px;
      width: 90%; /* Flexible width for small devices */
      max-width: 450px;
      margin: 20px auto; /* Center on smaller screens with margin */
    }

    h1 {
      font-size: 2rem; /* Larger font for clarity */
      text-align: center;
      color: #333;
      margin-bottom: 25px;
    }

    fieldset {
      border: none;
      padding: 0;
      margin: 0;
    }

    label {
      font-size: 1.2rem; /* Larger label text */
      color: #333;
      display: block;
      margin-bottom: 8px;
    }

    input, select, button {
      width: 100%;
      padding: 15px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1.1rem; /* Larger font size for inputs */
      box-sizing: border-box;
    }

    button {
      background-color: #cfb02c;
      border: none;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color:rgb(128, 105, 4);
    }

    input[readonly] {
      background-color: #f0f0f0;
      color: #666;
    }

    .result-label {
      font-size: 1.2rem; /* Larger result label */
      font-weight: bold;
      color: #333;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
      h1 {
        font-size: 1.8rem;
      }

      label {
        font-size: 1rem;
      }

      input, select, button {
        padding: 14px;
        font-size: 1rem;
      }
    }

    @media (max-width: 480px) {
      h1 {
        font-size: 1.6rem;
      }

      label {
        font-size: 0.9rem;
      }

      input, select, button {
        padding: 12px;
        font-size: 0.9rem;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Daily Water Intake Tracker</h1>
    <form id="personal_info" onsubmit="return false">
      <fieldset>
        <label for="weight">Please enter your weight (kg):</label>
        <input type="text" id="weight" placeholder="e.g., 70">

        <label for="exercise">How long do you exercise per day (minutes)?</label>
        <input type="text" id="exercise" placeholder="e.g., 30">

        <label for="gender">Select your gender:</label>
        <select id="gender">
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>

        <label for="weather">Select the weather:</label>
        <select id="weather">
          <option value="normal">Normal</option>
          <option value="hot">Hot</option>
          <option value="cold">Cold</option>
        </select>

        <button id="calculate" onclick="calculateWater();">Calculate</button>
        <button id="clear" onclick="resetForm();">Clear</button>

        <p class="result-label">Required daily amount in liters:</p>
        <input type="text" id="required_water" readonly>
      </fieldset>
    </form>
  </div>
  <script type="text/javascript">
    function calculateWater() {
      var weight = parseFloat(document.getElementById("weight").value);
      var activity = parseFloat(document.getElementById("exercise").value);
      var gender = document.getElementById("gender").value;
      var weather = document.getElementById("weather").value;

      if (isNaN(weight) || isNaN(activity)) {
        alert("Please enter numeric values for weight and exercise.");
        return;
      }

      if (weight === "" || activity === "") {
        alert("Please fill out all fields.");
        return;
      }

      var baseWater = weight * 0.033; // Base water intake in liters
      var activityWater = (activity / 30) * 0.35; // Additional water for activity in liters

      if (weather === "hot") {
        baseWater += 0.5;
      } else if (weather === "cold") {
        baseWater -= 0.5;
      }

      if (gender === "male") {
        baseWater += 0.5; // Additional water for males
      }

      var totalWater = baseWater + activityWater;
      totalWater = totalWater.toFixed(2); // Round to 2 decimal places

      document.getElementById("required_water").value = totalWater;
    }

    function resetForm() {
      document.getElementById("personal_info").reset();
    }
  </script>
</body>
</html>
