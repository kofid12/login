<?php
require_once '../db_connect.php';

$id = $_GET["id"];
echo $id; 

$sql = "SELECT * FROM `hotelbooking` WHERE id = $id";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);


if (isset($_POST["update"])) {

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

     $sql = "UPDATE hotelbooking SET hotel_name = '$hotel_name', hotel_address = '$hotel_address', room_type = '$room_type', check_in_date = '$check_in_date', check_out_date = '$check_out_date', customer_name= '$customer_name', customer_email = '$customer_email', customer_phone = '$customer_phone', total_price = '$total_price', `status` = '$status', image_url = '$image_url' WHERE id = {$id}";
    
    if (mysqli_query($conn, $sql)) {
        echo "Booking updated successfully";
    } else {
        echo "Error updating booking: " . mysqli_error($connect);
    }
} else {
    echo "Invalid request";
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
        <h2>UPDATE</h2>
        <form method="post">
            <div class="mb-3">
                <label for="hotel_name" class="form-label">Hotel Name</label>
                <input type="text" class="form-control" id="hotelName" name="hotelName" value="<?= $row["hotel_name"] ?>" required>
            </div>
            <div class="mb-3">
                <label for="hotel_address" class="form-label">Hotel Address</label>
                <input type="text" class="form-control" id="hotelAddress" name="hotelAddress"value="<?= $row["hotel_address"] ?>" required>
            </div>
            <div class="mb-3">
                <label for="room_type" class="form-label">Room Type</label>
                <input type="text" class="form-control" id="roomType" name="roomType"value="<?= $row["room_type"] ?>" required>
            </div>
            <div class="mb-3">
                <label for="check_in_date" class="form-label">Check-In Date</label>
                <input type="date" class="form-control" id="checkInDate" name="checkInDate"value="<?= $row["check_in_date"] ?>" required>
            </div>
            <div class="mb-3">
                <label for="check_out_date" class="form-label">Check-Out Date</label>
                <input type="date" class="form-control" id="checkOutDate" name="checkOutDate"value="<?= $row["check_out_date"] ?>" required>
            </div>
            <div class="mb-3">
                <label for="customer_name" class="form-label">Customer Name</label>
                <input type="text" class="form-control" id="customerName" name="customerName"value="<?= $row["customer_name"] ?>" required>
            </div>
            <div class="mb-3">
                <label for="customer_email" class="form-label">Customer Email</label>
                <input type="email" class="form-control" id="customerEmail" name="customerEmail"value="<?= $row["customer_email"] ?>" required>
            </div>
            <div class="mb-3">
                <label for="customer_phone" class="form-label">Customer Phone</label>
                <input type="tel" class="form-control" id="customerPhone" name="customerPhone"value="<?= $row["customer_phone"] ?>" required>
            </div>
            <div class="mb-3">
                <label for="total_price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="<?= $row["total_price"] ?>"required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" value="<?= $row["status"] ?>">
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="canceled">Canceled</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">Image URL</label>
                <input type="text" class="form-control" id="imageUrl" name="imageUrl">
            </div>
            <button type="submit" class="btn btn-primary" name="update">update Booking</button>
            <a href="read.php" class="btn btn-secondary">Cancel</a>
            <a href="index.php" class="btn btn-secondary">Back to Home</a>
        </form>
    </div>
</body>
</html>