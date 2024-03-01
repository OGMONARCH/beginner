<?php
// Initialize variables with proper values
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'king';

// Create connection
$connection = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection Failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];
    $content = $_POST['content'];

    try {
        $sql = "INSERT INTO `pblog`( `Title`, `Content`) VALUES(?, ?)";
        $stmt = mysqli_stmt_init($connection);


        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $title, $content);
            mysqli_stmt_execute($stmt);
            print "<script>alert('Sent Successfully')</script>";
            header( "Location: index.php" );

        } else {
            print "<script>alert('Request Failed')</script>";
        }

        // mysqli_stmt_close($stmt);

    } catch (Throwable $e) {
        print "Error: " . $e->getMessage();
    }
}

// // Close the connection
// mysqli_close($connection);
?>