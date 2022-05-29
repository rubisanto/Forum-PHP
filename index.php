<?php
session_start();
require('actions/questions/showAllQuestionsAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php' ?>

<body>
    <?php include 'includes/navbar.php' ?>
    <br><br>

    <div class="container">
        <form action="" method="GET">
            <div class="form-group row">
                <div class="col-8">
                    <input type="search" class="form-control" name="search">
                </div>
                <div class="col-4">
                    <button class="btn btn-success" type="submit">
                        Rechercher
                    </button>
                </div>
            </div>
        </form>

        <br>
        <?php
        // fetch sur les résultats de la recherche ou par défaut
        while ($question = $getAllQuestions->fetch()) {
        ?>
            <div class="card">
                <div class="card-header">
                    <?= $question['title']; ?>
                </div>
                <div class="card-body">
                    <?= $question['description']; ?>

                </div>
                <div class="card-footer">
                    Publié par <?= $question['pseudo_author'] ?> , le <?= $question['date_publication'] ?>
                </div>
            </div>
            <br>
        <?php

        }

        ?>
    </div>
</body>

</html>