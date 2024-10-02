<?php

class Controller
{
    public function __construct()
    {
        $CategoriesModel = $this->model("CategoriesModel");
        $this->data['listCategories'] = $CategoriesModel->getAllCategories();
    }
    public function model($model)
    {
        $filePath = 'App/Models/' . $model . '.php';
        if (file_exists($filePath)) {
            require_once $filePath;
            return new $model();
        } else {
            throw new Exception("Model file not found: " . $filePath);
        }
    }


    public function view($view, $data = [])
    {
        if (file_exists('App/Views/' . $view . '.php')) {
            extract($data);
            require_once 'App/Views/' . $view . '.php';
        } else {
            die("View không tồn tại");
        }
    }

}
