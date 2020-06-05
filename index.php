<?php

include __DIR__ . '/bootstrap.php';

$categoryRepository = new \App\ECOM\Repository\CategoryRepository();

// Get current page from query string
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Items per page
$perPage = 10;

// Get current items calculated with per page and current page
$paginator = $categoryRepository->listOfCategories($currentPage, $perPage);

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello eCommerce</title>
</head>
<body class="container">
<h1>Category List - Page <?php echo $paginator->currentPage(); ?></h1>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Category Name</th>
        <th scope="col">Total Items</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($paginator->items() as $category) : ?>
        <tr>
            <td><?php echo $category->Name; ?></td>
            <td><?php echo $category->items_count; ?></td>
        </tr>
    <?php endforeach; ?>

    <a class="btn btn-default" href="?page=<?php if ($currentPage == 1) { echo '1'; } else { echo $currentPage - 1; } ?>">Previous</a>
    <a class="btn btn-default" href="?page=<?php echo $currentPage + 1; ?>"">Next</a>
    </tbody>
</table>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
