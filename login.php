<?php
$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "onlinecrowdfunding";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (isset($_POST['emailid']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $emailid = validate($_POST['emailid']);
    $password = validate($_POST['password']);

    if (empty($emailid)){
        header("Location: login.php?error=Email is required");
        exit();
    }else if(empty($password)){
        header("Location: login.php?error=Password is required");
        exit();
    }else{
        $sql = "SELECT * FROM user WHERE email='$emailid' AND pass='$password'";

        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['Email'] === $emailid && $row['Pass'] === $password){
                header("Location: home_page.html");
                exit();
        }else{
            header("Location: login.php?error=Incorrect Email or Password");
            exit();
        }
    }else{
        header("Location: login.php?error=Incorrect Email or Password");
        exit();}
    }
}