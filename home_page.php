<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online CrowdFunding | Home Page</title>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'> 
</head>
<style>
    body {
        font-family: "Open Sans Condensed", sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
    }
    .hero {
        text-align: center;
        margin-top: 20px;
    }
    .card_container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin: 20px;
    }
    .card {
        width: 300px;
        margin: 10px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        text-align: center; /* Center text inside the card */
    }
    .card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .card-content {
        padding: 20px;
    }
    .card h1,
    .card h5,
    .card p,
    .card button {
        margin: 10px 0; /* Add margin around text */
    }
    .card button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 8px 12px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .card button:hover {
        background-color: #45a049;
    }
    .btn {
        background-color: #4CAF50;
        color: white;
        width: 50%;
        text-align: center;
        font-weight: 700;
        font-size: 15px;
        padding: 8px 12px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 20px auto;
        border: none;
        border-radius: 10px;
        cursor: pointer;
    }
</style>
<body>
    <h1 class="hero">Projects</h1>
    <div class="card_container">
        <?php
        $conn = new mysqli("localhost", "root", "", "onlinecrowdfunding");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch project data from the database
        $sql = "SELECT * FROM projects";
        $result = $conn->query($sql);

        // Display project cards
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Output project card
                echo '<div class="card">';
                // echo '<img src="' . $row['image_url'] . '">';
                echo '<i class="ri-heart-fill"></i>';
                echo '<h1>' . $row['project_name'] . '</h1>';
                // echo '<p>' . $row['location'] . '</p>';
                echo '<h5>' . $row['description'] . '</h5>';
                echo '<button onclick="redirectToProjects(' . $row['id'] . ')">View Details</button>';
                echo '</div>';
            }
        } else {
            echo "No projects found.";
        }

        // Close the connection
        $conn->close();
        ?>
    </div>
    <div class="btn" onclick="redirectToRegisterProject()">+ Add Project</div>
    <script>
        function redirectToRegisterProject() {
            window.location.href = 'register_project.html';
        }
        function redirectToProjects(projectId) {
    window.location.href = 'project_detail.php?id=' + projectId; // Assuming project_detail.php is your project details page
}

    </script>
</body>
</html>
