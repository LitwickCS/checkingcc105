<?php

function getConnectionDOC() {
    $serverName = "127.0.0.1";
    $user = "root";
    $password = "russel";
    $database = "dbdocs";

    $connection = mysqli_connect($serverName, $user, $password, $database);
    if ($connection) {
        return $connection;
    }
    die("Database connection failed: " . mysqli_connect_error());
}

function insertCOR($name, $student, $appointmentDate, $firstSemPath, $secondSemPath) {
    $connection = getConnectionDOC();

    // Prevent SQL injection
    $name = mysqli_real_escape_string($connection, $name);
    $student = mysqli_real_escape_string($connection, $student);
    $appointmentDate = mysqli_real_escape_string($connection, $appointmentDate);
    $firstSemPath = mysqli_real_escape_string($connection, $firstSemPath);
    $secondSemPath = mysqli_real_escape_string($connection, $secondSemPath);

    $statement = "INSERT INTO tblcor (StudentName, StudentNumber, Date, FirstSemester, SecondSemester) 
                  VALUES ('$student', '$name', '$appointmentDate', '$firstSemPath', '$secondSemPath')";

    if (mysqli_query($connection, $statement)) {
        mysqli_close($connection);
        return true; // Success
    } else {
        mysqli_close($connection);
        return false; // Failure
    }
}


function getConnectionUser() {
    $serverName = "127.0.0.1";
    $user = "root";
    $password = "russel";
    $database = "dbusers";
    
    $connection = mysqli_connect($serverName, $user, $password, $database);
    if($connection){
        return $connection;
    }
    return false;
}
