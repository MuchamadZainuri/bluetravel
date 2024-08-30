<main id="">
    <section id="banner-title">
        <div class="relative mx-auto ">
            <img class="h-[21.5rem] w-[77%] object-cover object-top mx-auto" src="img/contactus.jpg" alt="contact_us.jpg">
            <div class="absolute inset-0 bg-slate-900 opacity-50"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <h2 class="text-white text-5xl font-bold">Contact Us</h2>
            </div>
        </div>
    </section>
    <section id="form">
        <div class="px-24 pt-20 pb-24 bg-gradient-to-br from-slate-50 from-40% to-sky-100 to-60%">
            <div class="grid grid-cols-2 gap-16">
                <div class="flex flex-col gap-10">
                    <div class="box">
                        <h2 class="text-3xl font-bold text-[#1E4F87] text-center"> Kirimkan Pesan </h2>
                    </div>
                    <div class="box1">
                        <form action="" method="post" autocomplete="off" spellcheck="false">
                            <div class="mb-5">
                                <label for="name" class="block mb-2 text-xl font-normal text-[#1E4F87] dark:text-white">Nama Anda</label>
                                <input type="text" id="name" name="name" class="shadow-sm bg-gray-50 border-2 border-[#1E4F87] text-[#1E4F87] text-lg rounded-lg focus:ring-[#1E4F87] focus:border-[#1E4F87] block w-full p-2.5" placeholder="Nama Lengkap" required pattern="^([A-Z][a-z]+)(\s[A-Z][a-z]+)*$" title="Hanya huruf dan spasi yang diizinkan, dan setiap kata harus diawali huruf besar" maxlength="100" autofocus />
                            </div>
                            <div class="mb-5">
                                <label for="email" class="block mb-2 text-xl font-normal text-[#1E4F87] dark:text-white">Email</label>
                                <input type="email" id="email" name="email" class="shadow-sm bg-gray-50 border-2 border-[#1E4F87] text-[#1E4F87] text-lg rounded-lg focus:ring-[#1E4F87] focus:border-[#1E4F87] block w-full p-2.5" placeholder="example@gmail.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" title="Masukkan email dengan huruf kecil yang valid" maxlength="255" />
                            </div>
                            <div class="mb-6">
                                <label for="message" class="block mb-2 text-xl font-normal text-[#1E4F87] dark:text-white">Pesan Anda</label>
                                <textarea name="message" id="message" rows="7" class="shadow-sm bg-gray-50 border-2 border-[#1E4F87] text-[#1E4F87] text-lg rounded-lg focus:ring-[#1E4F87] focus:border-[#1E4F87] block w-full p-2.5" placeholder="Saya ingin bertanya tentang..." required maxlength="1000"></textarea>
                            </div>
                            <button type="submit" name="send" class="text-white bg-[#1E4F87] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-lg px-10 py-2.5 text-center">Kirim</button>
                        </form>
                    </div>
                </div>
                <div class="">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2028148.511485576!2d106.28534272754823!3d-6.863309699570659!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0xbc18a454fc8e9d7e!2sWest%20Java!5e0!3m2!1sen!2sid!4v1722353097999!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full h-full"></iframe>
                </div>
            </div>
        </div>
    </section>
</main>