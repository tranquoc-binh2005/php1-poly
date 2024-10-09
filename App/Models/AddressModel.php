<?php
class AddressModel extends Database
{
    public function getProvince()
    {
        $sql = "SELECT * FROM province";
        $data = $this->getAll($sql);
        return $data;
    }
    public function getDistrict($id)
    {
        $sql = "SELECT * FROM district WHERE province_id = :id";
        $params = ['id' => $id];
        $data = $this->getAll($sql, $params);
        return $data;
    }

    public function getWard($id)
    {
        $sql = "SELECT * FROM wards WHERE district_id = :id";
        $params = ['id' => $id];
        $data = $this->getAll($sql, $params);
        return $data;
    }

    public function getNameProvince($id)
    {
        $sql = "SELECT name FROM province where province_id = :id";
        $params = ['id' => $id];
        $data = $this->getOne($sql, $params);
        return $data;
    }
    public function getNameDistrict($id)
    {
        $sql = "SELECT name FROM district WHERE district_id = :id";
        $params = ['id' => $id];
        $data = $this->getOne($sql, $params);
        return $data;
    }

    public function getNameWard($id)
    {
        $sql = "SELECT name FROM wards WHERE wards_id = :id";
        $params = ['id' => $id];
        $data = $this->getOne($sql, $params);
        return $data;
    }
}