<?php
class CartController extends Controller
{
    public function index()
    {
        $this->data['path'] = 'cart/index';
        $this->data['pageTitle'] = "Gio hangf"; 
        $this->view('home/index', $this->data);
    }
    
    public function addCart($id)
    {
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $ProductModel = $this->model("ProductModel");
            $amount = $_POST['soluong'];

            if ($data = $ProductModel->getOneProduct($id)) {
                if (!$this->isProductInCart($id)) {
                    $data['soluong'] = $amount;
                    $_SESSION['cart'][] = $data;
                }
            }

            header("location: /php1/cart");
        }
    }

    public function updateCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $newAmount = $_POST['soluong'];

            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as &$item) {
                    if ($item['id'] == $id) {
                        $item['soluong'] = $newAmount;
                        break;
                    }
                }
            }
            echo json_encode(['status' => 'success', 'message' => 'Cart updated']);
            exit;
        }
    }

    private function isProductInCart($id)
    {
        foreach ($_SESSION['cart'] as $index => $item) {
            if ($item['id'] == $id) {
                return $index;
            }
        }
        return false; 
    }


    public function deleteCart($id)
    {
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $cartItem) {
                if ($cartItem['id'] == $id) {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                    alertSuccess("Thành công", "","../../cart/index");
                }
            }
        }
    }

}