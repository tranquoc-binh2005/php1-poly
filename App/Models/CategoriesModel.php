<?php
class CategoriesModel extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function createCategories($name, $slug)
    {
        $sql = "INSERT INTO categories (name, slug) VALUES (:name, :slug)";
        $params = [
            'name' => $name,
            'slug' => $slug
        ];

        $this->insert($sql, $params);
        return true;
    }

    public function getAllCategories()
    {
        $sql = "SELECT * FROM categories ORDER BY id DESC";
        $data = $this->getAll($sql);
        return $data;
    }

    public function getOneCategories($id)
    {
        $sql = "SELECT * FROM categories WHERE id = :id";
        $params = ['id' => $id];
        $data = $this->getOne($sql, $params);
        return $data;
    }

    public function deleteCategories($id)
    {
        $sql = "DELETE FROM categories WHERE id = :id";
        $params = ['id' => $id];

        $this->execute($sql, $params);

        return true;
    }
    public function updateCategories($id, $name, $slug)
    {
        $sql = "UPDATE categories 
                SET name = :name, slug = :slug
                WHERE id = :id";
        
        $params = [
            ':name' => $name,
            ':slug' => $slug,
            ':id' => $id
        ];

        return $this->execute($sql, $params);
    }

} 