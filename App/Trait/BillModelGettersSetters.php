<?php
trait BillModelGettersSetters
{
    private $name;
    private $id;
    private $address;
    private $total;
    private $phone;
    private $bill_id;
    private $product_name;
    private $quantity;
    private $price;
    private $status;
    private $newStatus;
    private $currentStatus;
    private $month;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function setBill_Id($bill_id)
    {
        $this->bill_id = $bill_id;
    }

    public function setProduct_Name($product_name)
    {
        $this->product_name = $product_name;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setNewStatus($newStatus)
    {
        $this->newStatus = $newStatus;
    }

    public function setCurrentStatus($currentStatus)
    {
        $this->currentStatus = $currentStatus;
    }

    public function setMonth($month)
    {
        $this->month = $month;
    }
}