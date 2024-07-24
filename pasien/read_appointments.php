<?php
include 'db_connect.php';

$sql = "SELECT a.id, p.name as patient_name, d.name as doctor_name, a.appointment_date, a.status FROM appointments a
        JOIN patients p ON a.patient_id = p.id
        JOIN doctors d ON a.doctor_id = d.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table'><tr><th>ID</th><th>Patient</th><th>Doctor</th><th>Appointment Date</th><th>Status</th><th>Actions</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["patient_name"]. "</td><td>" . $row["doctor_name"]. "</td><td>" . $row["appointment_date"]. "</td><td>" . $row["status"]. "</td><td><a href='update_appointment.php?id=" . $row["id"] . "' class='btn btn-secondary'>Edit</a> <a href='delete_appointment.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
