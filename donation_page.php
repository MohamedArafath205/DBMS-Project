<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online CrowdFunding | Fund More</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 400px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            color: #333; /* Dark text color */
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            box-sizing: border-box; /* Ensure padding is included in width */
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
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
            <input type="submit" value="Donate Funds">
        </form>
    </div>
</body>
</html>
