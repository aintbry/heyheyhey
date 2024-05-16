<?php 
session_start();

if(!isset($_SESSION['username'])) {
	header('Location: login.php');
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>Welcome! <?php echo $_SESSION['username'];?></h1>
	<a href="logout.php">Logout</a>

	<h1>Welcome to the canteen! Here are the prices</h1>
    <ul>
        <li>Fishball - 30 PHP</li>
        <li>Kikiam - 40 PHP</li>
        <li>Corndog - 50 PHP</li>
    </ul>
    <form action="index.php" method="post">
        <label for="order">Choose your order:</label>
        <select name="order">
            <option value="Fishball">Fishball</option>
            <option value="Kikiam">Kikiam</option>
            <option value="Corndog">Corndog</option>
        </select><br><br>
        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity"><br><br>
        <label for="cash">Cash:</label>
        <input type="text" name="cash"><br><br>
        <input type="submit" value="Submit">
    </div>
</body>
</html>

<?php
    //pricelist
    $fishball = 30;
    $kikiam = 40;
    $corndog = 50;
    if (empty($_POST["quantity"]) || empty($_POST["cash"])) {
    } else {
        //Invalidation if ever they typed a string
        if (is_numeric($_POST["quantity"]) && is_numeric($_POST["cash"])) {
            if ($_POST["order"] == "Fishball") {
                $_POST["order"] = $fishball;
            } elseif ($_POST["order"] == "Kikiam") {
                $_POST["order"] = $kikiam;
            } elseif ($_POST["order"] == "Corndog") {
                $_POST["order"] = $corndog;
            }
            $order = $_POST["order"];
            $quantity = ($_POST["quantity"]);
            $cash = ($_POST["cash"]);
            $total_cost = $order * $quantity;
            $change = $cash - $total_cost;
            if ($quantity <= 0) {
                echo"<br>Invalid";
            } elseif ($total_cost <= $cash) {
                echo"<strong><br> The total cost is {$total_cost} <br>";
                echo"Your change is {$change}<br><br></strong>";
                echo"Thanks for the order!";
            } else {
                echo "<strong><br>You don't have enough money</strong>  ";
            }
        } else {
            echo "<br>Invalid Input";
        }
    }
?>