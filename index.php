<?php

// Uncomment the below line to display errors in php (if needed)
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config/database.php';


$categories = \App\Models\Category::withCount('items')->orderBy('items_count', 'desc')->get();
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello eCommerce</title>
</head>
<body class="container">
    <h1>Category List</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Category Name</th>
            <th scope="col">Total Items</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach($categories as $category) : ?>
            <tr>
                <td><?php echo $category->Name; ?></td>
                <td><?php echo $category->items_count; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
