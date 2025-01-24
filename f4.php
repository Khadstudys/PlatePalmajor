<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Nutrition Analyzer</title>
    <link rel="stylesheet" href="f4.css">
</head>
<body>
    <div class="container">
        <h1>🍴 Recipe Nutrition Analyzer</h1>
        <p>Analyze the nutritional content of your recipe instantly!</p>
        <textarea id="recipeInput" placeholder="Enter each ingredient on a new line (e.g., '1 cup milk')."></textarea>
        <button id="analyzeBtn">Analyze Recipe</button>
        
        <!-- Result section -->
        <div id="result" style="display: none;"> <!-- Hidden by default -->
            <h2>Nutritional Information</h2>
            <div id="nutritionData"></div>
        </div>
    </div>
    <script src="f4.js"></script>
</body>
</html>
