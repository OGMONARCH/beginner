<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/2342b6e29f.js" crossorigin="anonymous"></script>
    <title>My Blog</title>
</head>

<body>
<?php
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

$query  = "SELECT * FROM pblog ORDER BY ID DESC";
$result = $connection->query($query);

$posts = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="container">
    <div class="body">
        <h2>My Blog</h2>
        <a href="./create.php"><button class="btn btn-primary">Create Post</button></a>
        <?php foreach ($posts as $post): ?>
            <div class="mypost">
                <p>ID: <?= $post['ID'] ?></p>
                <p>Time Sent:<?= $post['created_at']?></p>
                <p>Title:<?=$post['Title'] ?></p>
                <p>Content: <?=$post['Content']?></p>
                <div id="mpt-class">
                   <button class="btn btn-success">Edit</button>
                   <span class="btn btn-danger"><img src="./trash.svg" alt=""></span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>



</body>

</html>
