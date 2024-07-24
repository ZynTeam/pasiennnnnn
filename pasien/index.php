<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Healthcare System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 style= "margin-bottom: 87px">Healthcare System</h1>
        <a href="create_patient.php" class="btn btn-primary">Add Patient</a>
        <a href="create_doctor.php" class="btn btn-primary">Add Doctor</a>
        <a href="create_appointment.php" class="btn btn-primary">Schedule Appointment</a>
        <h2>Patients</h2>
        <?php include 'read_patients.php'; ?>
        <h2>Doctors</h2>
        <?php include 'read_doctors.php'; ?>
        <h2>Appointments</h2>
        <?php include 'read_appointments.php'; ?>
    </div>
</body>
</html>
