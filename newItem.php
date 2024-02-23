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
        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: lightblue;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
        }
        input[type="submit"]:hover {
            background-color: cadetblue;
        }
        a {
            text-decoration: none;
            color: #333;
        }

        a:hover {
            text-decoration: underline;
        }
        .button-container {
            display: flex;
            justify-content: center;
        }

        .button-container a {
            margin: 0 10px;
        }
        button {
            background-color: lightblue;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }
        button:hover {
            background-color: cadetblue;
        }
    </style>
</head>
<body>
    <h1>Add Item To The Database</h1>
    <form method="post">
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
        <input type="submit" name="button1" value="Add New Item"/>
    </form>
    <br>
    <br>
    <div class="button-container">
        <a href="http://cyber-fs01/Computing-equipment/database.php">
            <button>Back</button>
        </a>
    </div>
    <script>
        const form = document.getElementById('newItem-form');
        form.addEventListener('submit', (event) => {
        event.preventDefault();
        const itemName = form.elements.item-name.value;
        const itemID = form.elements.item-id.value;
        });
    </script>
    <?php
 //Add A New Item To The Database Using PHP
 
    //Connect To The Database
    $servername = "localhost";
    $username = "Student";
    $password = "Password123";
    $dbname = "bsdc_lab_items";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Check Connection
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }
    //PHP Function To Add A New Item To The Database
    if(isset($_POST['button1'])) {
         //Get The Item Name And Item ID From The Form
         $itemName = $_POST['item-name'];
         $itemID = $_POST['item-id'];
         $checkoutDate = $_POST['checkout-date'];
         $checkoutName = $_POST['checkout-name'];
 
         //Insert The Item Into The Database
         $sql = "INSERT INTO items VALUES ('$itemID', '$itemName', '$checkoutDate', '$checkoutName')";
         if ($conn->query($sql) === TRUE) {
             echo "New Item Added Successfully";
         } else {
             echo "Error: " . $sql . "<br>" . $conn->error;
         }
 
         //Close The Connection
         $conn->close();
    }
?>
</body>
</html>

