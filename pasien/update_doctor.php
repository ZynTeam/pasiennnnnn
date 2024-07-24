<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $available_times = $_POST['available_times'];
    $profile = $_POST['profile'];

    $stmt = $conn->prepare("UPDATE doctors SET name=?, specialty=?, available_times=?, profile=? WHERE id=?");
    $stmt->bind_param("ssssi", $name, $specialty, $available_times, $profile, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM doctors WHERE id=$id");
    $doctor = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Doctor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Update Doctor</h2>
        <form action="update_doctor.php" method="post">
            <input type="hidden" name="id" value="<?php echo $doctor['id']; ?>">
            <input type="text" name="name" placeholder="Name" value="<?php echo $doctor['name']; ?>" required>
            <input type="text" name="specialty" placeholder="Specialty" value="<?php echo $doctor['specialty']; ?>" required>
            <input type="text" name="available_times" placeholder="Available Times" value="<?php echo $doctor['available_times']; ?>" required>
            <textarea name="profile" placeholder="Profile" required><?php echo $doctor['profile']; ?></textarea>
            <input type="submit" value="Update Doctor">
        </form>
    </div>
</body>
</html>
