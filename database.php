<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Database</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
            max-width: 800px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #myInput {
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 100%;
            font-size: 16px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
            padding: 12px 20px;
            box-sizing: border-box;
            border-radius: 4px;
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
    </style>

</head>
<body>
    <h1>Lab Database Table</h1>
    <input type="text" id="myInput" onkeyup="searchTable()" placeholder="Search For Item Names..." title="Type In An Item Name">
    <table id="myTable">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Item ID</th>
                <th>Last Checkout Date</th>
                <th>Last Checkout Name</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Item 1</td>
                <td>1</td>
                <td>1/1/1999</td>
                <td>John Doe</td>
            </tr>
            <tr>
                <td>Item 2</td>
                <td>2</td>
                <td>1/2/1999</td>
                <td>John Doe</td>
            </tr>
            <tr>
                <td>Item 3</td>
                <td>3</td>
                <td>1/3/1999</td>
                <td>John Doe</td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    <div class="button-container">
        <a href="newItem.php">
            <button>Add New Item</button>
        </a>
        <a href="checkoutItem.php">
            <button>Checkout Item</button>
        </a>
    </div>
    <script>
        function searchTable() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
        }
        </script>
</body>
</html>

<?php
 //Connect To A Database Using PHP
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
    echo "Connected Successfully";
    $sql = "SELECT * FROM lab_table";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //Output Data Of Each Row
        while($row = $result->fetch_assoc()) {
            echo "Item Name: " . $row["item_name"] . " - Item ID: " . $row["item_id"] . " - Last Checkout Date: " . $row["last_checkout_date"] . " - Last Checkout Name: " . $row["last_checkout_name"] . "<br>";
        }
    } else {
        echo "0 Results";
    }
    $conn->close();
?>