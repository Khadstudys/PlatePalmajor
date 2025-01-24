document.getElementById("analyzeBtn").addEventListener("click", function () {
    const recipeInput = document.getElementById("recipeInput").value.trim();

    if (!recipeInput) {
        alert("Please enter a recipe!");
        return;
    }

    fetchNutritionData(recipeInput);
});

async function fetchNutritionData(recipeInput) {
    const apiKey = "c4580f75f3894ef7bf65fcbbeca72d34"; // Your Spoonacular API key
    const apiUrl = "https://api.spoonacular.com/recipes/parseIngredients";

    // Split the input into individual ingredient lines (by commas or newlines)
    const ingredients = recipeInput.split("\n").map((line) => line.trim()).join("\n");

    // URL-encoded request body
    const formBody = new URLSearchParams({
        apiKey: apiKey,
        ingredientList: ingredients,
        servings: "1",
        includeNutrition: true,
    }).toString();

    
    /*console.log("Sending request to:", apiUrl);
    console.log("Request body:", formBody);*/

    try {
        const response = await fetch(apiUrl, {
            apiKey: apiKey,
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                "x-api-key":"c4580f75f3894ef7bf65fcbbeca72d34",
            },
            body: formBody,
        });

        if (!response.ok) {
            throw new Error(`API error: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        console.log("Response data:", data);
        displayNutritionData(data);
    } catch (error) {
        console.error("Error fetching data:", error);
        alert(`An error occurred: ${error.message || "Unknown error"}`);
    }
}

function displayNutritionData(data) {
    const nutritionDataDiv = document.getElementById("nutritionData");

    // Clear previous results
    nutritionDataDiv.innerHTML = "";

    if (!data || data.length === 0) {
        nutritionDataDiv.innerHTML = "<p>No nutritional data found for the given recipe.</p>";
        return;
    }
    // Show result section
    document.getElementById("result").style.display = "block";

    // Display each ingredient's nutritional data
    data.forEach(ingredient => {
        const nutrients = ingredient.nutrition?.nutrients || [];
        const nutrientInfo = nutrients.map(
            nutrient => `<tr><td>${nutrient.name}</td><td>${nutrient.amount} ${nutrient.unit}</td></tr>`
        ).join("");

        nutritionDataDiv.innerHTML += `
            <div class="ingredient-card">
                <h3>${ingredient.original}</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Nutrient</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${nutrientInfo}
                    </tbody>
                </table>
            </div>
        `;
    });
}
