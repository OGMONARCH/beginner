<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'king';

$connection = new mysqli($hostname, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection Failed: " . $connection->connect_error);
}

$postId = $_GET['id'] ?? 0;

if ($postId > 0) {
    $deleteQuery = "DELETE FROM `pblog` WHERE ID = $postId";

    if ($connection->query($deleteQuery) === TRUE) {
        print "<script>alert('Post Deleted Successfully')</script>";
        header("Location: index.php");
    } else {
        echo "Error deleting post: " . $connection->error;
    }
} else {
    echo "Invalid request. No valid post ID provided.";
}

?>
