<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $available_times = $_POST['available_times'];
    $profile = $_POST['profile'];

    $stmt = $conn->prepare("INSERT INTO doctors (name, specialty, available_times, profile) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $specialty, $available_times, $profile);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Doctor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Add New Doctor</h2>
        <form action="create_doctor.php" method="post">
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="specialty" placeholder="Specialty" required>
            <input type="text" name="available_times" placeholder="Available Times" required>
            <textarea name="profile" placeholder="Profile" required></textarea>
            <input type="submit" value="Add Doctor">
        </form>
    </div>
</body>
</html>
