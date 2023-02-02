<?php
$connection = mysqli_connect('localhost', 'root', '', 'e_commerce');

if (mysqli_connect_error() != null)
  die("connection failed" . $connection->connect_errno);

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>

  <link rel="stylesheet" href="./Style/cart.css">
  <link rel="stylesheet" href="./Style/nav.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
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
      <li><a href="./Logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>
    </ul>
  </nav>

  <div class="container padding-bottom-3x mb-1">
    <!-- Shopping Cart-->
    <div class="table-responsive shopping-cart">
      <table class="table">
        <thead>
          <tr>
            <th>Product Name</th>
            <th class="text-center">Subtotal</th>
            <th class="text-center">Discount</th>
            <th class="text-center"><a class="btn btn-sm btn-outline-danger" href="#">Clear Cart</a></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $subtotal = 0;
          $selectOrder = "SELECT * FROM `orders` AS o JOIN `items` AS i ON o.items_id = i.id";;
          $result = $connection->query($selectOrder);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
              <tr>
                <td>
                  <div class="product-item">
                    <a class="product-thumb" href="#"><img src="./items/<?php echo $row['img1']; ?>" alt="Product"></a>
                    <div class="product-info">
                      <h4 class="product-title"><a href="#"><?php echo $row['name']; ?></a></h4>
                      <span>
                        <em><b>Description:</b></em> <?php echo $row['description']; ?>
                      </span>
                    </div>
                  </div>
                </td>
                <td class="text-center text-lg text-medium"><?php echo $row['price'] . " JD"; ?></td>
                <td class="text-center text-lg text-medium">-</td>
                <td class="text-center"><a class="remove-from-cart" href="#" data-toggle="tooltip" title="" data-original-title="Remove item"><i class="fa fa-trash"></i></a></td>
              </tr>
          <?php
              $subtotal = $row['price'] + $subtotal;
            }
          } else echo "There isn't any item";
          ?>
        </tbody>
      </table>
    </div>
    <div class="shopping-cart-footer">
      <div class="column text-lg">Subtotal: <span class="text-medium"><?php echo $subtotal . " JD"; ?></span></div>
    </div>
    <div class="shopping-cart-footer">
      <div class="column"><a class="btn btn-primary" href="./Home.php"><i class="icon-arrow-left"></i>&nbsp;Back to Shopping</a></div>
      <div class="column"><a class="btn btn-success" href="./Checkout.php" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Your cart" data-toast-message="is updated successfully!">Checkout</a>
      </div>
    </div>

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

</html>