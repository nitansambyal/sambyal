<?php
// File to store the number of visitors
$file = "visitor_count.txt";

// Check if the file exists
if (!file_exists($file)) {
    // If file doesn't exist, create it with an initial value of 0
    file_put_contents($file, 0);
}

// Read the current visitor count from the file
$visitorCount = (int)file_get_contents($file);

// Increment the count
$visitorCount++;

// Save the updated visitor count back to the file
file_put_contents($file, $visitorCount);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>8a program</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: #2c3e50;
            font-size: 2.5em;
        }

        .count {
            font-size: 2em;
            color: #e74c3c;
            font-weight: bold;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 60%;
            margin: 0 auto;
        }

        footer {
            font-size: 0.9em;
            color: #7f8c8d;
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Welcome to Our Website!</h1>
        <p>Thank you for visiting our page. We currently have:</p>
        <p class="count"><?php echo $visitorCount; ?> Visitors</p>
    </div>

    <footer>
        <p>&copy; 2024 Your Website. All rights reserved.</p>
    </footer>

</body>
</html>