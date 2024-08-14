<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="p-5 m-5">
   <h1>
        Book List
   </h1> 
   <a href="add.php" class="btn btn-primary">Add Book</a>
   <table class="table table-striped mt-2">
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Author</th>
        <th>Description</th>
        <th>Price</th>
        <th>Category</th>
        <th>Action</th>
    </tr>

    <?php
        $host = 'localhost';
        $db = 'book';
        $user = 'root';
        $pass = '';

        $db = mysqli_connect($host,$user,$pass,$db);

        $qry = "SELECT * FROM book";
        $data = mysqli_query($db, $qry);
        while($res = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?php echo $res['id'] ?></td>
                <td><?php echo $res['title'] ?></td>
                <td><?php echo $res['author'] ?></td>
                <td><?php echo $res['description'] ?></td>
                <td><?php echo $res['price'] ?></td>
            
                    
                    <td>
                    <?php 
                        $category_id = $res['category_id'];
                        $query = "SELECT * FROM categories WHERE id = $category_id";
                        $category = mysqli_query($db, $query);
                        $category_res = mysqli_fetch_assoc($category);
                        echo $category_res['name'];
                    ?>
                        
                    </td>
                
                <td>
                    <a href="edit.php?id=<?php echo $res['id'] ?>" class="btn btn-success">Edit</a>
                    <a href="delete.php?id=<?php echo $res['id'] ?>" class="btn btn-danger">Delete</a>
                </td>
                </tr>
      <?php  } ?>

   </table>
   <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>