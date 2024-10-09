<?php

trait ProductModelGettersSetters
{
    private $name;
    private $categories;
    private $price;
    private $description;
    private $img;
    private $amount;
    private $id;
    private $entries;
    private $keyword;
    private $order;
    private $page;

    // Setters
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setImg($img)
    {
        $this->img = $img;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setEntries($entries)
    {
        $this->entries = $entries;
    }

    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
    }

    public function setOrder($order)
    {
        $this->order = $order;
    }

    public function setPage($page)
    {
        $this->page = $page;
    }

    // Getters
    public function getName()
    {
        return $this->name;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEntries()
    {
        return $this->entries;
    }

    public function getKeyword()
    {
        return $this->keyword;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function getPage()
    {
        return $this->page;
    }
}
