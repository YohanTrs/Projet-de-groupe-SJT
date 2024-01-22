<?php
// Nettoyage des données passées en post
$email_utilisateur = (isset($_POST["email_utilisateur"]) && !empty($_POST["email_utilisateur"])) ? htmlspecialchars($_POST["email_utilisateur"]) : null;
$mot_de_passe_utilisateur = (isset($_POST["mot_de_passe_utilisateur"]) && !empty($_POST["mot_de_passe_utilisateur"])) ? $_POST["mot_de_passe_utilisateur"] : null;
include("constant.php");
// Est-ce que le mot de passe ou eemail_utilisateur sont exploitables
if ($email_utilisateur && $mot_de_passe_utilisateur) {
    ;
    try {
        
        $cnn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_password);
    
        // les options
        $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $cnn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        // Préparation de la requête
        $qry = $cnn->prepare("SELECT * FROM utilisateurs WHERE email_utilisateur=?");
        $qry->execute(array($email_utilisateur));
        $user = $qry->fetch();

        // Si une ligne est trouvée


            // Vérification du mot de passe
            if (password_verify($mot_de_passe_utilisateur, $user['mot_de_passe_utilisateur'])) {
                echo 'Le mot de passe est valide !';
                // header("location:user_home.php");
            } else {
                echo "Mot de passe incorrect."; 
            }

    } catch (PDOException $err) {
        echo $err->getMessage();
        
    }
} else {
    echo "email_utilisateur ou mot de passe invalide";
    var_dump($email_utilisateur);
    var_dump($mot_de_passe_utilisateur);
}
?>