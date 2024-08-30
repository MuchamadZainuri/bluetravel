<main id="detail-destination">
    <div class="flex flex-col gap-5">
        <div class="px-12 py-14 flex flex-col gap-5 bg-gradient-to-br from-white from-50% to-sky-400">
            <div class="flex flex-col gap-6">
                <div class="title">
                    <h2 class="text-5xl font-bold text-[#1E4F87]"><?= $destination["name"] ?></h2>
                </div>
                <div class="pt-3.5">
                    <?php
                    foreach (json_decode($destination["tags"]) as $tag) :
                    ?>
                        <span class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400"><?= $tag ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="flex justify-between">
                    <div class="flex flex-cols gap-4 items-center">
                        <div class="flex gap-1 items-center">
                            <i class="fas fa-star text-yellow-400 text-lg"></i>
                            <p class="font-medium"><?= $destination["rating"] ?></p>
                        </div>
                        <div class="flex gap-2 items-center">
                            <p class="font-medium">Waktu Buka</p>
                            <p class="text-xl">&#8226;</p>
                            <p class="font-medium"><?= substr($destination["open_time"], 0, 5) . "-" . substr($destination["close_time"], 0, 5) ?></p>
                        </div>
                        <div>
                            <p class="font-medium"><?= $destination['ordered'] ?> kali dipesan</p>
                        </div>
                        <div class="flex gap-1">
                            <svg class="w-6 h-6 text-blue-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd" />
                            </svg>
                            <p class="font-medium"><?= $destination["location"] ?></p>
                        </div>
                    </div>
                    <div class="right">
                        <a href="<?= BASEURL . "home" ?>" rel="noopener noreferrer">
                            <div class="flex bg-blue-800 py-2 ps-2 pe-2.5 items-center justify-center rounded-md hover:bg-sky-700">
                                <svg class="text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 22">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                                </svg>
                                <p class="font-medium text-white">Kembali</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-6 gap-2 shadow-sm rounded-2xl h-[27rem]">
                <div class="col-span-4 w-full h-full">
                    <div class="h-full bg-[url('../img/<?= json_decode($destination["images"])[1] ?>')] bg-cover rounded-s-2xl bg-center"></div>
                </div>
                <div class="col-span-2 w-full h-full">
                    <div class="flex flex-col gap-2 h-full">
                        <div class="h-3/4 bg-[url('../img/<?= json_decode($destination["images"])[2] ?>')] bg-cover rounded-tr-2xl bg-center">
                        </div>
                        <div class="h-3/4 bg-[url('../img/<?= json_decode($destination["images"])[3] ?>')] bg-cover rounded-br-2xl bg-center">
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-6 gap-5">
                <div class="col-span-4 p-6 bg-white border-y-2 border-blue-800 rounded-lg shadow mt-3 flex items-center">
                    <div class="flex flex-col gap-5 my-auto">
                        <div class="flex gap-3">
                            <div class="w-[0.4rem] bg-[#1E4F87] rounded-3xl"></div>
                            <h2 class="text-2xl font-semibold text-[#1E4F87]">Tentang Destinasi Ini</h2>
                        </div>
                        <div class="deskripsi">
                            <p class="text-justify"><?= json_decode($destination['descriptions'])[1] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="ps-4 pe-5 pt-[1.2rem] pb-[1.3rem] bg-white border-2 border-blue-800 rounded-lg shadow mt-3 flex flex-row justify-between h-fit">
                        <div class="space-y-1">
                            <div class="title">
                                <p class="font-medium text-zinc-600 text-sm">Harga Satu Tiket</p>
                            </div>
                            <div class="">
                                <h2 class="font-bold text-blue-800 text-4xl">Rp. <?= number_format($destination['price'], 0, ',', '.') ?></h2>
                            </div>
                        </div>
                        <div class="h-fit my-auto">
                            <label for="total_people" class="bg-blue-800 text-white px-6 py-3.5 rounded-lg w-full text-base font-medium cursor-pointer">Pilih Paket</label>
                        </div>
                    </div>
                    <div class="px-4 py-4 bg-white border-2 border-blue-800 rounded-lg shadow mt-4">
                        <form action="<?= BASEURL . "cart" ?>" method="post" autocomplete="off" spellcheck="false">
                            <div class="grid gap-y-5 gap-x-4 grid-cols-2">
                                <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>">
                                <input type="hidden" name="destination_id" value="<?= $destination['id'] ?>" id="destination" data-price="<?= $destination['price'] ?>">
                                <input type="hidden" name="order_date" value="<?= date("Y-m-d") ?>">
                                <input type="hidden" name="total_price" id="total_price">
                                <input type="hidden" name="package_price" id="package_price">
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="total_people" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Tiket</label>
                                    <input type="number" name="total_people" id="total_people" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500" min="1" max="100" placeholder="7" required>
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="duration" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Durasi Kunjungan</label>
                                    <div class="flex">
                                        <input type="number" name="duration" id="duration" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-s-lg focus:ring-blue-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="1" required min="1" max="30">
                                        <span class="inline-flex items-center px-3 text-sm bg-blue-800 text-white border rounded-e-0 border-sky-600 ring-sky-600 border-e-0 rounded-e-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                            Hari
                                        </span>
                                    </div>
                                </div>
                                <div class="col-span-2">
                                    <label for="price_service" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Layanan Tambahan</label>
                                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="price_service">
                                        <li class="w-fit border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center px-2">
                                                <input id="hotel" type="checkbox" name="hotel" value="1000000" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-800 dark:focus:ring-sky-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="hotel" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Penginapan</label>
                                            </div>
                                        </li>
                                        <li class="w-fit border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center px-2">
                                                <input id="transportation" type="checkbox" name="transportation" value="1200000" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-800 dark:focus:ring-sky-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="transportation" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Transportasi</label>
                                            </div>
                                        </li>
                                        <li class="w-fit dark:border-gray-600">
                                            <div class="flex items-center ps-3">
                                                <input id="food" type="checkbox" name="food" value="500000" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-800 dark:focus:ring-sky-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="food" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Makanan</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-span-2 hidden justify-between gap-4" id="result">
                                    <div class="my-auto">
                                        <p class="text-gray-900 text-base font-semibold">Total Harga :</p>
                                    </div>
                                    <div class="my-auto">
                                        <p class="text-blue-700 text-[1.33rem] font-bold" id="display_total_price"></p>
                                    </div>
                                </div>
                                <div class="col-span-2">
                                    <button type="submit" name="pesan" class="bg-blue-800 text-white w-full rounded-lg text-lg py-2 font-medium hover:bg-[#337bce] focus:ring-[#3b96ff] focus:border-blue-500">Pesan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-8">
                <div class="mt-2 p-4 bg-white border-x-2 border-[#1E4F87] ">
                    <h2 class="text-2xl font-semibold text-[#1E4F87] text-center">Video Destinasi</h2>
                </div>
                <div class="grid grid-cols-3 gap-5 bg-white px-5 py-6 rounded-md shadow shadow-[#1E4F87]">
                    <?php
                    foreach (json_decode($destination["videos"]) as $video) :
                    ?>
                        <iframe class="w-full rounded-lg" height="215" loading="lazy" src="<?= $video ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="px-12 pt-3 flex flex-col gap-12">
            <div class="mt-5">
                <h2 class="text-2xl font-semibold text-white rounded-full text-center p-4 bg-gradient-to-r from-sky-500 to-sky-100 ">Destinasi Lainnya</h2>
            </div>
            <div>
                <div class="swiper mySwiper3">
                    <div class="swiper-wrapper pb-14">
                        <?php if (isset($random)) : ?>
                            <?php foreach ($random as $destination) : ?>
                                <div class="swiper-slide">
                                    <a href="<?= BASEURL ?>destination/<?= $destination['id'] ?>">
                                        <div class="card hover:scale-95 transition-all ease-in-out duration-300 hover:translate-y-2 group">
                                            <div class="group-hover:shadow group-hover:shadow-blue-700 transition-all ease-in-out duration-300 card-image rounded-xl overflow-hidden">
                                                <img src="../img/<?= json_decode($destination['images'])[0] ?>" alt="destination" class="w-full h-52 object-cover object-center">
                                            </div>
                                            <div class="card-content">
                                                <h1 class="text-lg font-bold text-[#2C8FCE]"><?= $destination['name'] ?></h1>
                                                <p class="text-sm text-gray-500"><?= json_decode($destination['descriptions'])[0] ?></p>
                                                <div class="mt-7">
                                                    <div class="flex gap-x-2 items-center">
                                                        <div class="flex items-center text-base gap-1">
                                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                <?php if ($i < $destination['rating']) : ?>
                                                                    <i class="fas fa-star text-yellow-400"></i>
                                                                <?php else : ?>
                                                                    <i class="fas fa-star text-gray-400"></i>
                                                                <?php endif; ?>
                                                            <?php endfor; ?>
                                                        </div>
                                                        <span class="text-gray-900 font-semibold">(<?= $destination['rating'] ?>)</span>
                                                    </div>
                                                    <div class="mt-1 text-[#1E4F87] font-bold text-xl">
                                                        Rp. <?= number_format($destination['price'], 0, ',', '.') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- More Script -->
<?php require_once 'more_script.php'; ?>