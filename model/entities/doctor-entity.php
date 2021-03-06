<?php

function getAllDoctors(int $id = null)
{
    global $connexion;

    $query = "
              SELECT *,
              CONCAT (user.firstname, ' ' ,user.lastname) AS fullname
              FROM doctor
              INNER JOIN user ON doctor.id = user.id
              ";

    if (isset($id)) {
        $query .= " WHERE doctor.id = :id";
    }

    $stmt = $connexion->prepare($query);
    if (isset($id)) {
        $stmt->bindParam(":id", $id);
    }
    $stmt->execute();

    return (isset($id)) ? $stmt->fetch() : $stmt->fetchAll();
}

function deleteDoctorSpecialties(int $id): void{
    global $connexion;

    $query = "DELETE FROM doctor_has_specialty WHERE doctor_id = :id";

    $stmt = $connexion->prepare($query);
    $stmt-> bindParam(":id", $id);
    $stmt->execute();

}