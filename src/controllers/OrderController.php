<?php

namespace MyApp\Controllers;

use MyApp\Core\Controller;
use MyApp\Core\Message;

class OrderController extends Controller
{
    private $orderModel;
    private $userModel;
    private $destinationModel;

    public function __construct()
    {
        $this->orderModel = $this->model('MyApp\Models\Order');
        $this->userModel = $this->model('MyApp\Models\User');
        $this->destinationModel = $this->model('MyApp\Models\Destination');
    }

    public function index()
    {
        if ($this->auth('admin', 'home')) {
            $orders = $this->orderModel->getJoin()->fetch_all(MYSQLI_ASSOC);
            $users = $this->userModel->getByRole('user');
            $destinations = $this->destinationModel->getAll();
            $user = $this->userModel->getByUsername($_SESSION['user']['username']);
            $this->view('Layouts/top', ['titlePage' => 'Data Pesanan -', 'profile_image' => $user['profile_image']]);
            $this->view('Order/index', ['orders' => $orders, 'users' => $users, 'destinations' => $destinations]);
            $this->view('Layouts/bottom');
        }
    }

    public function store()
    {
        if ($this->auth('admin', 'home')) {
            if (isset($_POST['store'])) {
                $keys = ['hotel', 'transportation', 'food'];

                foreach ($keys as $key) {
                    if (isset($_POST[$key]) && !empty($_POST[$key]) && is_numeric($_POST[$key])) {
                        $_POST[$key] = 1;
                    } else {
                        $_POST[$key] = 0;
                    }
                }

                $fields = [
                    'user_id' => 'int | required ',
                    'destination_id' => 'int | required ',
                    'duration' => 'int | required ',
                    'total_people' => 'int | required ',
                    'hotel' => 'bool | boolean',
                    'transportation' => 'bool | boolean',
                    'food' => 'bool | boolean',
                    'package_price' => 'double | required ',
                    'total_price' => 'double | required ',
                    'order_date' => 'string | date | date_format:Y-m-d | required ',
                ];

                $messages = [
                    'user_id' => ['required' => 'User harus diisi'],
                    'destination_id' => ['required' => 'Tujuan harus diisi'],
                    'duration' => ['required' => 'Durasi harus diisi'],
                    'total_people' => ['required' => 'Jumlah orang harus diisi'],
                    'hotel' => ['boolean' => 'Hotel harus diisi'],
                    'transportation' => ['boolean' => 'Transportasi harus diisi'],
                    'food' => ['boolean' => 'Makanan harus diisi'],
                    'package_price' => ['required' => 'Harga paket harus diisi'],
                    'total_price' => ['required' => 'Total harga harus diisi'],
                    'order_date' => ['required' => 'Tanggal pesan harus diisi', 'date' => 'Format tanggal tidak valid', 'date_format' => 'Format tanggal tidak valid'],
                ];

                [$inputs, $errors] = $this->filter($_POST, $fields, $messages);

                if ($errors) {
                    Message::setFlash('error', 'Gagal', $errors[0]);
                    $this->redirect('order_data');
                    return;
                }

                foreach ($keys as $key) {
                    $inputs[$key] = $_POST[$key];
                }
                
                $process = $this->orderModel->create($inputs);

                if (!$process) {
                    Message::setFlash('error', 'Gagal', 'Data gagal ditambahkan');
                    return;
                } else {
                    Message::setFlash('success', 'Berhasil', 'Data berhasil ditambahkan');
                }
                $this->redirect('order_data');
            } else {
                Message::setFlash('error', 'Gagal', 'Data gagal ditambahkan');
                $this->redirect('order_data');
                return;
            }
        } 
    }

    public function edit() {
        if ($this->auth('admin', 'home')) {
            if (isset($_POST['edit']) && isset($_POST['id']) && !empty($_POST['id']) && is_numeric($_POST['id'])) {
                $keys = ['hotel', 'transportation', 'food'];

                foreach ($keys as $key) {
                    if (isset($_POST[$key]) && !empty($_POST[$key]) && is_numeric($_POST[$key])) {
                        $_POST[$key] = 1;
                    } else {
                        $_POST[$key] = 0;
                    }
                }

                $fields = [
                    'user_id' => 'int | required ',
                    'destination_id' => 'int | required ',
                    'duration' => 'int | required ',
                    'total_people' => 'int | required ',
                    'hotel' => 'bool | boolean',
                    'transportation' => 'bool | boolean',
                    'food' => 'bool | boolean',
                    'package_price' => 'double | required ',
                    'total_price' => 'double | required ',
                    'status' => 'string | required | in:processing,completed,cancelled',
                    'order_date' => 'string | date | date_format:Y-m-d | required ',
                ];

                $messages = [
                    'user_id' => ['required' => 'User harus diisi'],
                    'destination_id' => ['required' => 'Tujuan harus diisi'],
                    'duration' => ['required' => 'Durasi harus diisi'],
                    'total_people' => ['required' => 'Jumlah orang harus diisi'],
                    'hotel' => ['boolean' => 'Hotel harus diisi'],
                    'transportation' => ['boolean' => 'Transportasi harus diisi'],
                    'food' => ['boolean' => 'Makanan harus diisi'],
                    'package_price' => ['required' => 'Harga paket harus diisi'],
                    'total_price' => ['required' => 'Total harga harus diisi'],
                    'status' => ['required' => 'Status harus diisi', 'in' => 'Status tidak valid'],
                    'order_date' => ['required' => 'Tanggal pesan harus diisi', 'date' => 'Format tanggal tidak valid', 'date_format' => 'Format tanggal tidak valid'],
                ];

                [$inputs, $errors] = $this->filter($_POST, $fields, $messages);

                if ($errors) {
                    Message::setFlash('error', 'Gagal', $errors[0]);
                    $this->redirect('order_data');
                    return;
                }

                foreach ($keys as $key) {
                    $inputs[$key] = $_POST[$key];
                }

                $process = $this->orderModel->update($inputs, $_POST['id']);

                if (!$process) {
                    Message::setFlash('error', 'Gagal', 'Data gagal diubah');
                    return;
                } else {
                    Message::setFlash('success', 'Berhasil', 'Data berhasil diubah');
                }
                $this->redirect('order_data');
            }else{
                Message::setFlash('error', 'Gagal', 'Data gagal diubah');
                $this->redirect('order_data');
            }
        }
    }

    public function destroy() {
        if ($this->auth('admin', 'home')) {
            if (isset($_POST['destroy']) && isset($_POST['id']) && !empty($_POST['id']) && is_numeric($_POST['id'])) {
                $process = $this->orderModel->delete($_POST['id']);
                if (!$process) {
                    Message::setFlash('error', 'Gagal', 'Data gagal dihapus');
                    return;
                } else {
                    Message::setFlash('success', 'Berhasil', 'Data berhasil dihapus');
                }
                $this->redirect('order_data');
            } else {
                Message::setFlash('error', 'Gagal', 'Data gagal dihapus');
                $this->redirect('order_data');
            }
        }
    }
}
