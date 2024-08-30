<main id="user-table">
    <div class="bg-gradient-to-tr from-sky-200 from-45% to-sky-500 to-20%">
        <div class="p-16 max-sm:px-10 flex flex-col justify-center">
            <div class="pb-[4.5rem] w-[40%] mx-auto">
                <p class="text-3xl font-bold text-center bg-white shadow-title text-sky-800 py-4 rounded-xl">Data Pengguna</p>
            </div>
            <div class="w-[92%] mx-auto max-sm:w-full">
                <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-2">
                    <button type="button" class="shadow-add text-white bg-sky-700 hover:bg-sky-800 focus:ring-0 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-sky-600 dark:hover:bg-sky-700 focus:outline-none dark:focus:ring-sky-800" data-modal-target="add-modal" data-modal-toggle="add-modal">Create</button>
                    <!-- Modal Form Add -->
                    <?php require_once 'form_add.php'; ?>
                    <div class="pb-5">
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="table-search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 shadow-search rounded-lg w-80 bg-gray-50 focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500" placeholder="Cari Data Pengguna">
                        </div>
                    </div>
                </div>
                <div class="relative overflow-x-auto shadow-box sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right dark:text-gray-400">
                        <thead class="text-sm bg-sky-700 uppercase text-white dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Username
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Nama Lengkap
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($users) && count($users) > 0) {
                                $no = 1;
                                foreach ($users as $user) :
                            ?>
                                    <tr class="odd:bg-sky-50 even:bg-sky-100 border-b dark:bg-gray-800 dark:border-gray-700 text-sky-700">
                                        <th scope="row" class="px-6 py-4 text-center font-medium text-sky-700 whitespace-nowrap dark:text-white"><?= $no ?></th>
                                        <td class="px-6 py-4 text-center">
                                            <?= $user["username"] ?>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <?= $user["fullname"] ?>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <?= $user["email"] ?>
                                        </td>
                                        <td class="flex items-center px-6 py-4 flex-row justify-center gap-x-3">
                                            <button type="button" class="font-medium text-sky-600 dark:text-sky-500 hover:underline hover:decoration-blue-500" data-modal-target="detail-modal-<?= $no ?>" data-modal-toggle="detail-modal-<?= $no ?>">Detail</button>
                                            <!-- Modal Detail -->
                                            <?php require 'modal_detail.php'; ?>
                                            <button type="button" class="font-medium text-sky-600 dark:text-sky-500 hover:underline hover:decoration-yellow-300" data-modal-target="edit-modal-<?= $no ?>" data-modal-toggle="edit-modal-<?= $no ?>">Edit</button>
                                            <!-- Modal Form Edit -->
                                            <?php require 'form_edit.php'; ?>
                                            <button type="button" class="font-medium text-sky-600 dark:text-sky-500 hover:underline hover:decoration-rose-300" data-modal-target="delete-modal-<?= $no ?>" data-modal-toggle="delete-modal-<?= $no ?>">Delete</button>
                                            <!-- Modal Delete -->
                                            <?php require 'modal_delete.php'; ?>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                endforeach;
                            } else {
                                ?>
                                <tr class="odd:bg-sky-50 even:bg-sky-100 border-b dark:bg-gray-800 dark:border-gray-700 text-sky-700">
                                    <td colspan="5" class="text-center py-4 font-medium">Data tidak ditemukan</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>