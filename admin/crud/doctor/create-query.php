<?php
require_once __DIR__ ."/../../../model/database.php";
require_once __DIR__ ."/../../security.php";

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$password = $_POST["password"];
$university = $_POST["university"];
$phone = $_POST["phone"];
$specialties = $_POST["specialties"];

$photo = $_FILES["photo"] ["name"];
$photo_tmp = $_FILES["photo"]["tmp_name"];
move_uploaded_file($photo_tmp, UPLOAD_DIR . $photo);

$id = insertEntity("user", [
    "firstname" => $firstname,
    "lastname" => $lastname,
    "email" => $email,
    "password" => sha1($password),
    "admin" => 1
]);

insertEntity("doctor", [
   "id" => $id,
   "photo" => $photo,
   "university" => $university,
   "phone" => $phone

]);

foreach ($specialties as $specialty){
    insertEntity("doctor_has_specialty",[
       "doctor_id" => $id,
       "specialty_id" => $specialty
    ]);
}

header("Location: index.php");