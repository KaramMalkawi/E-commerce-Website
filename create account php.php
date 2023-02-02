<?php
$connection = new mysqli('localhost', 'root', '', 'e_commerce');

if (mysqli_connect_error() != null) {
    die("connection failed" . $connection->connect_errno);
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        if (!empty($username) && !empty($email) && !empty($phone) && !empty($password) && !empty($confirmPassword) && $confirmPassword == $password) {
            $sql = "INSERT INTO `customers` (`username`, `password`, `email`, `phone`, `gender`) 
            VALUES ('$username','$password','$email','$phone','$gender')";
            $result = $connection->query($sql);
            header('location: Login.php');
        }

    }
    
}
?>