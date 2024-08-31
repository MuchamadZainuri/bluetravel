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
    <main id="">
        <div class="bg-gradient-to-br from-[#1E4F87] from-55% to-[#2C8FCE] to-45% min-h-screen flex flex-col justify-center items-center">
            <div class="grid grid-cols-2 items-center justify-center w-full h-full">
                <a href="<?= BASEURL ?>" class="flex items-center text-7xl ps-11 font-semibold text-white dark:text-white mx-auto mb-8 hover:duration-700 hover:-translate-y-6 ease-in-out transition-all">
                    <img class="w-56 h-56 mr-3" src="img/travel.png" alt="logo">
                    BlueTravel
                </a>
                <div class="mx-auto md:h-full lg:py-7 w-4/5 ">
                    <div class="w-full bg-white rounded-lg shadow dark:border xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                        <div class="p-6 space-y-4 md:space-y-6 sm:px-8">
                            <h1 class="text-center text-xl font-bold leading-tight tracking-tight text-[#1E4F87] md:text-2xl dark:text-white">
                                Buat Akun Baru
                            </h1>
                            <form class="space-y-4 md:space-y-6" action="" method="post" autocomplete="off" spellcheck="false" enctype="multipart/form-data">
                                <div class="grid grid-cols-2 gap-x-6 w-full">
                                    <div class="w-full space-y-4">
                                        <div class="">
                                            <label for="username" class="block mb-2 text-sm font-medium text-[#1E4F87] dark:text-white">Username</label>
                                            <input type="text" name="username" id="username" class="bg-gray-50 border border-[#1E4F87] text-gray-900 rounded-lg focus:ring-[#1E4F87] focus:border-[#1E4F87] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="user01" required maxlength="15" autofocus minlength="5" pattern="^[a-z0-9]{5,15}$" title="Hanya huruf kecil dan angka, minimal 5 karakter, maksimal 15 karakter"> 
                                        </div>
                                        <div>
                                            <label for="phone" class="block mb-2 text-sm font-medium text-[#1E4F87] dark:text-white">Nomor Telepon</label>
                                            <input type="tel" name="phone" id="phone" class="bg-gray-50 border border-[#1E4F87] text-gray-900 rounded-lg focus:ring-[#1E4F87] focus:border-[#1E4F87] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="081234567890" pattern="^(62|0)8[1-9][0-9]{6,11}$" required maxlength="12" minlength="10" title="Hanya angka, minimal 10 karakter, maksimal 12 karakter">
                                        </div>
                                        <div>
                                            <label for="password" class="block mb-2 text-sm font-medium text-[#1E4F87] dark:text-white">Password</label>
                                            <input type="password" name="password" id="password" placeholder="••••••••••••••••••" class="bg-gray-50 border border-[#1E4F87] text-gray-900 rounded-lg focus:ring-[#1E4F87] focus:border-[#1E4F87] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password minimal 8 karakter, mengandung huruf besar, huruf kecil, dan angka" required>
                                        </div>
                                    </div>
                                    <div class="w-full space-y-4">
                                        <div>
                                            <label for="fullname" class="block mb-2 text-sm font-medium text-[#1E4F87] dark:text-white">Nama Lengkap</label>
                                            <input type="text" name="fullname" id="fullname" placeholder="Aziz Hermansyah" class="bg-gray-50 border border-[#1E4F87] text-gray-900 rounded-lg focus:ring-[#1E4F87] focus:border-[#1E4F87] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required maxlength="50" minlength="5" pattern="^([A-Z][a-z]+)(\s[A-Z][a-z]+)*$" title="Hanya huruf dan spasi yang diizinkan, dan setiap kata harus diawali huruf besar">
                                        </div>
                                        <div>
                                            <label for="email" class="block mb-2 text-sm font-medium text-[#1E4F87] dark:text-white">Email</label>
                                            <input type="email" name="email" id="email" class="bg-gray-50 border border-[#1E4F87] text-gray-900 rounded-lg focus:ring-[#1E4F87] focus:border-[#1E4F87] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="example@company.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" title="Masukkan email dengan huruf kecil yang valid">
                                        </div>
                                        <div>
                                            <label for="confirm" class="block mb-2 text-sm font-medium text-[#1E4F87] dark:text-white">Konfirmasi Password</label>
                                            <input type="password" name="confirm" id="confirm" placeholder="••••••••••••••••••" class="bg-gray-50 border border-[#1E4F87] text-gray-900 rounded-lg focus:ring-[#1E4F87] focus:border-[#1E4F87] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" minlength="8" required title="Konfirmasi password">
                                        </div>
                                    </div>
                                    <div class="w-full col-span-2 pt-4">
                                        <label for="profile_image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Profil</label>
                                        <input type="file" name="profile_image" id="profile_image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500" accept="image/jpeg, image/jpg, image/png" title="Pilih foto profil pengguna">
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-300">Format: .jpg, .jpeg, .png</p>
                                    </div>
                                </div>
                                <button type="submit" name="register" class="w-full text-white bg-[#1E4F87] hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Buat Akun</button>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Sudah punya akun? <a href="<?= BASEURL . "login" ?>" class="font-medium text-[#1E4F87] hover:underline dark:text-primary-500">Masuk</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>