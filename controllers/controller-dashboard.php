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



include_once '../views/view-dashboard.php';

