<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title> Create Blog Post</title>
</head>
<body>
    <div class="container">
        <div class="form-box">
            <form action="createBlog.php" method="post">
                <h2>Create Blog Post</h2>
                <div class="form-group">
                    <label for="title" >
                    Title:
                    </label>
                    <input class="form-control" type="text" name="title" id="" required/>
                </div>
                <div class="form-group">
                    <label for="content" >
                    Content:
                    </label>
                    <textarea name="content" id="" class="form-control" cols="30" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>