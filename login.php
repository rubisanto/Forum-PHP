<?php require('actions/users/loginAction.php') ?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php' ?>

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
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary" name="validate">Se connecter</button>
        <br><br>
        <a href="signup.php">
            <p>Je n'ai pas de compte, je m'inscris</p>
        </a>
    </form>

</body>

</html>