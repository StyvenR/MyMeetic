<?php
require 'Config/Database.php';
$conn = new Database();
$conn = $conn->connect();
$query = $conn->query('SELECT * FROM users');
$carrouselUsers = array('firstname' => array(), 'lastname' => array(), 'gender' => array(), 'age' => array(), 'city' => array());
if ($query->rowCount() > 0) {
  while ($userData = $query->fetch()) {
    array_push($carrouselUsers['firstname'], $userData['firstname']);
    array_push($carrouselUsers['lastname'], $userData['lastname']);
    array_push($carrouselUsers['gender'], $userData['gender']);
    array_push($carrouselUsers['age'], $userData['age']);
    array_push($carrouselUsers['city'], $userData['city']);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  <script src="carrousel.js"></script>
  <title>Meetic</title>
</head>

<body class="bg-gradient-to-r  from-pink-500 via-red-500 to-orange-300 min-h-screen">
  <nav class="bg-pink-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
      <a href="#" class="text-white text-lg font-bold">My Meetic</a>
      <div class="space-x-4">
        <a href="#" class="text-gray-300 hover:text-white">Home</a>
        <a href="#" class="text-gray-300 hover:text-white">About</a>
        <a href="#" class="text-gray-300 hover:text-white">Services</a>
        <a href="Views/LoginView.html" class="text-gray-300 hover:text-white">Se connecter</a>
      </div>
    </div>
  </nav>
  <div class="container mx-auto mt-20 bg-light-200">
    <div class="flex ml-20">
      <div class="col-span-2">
        <h1 class="text-4xl font-bold text-white">Rencontrez de nouvelles personnes</h1>
        <p class="text-gray-200">Découvrez des profils intéressants et commencez à créer des connexions significatives dès aujourd'hui.</p>
      </div>
      <div class="float-right">
      </div>
    </div>
    <div class="container mt-20 flex mx-auto">
      <?php
      $i = 0;
      while ($i < count($carrouselUsers['firstname'])) {
        echo '<div class="slider mx-auto">';
        echo '<img class="bg-light-100" src="assets/' . $carrouselUsers['gender'][$i] . 'PP.png" width="200px" height="200px" alt="profile picture">';
        echo '<div class="bg-white bg-opacity-80 p-4 rounded-lg shadow-2xl">';
        echo '<p class="text-xl font-bold">' . $carrouselUsers['firstname'][$i] . ' ' . $carrouselUsers['lastname'][$i] . '</p>';
        echo '<p class="text-gray-800">' . $carrouselUsers['age'][$i] . '</p>';
        echo '<p class="text-gray-700">' . $carrouselUsers['gender'][$i] . '</p>';
        echo '<p class="text-gray-600">' . $carrouselUsers['city'][$i] . '</p>';
        echo '<button class="bg-pink-700 text-white p-2 rounded-lg cursor-pointer">Profile</button>';
        echo '</div>';
        echo '</div>';
        $i++;
      }
      ?>
    </div>
  </div>
  <section class="bg-white bg-opacity-70 p-10 mt-20">
    <div class="container mx-auto text-left">
      <h2 class="text-3xl font-bold text-pink-800">Pourquoi choisir My Meetic ?</h2>
      <p class="text-gray-700 mt-4">Chez My Meetic, nous croyons en la création de connexions significatives. Notre plateforme est conçue pour vous aider à trouver votre partenaire idéal, que vous recherchiez l'amitié, la romance ou quelque chose entre les deux. Avec une communauté d'utilisateurs diversifiée, des algorithmes de correspondance avancés et un engagement envers la sécurité et la confidentialité, My Meetic est l'endroit idéal pour commencer votre voyage.</p>
      <div class="mt-10">
        <h3 class="text-2xl font-bold text-pink-800">Caractéristiques</h3>
        <ul class="list-disc list-inside text-gray-700 mt-4">
          <li>Algorithmes de correspondance avancés pour trouver des partenaires compatibles</li>
          <li>Système de messagerie sécurisé et privé</li>
          <li>Vérification des profils pour garantir l'authenticité</li>
          <li>Événements et activités réguliers pour rencontrer de nouvelles personnes</li>
          <li>Support client 24/7 pour vous assister</li>
        </ul>
      </div>
      <div class="mt-10">
        <h3 class="text-2xl font-bold text-pink-800">Rejoignez-nous dès aujourd'hui</h3>
        <p class="text-gray-700 mt-4">Inscrivez-vous maintenant et commencez votre voyage vers des connexions significatives. Que vous recherchiez une relation sérieuse ou que vous souhaitiez simplement rencontrer de nouvelles personnes, My Meetic est là pour vous aider à chaque étape du chemin.</p>
        <a href="Views/RegisterView.html" class="bg-pink-700 text-white p-4 rounded-lg mt-4 inline-block">Commencer</a>
      </div>
    </div>
  </section>
  <footer class="bg-pink-800 p-4 mt-20">
    <div class="container mx-auto text-center text-white">
      <p>&copy; 2025 My Meetic. Tous droits réservés.</p>
      <p>Trouvez votre partenaire idéal dès aujourd'hui !</p>
      <div class="space-x-4 mt-4">
        <a href="#" class="text-gray-300 hover:text-white">Politique de confidentialité</a>
        <a href="#" class="text-gray-300 hover:text-white">Conditions d'utilisation</a>
        <a href="#" class="text-gray-300 hover:text-white">Nous contacter</a>
      </div>
    </div>
  </footer>
</body>

</html>