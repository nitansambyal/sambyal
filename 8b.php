<?php
// Database connection
$servername = "localhost";
$username = "root";  // Your database username (default is 'root' for XAMPP/MAMP)
$password = "";  // Your database password (default is empty for XAMPP/MAMP)
$dbname = "student_records";  // The database you created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch student records from the database
$sql = "SELECT id, name, age, grade FROM students";
$result = $conn->query($sql);

// Store records in an array
$students = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
} else {
    echo "No records found!";
}

// Selection Sort Algorithm (Sorting by Age)
function selectionSort($arr) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$j]['age'] < $arr[$minIndex]['age']) {
                $minIndex = $j;
            }
        }
        // Swap the found minimum element with the first element
        if ($minIndex != $i) {
            $temp = $arr[$i];
            $arr[$i] = $arr[$minIndex];
            $arr[$minIndex] = $temp;
        }
    }
    return $arr;
}

// Sort the student records using Selection Sort
$students = selectionSort($students);

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>8b program</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 50px;
            text-align: center;
        }

        h1 {
            color: #2c3e50;
        }

        table {
            width: 60%;
            margin: 30px auto;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

    <h1>Sorted Student Records</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Grade</th>
        </tr>
        <?php
        // Display the sorted student records in a table
        foreach ($students as $student) {
            echo "<tr>
                    <td>{$student['id']}</td>
                    <td>{$student['name']}</td>
                    <td>{$student['age']}</td>
                    <td>{$student['grade']}</td>
                  </tr>";
        }
        ?>
    </table>

</body>
</html>