<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $page_title; ?></title>

    <link href="assets/css/style.css" rel="stylesheet" media="screen" />
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />

</head>
<body>

<!-- container -->
<div class="container">
    <?php include 'menu.php'; ?>
<?php
// show page header
echo "<div class='page-header'>";
echo "<h1>{$page_title}</h1>";
echo "</div>";
?>