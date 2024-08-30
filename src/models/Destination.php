<?php

namespace MyApp\Models;

use MyApp\Core\Database;

class Destination extends Database
{
    private $cacheFile;
    private $expirationTime;
    private $cacheDiscountFile;

    public function __construct()
    {
        parent::__construct();
        $this->setTableName('destinations');
        $this->setColumn([
            'id',
            'name',
            'descriptions',
            'images',
            'price',
            'rating',
            'location',
            'tags',
            'ordered',
            'videos',
            'open_time',
            'close_time',
            'category_id',
            'city_id'
        ]);

        $this->cacheFile = __DIR__ . '/../cache/destination.dat';
        $this->cacheDiscountFile = __DIR__ . '/../cache/discount.dat';
        $this->expirationTime = 600;
    }

    public function getDiscountData($limit)
    {
        if (file_exists($this->cacheDiscountFile) && (time() - filemtime($this->cacheDiscountFile) < $this->expirationTime)) {
            $data = file_get_contents($this->cacheDiscountFile);
            if ($data !== false) {
                $data = unserialize($data);
            } else {
                $data = [];
            }
        } else {
            $data = $this->generateDiscountData($limit);
            file_put_contents($this->cacheDiscountFile, serialize($data));
        }
        return $data;
    }

    private function generateDiscountData($limit)
    {
        return array_map(function () {
            return $this->randomNumber();
        }, range(1, $limit));
    }

    private function randomNumber()
    {
        $number = [
            10,
            30,
            15,
            25,
            40,
            35,
            5,
            50,
            60,
            20,
            45,
            65,
            55,
            70,
        ];

        return $number[array_rand($number)];
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

    public function randomDestination($limit)
    {
        if (file_exists($this->cacheFile) && (time() - filemtime($this->cacheFile) < $this->expirationTime)) {
            $cachedData = file_get_contents($this->cacheFile);
            if ($cachedData !== false) {
                $cachedData = unserialize($cachedData);
                if ($cachedData === false) {
                    $cachedData = [];
                }
            } else {
                $cachedData = [];
            }
        } else {
            $cachedData = [];
        }

        if (!isset($cachedData[$limit])) {
            $data = $this->randomData($limit);
            $cachedData[$limit] = $data;

            file_put_contents($this->cacheFile, serialize($cachedData));
        } else {
            $data = $cachedData[$limit];
        }

        return $data;
    }

    public function getById($id)
    {
        return $this->get(['id' => $id])->get_result();
    }

    public function getImages($id)
    {
        return $this->get(['id' => $id])->get_result()->fetch_assoc()['images'];
    }

    public function getByCategory($id)
    {
        return $this->get(['category_id' => $id])->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getByCity($id)
    {
        return $this->get(['city_id' => $id])->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
