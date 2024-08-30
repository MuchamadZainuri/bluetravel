<!DOCTYPE html>
<html lang="en" class="scroll-smooth scroll-pt-24">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titlePage ?> Blue Travel</title>
    <link rel="shortcut icon" href="<?= isset($url) ? $url : null ?>img/favicon.png" type="image/x-icon">
    <!-- Style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

    <!-- More Style -->
    <?php require_once "../src/views/Layouts/more_style.php" ?>
</head>

<body>
    <!-- Flash Message -->
    <?php

    use MyApp\Core\Message;

    Message::flash();

    if ($profile_image != null) {
        $profile_image = $profile_image ?? null;
    }

    ?>

    <!-- Navbar -->
    <?php require_once "navbar.php" ?>