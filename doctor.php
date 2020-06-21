<?php
require_once "config/parameters.php";
require_once "model/database.php";

$id = $_GET["id"];
$doctor = getAllDoctors($id);

require_once "layout/header.php";
?>





<main>
    <div class="container">
        <h1><?= $doctor["fullname"]; ?></h1>
        <img src="<?= UPLOAD_URL . $doctor["photo"]; ?>" alt=""<?= $doctor["fullname"]; ?>>
    </div>
</main>



<?php require_once "layout/footer.php"; ?>