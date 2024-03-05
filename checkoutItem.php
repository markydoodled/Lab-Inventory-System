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
<?php
//Connect To Database
$servername = "localhost";
$username = "Student";
$password = "Password123";
$dbname = "bsdc_lab_items";

//Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check Connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

//Fetch Database Name And ID List
$namesql = "SELECT name FROM items";
$idsql = "SELECT id FROM items";
$nameresult = $conn->query($namesql);
$idresult = $conn->query($idsql);

//Fetch Tutors And IDs
$tutornamesql = "SELECT tutor_name FROM tutors";
$tutornameresult = $conn->query($tutornamesql);

//Fetch Students And IDs
$studentnamesql = "SELECT student_name FROM students";
$studentnameresult = $conn->query($studentnamesql);

//Close Connection
$conn->close();
?>
<body>
    <h1>Checkout An Item</h1>
    <form method="post">
        <label for="item-picker">Choose An Item:</label>
        <select id="item-picker" name="item-picker">
            <?php foreach($nameresult as $nameresult){ ?>
                    <option><?php echo $nameresult['name'] ?></option>
            <?php  } ?>
        </select>
        <br>
        <br>
        <label for="checkout-name">Checkout Name:</label>
        <select id="checkout-name" name="checkout-name">
            <?php foreach($studentnameresult as $studentnameresult){ ?>
                    <option><?php echo $studentnameresult['student_name'] ?></option>
            <?php  } ?>
        </select>
        <br>
        <br>
        <label for="tutor-name">Tutor Name:</label>
        <select id="tutor-name" name="tutor-name">
            <?php foreach($tutornameresult as $tutornameresult){ ?>
                    <option><?php echo $tutornameresult['tutor_name'] ?></option>
            <?php  } ?>
        </select>
        <br>
        <br>
        <input type="submit"name="button1" value="Update Entry"/>
    </form>
    <br>
    <br>
    <div class="button-container">
        <a href="http://cyber-fs01/Computing-equipment/database.php">
            <button>Back</button>
        </a>
    </div>
    <?php
 //Alter An Existing Database Entry With A New Checkout Date And Name Using PHP

    //Connect To Database
    $servername = "localhost";
    $username = "Student";
    $password = "Password123";
    $dbname = "bsdc_lab_items";

    //Create Connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Check Connection
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    if(isset($_POST['button1'])) {
        //Get Data From Form
        $checkoutDate = date("Y/m/d");
        $checkoutName = $_POST["checkout-name"];
        $checkoutItemName = $_POST["item-picker"];
        $checkoutTutorName = $_POST["tutor-name"];

        //Update Database
        $sql = "UPDATE items SET last_date='$checkoutDate', last_name='$checkoutName', tutor_name='$checkoutTutorName', checked_in='Checked Out' WHERE name='$checkoutItemName'";
        $result = $conn->query($sql);
 
        //Close Connection
        $conn->close();
    }
?>
</body>
</html>
