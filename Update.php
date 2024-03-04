<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/2342b6e29f.js" crossorigin="anonymous"></script>
    <title>Update Post</title>
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = $_POST['id'] ?? 0;
    $newTitle = $_POST['newTitle'] ?? '';
    $newContent = $_POST['newContent'] ?? '';

    $updateQuery = "UPDATE `pblog` SET Title = '$newTitle', Content = '$newContent' WHERE ID = $postId";

    if ($connection->query($updateQuery) === TRUE) {
        echo "Post with ID $postId has been updated successfully.";
    } else {
        echo "Error updating post: " . $connection->error;
    }
}

$postId = $_GET['id'] ?? 0;

$selectQuery = "SELECT * FROM `pblog` WHERE ID = $postId";
$result = $connection->query($selectQuery);

$post = $result->fetch_assoc();
?>

<div class="container">
    <div class="body">
        <h2>Update Post</h2>
        <?php if ($post): ?>`
            <form method="post" action="">
                <input type="hidden" name="id" value="<?= $post['ID'] ?>">
                <label for="newTitle">New Title:</label>
                <input type="text" name="newTitle" value="<?= $post['Title'] ?>"><br>
                <label for="newContent">New Content:</label>
                <textarea name="newContent"><?= $post['Content'] ?></textarea><br>
                <button type="submit" class="btn btn-primary">Update Post</button>
            </form>
        <?php else: ?>
            <p>No post selected for update.</p>
        <?php endif; ?>
    </div>
</div>

</body>

</html>
