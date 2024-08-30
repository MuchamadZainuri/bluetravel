<div id="edit-modal-<?= $no ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-sky-600 dark:text-white">
                    Update Data Pemesanan
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit-modal-<?= $no ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5 form-class" action="<?= BASEURL . 'order_data/edit' ?>" method="post" id="form_<?= $order['id'] ?>" autocomplete="off" spellcheck="false">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2 sm:col-span-1">
                        <input type="hidden" name="id" value="<?= $order["id"] ?>">
                        <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pemesan</label>
                        <select id="user_id" name="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <?php foreach ($users as $user) : ?>
                                <option value="<?= $user['id'] ?>" <?= $order['user_id'] == $user['id'] ? 'selected' : null ?>><?= $user['fullname'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="destination_<?= $order['id'] ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Destinasi</label>
                        <select id="destination_<?= $order['id'] ?>" name="destination_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <?php foreach ($destinations as $destination) : ?>
                                <option value="<?= $destination['id'] ?>" data-price="<?= $destination['price'] ?>" <?= $order['destination_id'] == $destination['id'] ? 'selected' : null ?>><?= $destination['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="duration_<?= $order['id'] ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Durasi Pelaksanaan Perjalanan</label>
                        <div class="flex">
                            <input type="number" name="duration" value="<?= $order["duration"] ?>" id="duration_<?= $order['id'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-s-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="1" required min="1" max="30">
                            <span class="inline-flex items-center px-3 text-sm bg-sky-600 text-white border rounded-e-0 border-sky-600 ring-sky-600 border-e-0 rounded-e-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                Hari
                            </span>
                        </div>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="order_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pesan</label>
                        <input type="date" name="order_date" value="<?= $order["order_date"] == '' ? date('Y-m-d') : $order["order_date"] ?>" id="order_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500 cursor-default">
                    </div>
                    <div class="col-span-2">
                        <label for="price_service" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pelayanan Paket Perjalanan</label>
                        <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="price_service">
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="hotel_<?= $order['id'] ?>" type="checkbox" name="hotel" value="1000000" class="w-4 h-4 text-sky-600 bg-gray-100 border-gray-300 rounded focus:ring-sky-500 dark:focus:ring-sky-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?= $order['hotel'] == 1 ? "checked" : null ?>>
                                    <label for="hotel_<?= $order['id'] ?>" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Penginapan</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="transportation_<?= $order['id'] ?>" type="checkbox" name="transportation" value="1200000" class="w-4 h-4 text-sky-600 bg-gray-100 border-gray-300 rounded focus:ring-sky-500 dark:focus:ring-sky-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?= $order['transportation'] == 1 ? "checked" : null ?>>
                                    <label for="transportation_<?= $order['id'] ?>" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Transportasi</label>
                                </div>
                            </li>
                            <li class="w-full dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="food_<?= $order['id'] ?>" type="checkbox" name="food" value="500000" class="w-4 h-4 text-sky-600 bg-gray-100 border-gray-300 rounded focus:ring-sky-500 dark:focus:ring-sky-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" <?= $order['food'] == 1 ? "checked" : null ?>>
                                    <label for="food_<?= $order['id'] ?>" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Makanan</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-span-1">
                        <label for="total_people_<?= $order['id'] ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Peserta</label>
                        <input type="number" name="total_people" value="<?= $order['total_people'] ?>" id="total_people_<?= $order['id'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500" min="1" max="100" placeholder="7" required>
                    </div>
                    <div class="col-span-1">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Pemesanan</label>
                        <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="cancelled" <?= $order['status'] == "canceled" ? 'selected' : null ?>>Dibatalkan</option>
                            <option value="processing" <?= $order['status'] == "processing" ? 'selected' : null ?>>Pending</option>
                            <option value="completed" <?= $order['status'] == "completed" ? 'selected' : null ?>>Selesai</option>
                        </select>
                    </div>
                    <div class="col-span-2 hidden grid-cols-2 gap-4 mb-2" id="result_<?= $order['id'] ?>">
                        <div class="col-span-1">
                            <p class="text-gray-900 text-sm font-semibold">Harga Paket :</p>
                        </div>
                        <div class="col-span-1 flex flex-col items-end">
                            <input type="hidden" name="package_price" value="<?= $order['package_price'] ?>" id="package_price_<?= $order['id'] ?>">
                            <p class="text-sky-600 text-sm font-semibold" id="display_package_price_<?= $order['id'] ?>">Rp. <?= number_format($order["package_price"], 0, ',', '.') ?></p>
                        </div>
                        <div class="col-span-1">
                            <p class="text-gray-900 text-sm font-semibold">Total Tagihan :</p>
                        </div>
                        <div class="col-span-1 flex flex-col items-end">
                            <input type="hidden" name="total_price" value="<?= $order['total_price'] ?>" id="total_price_<?= $order['id'] ?>">
                            <p class="text-sky-600 text-sm font-semibold" id="display_total_price_<?= $order['id'] ?>">Rp. <?= number_format($order["total_price"], 0, ',', '.') ?></p>
                        </div>
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