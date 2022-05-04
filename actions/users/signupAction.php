<?php
session_start();
require('actions/database.php');
// Validation du formulaire 

if (isset($_POST['validate'])) {
    // Vérifier que l'utilisateur a rempli tous les champs 

    if (!empty($_POST['pseudo']) && !empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['password'])) {
        // récupérer en post les données 
        $userPseudo = htmlspecialchars($_POST['pseudo']);
        $userLastname = htmlspecialchars($_POST['lastname']);
        $userFirstname = htmlspecialchars($_POST['firstname']);
        $userPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Vérifier si l'utilisateur est déjà inscrit sur le site 
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($userPseudo));

        // Vérifier si des données ont été récupérées pendant la rêquete 
        if ($checkIfUserAlreadyExists->rowCount() == 0) {

            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, lastname, firstname, password) VALUES(?,?,?,?)');
            $insertUserOnWebsite->execute(array($userPseudo, $userLastname, $userFirstname, $userPassword));
            // Récupérer les données identifiant
            $getInfoOfThisUserReq = $bdd->prepare('SELECT id, pseudo, lastname, firstname FROM users WHERE lastname = ? AND firstname = ? AND pseudo = ?');
            $getInfoOfThisUserReq->execute(array($userLastname, $userFirstname, $userPseudo));
            // Récupérer les infos dans un tableau
            $userInfos = $getInfoOfThisUserReq->fetch();
            // Authentifier sur le site  
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $userInfos['id'];
            $_SESSION['lastname'] = $userInfos['lastname'];
            $_SESSION['firstname'] = $userInfos['firstname'];
            $_SESSION['pseudo'] = $userInfos['pseudo'];

            // Rediriger vers l'acceuil
            header('Location: index.php');
        } else {
            $errorMsg = "L'utilisateur existe déjà sur le site";
        }
    } else {
        $errorMsg = "Veuillez compléter tous les champs";
    }
}
