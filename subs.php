<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Healthy Ingredient Swapper – Plate Pal</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f5f5;
      padding: 40px;
      text-align: center;
    }
    h1 {
      color: #4CAF50;
    }
    textarea {
      width: 300px;
      height: 120px;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
      resize: none;
    }
    button {
      margin-top: 15px;
      padding: 10px 20px;
      background: #4CAF50;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }
    .results {
      margin-top: 20px;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 2px 5px rgba(0,0,0,0.1);
      max-width: 500px;
      margin-left: auto;
      margin-right: auto;
    }
  </style>
</head>
<body>
  <h1>Healthy Ingredient Swapper</h1>
  <p>Enter ingredients separated by commas:</p>
  <textarea id="ingredientInput" placeholder="e.g. pasta, heavy cream, cheese"></textarea><br>
  <button onclick="suggestSwaps()">Suggest Healthy Swaps</button>

  <div class="results" id="resultBox" style="display:none;"></div>

  <script>
    const swapSuggestions = {
      "pasta": "whole wheat pasta or zucchini noodles",
      "heavy cream": "Greek yogurt or cashew cream",
      "cheese": "low-fat cheese or nutritional yeast",
      "butter": "olive oil or avocado oil",
      "sugar": "honey or stevia",
      "white rice": "brown rice or quinoa",
      "white bread": "whole grain bread",
      "fried chicken": "grilled chicken",
      "mayonnaise": "Greek yogurt or avocado spread"
    };

    function suggestSwaps() {
      const input = document.getElementById("ingredientInput").value.toLowerCase();
      const ingredients = input.split(",").map(i => i.trim());
      let output = "";

      ingredients.forEach(ingredient => {
        if (swapSuggestions[ingredient]) {
          output += `<p><strong>${ingredient}</strong> → ${swapSuggestions[ingredient]}</p>`;
        } else {
          output += `<p><strong>${ingredient}</strong> → No swap needed</p>`;
        }
      });

      document.getElementById("resultBox").innerHTML = output;
      document.getElementById("resultBox").style.display = "block";
    }
  </script>
</body>
</html>
