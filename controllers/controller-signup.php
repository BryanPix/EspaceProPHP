<?php
// l'ordre est important car Entreprise.php utilise des constantes venant de config.php 

// config
require_once '../config.php';
// model
require_once '../models/Entreprise.php';

$showform = true;
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['nom'])) {
        $errors['spanNom'] = 'Veuillez saisir votre nom';
    } elseif(!empty($_POST['nom'])) {
        $name = $_POST['nom'];
    }

    if (empty($_POST['mail'])) {
        $errors['spanEmail'] = 'Veuillez saisir un mail valide';
    } elseif(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
        $errors['spanEmail'] = 'Veuillez saisir un mail valide';
    } elseif(!empty($_POST['mail'])) {
        $mail = $_POST['mail'];
    }

    if (empty($_POST['siretNumber'])) {
        $errors['spanSiret'] = 'Veuillez saisir votre Numéro Siret';
    } elseif(strlen($_POST['siretNumber']) != 14){
        $errors['spanSiret'] = 'Veuillez saisir un Numéro Siret valide';
    }elseif(!is_numeric($_POST['siretNumber'])){
        $errors['spanSiret'] = 'Veuillez ne mettre que des chiffres';
    } elseif(!empty($_POST['siretNumber'])) {
        $siret = $_POST['siretNumber'];
    }

    if (empty($_POST['adresse'])) {
        $errors['spanAdresse'] = "Veuillez saisir l'addresse de votre entreprise";
    }elseif(!empty($_POST['adresse'])) {
        $adresse = $_POST['adresse'];
    }
    if (empty($_POST['zipcode'])) {
        $errors['spanZip'] = "Veuillez saisir le code postal de l'entreprise";
    } elseif(!empty($_POST['zipcode'])) {
        $zipcode = $_POST['zipcode'];
    }
    if (empty($_POST['city'])) {
        $errors['spanCity'] = "Veuillez saisir la ville de l'entreprise";
    } elseif(!empty($_POST['city'])) {
        $city = $_POST['city'];
    }
    if (empty($_POST['password'])) {
        $errors['spanPassword'] = 'Veuillez saisir votre mot de passe';
    }
    if (empty($_POST['confirmPass'])) {
        $errors['spanConfirm'] = 'Votre mot de passe doit être similaire';
    }


    // Si aucune erreur, traiter les données et soumettre le formulaire
    if (empty($errors)) {

        if (empty($errors)) {
            $name = $_POST['nom'];
            $mail = $_POST['mail'];
            $siret = $_POST['siretNumber'];
            $adresse = $_POST['adresse'];
            $zipcode = $_POST['zipcode'];
            $city = $_POST['city'];
            $password = $_POST['password'];

            Entreprise::create($name, $mail, $siret, $adresse, $zipcode, $city, $password);
            // Sert à masquer la div formulaire
            $showform = false;
        }
    }
}

include_once '../views/view-signup.php';
