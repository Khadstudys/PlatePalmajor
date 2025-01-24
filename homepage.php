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
                </div>
            </article>
            <article class="card__article">
                <img src="track.jpg" alt="image" class="card__img">
                <div class="card__data">
                    <p class="card__description">Track water you drink</p> 
                    <h2 class="card__title">Water Tracker</h2>
                    <a href="f2.php" class="card__button">Water-Track</a>
                </div>
            </article>
            <article class="card__article">
                <img src="food.jpg" alt="image" class="card__img">
                <div class="card__data">
                    <p class="card__description">Healthy food with Calorie Calculator</p> 
                    <h2 class="card__title">Calorie-Tracker</h2>
                    <a href="calorie.php" class="card__button">Calorie-Track</a>
                </div>
            </article>
        </div>
      </div>
      <div class="safe">
      <button type="button" class="btn"><span></span><a href="logout.php">LOG OUT</a></button>
      </div>
      

</body>
</html>