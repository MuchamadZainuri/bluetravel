<footer id="">
    <div class="w-full">
        <div class="bg-[#1E4F87] border-t-4 border-[rgb(44,143,206)] pt-14 pb-16 px-12 text-white grid grid-cols-3 gap-11">
            <div class="flex flex-col gap-7">
                <div class="flex items-center gap-4 justify-start">
                    <img src="<?= isset($url) ? $url : null ?>img/travel.png" alt="JabarTravel" class="w-[6rem] h-[6rem]">
                    <h1 class="text-3xl font-bold text-white">BlueTravel</h1>
                </div>
                <div class="px-2">
                    <p class="text-justify text-lg">Jelajahi ragam destinasi wisata di Jawa Barat dan pesan tiket langsung di BlueTravel. Temukan lokasi-lokasi indah dan dapatkan pengalaman liburan yang luar biasa dengan mudah dan aman.</p>
                </div>
            </div>
            <div class="flex flex-col gap-9 mt-auto mx-auto ps-5">
                <h2 class="text-2xl font-semibold">Quick Links</h2>
                <div class="">
                    <ul class="grid grid-rows-5 gap-4">
                        <li>
                            <a href="<?= BASEURL ?>home" class="text-lg font-medium text-white">
                                <i class="fas fa-angle-right text-white"></i> &nbsp;Home
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASEURL ?>about" class="text-lg font-medium text-white">
                                <i class="fas fa-angle-right text-white"></i> &nbsp;About Us
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASEURL ?>contact" class="text-lg font-medium text-white">
                                <i class="fas fa-angle-right text-white"></i> &nbsp;Contact Us
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASEURL ?>cart" class="text-lg font-medium text-white">
                                <i class="fas fa-angle-right text-white"></i> &nbsp;Pesanan
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASEURL ?>testimoni" class="text-lg font-medium text-white">
                                <i class="fas fa-angle-right text-white"></i> &nbsp;Testimoni
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col gap-9 mt-auto ms-auto">
                <h2 class="text-2xl font-semibold">Kontak</h2>
                <div class="">
                    <ul class="grid grid-rows-5 gap-4">
                        <li>
                            <a href="#" class="text-lg font-medium text-white flex items-center gap-3 align-middle">
                                <i class="fas fa-location-dot text-white"></i>
                                <p>Babakan, Ciparay, West Java 40381</p>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:zdacoder@gmail.com?Subject=Hello%20BlueTravel" class=" text-lg font-medium text-white flex items-center gap-3 align-middle">
                                <i class="fas fa-envelope text-white"></i>
                                <p>zdacoder@gmail.com</p>
                            </a>
                        </li>
                        <li>
                            <a href="tel:+6281381805291" class="text-lg font-medium text-white flex items-center gap-3 align-middle">
                                <i class="fas fa-phone text-white"></i>
                                <p>+62 813-8180-5291</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container mx-auto py-5 px-12 bg-slate-200 border-t-2 border-slate-300 grid grid-cols-2 items-center">
            <div class="text-start">
                <p class="text-[#1E4F87] text-lg font-medium">Copyright &copy; 2024 <a href="https://www.linkedin.com/in/muchamadzainuri/" target="_blank" class="text-[#2C8FCE]">zdacoder</a> All right reserved.
                </p>
            </div>
            <div class="flex gap-10 ms-auto">
                <div class="bg-[#1E4F87] rounded-full w-10 h-10 flex justify-center items-center cursor-pointer">
                    <a href="https://github.com/MuchamadZainuri" class="text-white">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
                <div class="bg-[#1E4F87] rounded-full w-10 h-10 flex justify-center items-center cursor-pointer">
                    <a href="https://www.linkedin.com/in/muchamadzainuri/" class="text-white">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
                <div class="bg-[#1E4F87] rounded-full w-10 h-10 flex justify-center items-center cursor-pointer">
                    <a href="https://www.instagram.com/z.dacoder" class="text-white">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>