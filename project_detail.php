<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online CrowdFunding | Project Details</title>
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

        .bg-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-image: url('assets/image.png'); /* Change the image URL */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: -1;
        }

        .container {
            width: 600px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
        }

        .project-details {
            margin-bottom: 20px;
        }

        .project-details p {
            margin: 10px 0;
            text-align: center; /* Align text to center */
        }

        .btn-fund-more {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-fund-more:hover {
            background-color: #45a049;
        }

        .project-image {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="bg-image"></div>
    <div class="container">
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
                echo '<div class="project-details">';
                echo '<hr>';
                echo '<p><strong>Team Lead:</strong> ' . $row['team_lead'] . '</p>';
                echo '<p><strong>Description:</strong> ' . $row['description'] . '</p>';
                echo '<p><strong>Budget:</strong> $' . $row['budget'] . '</p>';
                echo '<p><strong>Funds Raised:</strong> $' . $row['funds_raised'] . '</p>';
                echo '<p><strong>Status:</strong> ' . $row['status'] . '</p>';
                echo '<p><strong>Category:</strong> ' . $row['category'] . '</p>';
                echo '</div>';

                // "Fund More" button
                echo '<form action="donation_page.php" method="GET">';
                echo '<input type="hidden" name="id" value="' . $projectId . '">';
                echo '<button class="btn-fund-more" type="submit">Fund More</button>';
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
    </div>
</body>
</html>
