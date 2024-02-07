<?php
session_start();
// l'ordre est important car Utilisateur.php utilise des constantes venant de config.php 

// config
require_once '../config.php';
// models
require_once '../models/Entreprise.php';


// Nous déclenchons nos vérifications uniquement lorsqu'un submit de type POST est détecté
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // tableau d'erreurs (stockage des erreurs)
    $errors = [];
     

    if (empty($errors)) {
        // ici commence les tests
        if (!Entreprise::checkMailExists($_POST['mail'])) {
            $errors['spanEmail'] = 'Utilisateur Inconnu';
        } elseif (Entreprise::checkMailExists($_POST['mail']) && empty($_POST['password'])) {
            $mail = $_POST['mail'];
            $errors['spanPassword'] = 'Veuillez saisir votre mot de passe';
        } else {
            // je recupère toutes les infos via la méthode getInfos()
            $utilisateurInfos = Entreprise::getInfos($_POST['mail']);
            // Utilisation de password_verify pour valider le mdp
            if (password_verify($_POST['password'], $utilisateurInfos['password_utilisateur'])) {
                $_SESSION['user'] = $utilisateurInfos; 
                header('Location: controller-home.php');

            } else {
                $mail = $_POST['mail'];
                $errors['spanPassword'] = 'Mauvais mdp';
            }
        }
    }
}

include_once '../views/view-signin.php';