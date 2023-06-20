<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Inventory System</title>
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
        input[type="text"], input[type="password"] {
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
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <h1>Lab Inventory System</h1>
    <form id="login-form">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <br>
        <button type="submit">Login</button>
    </form>
    <script>
        const form = document.getElementById('login-form');
        form.addEventListener('submit', (event) => {
        event.preventDefault();
        const username = form.elements.username.value;
        const password = form.elements.password.value;
        if (username === 'BSDCLabUser' && password === 'BSDCLabPassword') {
            window.location.href = 'database.html';
        } else {
            alert('Incorrect Username Or Password');
        }
        });
    </script>
</body>
</html>

<?php
// $servername = "localhost";
// $username = "username";
// $password = "password";

// $conn = new mysqli($servername, $username, $password);

// if ($conn->connect_error) {
//   die("Connection To The Database Failed: " . $conn->connect_error);
// }
// echo "Connected To The Database Successfully";
mysqli_connect("localhost", "username", "password");
$lab_result = mysql_query("SELECT * FROM LabItems");
while($lab_row = mysql_fetch_array($lab_result)) {
    echo "<p>".$lab_row['CustName']."</p>";
}
?>

<!--https://datasette.io/tutorials/codespaces-->

<!--Start PHP Server "php -S 00000:8080"-->

