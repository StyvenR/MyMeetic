<?php

require_once "../Models/Users.php";

class UpdateProfile {

  private $updateProfile;

  public function __construct(){
    $this->updateProfile = new UsersModel();
  }

  public function update_profile($id,$firstname,$lastname,$email,$gender,$city){
    $this->updateProfile->update_profile($id,$firstname,$lastname,$email,$gender,$city);
  }
}
$controller_update = new UpdateProfile();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $controller_update->update_profile($_POST['id'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['gender'], $_POST['city']);
  header('Location: ../Views/user_profile.php');
  exit();
}