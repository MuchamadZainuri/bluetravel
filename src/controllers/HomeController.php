<?php

namespace MyApp\Controllers;

use MyApp\Core\Controller;
use MyApp\Core\Mail;
use MyApp\Core\Message;

class HomeController extends Controller
{
    private $destinationModel;
    private $orderModel;
    private $userModel;
    private $categoryModel;
    private $cityModel;
    private $testimonialModel;

    public function __construct()
    {
        $this->destinationModel = $this->model('MyApp\Models\Destination');
        $this->orderModel = $this->model('MyApp\Models\Order');
        $this->userModel = $this->model('MyApp\Models\User');
        $this->categoryModel = $this->model('MyApp\Models\Category');
        $this->cityModel = $this->model('MyApp\Models\City');
        $this->testimonialModel = $this->model('MyApp\Models\Testimonial');
    }

    public function index()
    {
        $data = [
            'perairan' => $this->destinationModel->getByCategory(5), 
            'pegunungan' => $this->destinationModel->getByCategory(4), 
            'hutan' => $this->destinationModel->getByCategory(3), 
            'gua' => $this->destinationModel->getByCategory(6), 
            'tamanHiburan' => $this->destinationModel->getByCategory(1), 
            'airTerjun' => $this->destinationModel->getByCategory(2), 
            'popular' => $this->destinationModel->randomDestination(7)
        ];
        if (isset($_SESSION['user'])) {
            $user = $this->userModel->getByUsername($_SESSION['user']['username']);
            $profile_image = $this->userModel->getImage($user['id']);
            $this->view('Layouts/top', ['titlePage' => "", 'profile_image' => $profile_image]);
        } else {
            $this->view('Layouts/top', ['titlePage' => "", 'profile_image' => null]);
        }
        $this->view('index', $data);
        $this->view('Layouts/bottom');
    }

    public function about()
    {
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin') {
            $this->redirect('destination');
        } else {
            if(isset($_SESSION['user'])) {
                $user = $this->userModel->getByUsername($_SESSION['user']['username']);
                $profile_image = $this->userModel->getImage($user['id']);
                $this->view('Layouts/top', ['titlePage' => "About Us -", 'profile_image' => $profile_image]);
            } else {
                $this->view('Layouts/top', ['titlePage' => "About Us -", 'profile_image' => null]);
            }
            $this->view('About/index');
            $this->view('Layouts/bottom');
        }
    }

    public function contact()
    {
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin') {
            $this->redirect('destination');
        } else {
            if(isset($_SESSION['user'])) {
                $user = $this->userModel->getByUsername($_SESSION['user']['username']);
                $profile_image = $this->userModel->getImage($user['id']);
                $this->view('Layouts/top', ['titlePage' => "Contact Us -", 'profile_image' => $profile_image]);
            } else {
                $this->view('Layouts/top', ['titlePage' => "Contact Us -", 'profile_image' => null]);
            }
            $this->view('Contact/index');
            $this->view('Layouts/bottom');
        }
    }

    public function kirimPesan()
    {
        if (isset($_POST['send'])) {
            $fields = [
                'name' => 'string | required',
                'email' => 'string | required | email',
                'message' => 'string | required',
            ];

            $messages = [
                'name' => ['required' => 'Nama harus diisi'],
                'email' => ['required' => 'Email harus diisi', 'email' => 'Format email tidak valid'],
                'message' => ['required' => 'Pesan harus diisi'],
            ];

            [$inputs, $errors] = $this->filter($_POST, $fields, $messages);

            if ($errors) {
                Message::setFlash('error', 'Gagal', $errors[0]);
                return;
            }

            $mail = new Mail();
            $process = $mail->sendMail($inputs['email'], $inputs['name'], $inputs['message']);

            if ($process === true) {
                Message::setFlash('success', 'Pesan berhasil dikirim', '');
            } else {
                Message::setFlash('error', 'Pesan gagal dikirim', '');
            }
            $this->redirect('contact');
        }
    }

    public function testimoni()
    {
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin') {
            $this->redirect('destination');
        } else {
            $testimonials = $this->testimonialModel->getJoin()->fetch_all(MYSQLI_ASSOC);

            foreach ($testimonials as $key => $testimonial) {
                $bulanIndonesia = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                $tanggalWaktu = explode(' ', $testimonial['created_at']);
                $tanggal = explode('-', $tanggalWaktu[0]); 

                $testimonials[$key]['created_at'] = $tanggal[2] . ' ' . $bulanIndonesia[(int)$tanggal[1] - 1] . ' ' . $tanggal[0];
            }

            if(isset($_SESSION['user'])) {
                $user = $this->userModel->getByUsername($_SESSION['user']['username']);
                $profile_image = $this->userModel->getImage($user['id']);
                $this->view('Layouts/top', ['titlePage' => "Testimoni -", 'profile_image' => $profile_image]);
            } else {
                $this->view('Layouts/top', ['titlePage' => "Testimoni -", 'profile_image' => null]);
            }
            $this->view('Testimoni/index', ['testimonials' => $testimonials]);
            $this->view('Layouts/bottom');
        }
    }

    public function cart()
    {
        if ($this->auth('user', 'destination')) {

            $data_orders = $this->orderModel->getJoin2()->fetch_all(MYSQLI_ASSOC);
            $destinasi = $this->destinationModel->randomDestination(6);
            $orders = [];

            foreach ($data_orders as $order) {
                if ($order['user_id'] == $_SESSION['user']['id']) {
                    $orders[] = $order;
                }
            }

            $discount = $this->destinationModel->getDiscountData(7);

            if(isset($_SESSION['user'])) {
                $user = $this->userModel->getByUsername($_SESSION['user']['username']);
                $profile_image = $this->userModel->getImage($user['id']);
                $this->view('Layouts/top', ['titlePage' => "Cart -", 'profile_image' => $profile_image]);
            } else {
                $this->view('Layouts/top', ['titlePage' => "Cart -", 'profile_image' => null]);
            }

            $this->view('Cart/index', ['orders' => $orders, 'discount' => $discount[0], 'destinasi' => $destinasi, 'user' => $user]);
            $this->view('Layouts/bottom');
        } else {
            $this->redirect('login');
        }
    }

    public function home()
    {
        if ($this->auth('user', 'destination')) {
            $discount = array_map(function ($destination, $disc) {
                $destination['discount'] = $disc;
                return $destination;
            }, $this->destinationModel->randomDestination(7), $this->destinationModel->getDiscountData(7));

            $data = [
                'perairan' => $this->destinationModel->getByCategory(5),
                'pegunungan' => $this->destinationModel->getByCategory(4), 
                'hutan' => $this->destinationModel->getByCategory(3), 
                'gua' => $this->destinationModel->getByCategory(6), 
                'tamanHiburan' => $this->destinationModel->getByCategory(1), 
                'airTerjun' => $this->destinationModel->getByCategory(2), 
                'popular' => $this->destinationModel->randomDestination(6), 
                'recomendation' => $this->destinationModel->randomDestination(8), 
                'discount' => $discount,
                'category' => $this->categoryModel->getAll(),
                'city' => $this->cityModel->getAll()
            ];

            if(isset($_SESSION['user'])) {
                $user = $this->userModel->getByUsername($_SESSION['user']['username']);
                $profile_image = $this->userModel->getImage($user['id']);
                $this->view('Layouts/top', ['titlePage' => "Home -", 'profile_image' => $profile_image]);
            } else {
                $this->view('Layouts/top', ['titlePage' => "Home -", 'profile_image' => null]);
            }
            
            $this->view('Home/index', $data);
            $this->view('Layouts/bottom');
        } else {
            $this->redirect('login');
        }
    }

    public function store()
    {
        if ($this->auth('user', 'destination')) {
            if (isset($_POST['pesan'])) {
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
                    return;
                }

                foreach ($keys as $key) {
                    $inputs[$key] = $_POST[$key];
                }

                $process = $this->orderModel->create($inputs);

                if (!$process) {
                    Message::setFlash('error', 'Gagal', 'Terjadi kesalahan saat memesan paket wisata');
                    return;
                } else {
                    Message::setFlash('success', 'Berhasil', 'Paket Wisata berhasil dipesan');
                    $this->redirect('cart');
                }
            } else {
                Message::setFlash('error', 'Gagal', 'tidak dapat memesan paket wisata');
                return;
            }
        }
    }

    public function edit()
    {
        if ($this->auth('user', 'destination')) {
            if (isset($_POST['id'])) {
                $data_order = $this->orderModel->getById($_POST['id']);

                if (empty($data_order)) {
                    Message::setFlash('error', 'Gagal', 'Data Pesanan tidak ditemukan');
                    $this->redirect('cart');
                    return;
                } else {
                    $data_order['status'] = 'cancelled';

                    $process = $this->orderModel->update($data_order, $_POST['id']);

                    if (!$process) {
                        Message::setFlash('error', 'Gagal', 'Proses pembatalan pesanan gagal');
                        return;
                    } else {
                        Message::setFlash('success', 'Berhasil', 'Pesanan berhasil dibatalkan');
                    }
                    $this->redirect('cart');
                    return;
                }
            } else {
                Message::setFlash('error', 'Gagal', 'status pesanan tidak dapat diubah');
                $this->redirect('cart');
                return;
            }
        }
    }
}
