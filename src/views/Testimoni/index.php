<main id="testimonials">
    <div class="px-14 py-20 bg-gradient-to-br from-sky-50 from-55% to-sky-100 to-45%">
        <div class="flex flex-col gap-7 items-center">
            <h1 class="text-5xl font-bold text-center text-[#1E4F87]">Testimoni</h1>
            <p class="text-3xl text-center font-medium text-[#1E4F87]">Apa kata mereka tentang kami?</p>
        </div>
        <div class="swiper mySwiper mt-14">
            <div class="swiper-wrapper mb-16">
                <?php
                foreach ($testimonials as $testimonial) :
                ?>
                    <div class="swiper-slide">
                        <div class="bg-white border border-[#2C8FCE] rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col">
                            <div class="flex items-center gap-5 bg-[#2C8FCE] rounded-t-lg py-7 px-10 border-b border-[#2C8FCE]">
                                <div class="img">
                                    <img class="w-20 h-20 rounded-full border border-white" src="img/<?= $testimonial['foto_profil'] ?>" alt="Rounded avatar">
                                </div>
                                <div class="flex flex-col gap-2">
                                    <h2 class="font-bold text-xl text-white"><?= $testimonial['nama_pengguna'] ?></h2>
                                    <p class="text-white font-medium"><?= $testimonial['created_at'] ?></p>
                                </div>
                            </div>
                            <div class="px-8 py-9 flex flex-col gap-6 items-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="flex gap-1">
                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                            <?php if ($i < $testimonial['rating']) : ?>
                                                <i class="fas fa-star text-yellow-400 text-[1.7rem]"></i>
                                            <?php else : ?>
                                                <i class="fas fa-star text-gray-400 text-[1.7rem]"></i>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </div>
                                    <div class="rating">
                                        <p class="text-[#2C8FCE] font-bold text-lg"><?= $testimonial['rating'] ?>/5</p>
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <p class="font-medium text-[#2C8FCE] text-sm dark:text-gray-400">Destinasi: <?= $testimonial['destinasi_wisata'] ?></p>
                                    <p class="font-normal text-gray-700 dark:text-gray-400 text-justify"><?= $testimonial['comment'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</main>