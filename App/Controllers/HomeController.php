<?php

class HomeController extends Controller
{
    public function index()
    {
        $ProductModel = $this->model("ProductModel");

        $entries = isset($_GET['entries']) ? (int)$_GET['entries'] : 12;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $search = isset($_GET['search']) ? $_GET['search'] : "";

        $ProductModel->setEntries($entries);
        $ProductModel->setPage($page);
        $ProductModel->setKeyword($search);

        $this->data['listProduct'] = $ProductModel->getProduct();

        $this->data['output'] = $this->foreachProduct($this->data['listProduct']);
        $this->data['path'] = 'home/home';
        $this->data['pageTitle'] = "Adam store | Vest nam thanh lịch"; 
        $this->view('home/index', $this->data);
    }

    public function getProduct()
    {
        $ProductModel = $this->model("ProductModel");

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $range = isset($_POST['range']) ? $_POST['range'] : "DESC";
            
            $ProductModel->setEntries(12);

            $entries = isset($_GET['entries']) ? (int)$_GET['entries'] : 12;
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $search = isset($_GET['search']) ? $_GET['search'] : "";

            $ProductModel->setEntries($entries);
            $ProductModel->setPage($page);
            $ProductModel->setKeyword($search);

            if ($range == "asc" || $range == "desc") {
                $ProductModel->setOrder($range); 
                $this->data['listProduct'] = $ProductModel->getProduct();
            } elseif ($range == "lowtohigh") {
                $ProductModel->setOrder("ASC");
                $this->data['listProduct'] = $ProductModel->getProductRangePrice();
            } elseif ($range == "hightolow") {
                $ProductModel->setOrder("DESC");
                $this->data['listProduct'] = $ProductModel->getProductRangePrice(); 
            }

            $output = $this->foreachProduct($this->data['listProduct']);
            echo json_encode(['html' => $output]);
        }
    }


    private function foreachProduct($productList)
    {
        $output = '';
        foreach ($productList as $productItem) {
            $output .= '<div class="best-sell">
                            <div class="best-price">
                                <img src="./Public/uploads/' . htmlspecialchars($productItem['img']) . '" alt="' . htmlspecialchars($productItem['name']) . '">
                                <div class="btn-buy btn">
                                    <a href="./product/detail/' . htmlspecialchars($productItem['id']) . '">Mua</a>
                                </div>
                            </div>
                            <div class="price-sell">
                                <p>
                                    <a href="">' . htmlspecialchars($productItem['name']) . '</a>
                                </p>';
            if ($productItem['sale'] > 0) {
                $output .= '<p>
                                <del>' . number_format($productItem['price'], 0, ',', '.') . ' VND</del> 
                                <a href="">price sale</a>
                            </p>';
            } else {
                $output .= '<p>
                                <a href="">' . number_format($productItem['price'], 0, ',', '.') . ' VND</a>
                            </p>';
            }
            $output .= '</div></div>';
        }
        return $output;
    }

    public function list()
    {
        $this->view('home/list');
    }
}
