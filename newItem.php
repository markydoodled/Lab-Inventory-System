<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Item</title>
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
        input[type="text"] {
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
    <h1>Add Item To The Database</h1>
    <form id="newItem-form">
        <label for="item-name">Item Name:</label>
        <input type="text" id="item-name" name="item-name" required>
        <br>
        <br>
        <label for="item-id">Item ID:</label>
        <input type="text" id="item-id" name="item-id" required>
        <br>
        <br>
        <button type="submit">Add New Item</button>
    </form>
    <script>
        const form = document.getElementById('newItem-form');
        form.addEventListener('submit', (event) => {
        event.preventDefault();
        const itemName = form.elements.item-name.value;
        const itemID = form.elements.item-id.value;
        });
    </script>
</body>
</html>

<?php
 //Add A New Item To The Database Using PHP
 
    //Connect To The Database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lab_database";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Check Connection
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    //Get The Item Name And Item ID From The Form
    $itemName = $_POST['item-name'];
    $itemID = $_POST['item-id'];

    //Insert The Item Into The Database
    $sql = "INSERT INTO items (item_name, item_id) VALUES ('$itemName', '$itemID')";
    if ($conn->query($sql) === TRUE) {
        echo "New Item Added Successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>