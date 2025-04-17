<?php
require_once (dirname((__DIR__)) . '/Config/Database.php');

class UsersModel
{
  private $usersDB;

  public function __construct()
  {
    $conn = new Database();
    $this->usersDB = $conn->connect();
  }
  // Register method
  public function getAllUsers()
  {
    $query = $this->usersDB->prepare("SELECT * FROM users");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }
  public function getUserIDByEmail($email)
  {
    $query = $this->usersDB->prepare("SELECT id FROM users WHERE email = :email");
    $query->bindParam(':email', $email);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }
  public function addUser($email, $firstname, $lastname, $birthdate, $city, $gender, $password)
  {
    $query = $this->usersDB->prepare("INSERT INTO users (email, firstname, lastname, birthdate, age, city, gender, password) VALUES (:email, :firstname, :lastname, :birthdate, :age, :city, :gender, :password)");
    $query->bindParam(':email', $email);
    $query->bindParam(':firstname', $firstname);
    $query->bindParam(':lastname', $lastname);
    $query->bindParam(':birthdate', $birthdate);
    $age = $this->getAge($birthdate);
    $query->bindParam(':age', $age);
    $query->bindParam(':city', $city);
    $query->bindParam(':gender', $gender);
    $hashedPassword = md5($password);
    $query->bindParam(':password', $hashedPassword);
    $query->execute();
    header('Location: ../Views/LoginView.php');
  }
  public function deleteUser($userID)
  {
    $query = $this->usersDB->prepare("UPDATE FROM users SET statut = '0' WHERE id = $userID");
    $query->execute();
  }
  public function authenticate_login($email, $password) {
    $query = $this->usersDB->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $query->bindParam(':email', $email);
    $hashedPassword = md5($password);
    $query->bindParam(':password', $hashedPassword); // Exemple de hachage de mot de passe
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}
  public function getAge($date)
  {
    return intval(date('Y', time() - strtotime($date))) - 1970;
  }
  // Login method
  public function verif_login_password($email, $password)
  {
    $query = $this->usersDB->prepare("SELECT password FROM users WHERE email = :email");
    $query->bindParam(':email', $email);
    $query->execute();
    $result = $query->fetch();
    var_dump($password);
    if ($result && md5($password) === $result['password']) {
      return true;
    } else {
      return false;
    }
  }

  //Update
  public function update_profile($id, $firstname, $lastname, $email, $gender, $city){
    $query = $this->usersDB->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, gender = :gender, city = :city WHERE id = :id");
    $query->bindParam(':firstname', $firstname );
    $query->bindParam(':lastname', $lastname );
    $query->bindParam(':email', $email );
    $query->bindParam(':gender', $gender );
    $query->bindParam(':city', $city );
    $query->bindParam(':id', $id);
    $query->execute();
  }
}
