<?php
include 'db_connect.php';

$sql = "SELECT * FROM doctors";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table'><tr><th>ID</th><th>Name</th><th>Specialty</th><th>Available Times</th><th>Profile</th><th>Actions</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["specialty"]. "</td><td>" . $row["available_times"]. "</td><td>" . $row["profile"]. "</td><td><a href='update_doctor.php?id=" . $row["id"] . "' class='btn btn-secondary'>Edit</a> <a href='delete_doctor.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
