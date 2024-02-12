<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "fantom_admin";
    $conn = mysqli_connect($servername, $username, $password,$database);

    if (!$conn){
        die("Connection failed : ".mysqli_connect_error());
    }

    // $sql = "CREATE DATABASE fantom_admin";
    // if(mysqli_query($conn,$sql)){
    //     echo "Database created!";
    // }

    // $sql = "CREATE TABLE admin_data (
    //     id INT AUTO_INCREMENT PRIMARY KEY,
    //     first_name VARCHAR(30) NOT NULL,
    //     middle_name VARCHAR(30),
    //     last_name VARCHAR(30) NOT NULL,
    //     pass VARCHAR(8) NOT NULL
    // )";

    // if(mysqli_query($conn,$sql))
    // {
    //     echo "Table created!";
    // }else {
    //     echo "Error creating table: " . mysqli_error($conn);
    //   }

    // $table = "CREATE TABLE fantom_data(
    //     id INT AUTO_INCREMENT PRIMARY KEY,
    //     logo_image VARCHAR(255),
    //     logo_text VARCHAR(80),
    //     menu_item_1 VARCHAR(20) NOT NULL,
    //     menu_item_2 VARCHAR(20) NOT NULL,
    //     menu_item_3 VARCHAR(20) NOT NULL,
    //     menu_item_4 VARCHAR(20) NOT NULL,
    //     menu_item_5 VARCHAR(20) NOT NULL,
    //     bg_image VARCHAR(255) NOT NULL,
    //     highlighted_h_text VARCHAR(10) NOT NULL,
    //     heading VARCHAR(60),
    //     paragraph VARCHAR(800),
    //     button_text VARCHAR(100)
    //     )";

    //     if(mysqli_query($conn,$table)){
    //         echo "Table Created!";
    //     }
    //     else{
    //         echo mysqli_error($conn);
    //     }

    // mysqli_close($conn);

?>