const API_KEY = 'e42b13d6efed40cf85ba8e51189a9121';  // Replace with your Spoonacular API Key

async function getRecipes() {
    const calorieInput = document.getElementById('calorieInput').value;
    const recipeList = document.getElementById('recipeList');

    if (!calorieInput || isNaN(calorieInput) || calorieInput <= 0) {
        recipeList.style.display = 'block';
        recipeList.innerHTML = '<p class="error">Please enter a valid calorie value.</p>';
        return;
    }

    const url = `https://api.spoonacular.com/recipes/findByNutrients?apiKey=${API_KEY}&maxCalories=${calorieInput}&number=5`;

    try {
        const response = await fetch(url);
        const data = await response.json();

        if (!data || data.length === 0) {
            recipeList.style.display = 'block';
            recipeList.innerHTML = '<p>No recipes found for the specified calorie range.</p>';
            return;
        }

        let recipeHTML = '<h2>Recipe Suggestions</h2>';
        data.forEach((recipe) => {
            const recipeTitleEncoded = encodeURIComponent(recipe.title);
            const recipeUrl = `https://spoonacular.com/recipes/${recipeTitleEncoded}-${recipe.id}`;
            
            recipeHTML += `
                <div class="recipe-item">
                    <h3>${recipe.title}</h3>
                    <p>Calories: ${recipe.calories} kcal</p>
                    <p><a href="${recipeUrl}" target="_blank">View Recipe</a></p>
                </div>
            `;
        });

        recipeList.style.display = 'block';
        recipeList.innerHTML = recipeHTML;
    } catch (error) {
        recipeList.style.display = 'block';
        recipeList.innerHTML = '<p class="error">An error occurred while fetching recipes. Please try again later.</p>';
    }
}
