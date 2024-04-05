<?php
require_once "db_connect.php";

$sql = "SELECT * FROM hotel_bookings";
$result = mysqli_query($connect, $sql);

$layout = "";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $layout .= "
        <div class='card' style='width: 18rem;'>
            <img src='{$row["image_url"]}' class='card-img-top' alt='Hotel Image'>
            <div class='card-body'>
                <h5 class='card-title'>{$row["hotel_name"]}</h5>
                <p class='card-text'>Location: {$row["location"]}</p>
                <p class='card-text'>Price: {$row["price"]}</p>
            </div>
        </div>";
    }
} else {
    $layout = "<p>No hotel bookings found.</p>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Hotel Bookings</h2>
        <div class="row">
            <?= $layout ?>
        </div>
    </div>
</body>
</html>
