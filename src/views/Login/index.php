<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titlePage ?> Blue Travel</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
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
    <?php

    use MyApp\Core\Message;

    Message::flash();

    ?>
    <main id="login">
        <div class="bg-gradient-to-br from-[#1E4F87] from-50% to-[#2C8FCE] to-50% min-h-screen flex flex-col justify-center items-center">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 w-1/2">
                <a href="<?= BASEURL ?>" class="flex items-center mb-6 text-4xl font-semibold text-white dark:text-white">
                    <img class="w-24 h-24 mr-2" src="img/travel.png" alt="logo">
                    BlueTravel
                </a>
                <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-center text-xl font-bold leading-tight tracking-tight text-[#1E4F87] md:text-2xl dark:text-white">
                            Masuk ke akun Anda
                        </h1>
                        <form class="space-y-4 md:space-y-6" action="" method="post" autocomplete="off" spellcheck="false">
                            <div>
                                <label for="username" class="block mb-2 text-sm font-medium text-[#1E4F87] dark:text-white">Username</label>
                                <input type="text" name="username" id="username" class="bg-gray-50 border border-[#1E4F87] text-gray-900 rounded-lg focus:ring-[#1E4F87] focus:border-[#1E4F87] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#1E4F87] dark:focus:border-[#1E4F87]" placeholder="user01" required maxlength="15" autofocus minlength="5">
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-[#1E4F87] dark:text-white">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••••••••••••" class="bg-gray-50 border border-[#1E4F87] text-gray-900 rounded-lg focus:ring-[#1E4F87] focus:border-[#1E4F87] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required minlength="8">
                            </div>
                            <button type="submit" name="login" class="w-full text-white bg-[#1E4F87] hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Masuk</button>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Belum Punya Akun? <a href="<?= BASEURL . "register" ?>" class="font-medium text-[#1E4F87] hover:underline dark:text-primary-500">Buat Akun</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>