<?php
// Check if the project ID is provided in the URL
if (isset($_GET['id'])) {
    $projectId = $_GET['id'];

    $conn = new mysqli("localhost", "root", "", "onlinecrowdfunding");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch project details from the database based on the project ID
    $sql = "SELECT * FROM projects WHERE id = $projectId"; // Replace 'id' with your actual column name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display project details
        echo '<h1>' . $row['project_name'] . '</h1>';
        echo '<p><strong>Team Lead:</strong> '. $row['team_lead'] . '</p>';
        echo '<p><strong>Description:</strong> ' . $row['description'] . '</p>';
        echo '<p><strong>Budget:</strong> $' . $row['budget'] . '</p>';
        echo '<p><strong>Funds Raised:</strong> $' . $row['funds_raised'] . '</p>';
        echo '<p><strong>Status:</strong> ' . $row['status'] . '</p>';
        echo '<p><strong>Category:</strong> ' . $row['category'] . '</p>';

        // "Fund More" button
        echo '<form action="donation_page.php" method="GET">';
        echo '<input type="hidden" name="id" value="' . $projectId . '">';
        echo '<button type="submit">Fund More</button>';
        echo '</form>';

        // Add more details as needed
    } else {
        echo "Project not found.";
    }

    // Close the connection
    $conn->close();
} else {
    echo "No project ID provided.";
}
?>
