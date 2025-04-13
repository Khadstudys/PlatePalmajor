<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Pal</title>
    <link rel="stylesheet" href="w.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>

<body>
    <div class="card">
        <div class="search">
            <input type="text" placeholder="enter city name" spellcheck="false" id="city">
            <button type="button"><img src="wimages/search.png"></button>
        </div>
        <div class="error">
            <p>Invalid city name</p>
        </div>
            <div class="weather">
                <img src="wimages/rain.png" class="weather-icon">
                <h1 class="temp">22°c</h1>
                <h2 class="city">New York</h2>
                <div class="details">
                    <div class="col">
                        <img src="wimages/humidity.png">
                        <div>
                            <p class="humidity">50%</p>
                            <p>Humidity, drink adequate water</p>
                        </div>
                        </div>
                        <div class="col">
                            <img src="wimages/wind.png">
                            <div>
                                <p class="wind">15 km/h</p>
                                <p>Wind speed, be careful</p>
                            </div>
                    
                </div>
            </div>
        
    </div>
    <script>
        const apikey = "c95e55a3f278b55f80714bf8d35f9f47";
        const apiUrl = "https://api.openweathermap.org/data/2.5/weather?units=metric&q=";
        const searchBox = document.querySelector(".search input");
        const searchBtn = document.querySelector(".search button");
        const weatherIcon= document.querySelector(".weather-icon");

        async function checkWeather(city){
            const response = await fetch(apiUrl + city +`&appid=${apikey}`);

            if(response.status== 404){
                document.querySelector(".error").style.display = "block";
                document.querySelector(".weather").style.display = "none";
            }else{

                var data = await response.json();
    
            document.querySelector(".city").innerHTML = data.name;
            document.querySelector(".temp").innerHTML = Math.round(data.main.temp) +"°c";
            document.querySelector(".humidity").innerHTML = data.main.humidity+"%";
            document.querySelector(".wind").innerHTML = data.wind.speed +" km/h" ;
            if(data.weather[0].main == "Clouds"){
                weatherIcon.src = "images/clouds.png";

            }
            else if(data.weather[0].main == "Clear"){
                weatherIcon.src = "wimages/clear.png";
            }
            else if(data.weather[0].main == "Rain"){
                weatherIcon.src = "wimages/rain.png";
            }
            else if(data.weather[0].main == "Drizzle"){
                weatherIcon.src = "wimages/drizzle.png";
            }
            else if(data.weather[0].main == "Mist"){
                weatherIcon.src = "wimages/mist.png";
            }
            document.querySelector(".weather").style.display = "block";
            document.querySelector(".error").style.display = "none";

            }
            

        }
        searchBtn.addEventListener("click", ()=>{
            checkWeather(searchBox.value);

        })
        
    </script>
    

</body>
</html> 
