<?php

if(isset($_POST['name'])){
    $server="localhost";
    $username="root";
    $password="";

    $con=mysqli_connect($server,$username,$password);

    if(!$con){
        die("Connection to this database failed due to ". mysqli_connect_error());
    }
    // echo "Succesfully connected to the db..";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $feedback = $_POST['feedback'];


    $sql="INSERT INTO `info`.`info` (`name`, `email`, `phone`, `dob`, `feedback`, `dt`) VALUES ('$name', '$email', '$phone', '$dob', '$feedback', current_timestamp());";

    // echo $sql;

    if($con->query($sql)==true){
        // echo "Succesfully inserted";
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Collection Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Concern Form</h1>
        <form action="index.php" method="post">
            <div class="name">
                <label for="fname">Name:</label>
                <input type="text" name="name" id="fname" placeholder="First name" required>
                
                <input type="text" name="last_name" id="fname" placeholder="Last name" required>
            </div>
            <div class="mail">
                <label for="mail">Email Id:</label>
                <input type="email" name="email" id="mail" placeholder="xyz@gmail.com" required>
            </div>
            <div class="phone">
                <label for="number">Phone No.:</label>
                <input type="text" name="phone" id="number" placeholder="+91 xxxxxxxxxx" required>
            </div>
            <div class="dob">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="dob" required>
            </div>
            <div class="feedback">
                <label for="concern">Feedback:</label>
                <textarea name="feedback" id="concern" cols="36" rows="10"
                    placeholder="Please enter your Feedback here..." required></textarea>
            </div>
            <div class="condition">
                <input type="checkbox" name="accept_terms" id="check" required>
                <label for="check">I accept all the Terms & Conditions</label>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>



