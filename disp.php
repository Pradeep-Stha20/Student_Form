<?php // disp.php (Complete)
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    background-image: url("pic1.jpg");
    background-size: cover;
    color: #333;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    }
    .container {
    margin: 10px auto;
    background: #fff;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    background-color: rgba(225, 225, 225, 0.8);
    flex-grow: 1;
}
h1 {
    text-align: center;
    color: #444;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

th,
td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    text-overflow: ellipsis;
    white-space: nowrap;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
}

.top-button {
    text-align: right;
    margin-bottom: 20px;
}

#add-new {
    display: inline-block;
    padding: 10px 20px;
    background-color: #5cb85c;
    color: white;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

#add-new:hover {
    background-color: #4cae4c;
}

table a {
    display: inline-block;
    padding: 5px 10px;
    margin: 0 2px;
    text-decoration: none;
    border-radius: 3px;
    transition: background-color 0.3s;
}

table a:first-of-type {
    background-color: #007bff;
    color: white;
}

table a:first-of-type:hover {
    background-color: #0056b3;
}

table a:last-of-type {
    background-color: #dc3545;
    color: white;
}

table a:last-of-type:hover {
    background-color: #bd2130;
}


    </style>
    <title>Student Details</title>
</head>

<body>
    <div class="container">
        <h1>Student Admission Details Table</h1>
        <div class="top-button">
            <a id="add-new" href="form.php">Add New</a>
        </div>
        <br>
        <?php

        $sql = "SELECT * FROM Student";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>"; // Start the table
            echo "<thead>"; // Table header
            echo "<tr>";
            echo "<th>Id</th>";
            echo "<th>Name</th>";
            echo "<th>Address</th>";
            echo "<th>Birth_Date</th>";
            echo "<th>Gender</th>";
            echo "<th>Email</th>";
            echo "<th>Contact</th>";
            echo "<th>Faculty</th>";
            echo "<th>Actions</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>"; // Table body

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['First_Name'] . " " . $row['Middle_Name'] . " " . $row['Last_Name'] . "</td>";
                echo "<td>" . $row['Address'] . "</td>";
                echo "<td>" . $row['Birth_Date'] . "</td>";
                echo "<td>" . $row['Gender'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['Contact'] . "</td>";
                echo "<td>" . $row['Faculty'] . "</td>";
                echo "<td>";
                echo "<a href='update.php?id=" . $row['id'] . "'>Update</a> ";
                echo "<a href='delete.php?id=" . $row['id'] . "'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>"; // Close table body
            echo "</table>"; // Close the table
        } else {
            echo "<p>No records found</p>";
        }
        ?>
    </div>
    <footer>
    </footer>
</body>

</html>