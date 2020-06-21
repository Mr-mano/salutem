<?php


function insertAppointment(string $date, string $message, int $patient_id, int $specialty_id): int
{
    global $connexion;

    $query = "
    INSERT INTO appointment(date, message, patient_id, specialty_id)
    VALUE(:date, :message, :patient_id, :speciality_id)
    ";

    $stmt = $connexion->prepare($query);
    $stmt->bindParam(":date", $date);
    $stmt->bindParam(":message", $message);
    $stmt->bindParam(":patient_id", $patient_id);
    $stmt->bindParam(":speciality_id", $specialty_id);

    $errcode = 0;
    try{
        $stmt->execute();
    }catch (PDOExeption $ex){
        $errcode = $ex->getCode();
    }
    return $errcode;
}