<?php

session_start();

if (!isset($_SESSION["admin"]) && !isset($_SESSION["user"])) {
    header("Location: login.php");
    exit; // Ensure script stops execution after redirect
}

if (isset($_SESSION["admin"])) {
    header("Location: dashboard.php");
    exit; // Ensure script stops execution after redirect
}

require_once "db_connect.php";
if(isset($_SESSION["user"])){
    $sql = "SELECT * from users WHERE id = {$_SESSION["user"]}";
    $result = mysqli_query($conn, $sql);  
    
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }
    
    $row = mysqli_fetch_assoc($result);

}

$layout = "";

    // Fetch products data
    $readQuery = "SELECT * from hotelBooking";
    $readResult = mysqli_query($conn, $readQuery);

    if (!$readResult) {
        die("Error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($readResult) == 0) {
        $layout = "No bookings found!";
    } else {
        while ($value = mysqli_fetch_assoc($readResult)) {
            $layout .= "<div>
                <div class='card' style='width: 18rem;'>
                <img src='{$value["image_url"]}' width ='300' class='card-img-top' alt='Hotel Image'>
                <div class='card-body'>
                <h5 class='card-title'> {$value["hotel_name"]}</h5>
                <p class='card-text'>Location: {$value["hotel_address"]}</p>
                <p class='card-text'>Room Type: {$value["room_type"]}</p>
               
       
               
                <a href='hotelbooking/create.php' class='btn btn-success'>Book</a>
                </div>
                </div>
                </div>";
        }
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
                <img src="pictures/<?= $row["picture"]??"" ?>" alt="Profile Picture" width="30" height="24">
            </a>
            <a class="navbar-brand" href="updateprofile.php">
                Update Profile
            </a>

            <a class="navbar-brand" href="logout.php?logout">
                Logout
            </a>
        </div>
    </nav>
    <div class="container">
        <div class="row row-cols-3">
            <?= $layout ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
