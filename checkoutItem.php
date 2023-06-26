<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: lightblue;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
        }
        button[type="submit"]:hover {
            background-color: cadetblue;
        }
    </style>
</head>
<body>
    <h1>Check An Item Out</h1>
    <form id="checkout-form">
        <label for="item-name">Item Name:</label>
        <input type="text" id="item-name" name="item-name" required>
        <br>
        <br>
        <label for="item-id">Item ID:</label>
        <input type="text" id="item-id" name="item-id" required>
        <br>
        <br>
        <label for="checkout-date">Checkout Date:</label>
        <input type="date" id="checkout-date" name="checkout-date" required>
        <br>
        <br>
        <label for="checkout-name">Checkout Name:</label>
        <input type="text" id="checkout-name" name="checkout-name" required>
        <br>
        <br>
        <button type="submit">Checkout Item</button>
</body>
</html>

<?php
 //Alter An Existing Database Entry With A New Checkout Date And Name Using PHP

    //Connect To Database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lab_database";

    //Create Connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Check Connection
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    //Get Data From Form
    $item_name = $_POST["item-name"];
    $item_id = $_POST["item-id"];
    $checkout_date = $_POST["checkout-date"];
    $checkout_name = $_POST["checkout-name"];

    //Update Database
    $sql = "UPDATE lab_equipment SET checkout_date='$checkout_date', checkout_name='$checkout_name' WHERE item_name='$item_name' AND item_id='$item_id'";
    $result = $conn->query($sql);

    //Close Connection
    $conn->close();
?>