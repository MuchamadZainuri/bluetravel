<?php

namespace MyApp\Controllers;

use MyApp\Core\Controller;
use MyApp\Core\Message;

class CategoryController extends Controller
{

    private $categoryModel;
    private $userModel;

    public function __construct()
    {
        $this->categoryModel = $this->model('MyApp\Models\Category');
        $this->userModel = $this->model('MyApp\Models\User');
    }

    public function index()
    {
        if ($this->auth('admin', '/home')) {
            $categories = $this->categoryModel->getAll();
            $user = $this->userModel->getByUsername($_SESSION['user']['username']);
            $profile_image = $this->userModel->getImage($user['id']);
            $this->view('Layouts/top', ['titlePage' => 'Data Kategori -', 'profile_image' => $profile_image]);
            $this->view('Category/index', ['categories' => $categories]);
            $this->view('Layouts/bottom');
        }
    }

    public function store()
    {
        if ($this->auth('admin', '/home')) {
            if (isset($_POST["store"])) {
                $fields = [
                    'name' => 'string | required | max:45 | unique:categories | capitalize',
                ];

                $messages = [
                    'name' => [
                        'required' => 'Nama kategori tidak boleh kosong',
                        'max' => 'Nama kategori maksimal 45 karakter',
                        'unique' => 'Nama kategori sudah ada',
                        'capitalize' => 'Nama kategori harus diawali huruf kapital'
                    ]
                ];

                [$inputs, $errors] = $this->filter($_POST, $fields, $messages);

                if (!empty($errors)) {
                    Message::setFlash('error', 'Data gagal ditambahkan', $errors[0]);
                    $this->redirect('category_destination');
                    return;
                } else {

                    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                        $images = $this->upload($_FILES['image'], __DIR__ . '/../../public/img/');

                        if (!$images) {
                            Message::setFlash('error', 'Gagal', 'Gagal mengupload gambar');
                            $this->redirect('destination');
                            return;
                        } else {
                            $inputs['image'] = $images['image'];
                        }
                    } else {
                        Message::setFlash('error', 'Data gagal ditambahkan', 'Gambar tidak boleh kosong');
                        return;
                    }

                    $proses = $this->categoryModel->create($inputs);

                    if ($proses) {
                        Message::setFlash('success', 'Data Kategori berhasil ditambahkan', '');
                        $this->redirect('category_destination');
                    } else {
                        Message::setFlash('error', 'Data gagal ditambahkan', '');
                        $this->redirect('category_destination');
                        return;
                    }
                }
            } else {
                Message::setFlash('error', 'Data gagal ditambahkan', '');
                $this->redirect('category_destination');
                return;
            }
        }
    }

    public function edit()
    {
        if ($this->auth('admin', '/home')) {
            if (isset($_POST['edit']) && isset($_POST['id']) && !empty($_POST['id']) && is_numeric($_POST['id'])) {
                $fields = [
                    'name' => 'string | required | max:45 ! unique:categories | capitalize',
                ];

                $messages = [
                    'name' => [
                        'required' => 'Nama kategori tidak boleh kosong',
                        'max' => 'Nama kategori maksimal 45 karakter',
                        'unique' => 'Nama kategori sudah ada',
                        'capitalize' => 'Nama kategori harus diawali huruf kapital'
                    ]
                ];

                [$inputs, $errors] = $this->filter($_POST, $fields, $messages);

                if (!empty($errors)) {
                    Message::setFlash('error', 'Data gagal diubah', $errors[0]);
                    $this->redirect('category_destination');
                    return;
                } else {
                    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {

                        $currentImage = $this->categoryModel->getImage($_POST['id']);

                        if ($currentImage) {
                            unlink(__DIR__ . '/../../public/img/' . $currentImage);
                        }
                        
                        $images = $this->upload($_FILES['image'], __DIR__ . '/../../public/img/');

                        if (!$images) {
                            Message::setFlash('error', 'Gagal', 'Gagal mengupload gambar');
                            $this->redirect('category_destination');
                            return;
                        } else {
                            $inputs['image'] = $images['image'];
                        }
                    } elseif (isset($_FILES['image']) && empty($_FILES['image']['name'])) {
                        $inputs['image'] = $this->categoryModel->getImage($_POST['id']);
                    }

                    $proses = $this->categoryModel->update($inputs, $_POST['id']);
                    if ($proses) {
                        Message::setFlash('success', 'Data Kategori berhasil diubah', '');
                        $this->redirect('category_destination');
                    } else {
                        Message::setFlash('error', 'Data gagal diubah', '');
                        $this->redirect('category_destination');
                        return;
                    }
                }
            } else {
                Message::setFlash('error', 'Data gagal diubah', '');
                $this->redirect('category_destination');
                return;
            }
        }
    }

    public function destroy()
    {
        if ($this->auth('admin', '/home')) {
            if (isset($_POST['destroy']) && isset($_POST['id']) && !empty($_POST['id']) && is_numeric($_POST['id'])) {

                $currentImage = $this->categoryModel->getImage($_POST['id']);
                if ($currentImage) {
                    unlink(__DIR__ . '/../../public/img/' . $currentImage);
                }

                $proses = $this->categoryModel->delete($_POST['id']);
                if ($proses) {
                    Message::setFlash('success', 'Data Kategori berhasil dihapus', '');
                    $this->redirect('category_destination');
                } else {
                    Message::setFlash('error', 'Data gagal dihapus', '');
                    $this->redirect('category_destination');
                    return;
                }
            } else {
                Message::setFlash('error', 'Data gagal dihapus', '');
                $this->redirect('category_destination');
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
                return ['image' => $newName];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
