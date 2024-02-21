<?php
session_start();
require_once '../config.php';
require_once '../models/Entreprise.php';


if (isset($_GET['validate']) && $_SESSION['user']) {
    var_dump(Entreprise::getOneUser($_GET['validate']));
    Entreprise::getOneUser($_GET['validate']);
    Entreprise::validate($_GET['validate']);
}
;
if (isset($_GET['unvalidate']) && $_SESSION['user']) {
    var_dump(Entreprise::getOneUser($_GET['unvalidate']));
    Entreprise::getOneUser($_GET['unvalidate']);
    Entreprise::unvalidate($_GET['unvalidate']);
}
;


