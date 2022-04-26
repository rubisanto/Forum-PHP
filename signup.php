<?php require('actions/users/signupAction.php') ?>
<!DOCTYPE html>
<html lang="fr">
<?php include './includes/head.php' ?>

<body>
    <br><br>
    <form class="container" method="post">
        <?php
        if (isset($errorMsg)) {
            # code...
            echo '<p>' . $errorMsg . '</p>';
        }
        ?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pseudo</label>
            <input type="text" class="form-control" name="pseudo" id="exampleInputEmail1" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nom</label>
            <input type="text" class="form-control" name="lastname" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Prénom</label>
            <input type="text" class="form-control" name="firstname" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>
        <br><br>
        <a href="login.php">
            <p>J'ai déjà un compte, je me connecte</p>
        </a>
    </form>


</body>

</html>