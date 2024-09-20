<?php
// Function to calculate age based on date of birth
function calculateAge($dob) {
    $birthDate = new DateTime($dob);
    $currentDate = new DateTime(); // Current date
    $age = $currentDate->diff($birthDate); // Calculate age difference
    return $age->y; // Return the difference in years
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture and sanitize user input
    $name = htmlspecialchars($_POST['name']);
    $dob = $_POST['dob'];
    $address = htmlspecialchars($_POST['address']);
    
    // Calculate age
    $age = calculateAge($dob);
    
    // Display the welcome message
    echo "<h2>Welcome home, $name!</h2>";
    echo "<p>Address: $address</p>";
    echo "<p>You are $age years old today!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
</head>
<body>
    <h1>Enter Your Details</h1>
    <!-- Form to capture name, date of birth, and home address -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br><br>

        <label for="address">Home Address:</label>
        <input type="text" id="address" name="address" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
