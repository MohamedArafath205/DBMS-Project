<?php
// Check if form data exists
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database configuration
    $servername = "localhost"; // Replace with your database server name
    $username = "root"; // Replace with your database username
    $password_db = ""; // Replace with your database password
    $dbname = "onlinecrowdfunding"; // Replace with your database name

    // Create a database connection
    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute a SELECT query to check credentials
    $stmt = $conn->prepare("SELECT email, password FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User found, verify password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, redirect to home page
            header("Location: home_page.html");
            exit();
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User not found";
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Form data not submitted or incomplete!";
}
?>
