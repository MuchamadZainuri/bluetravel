<!-- Header -->
<header id="">
    <div class="grid grid-cols-10 px-14 items-center pt-[8.5rem] pb-[9.5rem] bg-[url('img/bg_home.svg')] bg-cover">
        <div class="col-span-1"></div>
        <div class="col-span-8 text-center space-y-9">
            <div id="default-tab-content">
                <div class="hidden" id="all" role="tabpanel" aria-labelledby="all">
                    <h1 class="text-[38px] font-bold text-[#1E4F87]">Halo <?= isset($_SESSION['user']) ? $_SESSION['user']['username'] : 'Pengunjung' ?>, Ingin Kemana Hari Ini?</h1>
                </div>
                <div class="hidden" id="hiburan" role="tabpanel" aria-labelledby="hiburan">
                    <h1 class="text-[38px] font-bold text-[#1E4F87]">Seru-Seruan di Taman Hiburan</h1>
                </div>
                <div class="hidden" id="gua" role="tabpanel" aria-labelledby="gua">
                    <h1 class="text-[38px] font-bold text-[#1E4F87]">Menjelajahi Keindahan Gua</h1>
                </div>
                <div class="hidden" id="waterfall" role="tabpanel" aria-labelledby="waterfall">
                    <h1 class="text-[38px] font-bold text-[#1E4F87]">Merasakan Kemurnian Air Terjun</h1>
                </div>
                <div class="hidden" id="hutan" role="tabpanel" aria-labelledby="hutan">
                    <h1 class="text-[38px] font-bold text-[#1E4F87]">Menghirup Udara Segar di Hutan</h1>
                </div>
                <div class="hidden" id="gunung" role="tabpanel" aria-labelledby="gunung">
                    <h1 class="text-[38px] font-bold text-[#1E4F87]">Menaklukkan Puncak Gunung</h1>
                </div>
                <div class="hidden" id="perairan" role="tabpanel" aria-labelledby="perairan">
                    <h1 class="text-[38px] font-bold text-[#1E4F87]">Menyusuri Kedamaian di Tepi Danau</h1>
                </div>
            </div>
            <ul class="flex flex-wrap text-[18px] font-medium justify-between" id="default-tab" data-tabs-toggle="#default-tab-content" data-tabs-active-classes="text-sky-600 hover:text-sky-600 dark:text-sky-500 dark:hover:text-sky-500 border-sky-600 dark:border-sky-500" data-tabs-inactive-classes="dark:border-transparent text-[#1E4F87] hover:text-[#1E4F87] dark:text-[#1E4F87] border-gray-100 hover:border-[#1E4F87] dark:border-sky-700 dark:hover:text-sky-300" role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg" id="all" data-tabs-target="#all" type="button" role="tab" aria-controls="add" aria-selected="false">
                        <i class="fas fa-home me-2"></i>
                        Cari Semua
                    </button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg" id="hiburan" data-tabs-target="#hiburan" type="button" role="tab" aria-controls="hiburan" aria-selected="false">
                        <i class="fa-solid fa-masks-theater me-1"></i>
                        Hiburan
                    </button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg" id="gua" data-tabs-target="#gua" type="button" role="tab" aria-controls="gua" aria-selected="false">
                        <i class="fa-solid fa-igloo me-1"></i>
                        Gua
                    </button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg" id="waterfall" data-tabs-target="#waterfall" type="button" role="tab" aria-controls="waterfall" aria-selected="false">
                        <i class="fas fa-water me-2"></i>
                        Air Terjun
                    </button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg" id="hutan" data-tabs-target="#hutan" type="button" role="tab" aria-controls="hutan" aria-selected="false">
                        <i class="fas fa-tree me-2"></i>
                        Hutan
                    </button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg" id="gunung" data-tabs-target="#gunung" type="button" role="tab" aria-controls="gunung" aria-selected="false">
                        <i class="fas fa-mountain me-2"></i>
                        Gunung
                    </button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg" id="perairan" data-tabs-target="#perairan" type="button" role="tab" aria-controls="perairan" aria-selected="false">
                        <i class="fas fa-umbrella-beach"></i>
                        &nbsp;Perairan
                    </button>
                </li>
            </ul>
            <form action="" method="" id="">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-7 text-[#1E4F87] font-semibold">
                            <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="search" id="default-search" class="block w-full text-gray-900 border-2 text-[18px] placeholder:text-[#1E4F87] placeholder:text-slate-600] border-[#1E4F87] gap-2 bg-white rounded-full ps-14 pe-5 py-4 focus:ring-sky-500 focus:border-sky-500 dark:bg-sky-700 dark:border-sky-600 dark:placeholder-sky-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500" placeholder="Cari destinasi atau aktivitas" required />
                    <button type="submit" class="text-white absolute end-2 bottom-1.5 bg-[#1E4F87] hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full px-5 py-2.5 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800 text-lg">Cari</button>
                </div>
            </form>
        </div>
        <div class="col-span-1"></div>
    </div>
</header>

<!-- Main Content -->
<main id="home">
    <div class="w-full shadow-box-3">
        <section id="popular">
            <div class="px-12 pt-16">
                <h1 class="text-3xl font-bold text-[#1E4F87] mb-7">Destinasi Popular</h1>
                <div class="swiper popular">
                    <div class="swiper-wrapper pb-16">
                        <?php if ($data['popular']): ?>
                            <?php foreach ($data['popular'] as $popular): ?>
                                <div class="swiper-slide">
                                    <a href="<?= BASEURL ?>destination/<?= $popular['id'] ?>" class="no-underline">
                                        <div class="card hover:scale-95 transition-all ease-in-out duration-300 hover:translate-y-2 group">
                                            <div class="group-hover:shadow group-hover:shadow-blue-700 transition-all ease-in-out duration-300 rounded-xl overflow-hidden">
                                                <img src="img/<?= json_decode($popular['images'])[0] ?>" alt="image" class="w-full h-48 object-cover">
                                            </div>
                                            <div class="card-content">
                                                <h1 class="text-lg font-bold text-[#2C8FCE]"><?= $popular['name'] ?></h1>
                                                <p class="text-sm text-gray-500"><?= json_decode($popular['descriptions'])[0] ?></p>
                                                <div class="mt-7">
                                                    <div class="flex gap-x-2 items-center">
                                                        <div class="flex items-center text-base gap-1">
                                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                <?php if ($i < $popular['rating']) : ?>
                                                                    <i class="fas fa-star text-yellow-400"></i>
                                                                <?php else : ?>
                                                                    <i class="fas fa-star text-gray-400"></i>
                                                                <?php endif; ?>
                                                            <?php endfor; ?>
                                                        </div>
                                                        <span class="text-gray-900 font-semibold">(<?= $popular['rating'] ?>)</span>
                                                    </div>
                                                    <div class="mt-1 text-[#1E4F87] font-bold text-xl">
                                                        Rp. <?= number_format($popular['price'], 0, ',', '.') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="swiper-button-next text-white bg-[#1E4F87] p-6 rounded-full after:text-white"><i class="fas fa-chevron-right text-2xl"></i></div>
                    <div class="swiper-button-prev text-white bg-[#1E4F87] p-6 rounded-full after:text-white"><i class="fas fa-chevron-left text-2xl"></i></div>
                </div>
            </div>
        </section>
        <section id="recommended-destination">
            <div class="px-12 pt-16 bg-slate-100">
                <h1 class="text-3xl font-bold text-[#1E4F87] mb-7">Rekomendasi untuk Anda</h1>
                <div class="swiper popular">
                    <div class="swiper-wrapper pb-16">
                        <?php if ($data['recomendation']): ?>
                            <?php foreach ($data['recomendation'] as $recomendation): ?>
                                <div class="swiper-slide">
                                    <a href="<?= BASEURL ?>destination/<?= $recomendation['id'] ?>" class="no-underline">
                                        <div class="card hover:scale-95 transition-all ease-in-out duration-300 hover:translate-y-2 group">
                                            <div class="group-hover:shadow group-hover:shadow-blue-700 transition-all ease-in-out duration-300 rounded-xl overflow-hidden">
                                                <img src="img/<?= json_decode($recomendation['images'])[0] ?>" alt="image" class="w-full h-48 object-cover">
                                            </div>
                                            <div class="card-content">
                                                <h1 class="text-lg font-bold text-[#2C8FCE]"><?= $recomendation['name'] ?></h1>
                                                <p class="text-sm text-gray-500"><?= json_decode($recomendation['descriptions'])[0] ?></p>
                                                <div class="mt-7">
                                                    <div class="flex gap-x-2 items-center">
                                                        <div class="flex items-center text-base gap-1">
                                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                <?php if ($i < $recomendation['rating']) : ?>
                                                                    <i class="fas fa-star text-yellow-400"></i>
                                                                <?php else : ?>
                                                                    <i class="fas fa-star text-gray-400"></i>
                                                                <?php endif; ?>
                                                            <?php endfor; ?>
                                                        </div>
                                                        <span class="text-gray-900 font-semibold">(<?= $recomendation['rating'] ?>)</span>
                                                    </div>
                                                    <div class="mt-1 text-[#1E4F87] font-bold text-xl">
                                                        Rp. <?= number_format($recomendation['price'], 0, ',', '.') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="swiper-button-next text-white bg-[#1E4F87] p-6 rounded-full after:text-white"><i class="fas fa-chevron-right text-2xl"></i></div>
                    <div class="swiper-button-prev text-white bg-[#1E4F87] p-6 rounded-full after:text-white"><i class="fas fa-chevron-left text-2xl"></i></div>
                </div>
            </div>
        </section>
        <section id="kota-kota destinasi wisata">
            <div class="p-12">
                <h1 class=" text-3xl font-bold text-[#1E4F87] mb-7">Kota Destinasi Wisata</h1>
                <div class="swiper kota_wisata">
                    <div class="swiper-wrapper">
                        <?php foreach ($data['city'] as $city) : ?>
                            <div class="swiper-slide">
                                <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl px-5 pb-4 pt-48">
                                    <img src="img/<?= $city['image'] ?>" class="absolute inset-0 w-full object-cover h-full">
                                    <div class="absolute inset-0 bg-gradient-to-t from-neutral-900 via-neutral-800/40"></div>
                                    <h3 class="z-10 mt-3 text-2xl font-medium text-white text-center"><?= $city['name'] ?></h3>
                                </article>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <section id="promo">
            <div class="px-12 pt-16 bg-slate-100">
                <h1 class="text-3xl font-bold text-[#1E4F87] mb-7">Sedang Diskon</h1>
                <div class="swiper mySwiper3">
                    <div class="swiper-wrapper pb-16">
                        <?php if ($data['discount']): ?>
                            <?php foreach ($data['discount'] as $discount): ?>
                                <div class="swiper-slide">
                                    <a href="<?= BASEURL ?>destination/<?= $discount['id'] ?>" class="no-underline">
                                        <div class="card hover:scale-95 transition-all ease-in-out duration-300 hover:translate-y-2 group">
                                            <div class="relative isolate group-hover:shadow group-hover:shadow-blue-700 transition-all ease-in-out duration-300 rounded-xl overflow-hidden flex flex-col justify-start h-48">
                                                <img src="img/<?= json_decode($discount['images'])[0] ?>" alt="image" class="absolute w-full h-full inset-0 object-cover">
                                                <p class="text-white z-10 font-semibold text-sm bg-red-600 px-2 py-1 rounded-br-lg w-[6.65rem] uppercase">Diskon <?= $discount['discount'] ?>%</p>
                                            </div>
                                            <div class="card-content">
                                                <h1 class="text-lg font-bold text-[#2C8FCE]"><?= $discount['name'] ?></h1>
                                                <p class="text-sm text-gray-500"><?= json_decode($discount['descriptions'])[0] ?></p>
                                                <div class="mt-5 space-y-2">
                                                    <div class="flex gap-x-2 items-center">
                                                        <div class="flex items-center text-base gap-1">
                                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                <?php if ($i < $discount['rating']) : ?>
                                                                    <i class="fas fa-star text-yellow-400"></i>
                                                                <?php else : ?>
                                                                    <i class="fas fa-star text-gray-400"></i>
                                                                <?php endif; ?>
                                                            <?php endfor; ?>
                                                        </div>
                                                        <span class="text-gray-900 font-semibold">(<?= $discount['rating'] ?>)</span>
                                                    </div>
                                                    <div class="flex gap-2 items-center">
                                                        <p class="text-[#1E4F87] font-bold text-xl">Rp. <?= number_format($discount['price'] - ($discount['price'] * $discount['discount'] / 100), 0, ',', '.') ?></p>
                                                        <p class="text-gray-400 font-semibold text-lg line-through decoration-red-400">Rp. <?= number_format($discount['price'], 0, ',', '.') ?></p>
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
        </section>
        <section id="macam-macam destinasi wisata">
            <div class="p-12">
                <h1 class="text-3xl font-bold text-[#1E4F87] mb-7">Macam-Macam Destinasi Wisata</h1>
                <div class="swiper category_wisata">
                    <div class="swiper-wrapper">
                        <?php foreach ($data['category'] as $category) : ?>
                            <div class="swiper-slide">
                                <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl px-5 pb-4 pt-48">
                                    <img src="img/<?= $category['image'] ?>" class="absolute inset-0 w-full object-cover h-full">
                                    <div class="absolute inset-0 bg-gradient-to-t from-neutral-900 via-neutral-800/40"></div>
                                    <h3 class="z-10 mt-3 text-2xl font-medium text-white"><?= $category['name'] ?></h3>
                                </article>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <section id="taman_hiburan">
            <div class="border-b border-[#1E4F87] pt-16 bg-slate-100 px-12">
                <h1 class="text-3xl font-bold text-[#1E4F87] mb-7">Taman Hiburan</h1>
                <div class="swiper taman_hiburan">
                    <div class="swiper-wrapper pb-16">
                        <?php if ($data['tamanHiburan']): ?>
                            <?php foreach ($data['tamanHiburan'] as $taman_hiburan): ?>
                                <div class="swiper-slide">
                                    <a href="<?= BASEURL ?>destination/<?= $taman_hiburan['id'] ?>" class="no-underline">
                                        <div class="card hover:scale-95 transition-all ease-in-out duration-300 hover:translate-y-2 group">
                                            <div class="group-hover:shadow group-hover:shadow-blue-700 transition-all ease-in-out duration-300 rounded-xl overflow-hidden">
                                                <img src="img/<?= json_decode($taman_hiburan['images'])[0] ?>" alt="image" class="w-full h-48 object-cover">
                                            </div>
                                            <div class="card-content">
                                                <h1 class="text-lg font-bold text-[#2C8FCE]"><?= $taman_hiburan['name'] ?></h1>
                                                <p class="text-sm text-gray-500"><?= json_decode($taman_hiburan['descriptions'])[0] ?></p>
                                                <div class="mt-7">
                                                    <div class="flex gap-x-2 items-center">
                                                        <div class="flex items-center text-base gap-1">
                                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                <?php if ($i < $taman_hiburan['rating']) : ?>
                                                                    <i class="fas fa-star text-yellow-400"></i>
                                                                <?php else : ?>
                                                                    <i class="fas fa-star text-gray-400"></i>
                                                                <?php endif; ?>
                                                            <?php endfor; ?>
                                                        </div>
                                                        <span class="text-gray-900 font-semibold">(<?= $taman_hiburan['rating'] ?>)</span>
                                                    </div>
                                                    <div class="mt-1 text-[#1E4F87] font-bold text-xl">
                                                        Rp. <?= number_format($taman_hiburan['price'], 0, ',', '.') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="swiper-button-next text-white bg-[#1E4F87] p-6 rounded-full after:text-white"><i class="fas fa-chevron-right text-2xl"></i></div>
                    <div class="swiper-button-prev text-white bg-[#1E4F87] p-6 rounded-full after:text-white"><i class="fas fa-chevron-left text-2xl"></i></div>
                </div>
            </div>
        </section>
        <section id="air_terjun">
            <div class="border-b border-[#1E4F87] pt-16 px-12">
                <h1 class="text-3xl font-bold text-[#1E4F87] mb-7">Air Terjun</h1>
                <div class="swiper air_terjun">
                    <div class="swiper-wrapper pb-16">
                        <?php if ($data['airTerjun']): ?>
                            <?php foreach ($data['airTerjun'] as $air_terjun): ?>
                                <div class="swiper-slide">
                                    <a href="<?= BASEURL ?>destination/<?= $air_terjun['id'] ?>" class="no-underline">
                                        <div class="card hover:scale-95 transition-all ease-in-out duration-300 hover:translate-y-2 group">
                                            <div class="group-hover:shadow group-hover:shadow-blue-700 transition-all ease-in-out duration-300 rounded-xl overflow-hidden">
                                                <img src="img/<?= json_decode($air_terjun['images'])[0] ?>" alt="image" class="w-full h-48 object-cover">
                                            </div>
                                            <div class="card-content">
                                                <h1 class="text-lg font-bold text-[#2C8FCE]"><?= $air_terjun['name'] ?></h1>
                                                <p class="text-sm text-gray-500"><?= json_decode($air_terjun['descriptions'])[0] ?></p>
                                                <div class="mt-7">
                                                    <div class="flex gap-x-2 items-center">
                                                        <div class="flex items-center text-base gap-1">
                                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                <?php if ($i < $air_terjun['rating']) : ?>
                                                                    <i class="fas fa-star text-yellow-400"></i>
                                                                <?php else : ?>
                                                                    <i class="fas fa-star text-gray-400"></i>
                                                                <?php endif; ?>
                                                            <?php endfor; ?>
                                                        </div>
                                                        <span class="text-gray-900 font-semibold">(<?= $air_terjun['rating'] ?>)</span>
                                                    </div>
                                                    <div class="mt-1 text-[#1E4F87] font-bold text-xl">
                                                        Rp. <?= number_format($air_terjun['price'], 0, ',', '.') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="swiper-button-next text-white bg-[#1E4F87] p-6 rounded-full after:text-white"><i class="fas fa-chevron-right text-2xl"></i></div>
                    <div class="swiper-button-prev text-white bg-[#1E4F87] p-6 rounded-full after:text-white"><i class="fas fa-chevron-left text-2xl"></i></div>
                </div>
            </div>
        </section>
        <section id="gua">
            <div class="border-b border-[#1E4F87] pt-16 bg-slate-100 px-12">
                <h1 class="text-3xl font-bold text-[#1E4F87] mb-7">Gua</h1>
                <div class="swiper gua">
                    <div class="swiper-wrapper pb-16">
                        <?php if ($data['gua']): ?>
                            <?php foreach ($data['gua'] as $gua): ?>
                                <div class="swiper-slide">
                                    <a href="<?= BASEURL ?>destination/<?= $gua['id'] ?>" class="no-underline">
                                        <div class="card hover:scale-95 transition-all ease-in-out duration-300 hover:translate-y-2 group">
                                            <div class="group-hover:shadow group-hover:shadow-blue-700 transition-all ease-in-out duration-300 rounded-xl overflow-hidden">
                                                <img src="img/<?= json_decode($gua['images'])[0] ?>" alt="image" class="w-full h-48 object-cover">
                                            </div>
                                            <div class="card-content">
                                                <h1 class="text-lg font-bold text-[#2C8FCE]"><?= $gua['name'] ?></h1>
                                                <p class="text-sm text-gray-500"><?= json_decode($gua['descriptions'])[0] ?></p>
                                                <div class="mt-7">
                                                    <div class="flex gap-x-2 items-center">
                                                        <div class="flex items-center text-base gap-1">
                                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                <?php if ($i < $gua['rating']) : ?>
                                                                    <i class="fas fa-star text-yellow-400"></i>
                                                                <?php else : ?>
                                                                    <i class="fas fa-star text-gray-400"></i>
                                                                <?php endif; ?>
                                                            <?php endfor; ?>
                                                        </div>
                                                        <span class="text-gray-900 font-semibold">(<?= $gua['rating'] ?>)</span>
                                                    </div>
                                                    <div class="mt-1 text-[#1E4F87] font-bold text-xl">
                                                        Rp. <?= number_format($gua['price'], 0, ',', '.') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="swiper-button-next text-white bg-[#1E4F87] p-6 rounded-full after:text-white"><i class="fas fa-chevron-right text-2xl"></i></div>
                    <div class="swiper-button-prev text-white bg-[#1E4F87] p-6 rounded-full after:text-white"><i class="fas fa-chevron-left text-2xl"></i></div>
                </div>
            </div>
        </section>
        <section id="hutan">
            <div class="border-b border-[#1E4F87] pt-16 px-12">
                <h1 class="text-3xl font-bold text-[#1E4F87] mb-7">Hutan</h1>
                <div class="swiper hutan">
                    <div class="swiper-wrapper pb-16">
                        <?php if ($data['hutan']): ?>
                            <?php foreach ($data['hutan'] as $hutan): ?>
                                <div class="swiper-slide">
                                    <a href="<?= BASEURL ?>destination/<?= $hutan['id'] ?>" class="no-underline">
                                        <div class="card hover:scale-95 transition-all ease-in-out duration-300 hover:translate-y-2 group">
                                            <div class="group-hover:shadow group-hover:shadow-blue-700 transition-all ease-in-out duration-300 rounded-xl overflow-hidden">
                                                <img src="img/<?= json_decode($hutan['images'])[0] ?>" alt="image" class="w-full h-48 object-cover">
                                            </div>
                                            <div class="card-content">
                                                <h1 class="text-lg font-bold text-[#2C8FCE]"><?= $hutan['name'] ?></h1>
                                                <p class="text-sm text-gray-500"><?= json_decode($hutan['descriptions'])[0] ?></p>
                                                <div class="mt-7">
                                                    <div class="flex gap-x-2 items-center">
                                                        <div class="flex items-center text-base gap-1">
                                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                <?php if ($i < $hutan['rating']) : ?>
                                                                    <i class="fas fa-star text-yellow-400"></i>
                                                                <?php else : ?>
                                                                    <i class="fas fa-star text-gray-400"></i>
                                                                <?php endif; ?>
                                                            <?php endfor; ?>
                                                        </div>
                                                        <span class="text-gray-900 font-semibold">(<?= $hutan['rating'] ?>)</span>
                                                    </div>
                                                    <div class="mt-1 text-[#1E4F87] font-bold text-xl">
                                                        Rp. <?= number_format($hutan['price'], 0, ',', '.') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="swiper-button-next text-white bg-[#1E4F87] p-6 rounded-full after:text-white"><i class="fas fa-chevron-right text-2xl"></i></div>
                    <div class="swiper-button-prev text-white bg-[#1E4F87] p-6 rounded-full after:text-white"><i class="fas fa-chevron-left text-2xl"></i></div>
                </div>
            </div>
        </section>
        <section id="pegunungan">
            <div class="border-b border-[#1E4F87] pt-16 bg-slate-100 px-12">
                <h1 class="text-3xl font-bold text-[#1E4F87] mb-7">Pegunungan</h1>
                <div class="swiper pegunungan">
                    <div class="swiper-wrapper pb-16">
                        <?php if ($data['pegunungan']): ?>
                            <?php foreach ($data['pegunungan'] as $pegunungan): ?>
                                <div class="swiper-slide">
                                    <a href="<?= BASEURL ?>destination/<?= $pegunungan['id'] ?>" class="no-underline">
                                        <div class="card hover:scale-95 transition-all ease-in-out duration-300 hover:translate-y-2 group">
                                            <div class="group-hover:shadow group-hover:shadow-blue-700 transition-all ease-in-out duration-300 rounded-xl overflow-hidden">
                                                <img src="img/<?= json_decode($pegunungan['images'])[0] ?>" alt="image" class="w-full h-48 object-cover">
                                            </div>
                                            <div class="card-content">
                                                <h1 class="text-lg font-bold text-[#2C8FCE]"><?= $pegunungan['name'] ?></h1>
                                                <p class="text-sm text-gray-500"><?= json_decode($pegunungan['descriptions'])[0] ?></p>
                                                <div class="mt-7">
                                                    <div class="flex gap-x-2 items-center">
                                                        <div class="flex items-center text-base gap-1">
                                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                <?php if ($i < $pegunungan['rating']) : ?>
                                                                    <i class="fas fa-star text-yellow-400"></i>
                                                                <?php else : ?>
                                                                    <i class="fas fa-star text-gray-400"></i>
                                                                <?php endif; ?>
                                                            <?php endfor; ?>
                                                        </div>
                                                        <span class="text-gray-900 font-semibold">(<?= $pegunungan['rating'] ?>)</span>
                                                    </div>
                                                    <div class="mt-1 text-[#1E4F87] font-bold text-xl">
                                                        Rp. <?= number_format($pegunungan['price'], 0, ',', '.') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="swiper-button-next text-white bg-[#1E4F87] p-6 rounded-full after:text-white"><i class="fas fa-chevron-right text-2xl"></i></div>
                    <div class="swiper-button-prev text-white bg-[#1E4F87] p-6 rounded-full after:text-white"><i class="fas fa-chevron-left text-2xl"></i></div>
                </div>
            </div>
        </section>
        <section id="perairan">
            <div class="border-b border-[#1E4F87] pt-16 px-12">
                <h1 class="text-3xl font-bold text-[#1E4F87] mb-7">Perairan</h1>
                <div class="swiper perairan">
                    <div class="swiper-wrapper pb-16">
                        <?php if ($data['perairan']): ?>
                            <?php foreach ($data['perairan'] as $perairan): ?>
                                <div class="swiper-slide">
                                    <a href="<?= BASEURL ?>destination/<?= $perairan['id'] ?>" class="no-underline">
                                        <div class="card hover:scale-95 transition-all ease-in-out duration-300 hover:translate-y-2 group">
                                            <div class="group-hover:shadow group-hover:shadow-blue-700 transition-all ease-in-out duration-300 rounded-xl overflow-hidden">
                                                <img src="img/<?= json_decode($perairan['images'])[0] ?>" alt="image" class="w-full h-48 object-cover">
                                            </div>
                                            <div class="card-content">
                                                <h1 class="text-lg font-bold text-[#2C8FCE]"><?= $perairan['name'] ?></h1>
                                                <p class="text-sm text-gray-500"><?= json_decode($perairan['descriptions'])[0] ?></p>
                                                <div class="mt-7">
                                                    <div class="flex gap-x-2 items-center">
                                                        <div class="flex items-center text-base gap-1">
                                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                <?php if ($i < $perairan['rating']) : ?>
                                                                    <i class="fas fa-star text-yellow-400"></i>
                                                                <?php else : ?>
                                                                    <i class="fas fa-star text-gray-400"></i>
                                                                <?php endif; ?>
                                                            <?php endfor; ?>
                                                        </div>
                                                        <span class="text-gray-900 font-semibold">(<?= $perairan['rating'] ?>)</span>
                                                    </div>
                                                    <div class="mt-1 text-[#1E4F87] font-bold text-xl">
                                                        Rp. <?= number_format($perairan['price'], 0, ',', '.') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="swiper-button-next text-white bg-[#1E4F87] p-6 rounded-full after:text-white"><i class="fas fa-chevron-right text-2xl"></i></div>
                    <div class="swiper-button-prev text-white bg-[#1E4F87] p-6 rounded-full after:text-white"><i class="fas fa-chevron-left text-2xl"></i></div>
                </div>
            </div>
        </section>
        <section id="random-video-destinasi">
            <div class="flex flex-col gap-11 pt-[4.2rem] pb-[4.4rem] bg-slate-100 px-12">
                <div class="">
                    <h1 class="text-3xl font-bold text-[#1E4F87] text-center">Destination Cinematic Videos</h1>
                </div>
                <div class="grid grid-cols-3 gap-5">
                    <div class="">
                        <iframe class="w-full rounded-lg" loading="lazy" height="228" src="https://www.youtube.com/embed/C2D0VTOa8-M?si=f4gbJ1WXojmxDUxW" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="">
                        <iframe class="w-full rounded-lg" loading="lazy" height="228" src="https://www.youtube.com/embed/IFTkRFdMenw?si=0iQpfac_ku5ymg-F" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="">
                        <iframe class="w-full rounded-lg" loading="lazy" height="228" src="https://www.youtube.com/embed/GjEBoS5A-TA?si=TVSDkYFu2fQo-AJZ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="">
                        <iframe class="w-full rounded-lg" loading="lazy" height="228" src="https://www.youtube.com/embed/qnXcB5L97MI?si=V3jSxrn5hcikar4u&amp;start=7" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="">
                        <iframe class="w-full rounded-lg" loading="lazy" height="228" src="https://www.youtube.com/embed/pUOTQpzb7KU?si=EHdoYv1N2xZkXl1G" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="">
                        <iframe class="w-full rounded-lg" loading="lazy" height="228" src="https://www.youtube.com/embed/mZrkV7nOkMY?si=kswOwyzVdRl9ZJD0&amp;start=7" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>