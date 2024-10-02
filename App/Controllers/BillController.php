<?php
class BillController extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            alertError("Bạn chưa đăng nhập", "Vui lòng đăng nhập để sử dụng chức năng này", '/php1/auth/login');
            exit; 
        }
    }
    public function index()
    {
        $AddressModel = $this->model("AddressModel");
        $this->data['listProvince'] = $AddressModel->getProvince();
        $this->data['path'] = 'bill/index';
        $this->data['pageTitle'] = "Thanh toán"; 
        $this->view('home/index', $this->data);
    }

    public function getDistrict()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $province_id = $_POST['province_id'];

            $AddressModel = $this->model("AddressModel");
            $listDistrict = $AddressModel->getDistrict($province_id);
            
            $output = '<option value="">Chọn quận/huyện</option>';
            foreach ($listDistrict as $district) {
                $output .= '<option value="' . $district['district_id'] . '">' . $district['name'] . '</option>';
            }

            echo json_encode(['html' => $output]);
            exit;
        }
    }

    public function getWard()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $district_id = $_POST['district_id'];

            $AddressModel = $this->model("AddressModel");
            $wards = $AddressModel->getWard($district_id);
            
            $output = '<option value="">Chọn Phường/Xã</option>';
            foreach ($wards as $ward) {
                $output .= '<option value="' . $ward['wards_id'] . '">' . $ward['name'] . '</option>';
            }

            echo json_encode(['html' => $output]);
            exit;
        }
    }

    public function getBill()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $province_id = $_POST['province'];
            $district_id = $_POST['district'];
            $ward_id = $_POST['ward'];
            $address = $_POST['address'];
            $fullAddress = $address . ', ' . $ward_id . ', ' . $district_id . ', ' . $province_id;

            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $name = $lastname . " " . $firstname;
            $phone = $_POST['phone'];
            $hinhthucthanhtoan = $_POST['hinhthucthanhtoan'];

            $BillModel = $this->model("BillModel");
            $lastId = $BillModel->createBill($name, $fullAddress, $phone, 1000000);
            if($lastId){
                foreach ($_SESSION['cart'] as $key => $value) {
                    $BillModel->createBillDetails($lastId, $value['name'], $value['soluong'], $value['price']);
                    unset($_SESSION['cart']);
                }
                alertSuccess("Thanh cong", "", "../home");
            } else {
                echo "loi insert";
            }
        }
    }
}