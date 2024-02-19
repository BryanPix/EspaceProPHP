<?php
require_once "../controllers/controller-signin.php"
    ?>

<!DOCTYPE html>
<html lang="fr">
<?php
include 'templates/header.php';
?>

<body>
<button class="btn-darkMode" id="darkModeToggle"><i class="fa-solid fa-sun"></i></button>
    <h1>Connexion</h1>
    <div class="divFormulaire">
        <form method="POST" action="" autocomplete="off" novalidate>
            <label for="mail" class="labelSignin">
                <p class="labelUnderline">Adresse mail :</p>
                <input class="inputField" type="text" id="mail" name="mail" size="25" value="<?php if (!empty($mail)) {
                    echo $mail;
                } ?>" placeholder="Balenciaga@gmail.com" required>
                <span class="redInput redText spanEmail">
                    <?= isset($errors["spanEmail"]) ? $errors["spanEmail"] : "" ?>
                </span>
            </label>
            <label for="password" class="labelSignin">
                <p class="labelUnderline">Mot de passe :</p>
                <input class="inputField" type="password" id="password" name="password" size="20" required>
                <span class="redInput redText dynamicFont spanPassword">
                    <?= isset($errors["spanPassword"]) ? $errors["spanPassword"] : "" ?>
                </span>
            </label>
            <label for="captcha">
                <div class="g-recaptcha" data-sitekey="6LcGEnEpAAAAAPzQn7AXnr4M5mNfm2TSYrK-4Gcq" name="captcha" id="captcha"></div>
                <span class="redInput redText spanCaptcha">
                <?= isset($errors["spanCaptcha"]) ? $errors["spanCaptcha"] : "" ?>
                </span>
            </label>
            <input class="btn-signup" type="submit" id="btn-check" value="Se Connecter">
        </form>

        <p class="spanDirection"> Vous n'avez pas de compte ? </p>
        <a href="controller-signup.php" class="btn-redirect"> Inscrivez-vous !</a>
    </div>

<script src="../assets/js/darkmode.js"></script>
</body>

</html>