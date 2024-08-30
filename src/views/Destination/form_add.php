<div id="add-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-3 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-sky-600 dark:text-white">
                    Tambah Destinasi Baru
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="add-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="" method="post" enctype="multipart/form-data" autocomplete="off" spellcheck="false">
                <div class="grid gap-4 mb-4 grid-cols-4">
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Destinasi</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500" placeholder="Gunung Bromo" required autofocus maxlength="40">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                        <select name="category_id" id="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500" required>
                            <option value="" selected disabled>Pilih Kategori</option>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Tiket</label>
                        <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500" placeholder="50000" required min="5000">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="rating" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating</label>
                        <input type="number" name="rating" id="rating" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500" placeholder="4,5" required min="1" max="5" step="0.1">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi</label>
                        <input type="text" name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500" placeholder="Lewiliang, Cilacap" required maxlength="50">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="city_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota</label>
                        <select name="city_id" id="city_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500" required>
                            <option value="" selected disabled>Pilih Kota</option>
                            <?php foreach ($cities as $city) : ?>
                                <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-span-1">
                        <label for="open-time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu Buka:</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="time" name="open-time" id="open-time" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="06:00" max="18:00" value="00:00" required />
                        </div>
                    </div>
                    <div class="col-span-1">
                        <label for="close-time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu Tutup:</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="time" name="close-time" id="close-time" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="12:00" max="23:00" value="00:00" required />
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label for="short-description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Singkat</label>
                        <textarea name="short-description" id="short-description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500" placeholder="Gunung Bromo adalah gunung berapi aktif di Jawa Timur, Indonesia." required></textarea>
                    </div>
                    <div class="col-span-2">
                        <label for="long-description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Panjang</label>
                        <textarea name="long-description" id="long-description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500" placeholder="Gunung Bromo adalah gunung berapi aktif di Jawa Timur, Indonesia. juga merupakan salah satu destinasi wisata yang paling populer di Indonesia. alam yang indah dan pemandangan mata hari terbit yang menakjubkan." required></textarea>
                    </div>
                    <div class="col-span-1">
                        <label for="cover" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cover</label>
                        <input type="file" name="cover" id="cover" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" accept="image/jpeg,image/png,image/jpg,image/webp" required>
                    </div>
                    <div class="col-span-1">
                        <label for="image1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image 1</label>
                        <input type="file" name="image1" id="image1" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" accept="image/jpeg,image/png,image/jpg,image/webp" required>
                    </div>
                    <div class="col-span-1">
                        <label for="image2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image 2</label>
                        <input type="file" name="image2" id="image2" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" accept="image/jpeg,image/png,image/jpg,image/webp" required>
                    </div>
                    <div class="col-span-1">
                        <label for="image3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image 3</label>
                        <input type="file" name="image3" id="image3" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" accept="image/jpeg,image/png,image/jpg,image/webp" required>
                    </div>
                    <div class="col-span-1">
                        <label for="video1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Video 1</label>
                        <input type="url" name="video1" id="video1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500" placeholder="https://www.youtube.com/embed/d_VCZvcZJBo?si=FQidVIYurV" required>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-300">Gunakan link embed video dari YouTube.</p>
                    </div>
                    <div class="col-span-1">
                        <label for="video2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Video 2</label>
                        <input type="url" name="video2" id="video2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500" placeholder="https://www.youtube.com/embed/d_VCZvcZJBo?si=FQidVIYurV">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-300">Gunakan link embed video dari YouTube.</p>
                    </div>
                    <div class="col-span-1">
                        <label for="video3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Video 3</label>
                        <input type="url" name="video3" id="video3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500" placeholder="https://www.youtube.com/embed/d_VCZvcZJBo?si=FQidVIYurV">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-300">Gunakan link embed video dari YouTube.</p>
                    </div>
                    <div class="col-span-1">
                        <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                        <input type="text" name="tags" id="tags" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500" placeholder="Gunung, Bromo, Jawa Timur" required>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-300">Gunakan koma ( , ) untuk memisahkan tag.</p>
                    </div>
                </div>
                <button type="submit" name="store" class="text-white mx-auto flex items-center bg-sky-600 hover:bg-sky-700 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-5 pt-2.5 pb-[0.75rem] text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">
                    <svg class="me-1 -ms-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 22 22">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m12 4v8m0 0v8m0-8h8m-8 0H4" />
                    </svg>
                    Buat Destinasi
                </button>
            </form>
        </div>
    </div>
</div>