<?php
class AuthController extends Controller
{
    public function __construct()
    {
        // echo "okay";
    }
    public function login()
    {
        $this->data['pageTitle'] = "Đăng nhập"; 
        $this->view('auth/login', $this->data);
    }
    public function register()
    {
        $this->data['pageTitle'] = "Đăng ký"; 
        $this->view('auth/register', $this->data);
    }

    public function logout()
    {
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
            alertSuccess("Thanh cong", "", "/php1");
        }
    }

    public function handleRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm = $_POST['confirm'];

            $AuthModel = $this->model("AuthModel");

            try {
                if ($AuthModel->registerUser($name, $email, $password)) {
                    echo "<script>alert('Đăng ký thành công!')</script>";
                    $this->data['pageTitle'] = "Đăng nhập"; 
                    $this->view('auth/login', $this->data);
                }
            } catch (Exception $e) {
                $this->data['pageTitle'] = "Đăng ký"; 
                $this->view('auth/register', $this->data);
                echo "<script>alert('Lỗi: " . $e->getMessage() . "')</script>";
            }
        }
    }

    public function handleLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $password = $_POST['password'];
            $email = $_POST['email'];

            $AuthModel = $this->model("AuthModel");

            try {
                if ($check = $AuthModel->checkUniqueUser($email)) {
                    if(password_verify($password, $check['password'])){
                        $_SESSION['user'] = $check;
                        if($check['rule'] == 'admin'){
                            header("location: /php1/admin");
                        } else {
                            alertSuccess("Đăng nhập thành công", "","../");
                        }
                    } else {
                        echo "<script>alert('mat khau khong hop le')</script>";
                    }
                } else {
                    echo "<script>alert('loi')</script>";
                }
            } catch (Exception $e) {
                $this->data['pageTitle'] = "Đăng ký"; 
                $this->view('auth/register', $this->data);
                echo "<script>alert('Lỗi: " . $e->getMessage() . "')</script>";
            }
        }
    }
}