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

$connection = new mysqli($hostname, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection Failed: " . $connection->connect_error);
}

$query  = "SELECT * FROM `pblog` ORDER BY ID DESC";
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
                <h3>Title:<?=$post['Title'] ?></h3>
                <p>Content: <?=$post['Content']?></p>
                <section><small><?= $post['created_at']?></small></section>
                <div id="mpt-class">
                   <a href="./Update.php?id=<?=$post['ID']?>"><button class="btnz btn btn-success">Edit</button></a>
                   <a href="./DeletePost.php?id=<?= $post['ID'] ?>"><span class="btn btn-danger"><img src="./trash.svg" alt=""></span></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>



</body>

</html>
