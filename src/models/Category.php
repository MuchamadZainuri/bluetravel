<?php

namespace MyApp\Models;

use MyApp\Core\Database;

class Category extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('categories');
        $this->setColumn([
            'id',
            'name',
            'image'
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

    public function update($data, $id)
    {
        $fields = [];

        foreach($data as $key => $value) {
            $fields[$key] = $value;
        }

        return $this->updateData($fields, ['id' => $id]);
    }

    public function delete($id)
    {
        return $this->deleteData(['id' => $id]);
    }

    public function getImage($id)
    {
        return $this->get(['id' => $id])->get_result()->fetch_assoc()['image'];
    }

}
