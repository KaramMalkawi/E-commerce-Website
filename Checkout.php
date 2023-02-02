<?php
$connection = mysqli_connect('localhost', 'root', '', 'e_commerce');

if (mysqli_connect_error() != null)
    die("connection failed" . $connection->connect_errno);
else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $country = $_POST['country'];
        $city = $_POST['city'];
        $neighborhood = $_POST['neighborhood'];
        $street = $_POST['street'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $cardname = $_POST['cardname'];
        $cardnumber = $_POST['cardnumber'];
        $expmonth = $_POST['expmonth'];
        $expyear = $_POST['expyear'];
        $cvv = $_POST['cvv'];

        if (!empty($country) && !empty($city) && !empty($neighborhood) && !empty($street) && !empty($state) && !empty($zip) && !empty($cardname) && !empty($cardnumber) && !empty($expmonth) && !empty($expyear) && !empty($cvv)) {
            $sql = "INSERT INTO `order_details`(`country`, `city`, `neighborhood`, `street`, `state`, `zip`, `cardname`, `cardnumber`, `expmonth`, `expyear`, `cvv`) 
            VALUES ('$country','$city','$neighborhood','$street','$state','$zip','$cardname','$cardnumber','$expmonth','$expyear','$cvv')";
            $result = $connection->query($sql);
            header('location: Login.php');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <link rel="stylesheet" href="./Style/nav.css">
    <link rel="stylesheet" href="./Style/Checkout.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- Create navigation bar -->
    <nav>
        <input type="checkbox" id="check">

        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>

        <label class="logo">MobileShop</label>

        <ul>
            <li><a href="./add_to_cart.php"><i class="fa-solid fa-cart-shopping"></i> Add to cart</a></li>
            <li><a href="./Logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>
        </ul>
    </nav>

    <br>

    <form class="form" id="login" action="#" method="POST">
    <div class="row">
        <div class="col-75">
            <div class="container">
                <form action="/action_page.php">

                    <div class="row">
                        <div class="col-50">
                            <h3>Billing Address</h3>

                            <label for="country">Country</label>
                            <input type="text" id="country" name="country" required>

                            <label for="city">City</label>
                            <input type="text" id="city" name="city" required>

                            <label for="neighborhood">Neighborhood</label>
                            <input type="text" id="neighborhood" name="neighborhood" required>

                            <label for="street">Street</label>
                            <input type="text" id="street" name="street" required>

                            <div class="row">
                                <div class="col-50">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" placeholder="NY" required>
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="text" id="zip" name="zip" placeholder="10001" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-50">
                            <h3>Payment</h3>
                            <label for="fname">Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder="September">

                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" name="expyear" placeholder="2018">
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="352">
                                </div>
                            </div>
                        </div>

                    </div>
                    <label>
                        <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                    </label>
                    <p class="form__text">
                        <a class="btn" href="./Login.php" id="linkCreateAccount">Continue to checkout</a>
                    </p>
                </form>
            </div>
        </div>

        <div class="col-25">
            <div class="container">
                <h4>Cart
                    <span class="price" style="color:black">
                        <i class="fa fa-shopping-cart"></i>
                    </span>
                </h4>
                <?php
                $subtotal = 0;
                $selectOrder = "SELECT * FROM `orders` AS o JOIN `items` AS i ON o.items_id = i.id";;
                $result = $connection->query($selectOrder);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>

                        <p><a href="#"><?php echo $row['name']; ?></a> <span class="price"><?php echo $row['price'] . "JD"; ?></span></p>
                <?php
                        $subtotal = $row['price'] + $subtotal;
                    }
                } else echo "There isn't any item";
                ?>

                <hr>
                <p>Total <span class="price" style="color:black"><b><?php echo $subtotal . " JD"; ?></b></span></p>
            </div>
        </div>
    </div>
    </form>

    <footer class="text-center text-white" style="background-color: #00143B;">

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <p>
                <text>And you can follow us on social media to get all new through the following links:</text>

                <a href="#" class="text-white">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a href="#" class="text-white">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="#" class="text-white">
                    <i class="fa-brands fa-snapchat"></i>
                </a>
                <a href="#" class="text-white">
                    <i class="fa-brands fa-twitter"></i>
                </a>
                <a href="#" class="text-white">
                    <i class="fa-brands fa-linkedin"></i>
                </a>
                <a href="#" class="text-white">
                    <i class="fa-brands fa-github"></i>
                </a>
            </p>
        </div>

    </footer>

</body>