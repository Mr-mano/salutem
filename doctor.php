<?php require_once "config/parameters.php";

$firstname = $_GET["firstname"];
$lastname = $_GET["lastname"];

require_once "layout/header.php";
?>





<main>
    <div class="container">
        <h1><?= $firstname; ?> <?= $lastname; ?></h1>
        <img src="<?= UPLOAD_DIR; ?>doctor-1.jpg" alt="Jack Smith">
    </div>
</main>



<?php require_once "layout/footer.php"; ?>