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

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['ID'])) {
    $id = intval($_GET['ID']); // Ensure ID is an integer
    $sql = "SELECT * FROM users WHERE ID=$id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Record not found!";
        exit;
    }
}

// Update the record when the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['ID']); // Ensure ID is an integer
    $name = $conn->real_escape_string($_POST['Name']);
    $email = $conn->real_escape_string($_POST['Email']);
    $gender = $conn->real_escape_string($_POST['Gender']);
    $mail_status = $conn->real_escape_string($_POST['Mail_status']);

    $updateQuery = "UPDATE users SET Name='$name', Email='$email', Gender='$gender', Mail_status='$mail_status' WHERE ID=$id";

    if ($conn->query($updateQuery) === TRUE) {
        header("Location: home.php"); // Redirect to main page
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Record</h2>
    <form method="POST" action="edit_record.php">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $row['Name']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $row['Email']; ?>" required>
        </div>
        <div class="mb-3">
        <label>Gender</label>  
        <input type="radio" name="gender" value="Female" <?php if ($row['Gender'] == "Female") echo "checked" ; ?>> Female
        <input type="radio" name="gender" value="Male" <?php if ($row['Gender'] == "Male") echo "checked"; ?>> Male
        </div>
        <div class="mb-3">
            <input type="checkbox" id="Mail_status" name="Mail_status" value="yes" <?php if ($row['Mail_status'] == "yes") echo "checked";?>>
            <label for="mail_status">Receive E-Mails from us.</label>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="home.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
