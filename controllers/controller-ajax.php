<?php
session_start();
require_once '../config.php';
require_once '../models/Entreprise.php';


if (isset($_GET['validate']) && $_SESSION['user']) {
    $userInfo = json_decode(Entreprise::getOneUser($_GET['validate']), true)['one_user'];
    if($_SESSION['user']['ID_Entreprise'] == $userInfo['ID_Entreprise']){
        Entreprise::validate($_GET['validate']);
    }
}
;
if (isset($_GET['unvalidate']) && $_SESSION['user']) {
    $userInfo = json_decode(Entreprise::getOneUser($_GET['unvalidate']), true)['one_user'];
    if($_SESSION['user']['ID_Entreprise'] == $userInfo['ID_Entreprise']){
        Entreprise::unvalidate($_GET['unvalidate']);
    }
}
;


