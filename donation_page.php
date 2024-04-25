<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online CrowdFunding | Fund More</title>
</head>
<body>
    <h1>Fund More</h1>
    <form action="add_funds.php" method="POST">
        <label for="amount">Enter Amount:</label>
        <input type="number" id="amount" name="amount" required>
        <?php
        // Check if project ID is set in the URL
        if (isset($_GET['id'])) {
            $projectId = $_GET['id'];
            // Include the project ID as a hidden input field
            echo '<input type="hidden" name="project_id" value="' . $projectId . '">';
        } else {
            echo "Project ID not provided.";
            // You may want to handle this case accordingly
        }
        ?>
        <input type="submit" value="Add Funds">
    </form>
</body>
</html>
