<?php

require_once __DIR__ . "/../config/parameters.php";

try {
    $connexion = new PDO("mysql:dbname=" . DB_NAME . ";host=" . DB_HOST, DB_HUSER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8', lc_time_names = 'fr_FR';"
    ]);
} catch (PDOException $exception) {
    echo "Erreur de connexion à la base de données";
}

function deleteEntity(string $table, int $id): ?int
{
    global $connexion;

    $errcode = NULL;

    $query = "
    DELETE FROM $table WHERE id = :id";

    $stmt = $connexion->prepare($query);
    $stmt->bindParam(":id", $id);

    try {
        $stmt->execute();
    } catch (PDOException $ex) {
        $errcode = $ex->getCode();
    }
    return $errcode;
}

function getAllEntities(string $table): array
{
    global $connexion;

    $query = "
    SELECT * FROM $table";

    $stmt = $connexion->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getCountEntities(string $table): int
{
    global $connexion;

    $query = "SELECT COUNT(*) AS nb_rows FROM $table";

    $stmt = $connexion->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch();
    return intval($result["nb_rows"]);
}


function getAllDoctors( int $id = null): array{
    global $connexion;

    $query = "
              SELECT *,
              CONCAT (user.firstname, ' ' ,user.lastname) AS fullname
              FROM doctor
              INNER JOIN user ON doctor.id = user.id
              ";

    if (isset($id)){
        $query .= " WHERE doctor.id = :id";
    }

    $stmt = $connexion->prepare($query);
    if (isset($id)){
        $stmt->bindParam(":id", $id);
    }
    $stmt->execute();

    return (isset($id)) ? $stmt->fetch() : $stmt->fetchAll();
}


FUNCTION getAllSpecialitiesByDoctor(int $id) : array{
    global $connexion;

    $query = "
    SELECT *
    FROM specialty
    INNER JOIN doctor_has_specialty AS dhs ON specialty.id = dhs.specialty_id
    WHERE dhs.doctor_id = :id;
    ";

    $stmt = $connexion->prepare($query);
    $stmt-> bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetchAll();

}