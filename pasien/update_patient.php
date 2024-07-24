<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("UPDATE patients SET name=?, email=?, phone=?, address=? WHERE id=?");
    $stmt->bind_param("ssssi", $name, $email, $phone, $address, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM patients WHERE id=$id");
    $patient = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Patient</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Update Patient</h2>
        <form action="update_patient.php" method="post">
            <input type="hidden" name="id" value="<?php echo $patient['id']; ?>">
            <input type="text" name="name" placeholder="Name" value="<?php echo $patient['name']; ?>" required>
            <input type="email" name="email" placeholder="Email" value="<?php echo $patient['email']; ?>" required>
            <input type="text" name="phone" placeholder="Phone" value="<?php echo $patient['phone']; ?>" required>
            <textarea name="address" placeholder="Address" required><?php echo $patient['address']; ?></textarea>
            <input type="submit" value="Update Patient">
        </form>
    </div>
</body>
</html>
