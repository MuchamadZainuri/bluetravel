<?php

namespace MyApp\Core;

use MyApp\Core\Filter;

class Controller extends Filter
{
    public function view($view, $data = [])
    {
        if (count($data)) {
            extract($data);
        }
        require_once '../src/views/' . $view . '.php';
    }

    public function redirect($url)
    {
        header('Location: ' . BASEURL . $url);
        exit;
    }

    public function model($model)
    {
        return new $model;
    }

    public function auth($role, $url)
    {
        if (isset($_SESSION['user'])) {
            if ($_SESSION['role'] == $role) {
                return true;
            } else {
                $this->redirect($url);
            }
        } else {
            Message::setFlash('error', 'Gagal', 'Anda harus login terlebih dahulu');
            $this->redirect('login');
        }
    }
    
}
