<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order System</title>
</head>
<body>
    <h1>Welcome to the shop! Pick your arsenal</h1>
    <ul>
        <li>Phantom - 2900 C</li>
        <li>Vandal - 2900 C</li>
        <li>Odin - 3200 C</li>
    </ul>
    <form action="index.php" method="post">
        <label for="order">Choose your order:</label>
        <select name="order">
            <option value="Phantom">Phantom</option>
            <option value="Vandal">Vandal</option>
            <option value="Odin">Odin</option>
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
    $phantom = 2900;
    $vandal = 2900;
    $odin = 3200;
    if (empty($_POST["quantity"]) || empty($_POST["cash"])) {
    } else {
        if (is_numeric($_POST["quantity"]) && is_numeric($_POST["cash"])) {
            if ($_POST["order"] == "Phantom") {
                $_POST["order"] = $phantom;
            } elseif ($_POST["order"] == "Vandal") {
                $_POST["order"] = $vandal;
            } elseif ($_POST["order"] == "Odin") {
                $_POST["order"] = $odin;
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