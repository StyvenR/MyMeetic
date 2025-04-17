<?php
require '../Models/Users.php';
class LoginController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UsersModel();
    }

    public function login($email, $password)
    {
        if ($this->userModel->verif_login_password($email, $password)) {
            $user = $this->userModel->authenticate_login($email, $password);
            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                header('Location: ../Views/user_profile.php');
            } 
        }else {
            header('Location: ../Views/LoginView.html');
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: ../index.php');
    }
}


$controller_login = new LoginController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller_login->login($_POST['email'], $_POST['password']);
}