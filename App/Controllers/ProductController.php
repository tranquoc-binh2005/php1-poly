<?php

class ProductController extends Controller
{
    public function index()
    {
        $this->data['path'] = 'product/index';
        $this->data['pageTitle'] = "Sản phẩm"; 
        $this->view('home/index', $this->data);
    }

    public function detail($id)
    {
        $ProductModel = $this->model("ProductModel");
        $ProductModel->setId($id);
            
        $product = $ProductModel->getOneProduct();

        $this->data['product'] = $product;

        $this->data['getRelatedProducts'] = $ProductModel->getRelatedProducts($this->data['product']['categories'], $id);

        $this->data['path'] = 'product/detail';
        $this->data['pageTitle'] = "Sản phẩm"; 
        $this->view('home/index', $this->data);
    }
}
