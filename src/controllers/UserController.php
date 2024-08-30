<?php

namespace MyApp\Controllers;

use MyApp\Core\Controller;
use MyApp\Core\Message;

class UserController extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('MyApp\Models\User');
    }

    public function index()
    {
        if ($this->auth('admin', 'home')) {
            $users = $this->userModel->getByRole('user');
            $user = $this->userModel->getByUsername($_SESSION['user']['username']);
            $this->view('Layouts/top', ['titlePage' => 'Data Pengguna -', 'profile_image' => $user['profile_image']]);
            $this->view('User/index', ['users' => $users]);
            $this->view('Layouts/bottom');
        }
    }

    public function store()
    {
        if ($this->auth('admin', 'home')) {
            if (isset($_POST["store"])) {
                $fields = [
                    'fullname' => 'string | required | max:100 | capitalize | min:5',
                    'username' => 'string | required | max:45 | unique:users | lowercase | alphanumeric | min:5',
                    'phone' => 'int | required | max:12 | unique:users | phone | min:10',
                    'email' => 'email | required | max:100 | unique:users | lowercase | email',
                    'role' => 'string | required',
                    'password' => 'string | required | min:8 | secure'
                ];

                $messages = [
                    'fullname' => [
                        'required' => 'Nama lengkap tidak boleh kosong',
                        'max' => 'Nama lengkap maksimal 100 karakter',
                        'capitalize' => 'Nama lengkap harus diawali huruf kapital',
                        'min' => 'Nama lengkap minimal 5 karakter'
                    ],
                    'username' => [
                        'required' => 'Username tidak boleh kosong',
                        'max' => 'Username maksimal 45 karakter',
                        'unique' => 'Username sudah ada',
                        'lowercase' => 'Username harus huruf kecil semua',
                        'alphanumeric' => 'Username hanya boleh berisi huruf dan angka',
                        'min' => 'Username minimal 5 karakter'
                    ],
                    'phone' => [
                        'required' => 'Nomor HP tidak boleh kosong',
                        'max' => 'Nomor HP maksimal 12 karakter',
                        'unique' => 'Nomor HP sudah ada',
                        'phone' => 'Nomor HP tidak valid',
                        'min' => 'Nomor HP minimal 10 karakter'
                    ],
                    'email' => [
                        'required' => 'Email tidak boleh kosong',
                        'max' => 'Email maksimal 100 karakter',
                        'unique' => 'Email sudah ada',
                        'lowercase' => 'Email harus huruf kecil semua',
                        'email' => 'Email tidak valid'
                    ],
                    'role' => [
                        'required' => 'Peran tidak boleh kosong'
                    ],
                    'password' => [
                        'required' => 'Password tidak boleh kosong',
                        'min' => 'Password minimal 8 karakter',
                        'secure' => 'Password harus mengandung huruf besar, huruf kecil, angka, dan karakter spesial'
                    ]
                ];

                [$inputs, $errors] = $this->filter($_POST, $fields, $messages);

                if (!empty($errors)) {
                    Message::setFlash('error', 'Data gagal ditambahkan', $errors[0]);
                    $this->redirect('user_data');
                    return;
                } else {

                    if(isset($_FILES['profile_image']) && !empty($_FILES['profile_image']['name'])) {
                        $images = $this->upload($_FILES['profile_image'], __DIR__ . '/../../public/img/');

                        if (!$images) {
                            Message::setFlash('error', 'Gagal', 'Gagal mengupload gambar');
                            $this->redirect('destination');
                            return;
                        } else {
                            $inputs['profile_image'] = $images['profile_image'];
                        }
                    } else {
                        Message::setFlash('error', 'Data gagal ditambahkan', 'Gambar tidak boleh kosong');
                        return;
                    }

                    $inputs['password'] = password_hash($inputs['password'], PASSWORD_DEFAULT);
                    $prosess = $this->userModel->create($inputs);
                    if ($prosess) {
                        Message::setFlash('success', 'Data Pengguna Baru berhasil ditambahkan', '');
                        $this->redirect('user_data');
                    } else {
                        Message::setFlash('error', 'Data gagal ditambahkan', '');
                        $this->redirect('user_data');
                        return;
                    }
                }
            } else {
                Message::setFlash('error', 'Data gagal ditambahkan', '');
                $this->redirect('user_data');
                return;
            }
        }
    }

    public function edit()
    {
        if ($this->auth('admin', 'home')) {
            if (isset($_POST["edit"]) && isset($_POST["id"]) && !empty($_POST["id"]) && is_numeric($_POST["id"])) {
                $fields = [
                    'fullname' => 'string | required | max:100 | capitalize | min:5',
                    'username' => 'string | required | max:20 | lowercase | alphanumeric | min:5',
                    'phone' => 'int | required | max:12 | phone | min:10',
                    'email' => 'email | required | max:100 | lowercase | email',
                    'role' => 'string | required',
                    'password' => 'string | required | min:8 | secure'
                ];

                $messages = [
                    'fullname' => [
                        'required' => 'Nama lengkap tidak boleh kosong',
                        'max' => 'Nama lengkap maksimal 100 karakter',
                        'capitalize' => 'Nama lengkap harus diawali huruf kapital',
                        'min' => 'Nama lengkap minimal 5 karakter'
                    ],
                    'username' => [
                        'required' => 'Username tidak boleh kosong',
                        'max' => 'Username maksimal 45 karakter',
                        'lowercase' => 'Username harus huruf kecil semua',
                        'alphanumeric' => 'Username hanya boleh berisi huruf dan angka',
                        'min' => 'Username minimal 5 karakter'
                    ],
                    'phone' => [
                        'required' => 'Nomor HP tidak boleh kosong',
                        'max' => 'Nomor HP maksimal 12 karakter',
                        'phone' => 'Nomor HP tidak valid',
                        'min' => 'Nomor HP minimal 10 karakter'
                    ],
                    'email' => [
                        'required' => 'Email tidak boleh kosong',
                        'max' => 'Email maksimal 100 karakter',
                        'lowercase' => 'Email harus huruf kecil semua',
                        'email' => 'Email tidak valid'
                    ],
                    'role' => [
                        'required' => 'Peran tidak boleh kosong'
                    ],
                    'password' => [
                        'required' => 'Password tidak boleh kosong',
                        'min' => 'Password minimal 8 karakter',
                        'secure' => 'Password harus mengandung huruf besar, huruf kecil, angka, dan karakter spesial'
                    ]
                ];

                [$inputs, $errors] = $this->filter($_POST, $fields, $messages);

                if (!empty($errors)) {
                    Message::setFlash('error', 'Data gagal diubah', $errors[0]);
                    $this->redirect('user_data');
                } else {

                    if (isset($_FILES['profile_image']) && !empty($_FILES['profile_image']['name'])) {

                        $currentImage = $this->userModel->getImage($_POST['id']);

                        if ($currentImage) {
                            unlink(__DIR__ . '/../../public/img/' . $currentImage);
                        }

                        $images = $this->upload($_FILES['profile_image'], __DIR__ . '/../../public/img/');

                        if (!$images) {
                            Message::setFlash('error', 'Gagal', 'Gagal mengupload gambar');
                            $this->redirect('user_data');
                            return;
                        } else {
                            $inputs['profile_image'] = $images['profile_image'];
                        }
                    } elseif (isset($_FILES['profile_image']) && empty($_FILES['profile_image']['name'])) {
                        $inputs['profile_image'] = $this->userModel->getImage($_POST['id']);
                    }
                    $prosess = $this->userModel->update($inputs, $_POST['id']);
                    if ($prosess) {
                        Message::setFlash('success', 'Data Pengguna berhasil diubah', '');
                        $this->redirect('user_data');
                    } else {
                        Message::setFlash('error', 'Data gagal diubah', '');
                        $this->redirect('user_data');
                    }
                }
            } else {
                Message::setFlash('error', 'Data gagal diubah', '');
                $this->redirect('user_data');
            }
        }
    }

    public function destroy()
    {
        if ($this->auth('admin', 'home')) {
            if (isset($_POST['destroy']) && isset($_POST['id']) && !empty($_POST['id']) && is_numeric($_POST['id'])) {

                $currentImage = $this->userModel->getImage($_POST['id']);

                if ($currentImage) {
                    unlink(__DIR__ . '/../../public/img/' . $currentImage);
                }

                $prosess = $this->userModel->delete($_POST['id']);
                if ($prosess) {
                    Message::setFlash('success', 'Data Pengguna berhasil dihapus', '');
                    $this->redirect('user_data');
                } else {
                    Message::setFlash('error', 'Data gagal dihapus', '');
                    $this->redirect('user_data');
                    return;
                }
            } else {
                Message::setFlash('error', 'Data gagal dihapus', '');
                $this->redirect('user_data');
                return;
            }
        }
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
