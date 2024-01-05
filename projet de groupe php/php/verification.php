<?php
  
  $text = "";

  $pseudo = $_POST['pseudo'];
  $mail = $_POST['mail'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  
  if (
      isset($_POST['pseudo']) && isset($_POST['mail']) &&
      isset($_POST['password']) && isset($_POST['confirm_password']) &&
      !empty($_POST['pseudo']) && !empty($_POST['mail']) &&
      !empty($_POST['password']) && !empty($_POST['confirm_password'])
  ) {
      if ($password === $confirm_password) {
          $text = "Votre pseudo est $pseudo, votre email est $mail, votre mot de passe est $password";
      } else {
          $text = "Les mots de passe ne correspondent pas.";
      }
  } else {
      $text = "Vous n'avez pas rentré tous les champs du formulaire.";
  }
  echo($text);
  header("Location: index.php?text=" . urlencode($text));
  
?>
