<?php
require('actions/database.php');

// Validation du formulaire 

if (isset($_POST['validate'])) {
    // Vérifier que l'utilisateur a rempli tous les champs 

    if (!empty($_POST['pseudo'])  && !empty($_POST['password'])) {
        // récupérer en post les données 
        $userPseudo = htmlspecialchars($_POST['pseudo']);
        $userPassword = htmlspecialchars($_POST['password']);

        // Vérifier si l'utilisateur existe 
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIfUserExists->execute(array($userPseudo));

        if ($checkIfUserExists->rowCount() > 0) {
            //code...
            // Vérifier si le mot de passe est correct
            // Récupérer les données de l'utilisateur avec fetch
            $userInfos = $checkIfUserExists->fetch();
            if (password_verify($userPassword, $userInfos['password'])) {
                # code...
                // Authentifier l'utilisateur sur le site
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $userInfos['id'];
                $_SESSION['lastname'] = $userInfos['lastname'];
                $_SESSION['firstname'] = $userInfos['firstname'];
                $_SESSION['pseudo'] = $userInfos['pseudo'];

                // Rediriger vers l'acceuil
                header('Location: index.php');
            } else {
                $errorMsg = 'Votre mot de passe est incorrect';
            }
        } else {
            $errorMsg = "Votre pseudo est incorrect";
        }
        // Vérifier si le mot de passe est correct

    }
} else {
    $errorMsg = "Veuillez compléter tous les champs";
}
