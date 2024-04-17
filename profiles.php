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
    <link rel="stylesheet" href="style.css">
    <title>Rent-A-Friend | Profiles</title> 
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
        div.button {
            margin-left: 10vw;
            margin-top: 2vw;
            margin-bottom: 3vw;
        }
    </style>
</head>
<body>
        <header>
                <div class="logo">
                    <a href="index.html"><img src="logo.png" alt="Logo" ></a>
                </div>
                <div class="title">
                    <h1>Rent-A-Friend</h1>
                </div>
        </header>
        
        <div class="navbar">
                <a href="index.html">Home</a>
                <a href="FAQ.html">FAQ</a>
                <a href="match.html">Find Match</a>
                <a href="profiles.php">Profiles</a>
                <a href="reviews.html">Reviews</a>
                <a href="terms.html">Terms</a>
        </div>
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

    <div class="button">
        <form action="https://mbeast01.github.io/Rent-A-Friend/checkout.html">
            <input type="submit" value="Rent now!"/>
        </form>
    </div>
</div>
<footer>
        <div class="footer-copyright">
                <p>&copy; 2024 Rent-A-Friend. All rights reserved.</p>
        </div>
        <div class="footer-links" >
                <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="FAQ.html">FAQ</a></li>
                        <li><a href="Contact.html">Contact</a></li>
                        <li><a href="match.html">Find A Match</a></li>
                        <li><a href="profiles.html">Profiles</a></li>
                        <li><a href="reviews.html">Reviews</a></li>
                </ul>
        </div>
</footer>
</body>
</html>
