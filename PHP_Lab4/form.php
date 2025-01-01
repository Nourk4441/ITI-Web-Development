<?php
 #1
   //open & close connection
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'users_iti';
   $conn = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging error #: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// echo "Success: A proper connection to MySQL was made! The <span style='color:red'> $dbname </span>database is great.<br>" . PHP_EOL;
// echo "Host information: " . mysqli_get_host_info($conn) . PHP_EOL;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $mail_status = isset($_POST['mail_status']) ? 'yes' : 'no';

    $sql = "INSERT INTO users (name, email, gender, mail_status) VALUES ('$name', '$email', '$gender', '$mail_status')";

    if ($conn->query($sql) === TRUE) {
        header('Location: home.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!-- HTML form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>User Registration Form</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Gender</label><br>
            <input type="radio" id="female" name="gender" value="Female" required> Female
            <input type="radio" id="male" name="gender" value="Male"> Male
        </div>
        <div class="mb-3">
            <input type="checkbox" id="mail_status" name="mail_status">
            <label for="mail_status">Receive E-Mails from us.</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="home.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
