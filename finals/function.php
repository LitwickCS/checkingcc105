<?php
function getConnectionUser() {
    $serverName = "127.0.0.1";
    $user = "root";
    $password = "";
    $database = "dbusers";
    
    $connection = mysqli_connect($serverName, $user, $password, $database);
    if($connection){
        return $connection;
    }
    return false;
}

function insertStudentInfo($studentNumber, $firstName, $lastName, $courses, $email, $password, $showAlerts = true) {
    $connection = getConnectionUser();
    $statement = "INSERT INTO tblstudents (StudentNumber, FirstName, LastName, Course, Email, Password) 
                  VALUES ('$studentNumber', '$firstName', '$lastName', '$courses', '$email', '$password')";

    if (mysqli_query($connection, $statement)) {
        mysqli_close($connection);
        if ($showAlerts) {
            echo '<script>
                    alert("Successfully made an account!");
                    window.location.href = "logIn&signUp.php";
                  </script>';
        }
        return true; // Success
    } else {
        mysqli_close($connection);
        if ($showAlerts) {
            echo '<script>
                    alert("Unable to make an Account!");
                    window.location.href = "logIn&signUp.php";
                  </script>';
        }
        return false; // Failure
    }
}


function checkingUserInfo($studentNumber, $password) {
    $connection = getConnectionUser();

    // Admin Check
    if ($studentNumber === "0" && $password === "admin123") {
        $_SESSION['role'] = 'admin';
        header("Location: admin/admindashboard.php");
        exit();
    }
     
    // Student Check
    $statement = $connection->prepare("SELECT * FROM tblStudents WHERE StudentNumber = ?");
    $statement->bind_param("s", $studentNumber);
    $statement->execute();
    $result = $statement->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($password === $user['Password']) { // Plain-text comparison
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = 'user';
            header("Location: students/studentdashboard.php");
            exit();
        } else {
            echo '<script>alert("Invalid LogIn Credentials! Try Again!");</script>';
            return false;
        }
    } else {
        echo '<script>alert("Invalid LogIn Credentials! Try Again!");</script>';
        return false;
    }
}
?>
