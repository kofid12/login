<?php
require_once '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM hotelbooking WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Booking Details</title>
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
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Create Booking</a>
                    </li>
                 
                </ul>
            </div>
        </div>
    </nav>


            <div class="container">
                <h2>Booking Details</h2>
                <div class="card">
                <img src="<?php echo $row['image_url']; ?>" class="card-img-top" alt="Hotel Image">
                    <div class="card-body">
                        <h5 class="card-title">Hotel Name: <?php echo $row['hotel_name']; ?></h5>
                        <p class="card-text">Location: <?php echo $row['hotel_address']; ?></p>
                        <p class="card-text">Room Type: <?php echo $row['room_type']; ?></p>
                        <p class="card-text">Check-In Date: <?php echo $row['check_in_date']; ?></p>
                        <p class="card-text">Check-Out Date: <?php echo $row['check_out_date']; ?></p>
                        <p class="card-text">Customer Name: <?php echo $row['customer_name']; ?></p>
                        <p class="card-text">Customer Email: <?php echo $row['customer_email']; ?></p>
                        <p class="card-text">Customer Phone: <?php echo $row['customer_phone']; ?></p>
                        <p class="card-text">Total Price: <?php echo $row['total_price']; ?></p>
                        <p class="card-text">Status: <?php echo $row['status']; ?></p>
                    </div>
                </div>
                <a href="index.php" class="btn btn-secondary mt-3">Back to Home</a>
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
<?php
    } else {
        echo "<p>Booking not found</p>";
    }
} else {
    echo "Invalid request";
}
?>
