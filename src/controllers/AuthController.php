<?php

namespace MyApp\Controllers;

use MyApp\Core\Controller;
use MyApp\Core\Message;

class AuthController extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('MyApp\Models\User');
    }

    public function register()
    {
        if (isset($_POST['register'])) {
            $fields = [
                'username' => 'string | required | alphanumeric | min:5 | max:20 | unique:users | lowercase | not_in:admin,administrator,user',
                'fullname' => 'string | required | max:100 | min:5 | capitalize | not_in:Admin,Administrator,User',
                'phone' => 'int | required | phone | max:12 | min:10 | unique:users',
                'email' => 'email | required | email | unique:users | lowercase | max:100',
                'password' => 'string | required | min:8 | secure',
                'confirm' => 'string | required | match:password:confirm'
            ];
            $messages = [
                'username' => [
                    'required' => 'Username tidak boleh kosong',
                    'alphanumeric' => 'Username hanya boleh berisi huruf dan angka',
                    'min' => 'Username minimal 5 karakter',
                    'max' => 'Username maksimal 20 karakter',
                    'unique' => 'Username sudah digunakan',
                    'lowercase' => 'Username harus huruf kecil semua',
                    'not_in' => 'Username tidak boleh mengandung kata admin,administrator atau user'
                ],
                'fullname' => [
                    'required' => 'Nama lengkap tidak boleh kosong',
                    'max' => 'Nama lengkap maksimal 50 karakter',
                    'min' => 'Nama lengkap minimal 5 karakter',
                    'capitalize' => 'Nama lengkap harus diawali huruf kapital',
                    'not_in' => 'Nama lengkap tidak boleh mengandung kata admin,administrator atau user'
                ],
                'phone' => [
                    'required' => 'Nomor telepon tidak boleh kosong',
                    'phone' => 'Nomor telepon tidak valid',
                    'max' => 'Nomor telepon maksimal 12 karakter',
                    'min' => 'Nomor telepon minimal 10 karakter',
                    'unique' => 'Nomor telepon sudah digunakan'
                ],
                'email' => [
                    'required' => 'Email tidak boleh kosong',
                    'email' => 'Email tidak valid',
                    'unique' => 'Email sudah digunakan',
                    'lowercase' => 'Email harus huruf kecil semua'
                ],
                'password' => [
                    'required' => 'Password tidak boleh kosong',
                    'min' => 'Password minimal 8 karakter',
                    'secure' => 'Password harus mengandung huruf besar, huruf kecil, angka, dan karakter spesial'
                ],
                'confirm' => [
                    'required' => 'Konfirmasi password tidak boleh kosong',
                    'match' => 'Password tidak sama',
                ]
            ];

            [$inputs, $errors] = $this->filter($_POST, $fields, $messages);

            if (!empty($errors)) {
                Message::setFlash('error', 'Gagal', $errors[0]);
                $this->redirect('register');
                return;
            } else {

                if (isset($_FILES['profile_image']) && !empty($_FILES['profile_image']['name'])) {
                    $images = $this->upload($_FILES['profile_image'], __DIR__ . '/../../public/img/');

                    if (!$images) {
                        Message::setFlash('error', 'Gagal', 'Gagal mengupload gambar');
                        $this->redirect('register');
                        return;
                    } else {
                        $inputs['profile_image'] = $images['profile_image'];
                    }
                } else {
                    $inputs['profile_image'] = $this->userModel->getImage($_POST['id']);
                }

                $inputs['password'] = password_hash($inputs['password'], PASSWORD_DEFAULT);
                unset($inputs['confirm']);
                $inputs['role'] = 'user';

                $prosess = $this->userModel->create($inputs);
                
                if($prosess) {
                    Message::setFlash('info', 'Berhasil', 'Akun berhasil dibuat');
                    $this->redirect('login');
                } else {
                    Message::setFlash('error', 'Gagal', 'Registrasi gagal');
                    $this->redirect('register');
                    return;
                }
            }
        } else {
            $this->view('Register/index', ['titlePage' => "Register -"]);
        }
    }

    public function login()
    {
        if (isset($_POST['login'])) {
            $fields = [
                'username' => 'string | required | min:5 | max:15 | alphanumeric | lowercase',
                'password' => 'string | required | min:8'
            ];

            $messages = [
                'username' => [
                    'required' => 'Username tidak boleh kosong',
                    'min' => 'Username minimal 5 karakter',
                    'alphanumeric' => ' Username hanya boleh berisi huruf dan angka',
                    'max' => 'Username maksimal 15 karakter',
                    'lowercase' => 'Username harus huruf kecil semua'
                ],
                'password' => [
                    'required' => 'Password tidak boleh kosong',
                    'min' => 'Password minimal 8 karakter'
                ]
            ];

            [$inputs, $errors] = $this->filter($_POST, $fields, $messages);

            if (!empty($errors)) {
                Message::setFlash('error', 'Gagal', $errors[0]);
                $this->redirect('login');
            } else {
                $user = $this->userModel->getByUsername($inputs['username']);
                if ($user) {
                    if (password_verify($inputs['password'], $user['password'])) {
                        $_SESSION['user'] = $user;
                        $_SESSION['role'] = $user['role'];
                        if ($user['role'] == 'admin') {
                            Message::setFlash('info', 'Selamat datang ' . $user['username'], '');
                            $this->redirect('destination');
                        } else {
                            Message::setFlash('info', 'Selamat datang ' . $user['username'], '');
                            $this->redirect('home');
                        }
                    } else {
                        Message::setFlash('error', 'Gagal', 'Username atau Password salah');
                        $this->redirect('login');
                        return;
                    }
                } else {
                    Message::setFlash('error', 'Gagal', 'Anda belum terdaftar');
                    $this->redirect('register');
                    return;
                }
            }
        } else {
            $this->view('Login/index', ['titlePage' => "Login -"]);
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        unset($_SESSION['role']);
        Message::setFlash('info', 'Berhasil Logout', '');
        $this->redirect('login');
    }

    public function upload($file, $path)
    {
        if ($file['error'] == 0) {
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $newName = uniqid() . '.' . $ext;
            $targetPath = $path . $newName;
            if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                return ['profile_image' => $newName];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
