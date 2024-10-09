<?php
class VoucherModel extends Database
{
    use VoucherModelGettersSetters;

    public function __construct()
    {
        parent::__construct();
    }

    public function createVoucher()
    {
        $sql = "INSERT INTO voucher (name, slug, deal, created_at, dated_at) 
        VALUES (:name, :slug, :deal, :created_at, :dated_at)";

        $params = [
            'name' => $this->name,
            'slug' => $this->slug,
            'deal' => $this->deal,
            'created_at' => $this->created,
            'dated_at' => $this->dated,
        ];

        $this->insert($sql, $params);
        return true;
    }

    public function getAllVoucher()
    {
        $sql = "SELECT * FROM voucher ORDER BY id DESC";
        $data = $this->getAll($sql);
        return $data;
    }

    public function getAllVoucherDated()
    {
        $currentDate = date('Y-m-d H:i:s'); 
        $sql = "SELECT * FROM voucher WHERE dated_at > :currentDate ORDER BY id DESC";
        $params = ['currentDate' => $currentDate];

        $data = $this->getAll($sql, $params);
        return $data;
    }



    public function getOneVoucher($id)
    {
        $sql = "SELECT * FROM voucher WHERE id = :id";
        $params = ['id' => $this->id];
        $data = $this->getOne($sql, $params);
        return $data;
    }

    public function deleteVoucher()
    {
        $sql = "DELETE FROM voucher WHERE id = :id";
        $params = ['id' => $this->id];

        try {
            $this->execute($sql, $params);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function updateVoucher()
    {
        $sql = "UPDATE voucher 
                SET name = :name, slug = :slug, deal = :deal
                WHERE id = :id";
        
        $params = [
            ':name' => $this->name,
            ':slug' => $this->slug,
            ':deal' => $this->deal,
            ':id' => $this->id
        ];

        return $this->execute($sql, $params);
    }

}