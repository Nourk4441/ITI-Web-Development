<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    #First
    echo nl2br("Hello World!\nThis is PHP.\nWelcome to Web Development.\n");
    #Second
    echo "<h3>Server Information:</h3>";
    echo "<ul>";
    foreach ($_SERVER as $key => $value) {
        echo "<li><strong>$key</strong>: $value</li>";
    }
    echo "</ul>";
    #Third
    // String function examples
    $string = "Hello, PHP World!";
    echo "String Length: " . strlen($string) . "<br>";
    echo "String Position of 'PHP': " . strpos($string, "PHP") . "<br>";
    echo "String Uppercase: " . strtoupper($string) . "<br>";

    // Array function examples
    $array = [1, 2, 3, 4, 5];
    echo "Array Sum: " . array_sum($array) . "<br>";
    echo "Array Count: " . count($array) . "<br>";
    shuffle($array); // Shuffles array elements randomly
    echo "Shuffled Array: ";
    print_r($array);
    echo "<br>";
    #Fourth
    $numbers[0] = 12;
    $numbers[1] = 45;
    $numbers[2] = 10;
    $numbers[3] = 25;
    
    $sum = array_sum($numbers);
    $avg = $sum / count($numbers);

    echo "Sum: $sum<br>";
    echo "Average: $avg<br>";

    // Sort in reverse order
    krsort($numbers); 
    echo "Sorted in Reverse Order: ";
    print_r($numbers);
    echo "<br>";
    #Fifth
    $ages = array("Sara" => 31, "John" => 41, "Walaa" => 39, "Ramy" => 40);

    // a) Ascending order sort by value
    asort($ages);
    echo "Ascending Order by Value: ";
    print_r($ages);
    echo "<br>";

    // b) Ascending order sort by key
    ksort($ages);
    echo "Ascending Order by Key: ";
    print_r($ages);
    echo "<br>";

    // c) Descending order sort by value
    arsort($ages);
    echo "Descending Order by Value: ";
    print_r($ages);
    echo "<br>";

    // d) Descending order sort by key
    krsort($ages);
    echo "Descending Order by Key: ";
    print_r($ages);
    echo "<br>";
    ?>
</body>
</html>