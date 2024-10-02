<?php
class ProductModel extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    private $name;
    private $categories;
    private $price;
    private $description;
    private $img;
    private $amount;
    private $id;

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

    public function createProduct()
    {
        $sql = "INSERT INTO product (name, categories, price, description, img, amount) 
                VALUES (:name, :categories, :price, :description, :img, :amount)";
        
        $params = [
            'name' => $this->name,
            'categories' => $this->categories,
            'price' => $this->price,
            'description' => $this->description,
            'img' => $this->img,
            'amount' => $this->amount,
        ];

        $this->insert($sql, $params);
        return true;
    }

    public function updateProduct($id)
    {
        $sql = "UPDATE product SET name = :name, categories = :categories, price = :price, description = :description, amount = :amount";
        
        if ($this->img !== null) {
            $sql .= ", img = :img";
        }
        
        $sql .= " WHERE id = :id";

        $params = [
            'id' => $id, 
            'name' => $this->name,
            'categories' => $this->categories,
            'price' => $this->price,
            'description' => $this->description,
            'amount' => $this->amount,
        ];

        if ($this->img !== null) {
            $params['img'] = $this->img;
        }

        $this->execute($sql, $params);
        return true;
    }

    private $entries;
    private $keyword;
    private $order;
    private $page;

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

    public function getProduct()
    {
        $offset = ($this->getPage() - 1) * $this->getEntries();
        
        $sql = "SELECT * FROM product WHERE 1";
        if (!empty($this->getKeyword())) {
            $sql .= " AND (name LIKE :keyword OR description LIKE :keyword)";
        }
        $sql .= " ORDER BY id " . $this->getOrder();
        $sql .= " LIMIT " . (int) $this->getEntries() . " OFFSET " . $offset;
        
        $params = [];
        
        if (!empty($this->getKeyword())) {
            $params['keyword'] = '%' . $this->getKeyword() . '%';
        }
        
        $data = $this->getAll($sql, $params);
        return $data;
    }

    public function getProductRangePrice()
    {
        $sql = "SELECT * FROM product ORDER BY price " . $this->order . " LIMIT " . $this->entries;
        $data = $this->getAll($sql);
        return $data;
    }

    public function getOneProduct()
    {
        $sql = "SELECT * FROM product WHERE id = :id";
        $params = ['id' => $this->getId()];

        $data = $this->getOne($sql, $params);
        return $data;
    }

    public function getRelatedProducts($categoryId, $productId)
    {
        $sql = "SELECT * FROM product WHERE categories = :categoryId AND id != :productId";
        $params = [
            'categoryId' => $categoryId,
            'productId' => $productId
        ];

        $data = $this->getAll($sql, $params);
        return $data;
    }

    public function getTotalProducts()
    {
        $sql = "SELECT COUNT(*) as total FROM product WHERE 1";
        
        if (!empty($this->getKeyword())) {
            $sql .= " AND (name LIKE :keyword OR description LIKE :keyword)";
        }

        $params = [];
        
        if (!empty($this->getKeyword())) {
            $params['keyword'] = '%' . $this->getKeyword() . '%';
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total'];
    }

    public function deleteProduct()
    {
        if ($this->getId()) {
            $sql = "DELETE FROM product WHERE id = :id";
            $params = ['id' => $this->getId()];

            $this->execute($sql, $params);
            return true;
        }
        return false;
    }
}
