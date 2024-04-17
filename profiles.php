<?php
    // Connect to the database
    $servername = "localhost";
    $username = "uzn6pxqmsv3ql";
    $password = "gaa5q0ddeqcm";
    $dbname = "db1ytkceekdgog";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title</title>
    <style>
        .item {
            display: flex;
            margin-bottom: 20px;
        }

        .image {
            margin-right: 20px;
            margin-left: 20px;
        }

        .info {
            flex-grow: 1;
        }
    </style>
</head>
<body>
    <?php
        // getting menu items from the menu table
        $sql = "SELECT * FROM information";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // outputting the data for each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='item'>";
                echo "<div class='image'>";
                echo "<img src='https://jordana.sgedu.site/cs20/final/" . $row["image"] . "' alt='" . $row["name"] . "' style='max-width: 150px;'>";
                echo "</div>";
                echo "<div class='info'>";
                echo "<h3>" . $row["name"] . "</h3>";
                echo "<p>Age: " . $row["age"] . "</p>";
                echo "<p>Bio: " . $row["description"] . "</p>";
                echo "<p>Hourly rate: $" . $row["rate"] . "</p>";
                echo "<p>Sign: " . $row["sign"] . "</p>";
                echo "<p>Hometown: " . $row["hometown"] . "</p>";
                echo "<p>Favorite Food: " . $row["food"] . "</p>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "no results";
        }

        // close database connection
        $conn->close();
    ?>
</body>
</html>
