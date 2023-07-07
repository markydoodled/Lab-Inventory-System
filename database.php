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
    <?php
 //Connect To A Database Using PHP
    $servername = "localhost";
    $username = "bsdcLabUser";
    $password = "bsdcLabPassword";
    $dbname = "bsdc_lab_items";

    //Create Connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    //Check Connection
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }
    //echo "Connected Successfully ";
    $sql = "SELECT * FROM items";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //Output Data Of Each Row
        echo "<table id='myTable'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Item Name</th>";
        echo "<th>Item ID</th>";
        echo "<th>Last Checkout Date</th>";
        echo "<th>Last Checkout Name</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while($row = $result->fetch_assoc()) {
            //echo "Item Name: " . $row["name"] . " - Item ID: " . $row["id"] . " - Last Checkout Date: " . $row["last_date"] . " - Last Checkout Name: " . $row["last_name"] . "<br>";
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['last_date'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "0 Results";
    }
    $conn->close();
?>
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