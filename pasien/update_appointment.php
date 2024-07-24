<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $appointment_date = $_POST['appointment_date'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE appointments SET patient_id=?, doctor_id=?, appointment_date=?, status=? WHERE id=?");
    $stmt->bind_param("iissi", $patient_id, $doctor_id, $appointment_date, $status, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM appointments WHERE id=$id");
    $appointment = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Appointment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Update Appointment</h2>
        <form action="update_appointment.php" method="post">
            <input type="hidden" name="id" value="<?php echo $appointment['id']; ?>">
            <input type="number" name="patient_id" placeholder="Patient ID" value="<?php echo $appointment['patient_id']; ?>" required>
            <input type="number" name="doctor_id" placeholder="Doctor ID" value="<?php echo $appointment['doctor_id']; ?>" required>
            <input type="datetime-local" name="appointment_date" value="<?php echo $appointment['appointment_date']; ?>" required>
            <input type="text" name="status" placeholder="Status" value="<?php echo $appointment['status']; ?>" required>
            <input type="submit" value="Update Appointment">
        </form>
    </div>
</body>
</html>
