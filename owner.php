<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rajudb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['form3'])) {
        echo "Error: ";

        $firstname = $conn->real_escape_string($_POST['firstname3']);
        $lastname = $conn->real_escape_string($_POST['lastname3']);
        $address1 = $conn->real_escape_string($_POST['adress3']);
        $city = $conn->real_escape_string($_POST['city3']);
        $price = $conn->real_escape_string($_POST['price3']);
        $email = $conn->real_escape_string($_POST['email3']);
        $tel = $conn->real_escape_string($_POST['tel3']);
        $service = $conn->real_escape_string($_POST['service3']);

        if (isset($_FILES['file3']) && $_FILES['file3']['error'] === UPLOAD_ERR_OK) {

            $upload = file_get_contents($_FILES['file3']['tmp_name']);
        } else {

            $upload = null;
            echo "Error: File upload failed or 'file' field is missing.<br>";
            exit;
        }


        $sql = "INSERT INTO tiffinservice (firstname,lastname,adress1,city, price, email, tel,service1, upload) VALUES ('$firstname', '$lastname','$address1','$city', '$price', '$email' , '$tel' ,'$service', ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $upload);

        if ($stmt->execute() === TRUE) {
            echo "New record inserted successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
        }
        $stmt->close();

    } elseif (isset($_POST['form1'])) {
        echo "Error: ";

        $society = $conn->real_escape_string($_POST['society']);
        $city = $conn->real_escape_string($_POST['city']);
        $houseno = $conn->real_escape_string($_POST['houseno']);
        $firstname = $conn->real_escape_string($_POST['firstname']);
        $lastname = $conn->real_escape_string($_POST['lastname']);
        $email = $conn->real_escape_string($_POST['email']);

        $tel = $conn->real_escape_string($_POST['tel']);
        $rent = $conn->real_escape_string($_POST['rent']);
        $address1 = $conn->real_escape_string($_POST['address']);

        if (isset($_FILES['file1']) && $_FILES['file1']['error'] === UPLOAD_ERR_OK) {

            $upload = file_get_contents($_FILES['file1']['tmp_name']);
        } else {

            $upload = null;
            echo "Error: File upload failed or 'file' field is missing.<br>";
            exit;
        }


        $sql = "INSERT INTO rajtable4 (society,city,houseno,firstname, lastname, email, tel,rent, address1, upload) VALUES ('$society', '$city','$houseno','$firstname', '$lastname', '$email' , '$tel' ,'$rent', '$address1', ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $upload);

        if ($stmt->execute() === TRUE) {
            echo "New record inserted successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
        }
        $stmt->close();
    }
    
    elseif (isset($_POST['form2'])) {
        echo "Error: ";
        
        $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName =$conn->real_escape_string ($_POST['lastName']);
    $address =$conn->real_escape_string ($_POST['address']);
    $charges = $conn->real_escape_string($_POST['charges']);
    $image = $conn->real_escape_string($_FILES['image']['name']);
    $pickupDate = $conn->real_escape_string($_POST['pickupDate']);
    $pickupTime = $conn->real_escape_string($_POST['pickupTime']);
    $deliveryDate = $conn->real_escape_string($_POST['deliveryDate']);
    $deliveryTime = $conn->real_escape_string($_POST['deliveryTime']);
    $laundryType = $conn->real_escape_string($_POST['laundryType']);
    $specialInstructions = $conn->real_escape_string($_POST['specialInstructions']);
    
    if (isset($_FILES['file2']) && $_FILES['file2']['error'] === UPLOAD_ERR_OK) {

        $upload = file_get_contents($_FILES['file2']['tmp_name']);
    } else {

        $upload = null;
        echo "Error: File upload failed or 'file' field is missing.<br>";
        exit;
    }
    $sql = "INSERT INTO laundaryservice (firstName, lastName, address, charges, image, pickupDate, pickupTime, deliveryDate, deliveryTime, laundryType, specialInstructions)
    VALUES ('$firstName', '$lastName', '$address', '$charges', '$image', '$pickupDate', '$pickupTime', '$deliveryDate', '$deliveryTime', '$laundryType', '$specialInstructions', ?)";
    $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $upload);

        if ($stmt->execute() === TRUE) {
            echo "New record inserted successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index_web.css">

    <style>
        .o-section {
            display: none;
            /* Initially hide all owner forms */
            margin-left: 34%;
        }

        .o-section.active {
            display: block;
            /* Show the active owner form */
        }

        #button1,
        #button2,
        #button3 {
            border: none;
            background-color: transparent;
            font-size: 20px;
        }

        #button1:hover {
            cursor: pointer;
            color: white;
        }

        #button2:hover {
            cursor: pointer;
            color: white;
        }

        #button3:hover {
            cursor: pointer;
            color: white;
        }

        .form1 {
            display: flex;
            flex-direction: column;
            border: 1px solid grey;
            width: 370px;
            height: 118vh;
            padding: 18px;
            margin: 30px;
            border-radius: 20px;
            box-shadow: 2px 2px 12px gray;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar">
        <div class="logo">
            <img src="img/logo-removebg-preview.png" alt="">
        </div>


        <div class="home">
            <a href="homepage.php">Home</a>
            <a href="">Contact</a>
            <a href="">About us</a>
        </div>

        <div class="search-bar">
            <!-- <input type="text" placeholder="search.." id="search"> -->
            <button class="log-in-btn"><a href="log-in">log-in</a></button>
        </div>
    </nav>

    <!-- owner section -->
    <div class="o-div1">
        <p><button id="button1" class="owner-button">House Owner</button></p>
        <p><button id="button2" class="owner-button">Laundry Owner</button></p>
        <p><button id="button3" class="owner-button">Tiffin Owner</button></p>
    </div>

    <section class="o-section" id="house-owner-form">
        <div class="box">
            <div class="form1">
                <h2>Fill details for House Owner</h2>
                <form action="" method="post" enctype="multipart/form-data">

                    <label for="society">society:</label>
                    <input type="text" id="society" name="society" required><br>

                    <label for="city">city:</label><br>
                    <input type="text" id="city" name="city" required><br>

                    <label for="city">house no:</label>
                    <input type="text" id="houseno" name="houseno" required><br>

                    <label for="firstname">First Name:</label>
                    <input type="text" id="firstname" name="firstname" required><br>

                    <label for="lastname">Last Name:</label>
                    <input type="text" id="lastname" name="lastname" required><br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required><br>

                    <label for="tel">Mobile number:</label>
                    <input type="tel" id="tel" name="tel" required><br>

                    <label for="tel">Rent :</label>
                    <input type="tel" id="rent" name="rent" required><br>

                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required><br>

                    <input type="file" id="file1" name="file1" required><br>

                    <input type="submit" name="form1" value="Submit">

                </form>
            </div>
        </div>
    </section>

    <section class="o-section" id="laundry-owner-form">
        <div class="box">
            <div class="form1">
                <h2>Fill details for Laundry Owner</h2>
                <!-- Add your Laundry Owner form content here -->
                <form action="">
                    <label for="">Owner firstName :</label><br>
                    <input type="text" name="" id=""><br>
                    <label for="">Owner LastName :</label><br>
                    <input type="text" name="" id=""><br>
                    <label for="">Address :</label><br>
                    <input type="text" id="address" name="address" required><br>
                    <label for="">Service Charge :</label> <br>
                    <input type="number" id="charges" name="charges" required><br>
                    <label for="">upload Img:</label>
                    <input type="file" id="image" name="image" required><br>
                    <label for="pickupDate">Pickup Date:</label><br>
                    <input type="date" id="pickupDate" name="pickupDate"><br>
                    <label for="pickupTime">Pickup Time:</label><br>
                    <input type="time" id="pickupTime" name="pickupTime"><br>
                    <label for="deliveryDate">Delivery Date:</label><br>
                    <input type="date" id="deliveryDate" name="deliveryDate"><br>
                    <label for="deliveryTime">Delivery Time:</label><br>
                    <input type="time" id="deliveryTime" name="deliveryTime"><br>
                    <label for="laundryType">Laundry Type:</label><br>
                    <select id="laundryType" name="laundryType">
                         <option value="washOnly">Wash Only</option>
                         <option value="washAndFold">Wash and Fold</option>
                         <option value="washDryFold">Wash, Dry, and Fold</option>
                   </select><br>
                   <label for="specialInstructions">Special Instructions:</label><br>
                   <textarea id="specialInstructions" name="specialInstructions"></textarea><br>
                   <button class="o-submit">submit</button>
                </form>
            </div>
        </div>
    </section>

    <section class="o-section" id="tiffin-owner-form">
        <div class="box">
            <div class="form1">
                <h2>Fill details for Tiffin Owner</h2>

                <form action="" method="post" enctype="multipart/form-data">
                    <label for="">FirstName :</label><br>
                    <input type="text" name="firstname3" id="firstname3" required><br>

                    <label for="">LastName :</label><br>
                    <input type="text" name="lastname3" id="lastname3" required><br>

                    <label for="">Address :</label><br>
                    <input type="text" name="adress3" id="adress3" required><br>

                    <label for="city">City: </label><br>
                    <input type="text" id="city3" name="city3" required><br>

                    <label for="">Price ( per tiffin ) : </label> <br>
                    <input type="tel" name="price3" id="price3" required> <br>

                    <label for="email">Email:</label>
                    <input type="email" id="email3" name="email3" required><br>

                    <label for="tel">Mobile number:</label>
                    <input type="tel" id="tel3" name="tel3" required><br>

                    <label for="">Service: ( Delivery/Takeaway ) </label>
                    <input type="text" name="service3" id="service3">

                    <label for="">Upload Menu:</label>
                    <input type="file" name="file3" id="file3" required>

                    <input type="submit" name="form3" value="Submit">
                </form>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="footer">
        <div class="footer1">
            <img src="img/rent-removebg-preview.png" alt="">
        </div>
        <div class="footer2">
            <p>contac:982121323</p>
            <p>address:IIIT SURAT,KAMREJ</p>
            <p>location:KAMREJ,SURAT,GUJRAT</p>
            <p>email;iiitsurat@gmail.com</p>
        </div>
        <div class="footer3">
            <p>Privacy Policy</p>
            <p>Terms and condition</p>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const houseOwnerForm = document.getElementById('house-owner-form');
            const laundryOwnerForm = document.getElementById('laundry-owner-form');
            const tiffinOwnerForm = document.getElementById('tiffin-owner-form');

            // Show house owner form by default
            houseOwnerForm.classList.add('active');

            const buttons = document.querySelectorAll('.owner-button');

            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    // Hide all owner forms
                    houseOwnerForm.classList.remove('active');
                    laundryOwnerForm.classList.remove('active');
                    tiffinOwnerForm.classList.remove('active');

                    // Show the selected owner form
                    if (this.id === 'button1') {
                        houseOwnerForm.classList.add('active');
                    } else if (this.id === 'button2') {
                        laundryOwnerForm.classList.add('active');
                    } else if (this.id === 'button3') {
                        tiffinOwnerForm.classList.add('active');
                    }
                });
            });
        });
    </script>
</body>

</html>