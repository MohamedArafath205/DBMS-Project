<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $projectId = $_POST['project_id'];
    $amount = $_POST['amount'];

    // Debugging: Echo out the project ID and amount to verify
    echo "Project ID: " . $projectId . "<br>";
    echo "Amount: " . $amount . "<br>";

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
        echo "Funds added successfully.";
    } else {
        echo "Error updating funds: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
