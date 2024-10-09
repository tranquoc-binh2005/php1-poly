<?php
trait VoucherModelGettersSetters
{
    private $id;
    private $name;
    private $slug;
    private $deal;
    private $created;
    private $dated;


    public function setId($id)
    {
        $this->id = $id;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }
    public function setDeal($deal)
    {
        $this->deal = $deal;
    }
    public function setDayCreate($created)
    {
        $this->created = $created;
    }
    public function setDayDated($dated)
    {
        $this->dated = $dated;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getSlug()
    {
        return $this->slug;
    }
    public function getDeal()
    {
        return $this->deal;
    }
    public function getDayCreate()
    {
        return $this->created;
    }
    public function getDayDated()
    {
        return $this->dated;
    }
}