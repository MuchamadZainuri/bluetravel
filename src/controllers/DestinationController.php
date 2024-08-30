<?php

namespace MyApp\Controllers;

use MyApp\Core\Controller;
use MyApp\Core\Message;

class DestinationController extends Controller
{

    private $destinationModel;
    private $cityModel;
    private $categoryModel;
    private $userModel;

    public function __construct()
    {
        $this->destinationModel = $this->model('MyApp\Models\Destination');
        $this->cityModel = $this->model('MyApp\Models\City');
        $this->categoryModel = $this->model('MyApp\Models\Category');
        $this->userModel = $this->model('MyApp\Models\User');
    }

    public function show($id)
    {
        if ($this->auth('user', 'destination')) {
            $destination = $this->destinationModel->getById($id)->fetch_assoc();
            $random = $this->destinationModel->randomDestination(8);

            $user = $this->userModel->getByUsername($_SESSION['user']['username']);
            $profile_image = $this->userModel->getImage($user['id']);

            $this->view('Layouts/top', ['titlePage' => 'Detail Destinasi -', 'url' => '../', 'profile_image' => $profile_image]);
            $this->view('Destination/detail', ['destination' => $destination, 'random' => $random]);
            $this->view('Layouts/bottom', ['url' => '../']);
        }
    }

    public function index()
    {
        if ($this->auth('admin', '/home')) {
            $data = [
                'destinations' => $this->destinationModel->getAll(),
                'cities' => $this->cityModel->getAll(),
                'categories' => $this->categoryModel->getAll()
            ];
            $user = $this->userModel->getByUsername($_SESSION['user']['username']);
            $profile_image = $this->userModel->getImage($user['id']);
            $this->view('Layouts/top', ['titlePage' => 'Data Destinasi -', 'profile_image' => $profile_image]);
            $this->view('Destination/index', $data);
            $this->view('Layouts/bottom');
        }
    }

    public function store()
    {
        if ($this->auth('admin', '/home')) {
            if (isset($_POST['store'])) {
                $fields = [
                    'name' => 'string | required | unique:destinations',
                    'price' => 'int | required',
                    'rating' => 'float | required | min:0 | max:5',
                    'location' => 'string | required',
                    'open-time' => 'string | required',
                    'close-time' => 'string | required',
                    'short-description' => 'string | required',
                    'long-description' => 'string | required',
                    'video1' => 'string | required | url',
                    'video2' => 'string | required | url',
                    'video3' => 'string | required | url',
                    'tags' => 'string | required',
                    'city_id' => 'int | required',
                    'category_id' => 'int | required',
                ];

                $messages = [
                    'name' => [
                        'required' => 'Nama destinasi tidak boleh kosong',
                        'unique' => 'Nama destinasi sudah ada'
                    ],
                    'price' => [
                        'required' => 'Harga destinasi tidak boleh kosong'
                    ],
                    'rating' => [
                        'required' => 'Rating destinasi tidak boleh kosong',
                        'min' => 'Rating minimal 0',
                        'max' => 'Rating maksimal 5'
                    ],
                    'location' => [
                        'required' => 'Lokasi destinasi tidak boleh kosong'
                    ],
                    'open-time' => [
                        'required' => 'Jam buka destinasi tidak boleh kosong'
                    ],
                    'close-time' => [
                        'required' => 'Jam tutup destinasi tidak boleh kosong'
                    ],
                    'short-description' => [
                        'required' => 'Deskripsi singkat destinasi tidak boleh kosong'
                    ],
                    'long-description' => [
                        'required' => 'Deskripsi panjang destinasi tidak boleh kosong'
                    ],
                    'cover' => [
                        'required' => 'Cover destinasi tidak boleh kosong',
                        'image' => 'Cover destinasi harus berupa gambar'
                    ],
                    'image1' => [
                        'required' => 'Gambar 1 destinasi tidak boleh kosong',
                        'image' => 'Gambar 1 destinasi harus berupa gambar'
                    ],
                    'image2' => [
                        'required' => 'Gambar 2 destinasi tidak boleh kosong',
                        'image' => 'Gambar 2 destinasi harus berupa gambar'
                    ],
                    'image3' => [
                        'required' => 'Gambar 3 destinasi tidak boleh kosong',
                        'image' => 'Gambar 3 destinasi harus berupa gambar'
                    ],
                    'video1' => [
                        'required' => 'Video 1 destinasi tidak boleh kosong',
                        'url' => 'Video 1 destinasi harus berupa url'
                    ],
                    'video2' => [
                        'required' => 'Video 2 destinasi tidak boleh kosong',
                        'url' => 'Video 2 destinasi harus berupa url'
                    ],
                    'video3' => [
                        'required' => 'Video 3 destinasi tidak boleh kosong',
                        'url' => 'Video 3 destinasi harus berupa url'
                    ],
                    'tags' => [
                        'required' => 'Tag destinasi tidak boleh kosong'
                    ],
                    'city_id' => [
                        'required' => 'Kota destinasi tidak boleh kosong'
                    ],
                    'category_id' => [
                        'required' => 'Kategori destinasi tidak boleh kosong'
                    ]
                ];

                [$inputs, $errors] = $this->filter($_POST, $fields, $messages);

                if (!empty($errors)) {
                    Message::setFlash('error', 'Gagal', $errors[0]);
                    $this->redirect('destination');
                    return;
                } else {
                    if ($_FILES) {
                        $files = [
                            'cover' => $_FILES['cover'],
                            'image1' => $_FILES['image1'],
                            'image2' => $_FILES['image2'],
                            'image3' => $_FILES['image3'],
                        ];
                        $images = $this->upload($files, __DIR__ . '/../../public/img/');
                        if (!$images) {
                            Message::setFlash('error', 'Gagal', 'Gagal mengupload gambar');
                            $this->redirect('destination');
                            return;
                        } else {
                            $inputs['cover'] = $images['cover'];
                            $inputs['image1'] = $images['image1'];
                            $inputs['image2'] = $images['image2'];
                            $inputs['image3'] = $images['image3'];
                            $tags = explode(',', $inputs['tags']);

                            $data = [
                                'name' => $inputs['name'],
                                'descriptions' => json_encode([$inputs['short-description'], $inputs['long-description']]),
                                'images' => json_encode([$inputs['cover'], $inputs['image1'], $inputs['image2'], $inputs['image3']]),
                                'price' => $inputs['price'],
                                'rating' => $inputs['rating'],
                                'location' => $inputs['location'],
                                'tags' => json_encode($tags),
                                'videos' => json_encode([$inputs['video1'], $inputs['video2'], $inputs['video3']]),
                                'open_time' => $inputs['open-time'],
                                'close_time' => $inputs['close-time'],
                                'category_id' => $inputs['category_id'],
                                'city_id' => $inputs['city_id'],
                            ];

                            $proses = $this->destinationModel->create($data);

                            if ($proses) {
                                Message::setFlash('success', 'Berhasil', 'Data berhasil ditambahkan');
                                $this->redirect('destination');
                            } else {
                                Message::setFlash('error', 'Gagal', 'Data gagal ditambahkan');
                                $this->redirect('destination');
                                return;
                            }
                        }
                    }
                }
            } else {
                Message::setFlash('error', 'Gagal', 'Data gagal ditambahkan');
                $this->redirect('destination');
                return;
            }
        }
    }

    public function edit()
    {
        if ($this->auth('admin', '/home')) {
            if (isset($_POST['edit']) && isset($_POST['id']) && !empty($_POST['id']) && is_numeric($_POST['id'])) {

                $fields = [
                    'name' => 'string | required',
                    'price' => 'int | required',
                    'rating' => 'float | required',
                    'location' => 'string | required',
                    'open-time' => 'string | required',
                    'close-time' => 'string | required',
                    'short-description' => 'string | required',
                    'long-description' => 'string | required',
                    'video1' => 'string | required | url',
                    'video2' => 'string | required | url',
                    'video3' => 'string | required | url',
                    'tags' => 'string | required',
                    'city_id' => 'int | required',
                    'category_id' => 'int | required',
                ];

                $messages = [
                    'name' => ['required' => 'Nama destinasi tidak boleh kosong', 'unique' => 'Nama destinasi sudah ada'],
                    'price' => ['required' => 'Harga destinasi tidak boleh kosong'],
                    'rating' => ['required' => 'Rating destinasi tidak boleh kosong'],
                    'location' => ['required' => 'Lokasi destinasi tidak boleh kosong'],
                    'open-time' => ['required' => 'Jam buka destinasi tidak boleh kosong'],
                    'close-time' => ['required' => 'Jam tutup destinasi tidak boleh kosong'],
                    'short-description' => ['required' => 'Deskripsi singkat destinasi tidak boleh kosong'],
                    'long-description' => ['required' => 'Deskripsi panjang destinasi tidak boleh kosong'],
                    'video1' => ['required' => 'Video 1 destinasi tidak boleh kosong', 'url' => 'Video 1 harus berupa URL'],
                    'video2' => ['required' => 'Video 2 tidak boleh kosong', 'url' => 'Video 2 harus berupa URL'],
                    'video3' => ['required' => 'Video 3 tidak boleh kosong', 'url' => 'Video 3 harus berupa URL'],
                    'tags' => ['required' => 'Tag destinasi tidak boleh kosong'],
                    'city_id' => ['required' => 'Kota destinasi tidak boleh kosong'],
                    'category_id' => ['required' => 'Kategori destinasi tidak boleh kosong'],
                ];

                [$inputs, $errors] = $this->filter($_POST, $fields, $messages);

                if (!empty($errors)) {
                    Message::setFlash('error', 'Gagal', $errors[0]);
                    $this->redirect('destination');
                    return;
                }

                $fileKeys = ['cover', 'image1', 'image2', 'image3'];
                $files = [];

                foreach ($fileKeys as $key) {
                    if (isset($_FILES[$key]) && $_FILES[$key]['error'] == 0) {
                        $files[$key] = $_FILES[$key];
                    }
                }

                if (!empty($files)) {
                    $images = $this->upload($files, __DIR__ . '/../../public/img/');
                    if (!$images) {
                        Message::setFlash('error', 'Gagal', 'Gagal mengupload gambar');
                        $this->redirect('destination');
                        return;
                    } else {
                        foreach ($images as $key => $value) {
                            $inputs[$key] = $value;
                        }
                    }
                }

                $currentImage = json_decode($this->destinationModel->getImages($_POST['id']), true);

                foreach ($fileKeys as $index => $key) {
                    if (isset($inputs[$key]) && $inputs[$key] !== $currentImage[$index]) {
                        unlink(__DIR__ . '/../../public/img/' . $currentImage[$index]);
                        $currentImage[$index] = $inputs[$key];
                    }
                }

                $data = [
                    'name' => $inputs['name'],
                    'descriptions' => json_encode([$inputs['short-description'], $inputs['long-description']]),
                    'images' => json_encode($currentImage),
                    'price' => $inputs['price'],
                    'rating' => $inputs['rating'],
                    'location' => $inputs['location'],
                    'tags' => json_encode(explode(',', $inputs['tags'])),
                    'videos' => json_encode([$inputs['video1'], $inputs['video2'], $inputs['video3']]),
                    'open_time' => $inputs['open-time'],
                    'close_time' => $inputs['close-time'],
                    'category_id' => $inputs['category_id'],
                    'city_id' => $inputs['city_id'],
                ];

                $proses = $this->destinationModel->update($data, $_POST['id']);

                if ($proses) {
                    Message::setFlash('success', 'Berhasil', 'Data berhasil diperbarui');
                    $this->redirect('destination');
                } else {
                    Message::setFlash('error', 'Gagal', 'Data gagal diperbarui');
                    $this->redirect('destination');
                    return;
                }
            }
        }
    }

    public function destroy()
    {
        if ($this->auth('admin', '/home')) {
            if (isset($_POST['destroy']) && isset($_POST['id']) && !empty($_POST['id']) && is_numeric($_POST['id'])) {
                $images = json_decode($this->destinationModel->getImages($_POST['id']), true);

                foreach ($images as $image) {
                    unlink(__DIR__ . '/../../public/img/' . $image);
                }

                $proses = $this->destinationModel->delete($_POST['id']);

                if ($proses) {
                    Message::setFlash('success', 'Berhasil', 'Data berhasil dihapus');
                    $this->redirect('destination');
                } else {
                    Message::setFlash('error', 'Gagal', 'Data gagal dihapus');
                    $this->redirect('destination');
                    return;
                }
            } else {
                Message::setFlash('error', 'Gagal', 'Data gagal dihapus');
                $this->redirect('destination');
                return;
            }
        }
    }

    public function upload($filesArray, $path)
    {
        $files = [];

        foreach ($filesArray as $key => $file) {
            if ($file['error'] == 0) {
                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                $newName = uniqid() . '.' . $ext;
                $targetPath = $path . $newName;
                if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                    $files[$key] = $newName;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        return $files;
    }
}
