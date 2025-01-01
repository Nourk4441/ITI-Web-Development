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

$id = isset($_GET['ID']) ? intval($_GET['ID']) : 0;

$sql = "SELECT * FROM users WHERE ID = $id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

if (!$user) {
    echo "Record not found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>View Record</h2>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td><?php echo $user['ID']; ?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?php echo $user['Name']; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $user['Email']; ?></td>
        </tr>
        <tr>
            <th>Gender</th>
            <td><?php echo $user['Gender']; ?></td>
        </tr>
        <tr>
            <th>Mail Status</th>
            <td><?php echo $user['Mail_status']; ?></td>
        </tr>
    </table>
    <a href="home.php" class="btn btn-secondary">Back</a>
</div>
</body>
</html>
