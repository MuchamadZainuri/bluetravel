<main>
    <div class="px-20 py-14 bg-gradient-to-bl from-sky-400 to-slate-50 to-20%">
        <section>
            <div class="pt-5 pb-12">
                <h1 class="text-4xl text-center font-semibold text-sky-800">Pesanan Paket Wisata</h1>
            </div>
            <div class="relative shadow-box sm:rounded-lg">
                <table class="w-full text-sm text-center rtl:text-right">
                    <thead class="text-sm bg-sky-700 text-white uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Destination
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga Tiket
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga Paket
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah Tiket
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Durasi Wisata
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total Harga
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (empty($orders)) {
                        ?>
                            <tr>
                                <td colspan="8" class="text-center py-5 text-gray-500 font-medium text-base">Anda belum memiliki pesanan</td>
                            </tr>
                        <?php
                        } else {
                        ?>
                            <?php
                            foreach ($orders as $order) :
                            ?>
                                <tr class="odd:bg-white even:bg-sky-100 border-b text-sky-700">
                                    <th scope="row" class="px-6 py-3 text-center font-medium text-sky-700 whitespace-nowrap dark:text-white">
                                        <?= $order['destination_name'] ?>
                                    </th>
                                    <td class="px-6 py-3">
                                        Rp.<?= number_format($order['ticket_price'], 0, ',', '.') ?>
                                    </td>
                                    <td class="px-6 py-3">
                                        Rp.<?= number_format($order['package_price'], 0, ',', '.') ?>
                                    </td>
                                    <td class="px-6 py-3">
                                        <?= $order['total_people'] ?>
                                    </td>
                                    <td class="px-6 py-3">
                                        <?= $order['duration'] ?> Hari
                                    </td>
                                    <td class="px-6 py-3">
                                        Rp.<?= number_format($order['total_price'], 0, ',', '.') ?>
                                    </td>
                                    <td class="px-6 py-3">
                                        <?php
                                        if ($order['status'] == 'processing') {
                                        ?>
                                            <div class="flex items-center">
                                                <div class="h-2.5 w-2.5 rounded-full bg-yellow-500 me-2"></div> Pending
                                            </div>
                                        <?php
                                        } else if ($order['status'] == 'completed') {
                                        ?>
                                            <div class="flex items-center">
                                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Selesai
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="flex items-center">
                                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Dibatalkan
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <?php
                                    if ($order['status'] == 'processing') {
                                    ?>
                                        <td class="px-6 py-3">
                                            <form action="<?= BASEURL . "cart/edit" ?>" method="post" id="form-cancel-<?= $order['id'] ?>">
                                                <input type="hidden" name="id" value="<?= $order['id'] ?>">
                                                <button type="submit" name="cancel" class="text-red-500 text-base btn-delete" data-order-id="<?= $order['id'] ?>" data-popover-target="popover-default-<?= $order['id'] ?>">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <div data-popover id="popover-default-<?= $order['id'] ?>" role="tooltip" class="absolute z-10 invisible inline-block w-20 text-sm transition-opacity duration-300 bg-red-500 border-2 border-red-500 rounded-lg shadow-sm opacity-0">
                                            <div class="px-3 py-2">
                                                <p class="text-center font-medium text-white">Cancel</p>
                                            </div>
                                            <div data-popper-arrow></div>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <td class="px-6 py-3">
                                            <form action="<?= BASEURL . "cart/edit" ?>" method="post" id="form-cancel-<?= $order['id'] ?>">
                                                <input type="hidden" name="id" value="<?= $order['id'] ?>">
                                                <button type="submit" name="cancel" disabled class="text-red-500 text-base btn-delete" data-order-id="<?= $order['id'] ?>" data-popover-target="popover-default-<?= $order['id'] ?>">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                        <?php endforeach;
                        } ?>
                </table>
            </div>
        </section>
        <section>
            <div class="mt-16 mb-5 grid grid-cols-2 gap-7">
                <div class="flex flex-col gap-8">
                    <div class="title">
                        <h2 class="font-medium text-2xl text-sky-800">Destinasi Wisata yang mungkin Anda suka</h2>
                    </div>
                    <div class="swiper mySwiper2 w-full">
                        <div class="swiper-wrapper">
                            <?php
                            foreach ($destinasi as $destination) :
                            ?>
                                <div class="swiper-slide">
                                    <a href="<?= BASEURL ?>destination/<?= $destination['id'] ?>" class="no-underline">
                                        <div class="card hover:scale-95 transition-all ease-in-out duration-300 hover:translate-y-2 group">
                                            <div class="group-hover:shadow group-hover:shadow-blue-700 transition-all ease-in-out duration-300 card-image rounded-xl overflow-hidden">
                                                <img src="img/<?= json_decode($destination['images'])[0] ?>" alt="image" class="w-full h-48 object-cover">
                                            </div>
                                            <div class="card-content">
                                                <h1 class="text-lg font-bold text-[#2C8FCE]"><?= $destination['name'] ?></h1>
                                                <p class="text-sm text-gray-500"><?= json_decode($destination['descriptions'])[0] ?></p>
                                                <div class="mt-7">
                                                    <div class="flex gap-x-2 items-center">
                                                        <div class="flex items-center text-base gap-1">
                                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                                <?php if ($i < $destination['rating']) : ?>
                                                                    <i class="fas fa-star text-yellow-400"></i>
                                                                <?php else : ?>
                                                                    <i class="fas fa-star text-gray-400"></i>
                                                                <?php endif; ?>
                                                            <?php endfor; ?>
                                                        </div>
                                                        <span class="text-gray-900 font-semibold">(<?= $destination['rating'] ?>)</span>
                                                    </div>
                                                    <div class="mt-1 text-[#1E4F87] font-bold text-xl">
                                                        Rp. <?= number_format($destination['price'], 0, ',', '.') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-7">
                    <div class="pt-1">
                        <h2 class="font-medium text-2xl text-sky-800 text-center">Total Pesanan</h2>
                    </div>
                    <?php
                    $total = 0;
                    foreach ($orders as $order) {
                        if ($order['status'] == 'processing') {
                            $total += $order['total_price'];
                        }
                    }
                    $harga_diskon = $total - (($total * $discount) / 100);
                    ?>
                    <div class="px-6 py-5 bg-white border-2 border-blue-200 rounded-lg shadow">
                        <div class="grid grid-cols-1 gap-7">
                            <div class="flex flex-col gap-1">
                                <p class="border-b-2 font-semibold pb-2">Contact Details</p>
                                <div class="grid grid-cols-7">
                                    <p>Name</p>
                                    <p class="text-center">:</p>
                                    <p class="col-span-5"><?= $user['fullname'] ?></p>
                                </div>
                                <div class="grid grid-cols-7">
                                    <p>Email</p>
                                    <p class="text-center">:</p>
                                    <p class="col-span-5"><?= $user['email'] ?></p>
                                </div>
                                <div class="grid grid-cols-7">
                                    <p>Phone</p>
                                    <p class="text-center">:</p>
                                    <p class="col-span-5"><?= $user['phone'] ?></p>
                                </div>
                            </div>
                            <div class="flex flex-col gap-1">
                                <p class="border-b-2 font-semibold pb-2">Price Details</p>
                                <div class="flex flex-row justify-between">
                                    <p class="font-normal">Total Tagihan</p>
                                    <p class="font-medium">Rp. <?= number_format($total, 0, ',', '.') ?></p>
                                </div>
                                <div class="flex flex-row justify-between">
                                    <p>Diskon (<span class="text-red-500"><?= $total == 0 ? 0 : $discount ?>%</span>)</p>
                                    <p class="text-red-500 font-medium">Rp. <?= number_format($total - $harga_diskon, 0, ',', '.') ?></p>
                                </div>
                            </div>
                            <div class="border-t-2 pt-3 mt-2">
                                <div class="flex flex-row justify-between">
                                    <p class="font-semibold">Total Harga Pesanan</p>
                                    <p class="font-medium">Rp. <?= number_format($harga_diskon, 0, ',', '.') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<script>
    $(document).ready(function() {
        $('.btn-delete').on('click', function(e) {
            e.preventDefault();

            var orderId = $(this).data('order-id');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak dapat mengembalikan status pesanan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Cancel!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-cancel-' + orderId).submit();
                }
            });
        });
    });
</script>