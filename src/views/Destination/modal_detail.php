<div id="detail-modal-<?= $no ?>" aria-hidden="true" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto justify-center items-center md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 bg-sky-500">
                <h3 class="text-xl font-medium text-white dark:text-white">
                    Detail Destinasi Wisata
                </h3>
                <button type="button" class="text-white bg-transparent hover:bg-gray-200 hover:text-sky-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="detail-modal-<?= $no ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <div class="space-y-5">
                    <div class="grid grid-cols-2 gap-4">
                        <p class="text-sm font-normal text-gray-900 dark:text-white">Nama Destinasi</p>
                        <p class="text-sm text-sky-800 font-medium dark:text-gray-400">: <?= $destination["name"] ?></p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <p class="text-sm font-normal text-gray-900 dark:text-white">Kategori</p>
                        <p class="text-sm text-sky-800 font-medium dark:text-gray-400">:
                            <?php
                            $categoryNames = array_column($categories, 'name', 'id');
                            echo $categoryNames[$destination["category_id"]] ?? '';
                            ?>
                        </p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <p class="text-sm font-normal text-gray-900 dark:text-white">Harga Tiket</p>
                        <p class="text-sm text-sky-800 font-medium dark:text-gray-400">: Rp. <?= number_format($destination["price"], 0, ',', '.') ?></p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <p class="text-sm font-normal text-gray-900 dark:text-white">Rating</p>
                        <p class="text-sm text-sky-800 font-medium dark:text-gray-400">: <?= $destination["rating"] ?> / 5 <i class="fas fa-star text-yellow-400"></i></p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <p class="text-sm font-normal text-gray-900 dark:text-white">Total Dipesan</p>
                        <p class="text-sm text-sky-800 font-medium dark:text-gray-400">: <?= $destination["ordered"] ?></p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <p class="text-sm font-normal text-gray-900 dark:text-white">Lokasi</p>
                        <p class="text-sm text-sky-800 font-medium dark:text-gray-400">: <?= $destination["location"] ?></p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <p class="text-sm font-normal text-gray-900 dark:text-white">Jam Buka</p>
                        <p class="text-sm text-sky-800 font-medium dark:text-gray-400">: <?= substr($destination["open_time"], 0, 5) ?></p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <p class="text-sm font-normal text-gray-900 dark:text-white">Jam Tutup</p>
                        <p class="text-sm text-sky-800 font-medium dark:text-gray-400">: <?= substr($destination["close_time"], 0, 5) ?></p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <p class="text-sm font-normal text-gray-900 dark:text-white">Kota</p>
                        <p class="text-sm text-sky-800 font-medium dark:text-gray-400">:
                            <?php
                            $cityNames = array_column($cities, 'name', 'id');
                            echo $cityNames[$destination["city_id"]] ?? '';
                            ?>
                        </p>
                    </div>
                    <div class="grid grid-cols-1">
                        <div class="space-y-1">
                            <p class="text-sm font-normal text-gray-900 dark:text-white">Tags :</p>
                            <p class="text-sm text-sky-800 font-medium dark:text-gray-400"><?= implode(', ', json_decode($destination["tags"])) ?></p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1">
                        <div class="space-y-1">
                            <p class="text-sm font-normal text-gray-900 dark:text-white">Deskripsi Singkat :</p>
                            <p class="text-sm text-sky-800 font-medium dark:text-gray-400"><?= json_decode($destination["descriptions"])[0] ?></p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1">
                        <div class="space-y-1">
                            <p class="text-sm font-normal text-gray-900 dark:text-white">Deskripsi Lengkap :</p>
                            <p class="text-sm text-sky-800 font-medium dark:text-gray-400"><?= json_decode($destination["descriptions"])[1] ?></p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1">
                        <div class="space-y-1">
                            <p class="text-sm font-normal text-gray-900 dark:text-white">Gambar :</p>
                            <div class="grid grid-cols-2 gap-4">
                                <?php
                                $images = json_decode($destination["images"]);
                                foreach ($images as $image) :
                                ?>
                                    <img src="img/<?= $image ?>" alt="<?= $destination["name"] ?>" class="w-full h-32 object-cover rounded-lg">
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1">
                        <div class="space-y-1">
                            <p class="text-sm font-normal text-gray-900 dark:text-white">Video :</p>
                            <div class="grid grid-cols-2 gap-4">
                                <?php
                                $videos = json_decode($destination["videos"]);
                                foreach ($videos as $video) :
                                ?>
                                    <iframe src="<?= $video ?>" loading="lazy" class="w-full h-32 object-cover rounded-lg" allowfullscreen></iframe>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>