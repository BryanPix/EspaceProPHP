<?php
// empêche l'accès à la page home si l'utilisateur n'est pas connecté et vérifie si la session n'est pas déjà active
session_start();

if(!isset($_SESSION['user'])){
    header('Location: controller-signin.php');
    exit();
}

// l'ordre est important car Entreprise.php utilise des constantes venant de config.php 

// config
require_once '../config.php';
// models
require_once '../models/Entreprise.php';

$allUtilisateurs = Entreprise::getAllUsers($_SESSION['user']['ID_Entreprise']);
$actifUtilisateurs = Entreprise::getActifUtilisateurs($_SESSION['user']['ID_Entreprise']);
$allTrajets = Entreprise::getAllTrajets($_SESSION['user']['ID_Entreprise']);
$lastfiveusers = Entreprise::getLastFiveUsers($_SESSION['user']['ID_Entreprise']);
$lastfivetrajet = Entreprise::getLastFiveTrajet($_SESSION['user']['ID_Entreprise']);

include_once '../views/view-dashboard.php';
