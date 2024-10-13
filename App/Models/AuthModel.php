<?php
class AuthModel extends Database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function checkUniqueUser($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $params = ['email' => $email];

        $data = $this->getOne($sql , $params);
        return $data;
    }

    public function registerUser($name, $email, $password)
    {
        if ($this->checkUniqueUser($email)) {
            throw new Exception("Email đã tồn tại.");
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $params = [
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword,
        ];

        if ($this->insert($sql, $params)) {
            return true;
        }
        return false;
    }

    public function countUser()
    {
        $sql = "SELECT COUNT(*) AS countUser FROM users;";
        $data = $this->getOne($sql);
        return $data;
    }

}