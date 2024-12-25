<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    # First
    phpinfo();
    echo '<br>';

    # Second
    define("WEBSITE_NAME", "My Site");
    echo "Welcome to " . WEBSITE_NAME . "<br>";
    echo '<br>';

    # Third 
    echo "Server Name: " . $_SERVER['SERVER_NAME'] . "<br>";
    echo "Server Address: " . $_SERVER['SERVER_ADDR'] . "<br>";
    echo "Server Port: " . $_SERVER['SERVER_PORT'] . "<br>";
    echo "Script Filename: " . $_SERVER['SCRIPT_FILENAME'] . "<br>";
    echo "Script Path: " . $_SERVER['PHP_SELF'] . "<br>";
    echo '<br>';

    # Fourth
    $age = 10; 

    switch (true) {
        case ($age < 5):
            echo "Stay at home.<br>";
            break;

        case ($age == 5):
            echo "Go to Kindergarten.<br>";
            break;

        case ($age >= 6 && $age <= 12):
            echo "Go to grade : " . ($age - 5) . "<br>"; 
            break;

}
    ?>
</body>
</html>