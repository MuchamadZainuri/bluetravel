<nav id="">
    <div class="bg-[#1E4F87] px-12">
        <div class="grid grid-cols-5 items-center py-6">
            <a href="<?= BASEURL ?>">
                <div class="flex items-center gap-2 justify-start">
                    <img src="<?= isset($url) ? $url : null ?>img/travel.png" alt="JabarTravel" class="w-[5rem] h-[5rem]">
                    <h1 class="text-3xl font-bold text-white">BlueTravel</h1>
                </div>
            </a>
            <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
            ?>
                <div class="col-span-4">
                    <ul class="flex justify-center gap-x-[2.2rem]">
                        <li>
                            <a href="<?= BASEURL . "destination" ?>" class="text-lg font-medium text-white">Destinasi Wisata</a>
                        </li>
                        <li>
                            <a href="<?= BASEURL . "order_data" ?>" class="text-lg font-medium text-white">Data Pemesanan</a>
                        </li>
                        <li>
                            <a href="<?= BASEURL . "user_data" ?>" class="text-lg font-medium text-white">Data Pengguna</a>
                        </li>
                        <li>
                            <a href="<?= BASEURL . "testimoni_data" ?>" class="text-lg font-medium text-white">Data Testimoni</a>
                        </li>
                        <li>
                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0 md:w-auto dark:text-white md:dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent text-lg font-medium text-white"> Lainnya <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg></button>
                            <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="<?= BASEURL . "category_destination" ?>" class="text-lg font-medium text-[#1E4F87] block px-4 py-2 hover:underline-offset-8 hover:underline hover:decoration-[#1E4F87]">Kategori Wisata</a>
                                    </li>
                                    <li>
                                        <a href="<?= BASEURL . "city_destination" ?>" class="text-lg font-medium text-[#1E4F87] block px-4 py-2 hover:underline-offset-8 hover:underline hover:decoration-[#1E4F87]">Kota Wisata</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            <?php
            } elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'user') {
            ?>
                <div class="col-span-4">
                    <ul class="flex justify-center gap-x-[4.4rem]">
                        <li>
                            <a href="<?= BASEURL . "home" ?>" class="text-lg font-medium text-white">Home</a>
                        </li>
                        <li>
                            <a href="<?= BASEURL . "about" ?>" class="text-lg font-medium text-white">About Us</a>
                        </li>
                        <li>
                            <a href="<?= BASEURL . "contact" ?>" class="text-lg font-medium text-white">Contact Us</a>
                        </li>
                        <li>
                            <a href="<?= BASEURL . "cart" ?>" class="text-lg font-medium text-white">Pesanan</a>
                        </li>
                        <li>
                            <a href="<?= BASEURL . "testimoni" ?>" class="text-lg font-medium text-white">Testimoni</a>
                        </li>
                    </ul>
                </div>
            <?php
            } else {
            ?>
                <div class="col-span-3">
                    <ul class="flex justify-center gap-x-[3.5rem]">
                        <li>
                            <a href="<?= BASEURL ?>" class="text-lg font-medium text-white">Home</a>
                        </li>
                        <li>
                            <a href="<?= BASEURL . "about" ?>" class="text-lg font-medium text-white">About Us</a>
                        </li>
                        <li>
                            <a href="<?= BASEURL . "contact" ?>" class="text-lg font-medium text-white">Contact Us</a>
                        </li>
                        <li>
                            <a href="<?= BASEURL . "testimoni" ?>" class="text-lg font-medium text-white">Testimoni</a>
                        </li>
                    </ul>
                </div>
            <?php
            }
            ?>
            <?php
            if (isset($_SESSION['user'])) {
            ?>
                <div class="col-start-6 flex gap-5 justify-center">
                    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                        <button type="button" class="flex text-sm bg-[#2C8FCE] rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom" data-dropdown-offset-distance="20" data-dropdown-offset-skidding="-30">
                            <span class="sr-only">Open user menu</span>
                            <?php
                            if ($profile_image == null) {
                            ?>
                                <div class="p-2">
                                    <svg class="w-10 h-10 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            <?php
                            } else {
                            ?>
                                <img src="<?= (isset($url) ? $url : null) ."img/" . $profile_image ?>" alt="profile.jpg" class="w-[3.8rem] h-[3.8rem] rounded-full object-cover">
                            <?php
                            }
                            ?>
                        </button>
                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                <div class="font-medium text-base"><?= $_SESSION['user']['username'] ?></div>
                                <div class="truncate text-base"><?= $_SESSION['user']['email'] ?></div>
                            </div>
                            <ul class="py-2 text-base dark:text-gray-200 border-t-[#2C8FCE]" aria-labelledby="dropdownUserAvatarButton">
                                <li>
                                    <a href="<?= BASEURL . "logout" ?>" class="block px-4 py-2 text-red-600 hover:bg-red-100 dark:hover:bg-gray-600 dark:hover:text-white">Keluar</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php
            } else {
                ?>
                    <div class="col-start-5 flex gap-5 justify-end">
                        <a href="<?= BASEURL . "login" ?>" class="bg-[#2C8FCE] border-2 border-[#2C8FCE] text-white px-6 py-2 rounded-lg font-medium text-lg">Masuk</a>
                        <a href="<?= BASEURL . "register" ?>" class="bg-white border-2 border-[#2C8FCE] text-[#1E4F87] px-5 py-2 rounded-lg font-medium text-lg shadow-2xl shadow-[#1E4F87]">Daftar</a>
                    </div>
                <?php
            }
                ?>
                </div>
        </div>
</nav>