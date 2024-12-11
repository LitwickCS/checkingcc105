<?php
function getConnection() {
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

function getStudentInfo(){
    $connection = getConnection();
    $statement = "SELECT * FROM tblstudents";
    $query = mysqli_query($connection, $statement);
    if(mysqli_num_rows($query) > 0){
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

    return false;
    
}

function deleteStudent($id){
    $connection = getConnection();
    $statement = "DELETE FROM tblstudents WHERE ControlNumber = ".$id;
    if(mysqli_query($connection, $statement)){
        return "Successfully deleted expense with id ". $id;
    }else{
        return "There is an error deleting expense with id ". $id;
    }
    
}

function getConnectionDoc() {
    $serverName = "127.0.0.1";
    $user = "root";
    $password = "";
    $database = "dbdocs";
    
    $connection = mysqli_connect($serverName, $user, $password, $database);
    if($connection){
        return $connection;
    }
    return false;
}

function getDocInfo(){
    $connection = getConnectionDoc();
    $statement = "SELECT * FROM tblcor";
    $query = mysqli_query($connection, $statement);
    if(mysqli_num_rows($query) > 0){
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

    return false;
    
}

function deleteDoc($id){
    $connection = getConnectionDoc();
    $statement = "DELETE FROM tblcor WHERE ControlNumber = ".$id;
    if(mysqli_query($connection, $statement)){
        return "Successfully deleted expense with id ". $id;
    }else{
        return "There is an error deleting expense with id ". $id;
    }
    
}

function getConnectionApt() {
    $serverName = "127.0.0.1";
    $user = "root";
    $password = "";
    $database = "dbappointments";
    
    $connection = mysqli_connect($serverName, $user, $password, $database);
    if($connection){
        return $connection;
    }
    return false;
}

function getAppointmentInfo(){
    $connection = getConnectionApt();
    $statement = "SELECT * FROM tbltor";
    $query = mysqli_query($connection, $statement);
    if(mysqli_num_rows($query) > 0){
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

    return false;
    
}

function deleteApt($id){
    $connection = getConnectionApt();
    $statement = "DELETE FROM tbltor WHERE ControlNumber = ".$id;
    if(mysqli_query($connection, $statement)){
        return "Successfully deleted expense with id ". $id;
    }else{
        return "There is an error deleting expense with id ". $id;
    }
    
}


