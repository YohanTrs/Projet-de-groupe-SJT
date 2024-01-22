<?php

session_start();
// include("inc/constant.php");
include("constant.php");

// vérification des jetons avant envoi

$nom_utilisateur = isset($_POST['nom_utilisateur']) ? $_POST['nom_utilisateur'] :""; 
$email_utilisateur = isset($_POST['email_utilisateur']) ? $_POST['email_utilisateur'] :""; 
$mot_de_passe_utilisateur = isset($_POST['mot_de_passe_utilisateur']) ? $_POST['mot_de_passe_utilisateur'] :"";
$errors = [];

// Validation du nom_utilisateur

if(preg_match("/^[A-Za-z0-9\x{00c0}-\x{00ff}]{5,20}$/u", $nom_utilisateur) === 0) {
    $errors["nom"] = "Le nom n'est pas valide";
}

// Validation du email_utilisateur

if (filter_var($email_utilisateur, FILTER_VALIDATE_EMAIL) === false) {
    // Ajout d'un message d'erreur
    $errors["email_utilisateur"] = "L'email_utilisateur n'est pas valide";
}
// Validation du mot de passe

if(preg_match("/^[A-Za-z0-9_$]{8,}/", $mot_de_passe_utilisateur) === 0) {
    $errors["mot_de_passe_utilisateur"] = "Le mot de passe n'est pas valide";
}

// Mise en place des protections XSS (évite les injections de code malveillant)

$nom_utilisateur = htmlspecialchars($nom_utilisateur);
$email_utilisateur = htmlspecialchars($email_utilisateur);
$mot_de_passe_utilisateur = htmlspecialchars($mot_de_passe_utilisateur);

// Mise en place d'une condition de validation du formulaire

if(count($errors) > 0) { // Si il y a au moins une erreur
    $_SESSION["compte-données"]["nom_utilisateur"] = $nom_utilisateur;  // Alors crée un tableau "compte-données" et insére la valeur fausse.  
    $_SESSION["compte-données"]["email_utilisateur"] = $email_utilisateur;
    $_SESSION["compte-données"]["mot_de_passe_utilisateur"] = $mot_de_passe_utilisateur;
    $_SESSION["compte-errors"] = $errors;
    foreach ($errors as $error) {
        echo"<h2>$error</h2>";
    };
    
    exit();
}

// Parcourir le tableau nom_utilisateur, email_utilisateur, mot de passe

foreach($_POST as $key => $val) { // on récupère toutes les données du formulaire, on associe un index aux valeurs du tableau
    $params[":" . $key] = (isset($_POST[$key]) && !empty($_POST[$key])) ? htmlspecialchars($_POST[$key]) : null; // on vérifie que toutes les variables ont été remplies et ne sont pas nulles, si la condition n'est pas vérifiée, on affecte la valeur "NULL"
}

// Cryptage du mot de passe



$params[":mot_de_passe_utilisateur"] = password_hash($params[":mot_de_passe_utilisateur"], PASSWORD_DEFAULT);

// connexion à la base de données
include("constant.php");

try{

    // connexion à ma base de données
    $cnn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_password);
    
    // les options
    $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $cnn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    //  teste si l'email_utilisateur n'existe pas déja
    $sql = 'SELECT COUNT(*) as nb FROM utilisateurs WHERE email_utilisateur=?';
    $qry = $cnn->prepare($sql);
    $qry->execute(array($params[':email_utilisateur']));
    $row = $qry->fetch();
    

    if($row['nb'] ==1){
        echo"<h2> cet email_utilisateur existe deja !!!";
        echo "<a href='pageerreur.php'>Retour à la page d'accueil</a>";

    }else{
        $sql='INSERT INTO utilisateurs(nom_utilisateur, email_utilisateur, mot_de_passe_utilisateur, prenom_utilisateur, adresse_livraison, moyen_paiement, role)VALUES(:nom_utilisateur, :email_utilisateur, :mot_de_passe_utilisateur, "a", "a", "a", 1)';
        $qry=$cnn->prepare($sql);
        $qry->execute($params);
        unset($cnn);

        echo"<h2> Vous etes bien inscrit BW";
        echo"<a href='index.php'>retour à la page d'accueil</a>";
    }

}catch(PDOException $err){

    // gestion des erreurs
    $err->getMessage();
    $_SESSION["compte-errors-sql"] = $err->getMessage();
    $_SESSION["compte-données"]["nom_utilisateur"] = $nom_utilisateur;  // Alors crée un tableau "compte-données" et insére la valeur fausse. 
    $_SESSION["compte-données"]["email_utilisateur"] = $email_utilisateur; 
    $_SESSION["compte-données"]["mot_de_passe_utilisateur"] = $mot_de_passe_utilisateur;
    // header("location: index.php");
    var_dump($err);
    
exit;
}

?>