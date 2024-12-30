<?php
// Initialize variables
$name = $email = $group = $gender = $class_details = "";
$courses = [];
$agree = "";
$errors = [];

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Name
    if (empty($_POST['name'])) {
        $errors['name'] = "Name is required";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $_POST['name'])) {
        $errors['name'] = "Only letters and white space allowed";
    } else {
        $name = htmlspecialchars($_POST['name']);
    }

    // Validate Email
    if (empty($_POST['email'])) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    } else {
        $email = htmlspecialchars($_POST['email']);
    }

    // Group
    if (!empty($_POST['group'])) {
        $group = htmlspecialchars($_POST['group']);
    }

    // Class details
    if (!empty($_POST['class_details'])) {
        $class_details = htmlspecialchars($_POST['class_details']);
    }

    // Gender
    if (empty($_POST['gender'])) {
        $errors['gender'] = "Gender is required";
    } else {
        $gender = htmlspecialchars($_POST['gender']);
    }

    // Courses (Multiple Selection Handling)
    if (empty($_POST['courses'])) {
        $errors['courses'] = "Select at least one course";
    } else {
        $courses = $_POST['courses']; // Store selected courses in an array
    }

    // Agree Checkbox
    if (empty($_POST['agree'])) {
        $errors['agree'] = "You must agree to terms";
    } else {
        $agree = "Agreed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Class Registration Form</title>
</head>
<body>
    <h1>Application name: AAST_BIS class registration</h1>
    <p style="color:red;">* Required field.</p>

    <form method="post" action="">
        <!-- Name -->
        Name: <input type="text" name="name" value="<?php echo $name; ?>">
        <span style="color:red;">* <?php echo $errors['name'] ?? ''; ?></span><br><br>

        <!-- Email -->
        E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
        <span style="color:red;">* <?php echo $errors['email'] ?? ''; ?></span><br><br>

        <!-- Group -->
        Group #: <input type="text" name="group" value="<?php echo $group; ?>"><br><br>

        <!-- Class Details -->
        Class details: <br>
        <textarea name="class_details"><?php echo $class_details; ?></textarea><br><br>

        <!-- Gender -->
        Gender:
        <input type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo "checked"; ?>> Female
        <input type="radio" name="gender" value="Male" <?php if ($gender == "Male") echo "checked"; ?>> Male
        <span style="color:red;">* <?php echo $errors['gender'] ?? ''; ?></span><br><br>

        <!-- Courses -->
        Select Courses: <br>
        <select name="courses[]" multiple size="4">
            <option value="PHP" <?php if (in_array("PHP", $courses)) echo "selected"; ?>>PHP</option>
            <option value="JavaScript" <?php if (in_array("JavaScript", $courses)) echo "selected"; ?>>JavaScript</option>
            <option value="MySQL" <?php if (in_array("MySQL", $courses)) echo "selected"; ?>>MySQL</option>
            <option value="HTML" <?php if (in_array("HTML", $courses)) echo "selected"; ?>>HTML</option>
        </select>
        <span style="color:red;">* <?php echo $errors['courses'] ?? ''; ?></span><br><br>

        <!-- Agree -->
        Agree: <input type="checkbox" name="agree" value="agree" <?php if ($agree == "Agreed") echo "checked"; ?>>
        <span style="color:red;">* <?php echo $errors['agree'] ?? ''; ?></span><br><br>

        <input type="submit" value="Submit">
    </form>

    <!-- Display Entered Values -->
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)): ?>
        <h2>Your given values are as:</h2>
        Name: <?php echo $name; ?><br>
        E-mail: <?php echo $email; ?><br>
        Group #: <?php echo $group; ?><br>
        Class details: <?php echo $class_details; ?><br>
        Gender: <?php echo $gender; ?><br>
        Your courses are: <?php echo implode(", ", $courses); ?><br>
        Agreement: <?php echo $agree; ?><br>
    <?php endif; ?>
</body>
</html>