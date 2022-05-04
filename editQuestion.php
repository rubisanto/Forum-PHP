<?php
require('actions/users/securityAction.php');
require('actions/questions/getInfosOfEditedQuestionAction.php');
require('actions/questions/editQuestionAction.php');

?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php' ?>

<body>
    <?php include 'includes/navbar.php' ?>
    <br><br>
    <div class="container">
        <?php
        if (isset($errorMsg)) {
            # code...
            echo '<p>' . $errorMsg . '</p>';
        }

        if (isset($questionContent)) {
        ?>
            <form method="post">

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
                    <input type="text" class="form-control" name="title" value="<? $questionTitle ?>" id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Description de la question</label>
                    <textarea class="form-control" name="description" id="exampleInputPassword1">
                    <? $questionDescription ?>
                    </textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contenu de la question</label>
                    <textarea class="form-control" name="content" id="exampleInputPassword1">
                    <? $questionContent ?>
                    </textarea>
                </div>


                <button type="submit" class="btn btn-primary" name="validate">Modifier la question</button>
                <br><br>

            </form>
        <?php


        }
        ?>

    </div>

</body>

</html>