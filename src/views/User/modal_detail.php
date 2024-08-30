<div id="detail-modal-<?= $no ?>" aria-hidden="true" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto justify-center items-center md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-sm max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 bg-sky-500">
                <h3 class="text-xl font-medium text-white dark:text-white">
                    Detail Pengguna
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
                <div class="w-full py-2">
                    <?php if ($user["profile_image"] == null) { ?>
                        <svg class="w-20 h-20 text-sky-500 mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd" />
                        </svg>
                    <?php } else { ?>
                        <img src="<?= "img/" . $user["profile_image"] ?>" alt="Foto Profil" class="w-28 h-28 mx-auto rounded-full object-cover">
                    <?php } ?>
                </div>
                <div class="grid grid-rows-5 gap-5">
                    <div class="grid grid-cols-3">
                        <p class="text-sm font-normal text-gray-900 dark:text-white">Nama Lengkap</p>
                        <p class="col-span-2 text-sm text-sky-800 font-medium dark:text-gray-400">: <?= $user["fullname"] ?></p>
                    </div>
                    <div class="grid grid-cols-3">
                        <p class="text-sm font-normal text-gray-900 dark:text-white">Username</p>
                        <p class="col-span-2 text-sm text-sky-800 font-medium dark:text-gray-400">: <?= $user["username"] ?></p>
                    </div>
                    <div class="grid grid-cols-3">
                        <p class="text-sm font-normal text-gray-900 dark:text-white">Peran Pengguna</p>
                        <p class="col-span-2 text-sm text-sky-800 font-medium dark:text-gray-400">: <?= $user["role"] ?></p>
                    </div>
                    <div class="grid grid-cols-3">
                        <p class="text-sm font-normal text-gray-900 dark:text-white">Email</p>
                        <p class="col-span-2 text-sm text-sky-800 font-medium dark:text-gray-400">: <?= $user["email"] ?></p>
                    </div>
                    <div class="grid grid-cols-3">
                        <p class="text-sm font-normal text-gray-900 dark:text-white">Nomor HP</p>
                        <p class="col-span-2 text-sm text-sky-800 font-medium dark:text-gray-400">: <?= $user["phone"] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>