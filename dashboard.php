<?php

session_start();

// Check if neither admin nor user is logged in
if (!isset($_SESSION["adm"]) && !isset($_SESSION["user"])) {
    header("Location: login.php");
}

// Redirect users to home.php
if (isset($_SESSION["user"])) {
    header("Location: home.php");
}

// Include database connection
require_once "db_connect.php";

// Fetch admin details
$sql = "SELECT * FROM users WHERE id = {$_SESSION["adm"]}";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);




  // Fetch data from the database
  $sqlproduct = "SELECT * FROM hotelBooking";
  $result2 = mysqli_query($conn, $sqlproduct);
  $layout = "";
  // Check if records exist
  if (mysqli_num_rows($result2) > 0) {
      while ($rows = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {

       $layout .= " <div>
       <div class='card mt-5'>
                  <img src='{$rows["image_url"]}' width ='300' class='card-img-top' alt='Hotel Image'>
                  <div class='card-body'>
                      <h5 class='card-title'> {$rows["hotel_name"]}</h5>
                      <p class='card-text'>Location: {$rows["hotel_address"]}</p>
                      <p class='card-text'>Room Type: {$rows["room_type"]}</p>
                     
                      <p class='card-text'>Status: {$rows["status"]}</p>
                      <a href='details.php?id={$rows["id"]}' class='btn btn-warning'>Details</a>
                      <a href='update.php?id={$rows["id"]}' class='btn btn-primary'>Update</a>
                      <a href='delete.php?id={$rows["id"]}' class='btn btn-danger ms-1'>Delete</a>
                  </div>
              </div>
          </div>";

      }
  } else {
      $layout .= "<p>No bookings found</p>";
  }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello <?= $row["first_name"] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="pictures/<?= $row["picture"] ?>" alt="Profile Picture" width="30" height="24">
            </a>

            <a class="navbar-brand" href="updateProfile.php">
                Update Profile
            </a>

            <a class="navbar-brand" href="hotelBooking/index.php">
                Bookings
            </a>

            <a class="navbar-brand" href="logout.php?logout">
                Logout
            </a>
        </div>
    </nav>

    <div class="container">
        <h1 class="my-4">Hotel Booking System</h1>
        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-1 m">
            
                <?= $layout ?>
          
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
