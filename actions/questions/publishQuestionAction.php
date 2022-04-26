<?php
require('actions/database.php');
// Quand le vouton valider 
if (isset($_POST['validate'])) {
    // Vérifier que tous les champs sont remplis 
    if (!empty($_POST['title']) and !empty($_POST['description']) and !empty($_POST['content'])) {
        $questionTitle = htmlspecialchars($_POST['title']);
        // NL2BR permet de convertir les sauts de ligne dans la case en balise br
        $questionDescription = nl2br(htmlspecialchars($_POST['description']));
        $questionContent = nl2br(htmlspecialchars($_POST['content']));
        // Récupérer la date
        $questionDate = date('d/m/Y');
        // Récupérer identifiant auteur
        $questionIdAuthor = $_SESSION['id'];
        $questionPseudoAuthor = $_SESSION['pseudo'];
    } else {
        $errorMsg = 'Veuillez compléter tous les champs';
    }
}
