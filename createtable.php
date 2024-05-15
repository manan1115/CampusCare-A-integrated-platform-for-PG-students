<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname ="rajudb";
 

 $conn = mysqli_connect($servername,$username,$password,$dbname);
 if(!$conn){
   die("connection was not  successful <br> :". mysqli_connect_error());
}
else{
   echo "connection was successful <br>";
}

$sql = "CREATE TABLE IF NOT EXISTS rajtable4 (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    society VARCHAR(50) NOT NULL,
    city VARCHAR(30) NOT NULL,
    houseno VARCHAR(10) NOT NULL,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    tel   VARCHAR(15),
    rent INT(20),
    address1 VARCHAR(100),
    upload LONGBLOB
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  } 


  $sql3 = "CREATE TABLE IF NOT EXISTS tiffinservice (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    adress1 VARCHAR(100),
    city VARCHAR(30) NOT NULL,
    price INT(5),
    email VARCHAR(50),
    tel VARCHAR(15),
    service1 VARCHAR(20),
    upload LONGBLOB
    )";

if ($conn->query($sql3) === TRUE) {
    echo "Table created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  } 


  $sql9="CREATE TABLE IF NOT EXISTS laundryservice(

     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
     firstName VARCHAR(255) NOT NULL,
     lastName VARCHAR(255) NOT NULL,
     address VARCHAR(255) NOT NULL,
     charges DECIMAL(10, 2) NOT NULL,
     image VARCHAR(255) NOT NULL,
     pickupDate DATE NOT NULL,
     pickupTime TIME NOT NULL,
     deliveryDate DATE NOT NULL,
     deliveryTime TIME NOT NULL,
     laundryType VARCHAR(50) NOT NULL,
     specialInstructions TEXT

  )";
  
  if ($conn->query($sql9) === TRUE) {
    echo "Table created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  } 
?>
