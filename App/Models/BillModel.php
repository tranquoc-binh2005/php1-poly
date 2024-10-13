<?php
class BillModel extends Database
{
    use BillModelGettersSetters;

    public function createBill()
    {
        $sql = "INSERT INTO bill (name, phone, address, total) VALUES (:name, :phone, :address, :total)";
        $params = [
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'total' => $this->total,
        ];

        $lastId = $this->insert($sql, $params);
        return $lastId;
    }
    public function createBillDetails()
    {
        $sql = "INSERT INTO bill_details (bill_id, product_name, quantity, price) VALUES (:bill_id, :product_name, :quantity, :price)";
        $params = [
            'bill_id' => $this->bill_id,
            'product_name' => $this->product_name,
            'quantity' => $this->quantity,
            'price' => $this->price,
        ];

        $this->insert($sql, $params);
        return true;
    }

    public function getBill()
    {
        $sql = "SELECT * FROM bill WHERE status = :status";
        $params = [
            'status' => $this->status
        ];

        $data = $this->getAll($sql, $params);
        return $data;
    }

    public function getAllBill()
    {
        $sql = "SELECT * FROM bill";

        $data = $this->getAll($sql);
        return $data;
    }

    public function updateStatus()
    {
        $sql = "UPDATE bill SET status = :newStatus WHERE status = :currentStatus AND id = :id";
        $params = [
            'newStatus' => $this->newStatus,
            'currentStatus' => $this->currentStatus,
            'id' => $this->id
        ];
        $this->execute($sql, $params);
        return true;
    }

    public function countBill()
    {
        $sql = "SELECT COUNT(*) AS countBill FROM bill WHERE status = :status";
        $params = [
            'status' => $this->status,
        ];
        $data = $this->getOne($sql, $params);
        return $data;
    }

    public function countBillTotal()
    {
        $sql = "SELECT COUNT(*) AS countBill FROM bill WHERE status = 'dagh'";
        $data = $this->getOne($sql);
        return $data;
    }

    public function getTotalAmountByMonth()
    {
        $sql = "
            SELECT 
                DATE_FORMAT(created_at, '%Y-%m') AS month,
                SUM(total) AS total_amount
            FROM 
                bill
            WHERE 
                DATE_FORMAT(created_at, '%Y-%m') = :month
            GROUP BY 
                month
            ORDER BY 
                month
        ";

        $params = [
            'month' => $this->month,
        ];

        return $this->getAll($sql, $params);
    }


    public function getBillWithDetails()
    {
        $sql = "
            SELECT 
                bill.*,
                bill_details.*
            FROM 
                bill
            JOIN 
                bill_details ON bill.id = bill_details.bill_id
            WHERE 
                bill.id = :id
        ";

        $params = ['id' => $this->id];
        return $this->getAll($sql, $params);
    }




}