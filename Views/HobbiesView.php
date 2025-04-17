<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  <title>Hobbies</title>
</head>

<body>
  <?php
    $email = isset($_GET['email']) ? urldecode($_GET['email']) : null;
    require_once "../Config/Database.php";
    $test = new Database();
    $test = $test->connect();
    $query = "SELECT * FROM hobbies";
    $result = $test->query($query);
    if ($result->rowCount() > 0) {
      echo '<form action="../Controller/HobbiesController.php?email='.urlencode($email).'" method="POST" class="max-w-md mt-20 mx-auto bg-white p-8 rounded-lg shadow-md">';
      echo '<label class="block text-gray-700 text-sm font-bold mb-2">Choisir les activités :</label>';
      echo '<div class="grid grid-cols-2 gap-4">';
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="flex items-center">';
        echo '<input type="checkbox" name="hobbies[]" value="' . $row['id'] . '" class="mr-2">';
        echo '<label class="text-gray-700">' . $row['name'] . '</label>';
        echo '</div>';
      }
      echo '</div>';
      echo '<div class="mt-4">';
      echo '<input type="submit" value="Submit" class="w-full bg-pink-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600">';
      echo '</div>';
      echo '</form>';
    }
  ?>
</body>

</html>