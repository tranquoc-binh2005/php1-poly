<?php
class BillModel extends Database
{
    public function createBill($name, $address, $phone, $total)
    {
        $sql = "INSERT INTO bill (name, phone, address, total) VALUES (:name, :phone, :address, :total)";
        $params = [
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'total' => $total,
        ];

        $lastId = $this->insert($sql, $params);
        return $lastId;
    }
    public function createBillDetails($bill_id, $product_name, $quantity, $price)
    {
        $sql = "INSERT INTO bill_details (bill_id, product_name, quantity, price) VALUES (:bill_id, :product_name, :quantity, :price)";
        $params = [
            'bill_id' => $bill_id,
            'product_name' => $product_name,
            'quantity' => $quantity,
            'price' => $price,
        ];

        $this->insert($sql, $params);
        return true;
    }
}