<?php

namespace MyApp\Models;

use MyApp\Core\Database;

class Testimonial extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('testimonials');
        $this->setColumn([
            'id',
            'user_id',
            'destination_id',
            'rating',
            'comment',
            'created_at',
        ]);
    }

    public function getAll()
    {
        return $this->get()->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data)
    {
        $fields = [];

        foreach ($data as $key => $value) {
            $fields[$key] = $value;
        }

        return $this->insert($fields);
    }

    public function update($data, $id)
    {
        $fields = [];

        foreach ($data as $key => $value) {
            $fields[$key] = $value;
        }

        return $this->updateData($fields, ['id' => $id]);
    }

    public function delete($id)
    {
        return $this->deleteData(['id' => $id]);
    }

    public function getJoin()
    {
        return $this->joinData(
            [
                'users' => 'user_id',
                'destinations' => 'destination_id'
            ],
            [
                'testimonials.id',
                'users.fullname as nama_pengguna',
                'destinations.price as harga',
                'destinations.name as destinasi_wisata',
                'users.profile_image as foto_profil',
            ],
            'INNER JOIN'
        )->get_result();
    }
}
