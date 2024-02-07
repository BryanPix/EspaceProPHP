<?php 

// config
require_once '../config.php';
// models
require_once '../models/Entreprise.php';

session_start();
session_unset();
session_destroy();
header("Location: ../index.php");
exit();
