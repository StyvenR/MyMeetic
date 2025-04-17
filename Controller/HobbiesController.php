<?php
require_once '../Models/Hobbies.php';
require_once '../Views/HobbiesView.php';
class HobbiesController
{
  private $hobbiesModel;
  public function __construct()
  {
    $this->hobbiesModel = new Hobbies();
  }
  public function add_hobby($user_id, $hobbies)
  {
    $this->hobbiesModel->add_hobby($user_id, $hobbies);
  }

  public function get_id_user($email)
  {
    return $this->hobbiesModel->get_id_user($email);
  }

  public function get_hobbies($user_id)
  {
    return $this->hobbiesModel->get_hobbies($user_id);
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller_hobbies = new HobbiesController();
    $email = urldecode($_GET['email']);
    $id = $controller_hobbies->get_id_user($email);
    foreach ($_POST['hobbies'] as $hobby) {
      $controller_hobbies->add_hobby($id, $hobby);
    }
    header('Location: ../Views/LoginView.html');
}