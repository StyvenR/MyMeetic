<?php
require_once "../Controller/LoginController.php";
require_once "../Controller/UpdateProfileController.php";
require_once "../Models/Hobbies.php";
session_start();
$firstname = htmlspecialchars($_SESSION['user']["firstname"]);
$lastname = htmlspecialchars($_SESSION['user']["lastname"]);
$age = htmlspecialchars($_SESSION['user']["age"]);
$email = htmlspecialchars($_SESSION['user']["email"]);
$gender = htmlspecialchars($_SESSION['user']["gender"]);
$city = htmlspecialchars($_SESSION['user']["city"]);
$hobbies_list = new Hobbies();
$id = $hobbies_list->get_id_user($_SESSION['user']["email"]);
$hobbies_user = $hobbies_list->get_hobbies_with_names($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  <title>Profile</title>
</head>

<body class="bg-gradient-to-r from-blue-500 to-pink-600">
  <div class="flex justify-end p-4">
    <a href="../index.php"
      class="bg-gradient-to-r from-pink-600 to-blue-500 text-white px-4 py-2 rounded hover:from-pink-800 hover:to-blue-700">Accueil</a>
    <a href="../Views/LoginView.html"
      class="bg-gradient-to-r from-pink-600 to-blue-500 text-white px-4 py-2 rounded hover:from-pink-800 hover:to-blue-700">Deconnexion</a>
  </div>
  <div class=" container mt-10 flex justify-center">
    <div class="mx-10 bg-gradient-to-r from-pink-200 to-blue-200 rounded-lg shadow-md p-6">
      <div class="flex justify-center">
        <img src="../assets/<?= $gender ?>PP.png" alt="Profile Picture" width="200" height="200">
      </div>
      <div class="p-4">
        <form action="../Controller/UpdateProfileController.php" method="POST">
          <div class="mb-4">
            <label for="firstname" class="block text-gray-700">Prénom :</label>
            <input type="text" id="firstname" name="firstname" value="<?= $firstname; ?>"
              class="mt-1 block rounded-md border-gray-300 shadow-sm p-2">
          </div>
          <div class="mb-4">
            <label for="lastname" class="block text-gray-700">Nom :</label>
            <input type="text" id="lastname" name="lastname" value="<?= $lastname; ?>"
              class="mt-1 block rounded-md border-gray-300 shadow-sm p-2">
          </div>
          <div class="mb-4">
            <label for="age" class="block text-gray-700">Age :</label>
            <input type="number" id="age" name="age" value="<?= $age; ?>"
              class="mt-1 block rounded-md border-gray-300 shadow-sm p-2" disabled>
          </div>
          <div class="mb-4">
            <label for="email" class="block text-gray-700">Email :</label>
            <input type="email" id="email" name="email" value="<?= $email; ?>"
              class="mt-1 block rounded-md border-gray-300 shadow-sm p-2">
          </div>
          <div class="mb-4">
            <label for="gender" class="block text-gray-700">Sexe :</label>
            <select id="gender" name="gender" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2">
              <option value="Homme" <?= $gender == 'Homme' ? 'selected' : ''; ?>>Homme</option>
              <option value="Femme" <?= $gender == 'Femme' ? 'selected' : ''; ?>>Femme</option>
              <option value="Autre" <?= $gender == 'Autre' ? 'selected' : ''; ?>>Autre</option>
            </select>
          </div>
          <div class="mb-4">
            <label for="city" class="block text-gray-700">Ville :</label>
            <input type="text" id="city" name="city" value="<?= $city; ?>"
              class="mt-1 block rounded-md border-gray-300 shadow-sm p-2">
          </div>
          <input type="hidden" name="id" value="<?= $id; ?>">
          <div class="flex justify-end">
            <button type="submit"
              class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Sauvegarder</button>
          </div>
        </form>
      </div>
    </div>
    <!-- Centre d'intérêts-->
    <div class="mx-10 bg-gradient-to-r from-pink-200 to-blue-200 rounded-lg shadow-md p-10">
      <div class="p-4">
        <h2 class="text-lg font-semibold mb-4">Centre d'intérêts</h2>
        <ul class="list-disc list-inside">
          <?php foreach ($hobbies_user as $hobby): ?>
            <li><?= htmlspecialchars($hobby); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</body>

</html>