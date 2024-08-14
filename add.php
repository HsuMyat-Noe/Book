<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="p-5 m-3">
    <h1>Add Book</h1>
    <form action="" class="form" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Title" required>
        </div>
        <div class="">
            <label for="author" class="form-label">Author Name</label>
            <input type="text" id="author" name="author" class="form-control" placeholder="Author Name" required>
        </div>
        <div class="">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" placeholder="Description"  required></textarea>
        </div>
        <div class="">
            <label for="price" class="form-label">Price</label>
            <input type="text" id="price" name="price" class="form-control" placeholder="Price" required>
        </div>
        <div class="">
            <label for="category_id" class="form-label">Category</label>
            <Select name="category_id" id="category_id" class="form-select">
                <?php
                    $host = 'localhost';
                    $db = 'book';
                    $user = 'root';
                    $pass = '';
                
                    $db = mysqli_connect($host,$user,$pass,$db);

                    $qry = "SELECT * FROM categories";
                    $categories = mysqli_query($db,$qry);
                    foreach ($categories as $category){ ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php } ?>

                 ?>
            </Select>
        </div>
        <button type="submit" class="btn btn-primary m-3">Add</button>
    </form>

    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category_id = $_POST['category_id'];
    }

    if(!empty($title) && !empty($author) && !empty($description) && !empty($price) && !empty($category_id)) {
        $qry = "INSERT INTO book(title, author, description, price, category_id) VALUES ('$title','$author','$description', '$price', '$category_id')";

        mysqli_query($db,$qry);
        header("location:index.php");     
    }


?> 