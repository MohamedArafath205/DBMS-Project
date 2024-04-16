<?php
    $projectName = $_POST['project_name'];
    $teamLead = $_POST['team_lead'];
    $description = $_POST['description'];
    $budget = $_POST['budget'];
    $fundsRaised = $_POST['funds_raised'];
    $status = $_POST['status'];
    $category = $_POST['category'];

    $conn = new mysqli('localhost', 'root', '','onlinecrowdfunding');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into projects(project_name, team_lead ,description, budget, funds_raised, status, category) values(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $projectName, $teamLead, $description, $budget, $fundsRaised, $status, $category);
        $stmt->execute();
        header("Location: home_page.html");
        $stmt->close();
        $conn->close();
        exit();
    }
?>