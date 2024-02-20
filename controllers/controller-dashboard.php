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
$allUtilisateurs = json_decode(Entreprise::getAllUsers($_SESSION['user']['ID_Entreprise']), true);
$allUsers = $allUtilisateurs['active_users'] ?? 0;

$actifUtilisateurs = json_decode(Entreprise::getActifUtilisateurs($_SESSION['user']['ID_Entreprise']), true);
$actifUsers = $actifUtilisateurs['active_users'] ?? 0;

$allTrajets = json_decode(Entreprise::getAllTrajets($_SESSION['user']['ID_Entreprise']), true);
$allRides = $allTrajets['total_trajets']['total_trajets'] ?? 0;

$lastfiveusers = json_decode(Entreprise::getLastFiveUsers($_SESSION['user']['ID_Entreprise']), true);
$lastfivetrajet = json_decode(Entreprise::getLastFiveTrajet($_SESSION['user']['ID_Entreprise']), true);

$statsTransports = json_decode(Entreprise::getTransportStats($_SESSION['user']['ID_Entreprise']), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['validate_id'])){
        Entreprise::validate($_POST['validate_id']);
    }
    if(isset($_POST['unvalidate_id'])){
        Entreprise::unvalidate($_POST['unvalidate_id']);
    }
};
$allUsersDisplayVariable = json_decode(Entreprise::getAllUsersDisplay($_SESSION['user']['ID_Entreprise']), true);
$allUsersDisplay = $allUsersDisplayVariable['all_users'];

include_once '../views/view-dashboard.php';
