<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Application name: PHP class registration</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Track</th>
            </tr>
        </thead>
        <tbody>
            <?php
            #First: Data on browser
            $students = [
                ['name' => 'Alaa', 'email' => 'ahmed@test.com', 'track' => 'CMS'],
                ['name' => 'Shamy', 'email' => 'ali@test.com', 'track' => 'AAST'],
                ['name' => 'Youssef', 'email' => 'basem@test.com', 'track' => 'AAST'],
                ['name' => 'Waleid', 'email' => 'farouk@test.com', 'track' => 'CMS'],
                ['name' => 'Rahma', 'email' => 'hany@test.com', 'track' => 'AAST'],
            ];

            foreach ($students as $student) {
                $style = $student['track'] === 'CMS' ? 'style="color:red;"' : '';
                echo "<tr>";
                echo "<td $style>{$student['name']}</td>";
                echo "<td $style>{$student['email']}</td>";
                echo "<td $style>{$student['track']}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
        </table>
</body>
</html>