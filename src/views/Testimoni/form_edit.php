<div id="edit-modal-<?= $no ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-sky-600 dark:text-white">
                    Update Data Testimoni <?= $no ?>
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit-modal-<?= $no ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5 form-class" action="<?= BASEURL . 'testimoni_data/edit' ?>" method="post" autocomplete="off" spellcheck="false">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <input type="hidden" name="id" value="<?= $testimonial['id'] ?>">
                        <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pengguna</label>
                        <select id="user_id" name="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required title="Pilih nama pengguna">
                            <?php foreach ($users as $user) : ?>
                                <option value="<?= $user['id'] ?>" <?= $user['id'] == $testimonial['user_id'] ? 'selected' : null ?>><?= $user['fullname'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="destination_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Destinasi</label>
                        <select id="destination_id" name="destination_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required title="Pilih destinasi wisata">
                            <?php foreach ($destinations as $destination) : ?>
                                <option value="<?= $destination['id'] ?>" <?= $destination['id'] == $testimonial['destination_id'] ? 'selected' : null ?>><?= $destination['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="rating" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating</label>
                        <div class="flex">
                            <input type="number" name="rating" value="<?= $testimonial["rating"] ?>" id="rating" class="bg-gray-50 border-e-0 border-sky-600 text-gray-900 text-sm rounded-s-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="1,0" min="1" max="5" step="0.1" required title="Masukkan rating dari 1 hingga 5">
                            <span class="inline-flex items-center px-3 text-sm bg-sky-50 text-white border rounded-e-0 border-sky-600 ring-sky-600 rounded-e-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <i class="fas fa-star text-yellow-400"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Komentar</label>
                        <textarea name="comment" id="comment" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 text-justify" placeholder="Komentar" minlength="50" required title="Masukkan komentar minimal 50 karakter"><?= $testimonial['comment'] ?></textarea>
                    </div>
                </div>
                <button type="submit" name="edit" class="text-white mx-auto flex items-center bg-sky-600 hover:bg-sky-700 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-5 pt-2.5 pb-[0.75rem] text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">
                    <svg class="me-1 -ms-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 22 22">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M11 16h2m6.707-9.293-2.414-2.414A1 1 0 0 0 16.586 4H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V7.414a1 1 0 0 0-.293-.707ZM16 20v-6a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v6h8ZM9 4h6v3a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V4Z" />
                    </svg>
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>