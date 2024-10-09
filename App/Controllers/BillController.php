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

        $VoucherModel = $this->model("VoucherModel");
        $this->data['listVoucher'] = $VoucherModel->getAllVoucherDated();
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
            $AddressModel = $this->model("AddressModel");

            $province_id = $_POST['province'];
            $provinceName = $AddressModel->getNameProvince($province_id);
            $district_id = $_POST['district'];
            $districtName = $AddressModel->getNameDistrict($district_id);
            $ward_id = $_POST['ward'];
            $wardName = $AddressModel->getNameWard($ward_id);
            $address = $_POST['address'];
            $fullAddress = $address . ', ' . $wardName['name'] . ', ' . $districtName['name'] . ', ' . $provinceName['name'];

            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $name = $lastname . " " . $firstname;
            $phone = $_POST['phone'];
            $hinhthucthanhtoan = $_POST['hinhthucthanhtoan'];
            $tongtien = $_POST['tongtien'];

            $BillModel = $this->model("BillModel");
            $lastId = $BillModel->createBill($name, $fullAddress, $phone, $tongtien);
            if($lastId){
                foreach ($_SESSION['cart'] as $key => $value) {
                    $BillModel->createBillDetails($lastId, $value['name'], $value['soluong'], $value['price']);
                }
                alertSuccess("Thanh cong", "", "../Mail/sendmail.php");
            } else {
                echo "loi insert";
            }
        }
    }

    public function caculateTotal()
    {
        if (isset($_POST['total']) && isset($_POST['deal'])) {
            $total = (float)$_POST['total'];
            $deal = (float)$_POST['deal'];
        
            $discountedTotal = $total - ($total * $deal / 100);
        
            echo json_encode(['total' => number_format($discountedTotal, 0, ',', '.') . " VND", 'totalNum' => $discountedTotal]);
        }
    }
}