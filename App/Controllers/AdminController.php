<?php
class AdminController extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: ./auth/login");
            exit; 
        }
        if (isset($_SESSION['user']) && $_SESSION['user']['rule'] == "user") {
            header("Location: ./home"); 
            exit;
        }
    }
    public function export()
    {
        echo 'export';
        if (isset($_GET['export']) && $_GET['export'] == "excel") {

            header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
            header("Content-Disposition: attachment; filename=product_adam_store.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
        
            $ProductModel = $this->model("ProductModel");
            $data = $ProductModel->getProduct(999999);
            echo "<table border='1' cellpadding='5' cellspacing='0'>";
            echo "<tr>
                    <th>Id</th>
                    <th>Ten</th>
                    <th>Hinh anh</th>
                    <th>Gia</th>
                    <th>Ghi chu</th>
                    <th>So luong</th>
                    <th>Luot ban</th>
                    <th>Giam gia</th>
                    <th>Trang thai</th>
                    <th>Ngay tao</th>
                </tr>";
        
            foreach ($data as $row) {
                $pathImg = "./Public/uploads/".$row['img'];
                echo '<tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['name'].'</td>
                        <td>'.$pathImg.'</td>
                        <td>'.$row['price'].'</td>
                        <td>'.$row['description'].'</td>
                        <td>'.$row['amount'].'</td>
                        <td>'.$row['selled'].'</td>
                        <td>'.$row['sale'].'</td>
                        <td>'.$row['status'].'</td>
                        <td>'.$row['created_at'].'</td>
                    </tr>';
            }
        
            echo "</table>";
        }
    }
    public function index()
    {
        $this->data['pageTitle'] = "Trang quan ly"; 
        $this->data['path'] = "dashboard/home"; 
        $this->view('backend/dashboard/index', $this->data);
    }

    public function categories()
    {
        $CategoriesModel = $this->model("CategoriesModel");
        $this->data['listCategories'] = $CategoriesModel->getAllCategories();

        $this->data['pageTitle'] = "Trang quan ly danh muc"; 
        $this->data['path'] = "dashboard/category"; 
        $this->view('backend/dashboard/index', $this->data);
    }

    public function createCategories()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $name = $_POST['name'];
            $slug = $_POST['slug'];

            $CategoriesModel = $this->model("CategoriesModel");

            if($CategoriesModel->createCategories($name, $slug)){
                $pathSuccess = "../admin/categories";
                alertSuccess("Thành công", "Bạn vừa thêm một danh mục", $pathSuccess);
            } else {
                echo "Lỗi";
            }
        }
    }

    public function editCategories()
    {
        if(isset($_POST['categories_id']) && ($_POST['categories_id'])){
            $categories_id = $_POST['categories_id'];

            $CategoriesModel = $this->model("CategoriesModel");
            $categories = $CategoriesModel->getOneCategories($categories_id);
            if ($categories) {
                echo json_encode($categories);
            } else {
                echo json_encode(['error' => 'Category not found.']);
            }
        } else {
            echo json_encode(['error' => 'Invalid category ID.']);
        }
    }

    public function handleUpdateCategories()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $name = $_POST['nameCategoriesEdit'];
            $id = $_POST['idCategoriesEdit'];
            $slug = $_POST['slugCategoriesEdit'];

            $CategoriesModel = $this->model("CategoriesModel");
            if($CategoriesModel->updateCategories($id, $name, $slug)){
                $pathSuccess = "../admin/categories";
                alertSuccess("Thành công", "Danh mục sản phẩm đã được cập nhật", $pathSuccess);
            } else {
                $pathError = "../admin/categories";
                alertError("Thất bại", "Có lỗi trong quá trình cập nhật", $pathError);
            }
        }
    }

    public function deleteCategories($id)
    {
        if(isset($id)){
            $pathSuccess = "../../admin/handleDeleteCategories/". $id;
            $pathError = "../../admin/categories";
            delete("Cảnh báo", "Bạn có muốn xoá danh mục này!", $pathSuccess, $pathError);
        }
    }

    public function handleDeleteCategories($id)
    {
        if(isset($id)){
            $CategoriesModel = $this->model("CategoriesModel");
            $CategoriesModel->getId($id);
            if($CategoriesModel->deleteCategories($id)){
                alertSuccess("Thành công", "", "../../admin/categories");
            }
        }
    }

    public function product() //
    {
        $ProductModel = $this->model("ProductModel");

        $entries = isset($_GET['entries']) ? (int)$_GET['entries'] : 5;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $search = isset($_GET['search']) ? $_GET['search'] : "";

        $ProductModel->setEntries($entries);
        $ProductModel->setPage($page);
        $ProductModel->setKeyword($search);
        $ProductModel->setOrder("DESC");

        $CategoriesModel = $this->model("CategoriesModel");
        $this->data['listCategories'] = $CategoriesModel->getAllCategories();

        $popup = "";

        $listProduct = $ProductModel->getProduct();
        if (empty($listProduct)) {
            $popup = "Không tìm thấy sản phẩm nào";
        }

        $totalProducts = $ProductModel->getTotalProducts();

        $this->data['totalPages'] = ceil($totalProducts / $entries); // hàm ceil dùng để làm tròn
        $this->data['listProduct'] = $listProduct;
        $this->data['popup'] = $popup;
        $this->data['entries'] = $entries;
        $this->data['pageTitle'] = "Trang quản lý sản phẩm"; 
        $this->data['path'] = "dashboard/home"; 

        $this->view('backend/dashboard/index', $this->data);
    }



    public function bill()
    {
        $this->data['pageTitle'] = "Trang quan ly don hang"; 
        $this->data['path'] = "dashboard/bill"; 
        $this->view('backend/dashboard/index', $this->data);
    }
    public function baiviet()
    {
        $this->data['pageTitle'] = "Trang quan ly don hang"; 
        $this->data['path'] = "dashboard/baiviet"; 
        $this->view('backend/dashboard/index', $this->data);
    }

    public function createProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST"){

            $name = $_POST['name'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $amount = $_POST['amount'];

            $ProductModel = $this->model("ProductModel");

            $target_dir = "./Public/uploads/";

            $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

            $randomFileName = uniqid() . '.' . $imageFileType;
            $target_file = $target_dir . $randomFileName;
            $uploadOk = 1;

            if (file_exists($target_file)) {
                echo "File đã tồn tại.";
                $uploadOk = 0;
            }

            if ($uploadOk == 0) {
                echo "File không được tải lên.";
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $ProductModel->setName($name);
                    $ProductModel->setCategories($category);
                    $ProductModel->setPrice($price);
                    $ProductModel->setDescription($description);
                    $ProductModel->setImg($randomFileName);
                    $ProductModel->setAmount($amount);
                    $ProductModel->createProduct();
                    alertSuccess("Thành công", "Tạo sản phẩm thành công!","../admin/product");
                } else {
                    echo "Lỗi";
                }
            }
        }
    }
    public function deleteProduct($id)
    {
        if(isset($id)){
            $pathSuccess = "../../admin/handleDeleteProduct/". $id;
            $pathError = "../../admin/product";
            delete("Cảnh báo", "Bạn có muốn xoá sản phẩm này!", $pathSuccess, $pathError);
        } else {
            echo "khong tim thay id";
        }
    }

    public function handleDeleteProduct($id)
    {
        if (isset($id)) {
            $ProductModel = $this->model("ProductModel");
            $ProductModel->setId($id);

            if ($ProductModel->deleteProduct()) {
                alertSuccess("Thành công", "", "../../admin/product");
            } else {
                alertError("Thất bại", "Không thể xóa sản phẩm", "../../admin/product");
            }
        } else {
            alertError("Thất bại", "ID sản phẩm không hợp lệ", "../../admin/product");
        }
    }


    public function editProduct()
    {
        if (isset($_POST['product_id']) && ($_POST['product_id'])) {
            $product_id = $_POST['product_id'];

            $ProductModel = $this->model("ProductModel");
            $ProductModel->setId($product_id);
            
            $product = $ProductModel->getOneProduct();
            if ($product) {
                echo json_encode($product);
            } else {
                echo json_encode(['error' => 'product not found.']);
            }
        } else {
            echo json_encode(['error' => 'Invalid product ID.']);
        }
    }


    public function handleUpdateProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_POST['idProductEdit'];
            $name = $_POST['nameProductEdit'];
            $category = $_POST['categoryProductEdit'];
            $price = $_POST['priceProductEdit'];
            $description = $_POST['descriptionProductEdit'];
            $amount = $_POST['amountProductEdit'];

            $ProductModel = $this->model("ProductModel");

            $target_dir = "./Public/uploads/";

            $img = null; 

            if (isset($_FILES["imgProductEdit"]) && $_FILES["imgProductEdit"]["error"] == UPLOAD_ERR_OK) {
                $imageFileType = strtolower(pathinfo($_FILES["imgProductEdit"]["name"], PATHINFO_EXTENSION));
                $randomFileName = uniqid() . '.' . $imageFileType;
                $target_file = $target_dir . $randomFileName;

                if (move_uploaded_file($_FILES["imgProductEdit"]["tmp_name"], $target_file)) {
                    $img = $randomFileName;
                } else {
                    echo "Loi";
                    return;
                }
            }

            $ProductModel->setName($name);
            $ProductModel->setCategories($category);
            $ProductModel->setPrice($price);
            $ProductModel->setDescription($description);
            $ProductModel->setAmount($amount);

            if ($img !== null) {
                $ProductModel->setImg($img);
            }

            if ($ProductModel->updateProduct($id)) {
                alertSuccess("Thành công", "Cập nhật thành công!", "../admin/product");
            } else {
                alertError("Thất bại", "Đã có lỗi trong quá trình cập nhật", "../admin/product");
            }
        }
    }


}