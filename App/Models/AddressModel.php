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
}