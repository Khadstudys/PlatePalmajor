<?php
session_start();
include("connect.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="homepage.css">

</head>
<body>
    <div style="text-align:center; padding:15%; background-color:#009688; color:white; border-bottom-right-radius:800px;">
      <p  style="font-size:50px; font-weight:bold;">
       Hello  <?php 
       if(isset($_SESSION['email'])){
        $email=$_SESSION['email'];
        $query=mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
        while($row=mysqli_fetch_array($query)){
            echo $row['firstName'].' '.$row['lastName'];
        }
       }
       ?>
       :)
      </p>
      </div>
      <div class="container">
        <div class="card__container">
            <article class="card__article">
                <img src="drink.jpg" alt="image" class="card__img">
                <div class="card__data">
                    <p class="card__description">water you should drink</p>
                    <h2 class="card__title">Calculate Water Intake</h2>
                    <a href="f1.php" class="card__button">Water-Intake</a>
                    <br>
                    <a href="f2.php" class="card__button">Water-Track</a>
                </div>
            </article>
            <article class="card__article">
            <img src="food.jpg" alt="image" class="card__img">
                <div class="card__data">
                    <p class="card__description">Manage your Calorie</p> 
                    <h2 class="card__title">Calorie Manager</h2>
                    
                    <a href="f3.php" class="card__button">Calorie-calci</a>
                    <br>
                    <a href="f4.php" class="card__button">Reci-Calorie-Calci</a>
                    <br>
                    <a href="f5.php" class="card__button">Find recipe</a>
                </div>
            </article>
            <article class="card__article">
            <img src="cal-food.jpg" alt="image" class="card__img">
                <div class="card__data">
                    <p class="card__description">Get yourself a Pal</p> 
                    <h2 class="card__title">AiPal</h2>
                    <a href="/platepal/major/ai/" class="card__button">AiPal</a>


                </div>
            </article>
        </div>
      </div>
      <div class="safe">
      <button type="button" class="btn"><span></span><a href="logout.php">LOG OUT</a></button>
      </div>
      

</body>
</html>