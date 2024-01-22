<?php
// Nettoyage des données passées en post
$mail = (isset($_POST["mail"]) && !empty($_POST["mail"])) ? htmlspecialchars($_POST["mail"]) : null;
$password = (isset($_POST["password"]) && !empty($_POST["password"])) ? $_POST["password"] : null;

// Est-ce que le mot de passe ou email sont exploitables
if ($mail && $password) {
    
    try {
        include_once("inc/constant2.php");
        $cnn = new PDO('mysql:host=' . HOST . ';dbname=' . DATA . ';port=' . PORT . ';charset=utf8', USER, PASS);
        $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $cnn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // Préparation de la requête
        $qry = $cnn->prepare("SELECT * FROM users WHERE mail=? AND active=?");
        $qry->execute(array($mail,1));
        $user = $qry->fetch();

        // Si une ligne est trouvée


            // Vérification du mot de passe
            if (password_verify($password, $user['password'])) {
                echo 'Le mot de passe est valide !';
                header("location:user_home.php");
            } else {
                echo "Mot de passe incorrect."; 
            }

    } catch (PDOException $err) {
        echo $err->getMessage();
    }
} else {
    echo "Mail ou mot de passe invalide";
}
?>