<?php

namespace MyApp\Controllers;

use MyApp\Core\Controller;
use MyApp\Core\Message;

class TestimonialController extends Controller
{

    private $testimonialModel;
    private $userModel;
    private $destinationModel;

    public function __construct()
    {
        $this->testimonialModel = $this->model('MyApp\Models\Testimonial');
        $this->userModel = $this->model('MyApp\Models\User');
        $this->destinationModel = $this->model('MyApp\Models\Destination');
    }

    public function index()
    {
        if ($this->auth('admin', 'home')) {
            $testimonials = $this->testimonialModel->getJoin()->fetch_all(MYSQLI_ASSOC);
            $users = $this->userModel->getByRole('user');
            $destinations = $this->destinationModel->getAll();

            $user = $this->userModel->getByUsername($_SESSION['user']['username']);
            
            $this->view('Layouts/top', ['titlePage' => 'Data Testimoni -', 'profile_image' => $user['profile_image'] ]);
            $this->view('Testimoni/table', ['testimonials' => $testimonials, 'users' => $users, 'destinations' => $destinations]);
            $this->view('Layouts/bottom');
        }
    }

    public function store(){
        if ($this->auth('admin', 'home')) {
            if(isset($_POST["store"])){
                $fields = [
                    'user_id' => "int | required",
                    'destination_id' => "int | required",
                    'rating' => "float | required | min:0 | max:5",
                    'comment' => "string | required",
                ];

                $messages = [
                    'user_id' => [
                        'required' => 'Nama Pengguna harus diisi'
                    ],
                    'destination_id' => [
                        'required' => 'Nama Destinasi harus diisi'
                    ],
                    'rating' => [
                        'required' => 'Rating harus diisi',
                        'min' => 'Rating minimal 0',
                        'max' => 'Rating maksimal 5'
                    ],
                    'comment' => [
                        'required' => 'Komentar harus diisi'
                    ],
                ];

                [$inputs, $errors] = $this->filter($_POST, $fields, $messages);

                if (!empty($errors)) {
                    Message::setFlash('error', 'Data gagal ditambahkan', $errors[0]);
                    $this->redirect('testimoni_data');
                    return;
                } else {
                    $proses = $this->testimonialModel->create($inputs);
                    if ($proses) {
                        Message::setFlash('success', 'Data berhasil ditambahkan', '');
                        $this->redirect('testimoni_data');
                    } else {
                        Message::setFlash('error', 'Data gagal ditambahkan', 'Terjadi kesalahan saat menambahkan data');
                        $this->redirect('testimoni_data');
                        return;
                    }
                }
            } else {
                Message::setFlash('error', 'Data gagal ditambahkan', 'Terjadi kesalahan saat menambahkan data');
                $this->redirect('testimoni_data');
                return;
            }
        }
    }
    
    public function edit()
    {
        if ($this->auth('admin', 'home')) {
            if (isset($_POST["edit"]) && isset($_POST["id"]) && !empty($_POST["id"]) && is_numeric($_POST["id"])) {
                $fields = [
                    'user_id' => "int | required",
                    'destination_id' => "int | required",
                    'rating' => "float | required | min:0 | max:5",
                    'comment' => "string | required",
                ];

                $messages = [
                    'user_id' => [
                        'required' => 'Nama Pengguna harus diisi'
                    ],
                    'destination_id' => [
                        'required' => 'Nama Destinasi harus diisi'
                    ],
                    'rating' => [
                        'required' => 'Rating harus diisi',
                        'min' => 'Rating minimal 0',
                        'max' => 'Rating maksimal 5'
                    ],
                    'comment' => [
                        'required' => 'Komentar harus diisi'
                    ],
                ];

                [$inputs, $errors] = $this->filter($_POST, $fields, $messages);

                if (!empty($errors)) {
                    Message::setFlash('error', 'Data gagal diubah', $errors[0]);
                    $this->redirect('testimoni_data');
                    return;
                } else {
                    $proses = $this->testimonialModel->update($inputs, $_POST['id']);
                    if ($proses) {
                        Message::setFlash('success', 'Data berhasil diubah', '');
                        $this->redirect('testimoni_data');
                    } else {
                        Message::setFlash('error', 'Data gagal diubah', 'Terjadi kesalahan saat mengubah data');
                        $this->redirect('testimoni_data');
                        return;
                    }
                }
            } else {
                Message::setFlash('error', 'Data gagal diubah', 'Terjadi kesalahan saat mengubah data');
                $this->redirect('testimoni_data');
                return;
            }
        }
    }

    public function destroy()
    {
        if ($this->auth('admin', 'home')) {
            if (isset($_POST['destroy']) && isset($_POST['id']) && !empty($_POST['id']) && is_numeric($_POST['id'])) {
                $proses = $this->testimonialModel->delete($_POST['id']);
                if ($proses) {
                    Message::setFlash('success', 'Data berhasil dihapus', '');
                    $this->redirect('testimoni_data');
                } else {
                    Message::setFlash('error', 'Data gagal dihapus', 'Terjadi kesalahan saat menghapus data');
                    $this->redirect('testimoni_data');
                    return;
                }
            } else {
                Message::setFlash('error', 'Data gagal dihapus', 'Terjadi kesalahan saat menghapus data');
                $this->redirect('testimoni_data');
                return;
            }
        }
    }
}
