<?php
require_once '../Models/Users.php';


class RegisterController
{
    private $usersModel;
    private $birthdate;
    private $password;
    private $confirm_password;
    public function __construct($birthdate, $password, $confirm_password)
    {
        $this->birthdate = $birthdate;
        $this->password = $password;
        $this->confirm_password = $confirm_password;
        $this->usersModel = new UsersModel();
        $this->authenticate_register();
    }

    public function index()
    {
        // $users = $this->usersModel->getAllUsers();
        // require(dirname((__DIR__)) . '../Views/RegisterView.php');

    }
    public function getUserIDByEmail($email)
    {
        return $this->usersModel->getUserIDByEmail($email);
    }
    public function addUser($email, $firstname, $lastname, $birthdate, $city, $gender, $password)
    {
        $this->usersModel->addUser($email, $firstname, $lastname, $birthdate, $city, $gender, $password);
    }

    public function deleteUser($userID)
    {
        $this->usersModel->deleteUser($userID);
        header('Location: ../index.php');
    }
    private function is_major()
    {
        $date = new DateTime($this->birthdate);
        $now = new DateTime();
        $interval = $now->diff($date);
        return ($interval->y >= 18 && $interval->y <= 100);
    }
    private function is_password_confirm()
    {
        return ($this->password === $this->confirm_password);
    }
    public function authenticate_register()
    {
        if ($this->is_major() && $this->is_password_confirm()) {
            return true;
        }
        return false;
    }
}

$controller = new RegisterController($_POST['birthdate'], $_POST['password'], $_POST['confirm_password']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $controller->authenticate_register()) {
    $controller->addUser($_POST['email'], $_POST['firstname'], $_POST['lastname'], $_POST['birthdate'], $_POST['city'], $_POST['gender'], $_POST['password']);
    header('Location: ../Views/HobbiesView.php?email=' . urlencode($_POST['email']));
    exit();
} else {
    header('Location: index.php');
}


?>