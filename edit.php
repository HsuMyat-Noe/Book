<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="p-5 m-3">
    <?php
        $host = 'localhost';
        $db = 'book';
        $user = 'root';
        $pass = '';
    
        $db = mysqli_connect($host,$user,$pass,$db);
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $res = mysqli_query($db, "SELECT * FROM book WHERE id=$id");

            if(mysqli_num_rows($res) == 1) {
                foreach($res as $res) {
                    $title = $res['title'];
                    $author = $res['author'];
                    $description = $res['description'];
                    $price = $res['price'];
                    $category_id = $res['category_id'];
                }
            }
        }
    ?>
    <h1>Edit Book</h1>
    <form action="" class="form" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" value="<?php echo $title ?>" class="form-control" placeholder="Title">
        </div>
        <div class="">
            <label for="author" class="form-label">Author Name</label>
            <input type="text" id="author" name="author" value="<?php echo $author ?>" class="form-control" placeholder="Author Name">
        </div>
        <div class="">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" placeholder="Description"><?php echo $description ?></textarea>
        </div>
        <div class="">
            <label for="price" class="form-label">Price</label>
            <input type="text" id="price" name="price" value="<?php echo $price ?>" class="form-control" placeholder="Price">
        </div>
        <div class="">
            <label for="category_id" class="form-label">Category</label>
            <Select name="category_id" id="category_id" class="form-select">

            <?php
                    $qry = "SELECT * FROM categories";
                    $categories = mysqli_query($db,$qry);
                    foreach ($categories as $category){ ?>
                        <option value="<?= $category['id'] ?>" <?php if( $category['id'] == $category_id) { ?> selected <?php } ?> ><?= $category['name'] ?></option>
                    <?php } ?>
            </Select>
        </div>
        <button type="submit" name="update" class="btn btn-primary m-3">Update</button>
    </form>

    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php

    if(isset($_POST['update'])){
        $title = $_POST['title'];
        $author = $_POST['author'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];
        echo $category_id;
        mysqli_query($db, "UPDATE book SET title='$title', author='$author', price='$price', description='$description', category_id='$category_id' WHERE id = $id ");
        header("location:index.php");
    }



?>