<?php
require_once "../controllers/controller-signup.php"

    ?>
<!DOCTYPE html>
<html lang="fr">
<?php
include 'templates/header.php';
?>

<body>
<button onclick="darkMode()" class="btn-darkMode"><i class="fa-solid fa-sun"></i></button>

    <?php if ($showform) { ?>
        <h1>Inscription</h1>


        <div class="divFormulaire">
            <form method="POST" action="" enctype="multipart/form-data" autocomplete="off" novalidate>

                <label class="labelSignup" for="nom">
                    <p>Nom de l'entreprise<sup class="redInput">* </sup>:</p>

                    <input class="inputField" type="text" id="nom" name="nom" size="20" placeholder="Balenciaga" value="<?php if (!empty($name)) {
                        echo $name;
                    } ?>" required>
                    <span class="redInput redText spanNom">
                        <?= isset($errors["spanNom"]) ? $errors["spanNom"] : "" ?>
                    </span>
                </label>

                <label class="labelSignup" for="mail">
                    <p>Adresse mail de l'entreprise<sup class="redInput">* </sup> :</p>

                    <input class="inputField" type="text" id="mail" name="mail" size="25" placeholder="Balanciaga@gmail.com"
                        value="<?php if (!empty($mail)) {
                            echo $mail;
                        } ?>" required>
                    <span class="redInput redText spanEmail">
                        <?= isset($errors["spanEmail"]) ? $errors["spanEmail"] : "" ?>
                    </span>
                </label>

                <label class="labelSignup" for="siretNumber">
                    <p>Numéro de Siret<sup class="redInput">* </sup> :</p>

                    <input class="inputField" type="text" name="siretNumber" value="<?php if (!empty($siret)) {
                        echo $siret;
                    } ?>" required>
                    <span class="redInput redText spanSiret">
                        <?= isset($errors["spanSiret"]) ? $errors["spanSiret"] : "" ?>
                    </span>
                </label>

                <label class="labelSignup" for="adresse" >
                    <p>Adresse de l'entreprise<sup class="redInput">* </sup> :</p>

                    <input class="inputField" id="adresse" type="text" name="adresse" size="20" value="<?php if (!empty($adresse)) {
                        echo $adresse;
                    } ?>" required> 
                    <span class="redInput redText spanAdresse">
                        <?= isset($errors["spanAdresse"]) ? $errors["spanAdresse"] : "" ?>
                    </span>
                </label>

                <label class="" for="zipcode" >
                    <p>Code Postal de l'entreprise<sup class="redInput">* </sup> :</p>

                    <input class="inputField" type="text" id="confirmPass" name="zipcode" size="20" value="<?php if (!empty($zipcode)) {
                        echo $zipcode;
                    } ?>" required>
                    <span class="redInput redText spanZip">
                        <?= isset($errors["spanZip"]) ? $errors["spanZip"] : "" ?>
                    </span>
                </label>

                <label class="" for="city" >
                    <p>Ville de l'entreprise<sup class="redInput">* </sup> :</p>

                    <input class="inputField" type="text" id="confirmPass" name="city" size="20" value="<?php if (!empty($city)) {
                        echo $city;
                    } ?>" required>
                    <span class="redInput redText spanCity">
                        <?= isset($errors["spanCity"]) ? $errors["spanCity"] : "" ?>
                    </span>
                </label>

                <label class="labelSignup" for="password">
                    <p>Mot de passe<sup class="redInput">* </sup> :</p>

                    <input class="inputField" type="password" id="password" name="password" size="20" required>
                    <span class="redInput redText spanPassword">
                        <?= isset($errors["spanPassword"]) ? $errors["spanPassword"] : "" ?>
                    </span>
                </label>

                <label class="labelSignup" for="confirmPass" >
                    <p>Confirmation du mot de passe<sup class="redInput">* </sup> :</p>

                    <input class="inputField" type="password" id="confirmPass" name="confirmPass" size="20" required>
                    <span class="redInput redText spanConfirm">
                        <?= isset($errors["spanConfirm"]) ? $errors["spanConfirm"] : "" ?>
                    </span>
                </label>

                <p class="requis"><sup class="redInput">*</sup> Requis</p>
                <input class="btn-signup" type="submit" id="btn-check" value="S'enregistrer">

            </form>
            <p class="spanDirection">Vous avez déjà un compte ?</p>
            <a href="controller-signin.php" class="btn-redirect">Connectez-vous !</a>
        </div>
    <?php } else { ?>


        <!-- A faire apparaitre quand le formulaire est soumit -->
        <div id="divMessage">
            <h1>Inscription reussie</h1>
            <p> Vous pouvez à present vous connecter.</p>
            <a href="../controllers/controller-signin.php"><button class="btn-signup">Connexion</button></a>
        </div>
    <?php } ?>
    <script src="../assets/js/darkmode.js"></script>
</body>

</html>