<?php
require_once '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hotel_name = $_POST['hotelName'];
    $hotel_address = $_POST['hotelAddress'];
    $room_type = $_POST['roomType'];
    $check_in_date = $_POST['checkInDate'];
    $check_out_date = $_POST['checkOutDate'];
    $customer_name = $_POST['customerName'];
    $customer_email = $_POST['customerEmail'];
    $customer_phone = $_POST['customerPhone'];
    $total_price = $_POST['price'];
    $status = $_POST['status'];
    $image_url = $_POST['imageUrl'];

    $sql = "INSERT INTO hotelbooking (hotel_name, hotel_address, room_type, check_in_date, check_out_date, customer_name, customer_email, customer_phone, total_price, status, image_url) 
            VALUES ('$hotel_name', '$hotel_address', '$room_type', '$check_in_date', '$check_out_date', '$customer_name', '$customer_email', '$customer_phone', '$total_price', '$status', '$image_url')";

    if (mysqli_query($conn, $sql)) {
        echo "New booking created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    mysqli_close($conn);
}
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Hotel Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
         body {
            background-image: url('https://cdn.pixabay.com/photo/2021/06/01/12/39/beach-6301597_1280.jpg');
            background-size: cover;
            background-attachment: fixed;
        }


        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 30px 0;
        }

        .social-icons a {
            color: #fff;
            margin-right: 15px;
        }
    </style>







</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">frankBooks</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                   
                    </li>
                 
                </ul>
            </div>
        </div>
    </nav>

< <div class="container">
        <h2>Create New Hotel Booking</h2>
        <form method="post">
            <div class="mb-3">
                <label for="hotel_name" class="form-label">Hotel Name</label>
                <input type="text" class="form-control" id="hotelName" name="hotelName" required>
            </div>
            <div class="mb-3">
                <label for="hotel_address" class="form-label">Hotel Address</label>
                <input type="text" class="form-control" id="hotelAddress" name="hotelAddress" required>
            </div>
            <div class="mb-3">
                <label for="room_type" class="form-label">Room Type</label>
                <input type="text" class="form-control" id="roomType" name="roomType" required>
            </div>
            <div class="mb-3">
                <label for="check_in_date" class="form-label">Check-In Date</label>
                <input type="date" class="form-control" id="checkInDate" name="checkInDate" required>
            </div>
            <div class="mb-3">
                <label for="check_out_date" class="form-label">Check-Out Date</label>
                <input type="date" class="form-control" id="checkOutDate" name="checkOutDate" required>
            </div>
            <div class="mb-3">
                <label for="customer_name" class="form-label">Customer Name</label>
                <input type="text" class="form-control" id="customerName" name="customerName" required>
            </div>
            <div class="mb-3">
                <label for="customer_email" class="form-label">Customer Email</label>
                <input type="email" class="form-control" id="customerEmail" name="customerEmail" required>
            </div>
            <div class="mb-3">
                <label for="customer_phone" class="form-label">Customer Phone</label>
                <input type="tel" class="form-control" id="customerPhone" name="customerPhone" required>
            </div>
            <div class="mb-3">
                <label for="total_price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="canceled">Canceled</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">Image URL</label>
                <input type="text" class="form-control" id="imageUrl" name="imageUrl">
            </div>
            <button type="submit" class="btn btn-primary" name="create">Create Booking</button>
            <a href="read.php" class="btn btn-secondary">Cancel</a>
            <a href="index.php" class="btn btn-secondary">Back to Home</a>
        </form>
    </div>

    <footer class="footer">
        <div class="container text-center">
            <div class="social-icons">
                <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
               
            </div>
            <p>&copy; 2024 FrankView System. All rights reserved.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
