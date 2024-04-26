<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $projectId = $_POST['project_id'];
    $amount = $_POST['amount'];

    $conn = new mysqli("localhost", "root", "", "onlinecrowdfunding");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind parameters to prevent SQL injection
    $stmt = $conn->prepare("UPDATE projects SET funds_raised = funds_raised + ? WHERE id = ?");
    $stmt->bind_param("ii", $amount, $projectId);

    // Execute the update statement
    if ($stmt->execute()) {
        // Close the statement and connection
        $stmt->close();
        $conn->close();
        
        // Redirect to home page
        echo '<script>';
        echo 'alert("Funds added successfully.");';
        echo 'window.location.href = "home_page.php";'; // Change "home.php" to your actual home page URL
        echo '</script>';
        exit; // Stop further execution
    } else {
        echo "Error updating funds: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
