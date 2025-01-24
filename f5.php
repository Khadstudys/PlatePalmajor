<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calorie to Recipe Finder</title>
    <link rel="stylesheet" href="f5.css">
</head>
<body>
    <div class="container">
        <h1>Calorie to Recipe Finder</h1>
        <p>Enter the number of calories, and we'll suggest a list of recipes for you!</p>
        
        <div class="input-group">
            <label for="calorieInput">Calories (in kcal):</label>
            <input type="number" id="calorieInput" placeholder="e.g. 500">
        </div>

        <button onclick="getRecipes()">Find Recipes</button>

        <div id="recipeList" class="recipe-list"></div>
    </div>

    <script src="f5.js"></script>
</body>
</html>
