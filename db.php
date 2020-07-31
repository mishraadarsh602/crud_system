<?php

function Createdb(){
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="bookstore";

    //create connection
    $conn=mysqli_connect($servername,$username,$password);

    //check connection
    if(!$conn){
        die("connection Failed: ".mysqli_connect_error());
    }

    //create db
    $sql="CREATE DATABASE IF NOT EXISTS $dbname";
   
    if(mysqli_query($conn,$sql)){
        $conn=mysqli_connect($servername,$username,$password,$dbname);

        $sql="CREATE TABLE IF NOT EXISTS books(
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            book_name VARCHAR(25) NOT NULL,
            book_publisher VARCHAR (20),
            book_price FLOAT
        );";
        if(mysqli_query($conn,$sql)){
           return $conn;
        } else{
            echo "cannot create table".mysqli_error($conn);
        }

    } else{
        echo "Error while creating database".mysqli_error($conn);
    }
}

?>