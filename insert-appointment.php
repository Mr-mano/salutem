<?php
require_once "model/database.php";


// récupérer les données de formulaire
$date = $_POST["date"];
$time = $_POST["time"];
$datetime = $date . " " . $time;
$message = $_POST["message"];
$specialty_id = $_POST["specialty"];
$patient_id = 4;


// Envoyer les données à la base de données
$errcode = insertAppointment($datetime, $message, $patient_id, $specialty_id);

//rediriger l'utilisateur
header("Location: index.php?errcode=" . $errcode);