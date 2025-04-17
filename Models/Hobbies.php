<?php
require_once '../Models/Users.php';
require_once '../Config/Database.php';
class Hobbies
{
  private $user;
  public function __construct()
  {
    $conn = new Database();
    $this->user = $conn->connect();
  }
  public function add_hobby($user_id, $id_hobbies)
  {
    $query = $this->user->prepare("INSERT INTO users_hobbies (id_user, id_hobbies) VALUES (:user_id, :hobby)");
    $query->bindParam(':user_id', $user_id);
    $query->bindParam(':hobby', $id_hobbies);
    $query->execute();
  }
  public function get_hobbies($id_user)
  {
    $query = $this->user->prepare("SELECT * FROM users_hobbies WHERE id_user = :id_user");
    $query->bindParam(':id_user', $id_user);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }
  public function get_hobbies_with_names($user_id)
  {
    $hobbies = $this->get_hobbies($user_id);
    $hobbies_with_names = [];
    foreach ($hobbies as $hobby) {
      $query = $this->user->prepare("SELECT name FROM hobbies WHERE id = :id_hobby");
      $query->bindParam(':id_hobby', $hobby['id_hobbies']);
      $query->execute();
      $hobby_name = $query->fetch(PDO::FETCH_ASSOC);
      if ($hobby_name) {
        $hobbies_with_names[] = $hobby_name['name'];
      }
    }
    return $hobbies_with_names;
  }
  public function get_id_user($email)
  {
    $query = $this->user->prepare("SELECT id FROM users WHERE email = :email");
    $query->bindParam(':email', $email);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return (int)$result['id'];
  }
}