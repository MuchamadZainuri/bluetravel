<?php

namespace MyApp\Models;

use MyApp\Core\Database;

class User extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('users');
        $this->setColumn([
            'id',
            'username',
            'fullname',
            'phone',
            'email',
            'profile_image',
            'password',
            'role'
        ]);
    }

    public function getAll()
    {
        return $this->get()->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data)
    {
        $fields = [];

        foreach($data as $key => $value) {
            $fields[$key] = $value;
        }

        return $this->insert($fields);
    }

    public function update($data, $id) {
        $fields = [];

        foreach($data as $key => $value) {
            $fields[$key] = $value;
        }

        return $this->updateData($fields, ['id' => $id]);
    }

    public function delete($id) {
        return $this->deleteData(['id' => $id]);
    }

    public function getByRole($role)
    {
        return $this->get(['role' => $role])->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getByUsername($username)
    {
        return $this->get(['username' => $username])->get_result()->fetch_assoc();
    }

    public function getImage($id)
    {
        return $this->get(['id' => $id])->get_result()->fetch_assoc()['profile_image'];
    }

}
