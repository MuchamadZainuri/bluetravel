<div id="detail-modal-<?= $no ?>" aria-hidden="true" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto justify-center items-center md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 bg-sky-500">
                <h3 class="text-xl font-medium text-white dark:text-white">
                    Detail Testimoni <?= $no ?>
                </h3>
                <button type="button" class="text-white bg-transparent hover:bg-gray-200 hover:text-sky-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="detail-modal-<?= $no ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <div class="grid grid-rows-4 gap-5">
                    <div class="grid grid-cols-2 gap-6">
                        <p class="text-sm font-normal text-gray-900 dark:text-white">Nama Pengguna</p>
                        <p class="text-sm text-sky-800 font-medium dark:text-gray-400">: <?= $testimonial["nama_pengguna"] ?></p>
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <p class="text-sm font-normal text-gray-900 dark:text-white">Nama Destinasi</p>
                        <p class="text-sm text-sky-800 font-medium dark:text-gray-400">: <?= $testimonial["destinasi_wisata"] ?></p>
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <p class="text-sm font-normal text-gray-900 dark:text-white">Harga Tiket</p>
                        <p class="text-sm text-sky-800 font-medium dark:text-gray-400">: Rp. <?= number_format($testimonial["harga"], 0, ',', '.') ?></p>
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <p class="text-sm font-normal text-gray-900 dark:text-white">Rating</p>
                        <p class="text-sm text-sky-800 font-medium dark:text-gray-400">: <?= $testimonial["rating"] ?> <i class="fas fa-star text-yellow-400"></i></p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="text-sm font-normal text-gray-900 dark:text-white">Komentar :</p>
                        <p class="text-sm text-sky-800 font-medium dark:text-gray-400 text-justify"><?= $testimonial["comment"] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>