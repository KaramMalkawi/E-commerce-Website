<?php
session_start();
include("function.php");

// Create connection
$connection = new mysqli('localhost', 'root', '', 'e_commerce');
//$connection = mysqli_connect('localhost', 'root', '', 'e_commerce');

//print_r(mysqli_connect_error());
// Check connection
if (mysqli_connect_error() != null) {
    die("connection failed" . $connection->connect_errno);
} else {
    //echo "connected successfully";
    //print_r($_SERVER['REQUEST_METHOD']);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        //print_r($username."       aaaaaaaaaaaaa");
        $password = $_POST['password'];
        //print_r($password."        bbbbbbbbbbb");

        //To check if he has filled in the username and password
        if (!empty($username) && !empty($password)) {
            $sql = "SELECT id, username, password FROM customers WHERE username = '$username'";
            // print($sql);
            //$result = mysqli_query($connection, $sql);
            $result = $connection->query($sql);
            // print($result);

            if ($result->num_rows == 1) {
                $user_information = mysqli_fetch_assoc($result);

                // To check if the password is correct or not
                if ($user_information['password'] === $password) {

                    $_SESSION['id'];
                    header("location: Home.php");
                    die();
                }
            }
        }
    }
}
?>