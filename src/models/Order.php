<?php

namespace MyApp\Models;

use MyApp\Core\Database;

class Order extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('orders');
        $this->setColumn([
            'id',
            'user_id',
            'destination_id',
            'duration',
            'total_people',
            'hotel',
            'transportation',
            'food',
            'package_price',
            'total_price',
            'status',
            'order_date',
        ]);
    }

    public function getAll() {
        return $this->get()->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        return $this->get(['id' => $id])->get_result()->fetch_assoc();
    }

    public function create($data) {
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

    public function getJoin()
    {
        return $this->joinData(['users' => 'user_id', 'destinations' => 'destination_id'], ['users.fullname as name', 'users.phone', 'destinations.price as ticket_price'], 'INNER JOIN')->get_result();
    }

    public function getJoin2()
    {
        return $this->joinData(
            [
                'users' => 'user_id',       
                'destinations' => 'destination_id',
            ],
            [
                'users.fullname as username',        
                'users.email',                   
                'users.phone',                   
                'destinations.name as destination_name',
                'destinations.price as ticket_price',   
            ],
            'INNER JOIN'
        )->get_result();
    }

}
