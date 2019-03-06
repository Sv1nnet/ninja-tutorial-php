<?php

$errors = array('email' => '', 'title' => '', 'ingredients' => '');

if (isset($_POST['submit'])) {

  // check email
  if (empty($_POST['email'])) {
    $errors['email'] = 'An email is required <br/>';
  } else {
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'email must be a valid email address <br/>';
    }
    
  }

  // check title
  if (empty($_POST['title'])) {
    $errors['title'] = 'A title is required <br/>';
  } else {
    $title = $_POST['title'];
    if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
      $errors['title'] = 'Title must be letters and spaces only';
    }
  }

  // check ingredients
  if (empty($_POST['ingredients'])) {
    $errors['ingredients'] = 'At least one ingredient is required <br/>';
  } else {
    $ingredients = $_POST['ingredients'];
    if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
      $errors['ingredients'] = 'Ingredients must be a comma separated';
    }
  }

  if(!array_filter($errors)) {
    header('Location: index.php');
  } 

} // end of POST check

?>

<!DOCTYPE html>
<html lang="en">

<?php include('./templates/header.php'); ?>

<section class="container grey-text">
  <h4 class="center">Add a Pizza</h4>
  <form action="add.php" method="POST" class="white">
    <label for="email">Your Email:</label>
    <input type="text" name="email" id="" value="<?php echo isset($email) ? htmlspecialchars($email) : '' ?>">
    <div class="red-text"><?php echo $errors['email'] ?></div>

    <label for="emtitleail">Pizza Title:</label>
    <input type="text" name="title" id="" value="<?php echo isset($title) ? htmlspecialchars($title) : '' ?>">
    <div class="red-text"><?php echo $errors['title'] ?></div>

    <label for="ingridients">Ingridients (comma separated):</label>
    <input type="text" name="ingredients" id="" value="<?php echo isset($ingredients) ? htmlspecialchars($ingredients) : '' ?>">
    <div class="red-text"><?php echo $errors['ingredients'] ?></div>

    <div class="center">
      <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
    </div>
  </form>
</section>

<?php include('./templates/footer.php'); ?>

</html>