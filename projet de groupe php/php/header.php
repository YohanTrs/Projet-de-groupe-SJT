<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body class="background-accueil">
        <header class="header-size">
            <div class="header">                
                <img class="logo" src="../img/logo.png" alt="logo site">
                <img onclick="burger()" class="burger-menu" src="../img/burger.png" alt="icône menu burger">
                <ul class="menu-header">
                    <li class="bd"><a class="bd" href="index.php">Accueil</a></li>
                    <li class="bd" id="menu-hover">Nos packs
                        <ul class="menu-hover">
                            <div class="submenu">
                                <li ><a class="bd" href="racing.php">Page Conduite</a></li>
                                <li ><a class="bd" href="war.php">Page Guerre</a></li>
                                <li ><a class="bd" href="gaming.php">Page Gaming</a></li>
                            </div>                        
                        </ul>
                    </li>
                    <li><a class="bd" href="contact.php">Contact</a></li>
                    <li><a class="bd" href="faq.php">F.A.Q</a></li>
                    <div class="connect-container">
                        <button onclick="connect()" class="connect">SE CONNECTER</button>
                        <button onclick="subscribe()" class="subscribe">S'INSCRIRE</button>
                    </div>
                    <?php
                   
                    ?>
                    <div id="inscription">
                        <form class="inscription" action="verification.php" method="post">
                            <h2>Inscription</h2>
                            <label for="text">Nom d'utilisateur</label>
                            <input class="inputo" type="text" id="name" name="pseudo">
                            <label for="email">Email</label>
                            <input class="inputo" type="email" id="mail" name="mail" >
                            <label for="password">mot de passe</label>
                            <input class="inputo" type="password" id="password" name="password">
                            <label for="password">Confirmer votre mot de passe</label>
                            <input class="inputo" type="password" id="confirm-password" name="confirm_password">
                            <div class="dd">
                                <div class="miniradio">
                                    <input type="radio"><a href=""></a>
                                    <h3>Souviens-toi de moi</h3>
                                </div>
                                <h3 class="soust"><a href="">Mot de passe oublié</a></h3>
                            </div>
                            <input class="buttonic" type="submit" value="S'INSCRIRE">
                            <?php
                            //  var_dump($text);
                            ?>
                            <div class="modal">
                                <p>Avez vous déja un compte?</p>
                                <p>se connecter</p>
                            </div>
                        </form> 
                    </div>
                    <div id="connexion">
                        <form class="connexion" action="verification.php" method="post">
                            <h2>Connexion</h2>
                            <label for="email">Email</label>
                            <input class="inputo" type="email" id="mail" name="mail">
                            <label for="password">mot de passe</label>
                            <input class="inputo" type="password" id="password" name="password">
                            <div class="dd">
                                <div class="miniradio">
                                    <input type="radio"><a href=""></a>
                                    <h3>Souviens-toi de moi</h3>
                                </div>
                                <h3 class="soust"><a href="">Mot de passe oublié</a></h3>
                            </div>
                            <input class="buttonic" type="submit" value="SE CONNECTER">
                            <div class="modal">
                                <p>Vous n'avez pas de compte ?</p>
                                <p>s'inscrire</p>
                            </div>
                        </form>
                    </div>                              
                </ul>
            </div>
        </header>