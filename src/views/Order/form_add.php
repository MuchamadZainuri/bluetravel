<div id="add-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-sky-600 dark:text-white">
                    Pesan Paket Wisata
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="add-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="" method="post" autocomplete="off" spellcheck="false">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2 sm:col-span-1">
                        <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pemesan</label>
                        <select id="user_id" name="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="" selected disabled>-- Pilih Pemesan --</option>
                            <?php foreach ($users as $user) : ?>
                                <option value="<?= $user['id'] ?>"><?= $user['fullname'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="destination_add" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Destinasi</label>
                        <select id="destination_add" name="destination_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="" selected disabled>-- Pilih Destinasi --</option>
                            <?php foreach ($destinations as $destination) : ?>
                                <option value="<?= $destination['id'] ?>"  data-price="<?= $destination['price'] ?>"><?= $destination['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="duration_add" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Durasi Pelaksanaan Perjalanan</label>
                        <div class="flex">
                            <input type="number" name="duration" id="duration_add" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-s-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="1" required min="1" max="30">
                            <span class="inline-flex items-center px-3 text-sm bg-sky-600 text-white border rounded-e-0 border-sky-600 ring-sky-600 border-e-0 rounded-e-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                Hari
                            </span>
                        </div>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="order_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pesan</label>
                        <input type="date" name="order_date" value="<?= date('Y-m-d') ?>" id="order_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500 cursor-default" readonly>
                    </div>
                    <div class="col-span-2">
                        <label for="price_service_add" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pelayanan Paket Perjalanan</label>
                        <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="price_service_add">
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="hotel_add" type="checkbox" name="hotel" value="1000000" class="w-4 h-4 text-sky-600 bg-gray-100 border-gray-300 rounded focus:ring-sky-500 dark:focus:ring-sky-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="hotel_add" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Penginapan</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="transportation_add" type="checkbox" name="transportation" value="1200000" class="w-4 h-4 text-sky-600 bg-gray-100 border-gray-300 rounded focus:ring-sky-500 dark:focus:ring-sky-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="transportation_add" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Transportasi</label>
                                </div>
                            </li>
                            <li class="w-full dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="food_add" type="checkbox" name="food" value="500000" class="w-4 h-4 text-sky-600 bg-gray-100 border-gray-300 rounded focus:ring-sky-500 dark:focus:ring-sky-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="food_add" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Makanan</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-span-2">
                        <label for="total_people_add" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Peserta</label>
                        <input type="number" name="total_people" id="total_people_add" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500" min="1" max="100" placeholder="7" required>
                    </div>
                    <div class="col-span-2 hidden grid-cols-2 gap-4 mb-2" id="result_add">
                        <div class="col-span-1">
                            <p class="text-gray-900 text-sm font-semibold">Harga Paket :</p>
                        </div>
                        <div class="col-span-1 flex flex-col items-end">
                            <input type="number" class="hidden" name="package_price" id="package_price_add" required>
                            <p class="text-sky-600 text-sm font-semibold" id="display_package_price_add"></p>
                        </div>
                        <div class="col-span-1">
                            <p class="text-gray-900 text-sm font-semibold">Total Tagihan :</p>
                        </div>
                        <div class="col-span-1 flex flex-col items-end">
                            <input type="number" class="hidden" name="total_price" id="total_price_add" required>
                            <p class="text-sky-600 text-sm font-semibold" id="display_total_price_add"></p>
                        </div>
                    </div>
                </div>
                <button type="submit" name="store" class="text-white mx-auto flex items-center bg-sky-600 hover:bg-sky-700 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-5 pt-2.5 pb-[0.75rem] text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">
                    <svg class="me-1 -ms-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 22 22">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z" />
                    </svg>
                    Pesan
                </button>
            </form>
        </div>
    </div>
</div>