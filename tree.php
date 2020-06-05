<?php

include __DIR__ .'/bootstrap.php';

$categoryRepository = new \App\ECOM\Repository\CategoryRepository();
$rootParents = $categoryRepository->getRootParentList();
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Hello eCommerce - Tree View</title>

    <link rel="stylesheet" href="public/assets/css/custom.css">
</head>
<body class="container">
    <h1>Category Tree</h1>
    <div class="container" style="margin-top:30px;">
        <div class="row">
            <div class="col-md-4">
                <ul id="tree1">
                    <?php foreach ($rootParents as $parent) : ?>
                        <?php
                        $builder = new \App\ECOM\BuildTree(); /* Here, we can utilize builder design pattern. */
                        $builder->buildTree($parent);
                        ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="public/assets/js/custom.js"></script>
</body>
</html>
