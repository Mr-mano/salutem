<?php require_once __DIR__ ."/../../../model/database.php";

$id = $_GET["id"];

$doctor = getAllDoctors($id);
$doctor_specialties = getAllSpecialitiesByDoctor($id);
$specialties = getAllEntities("specialty");

$doctor_specialties_id = [];


foreach ($doctor_specialties as $doctor_specialty) {
    $doctor_specialties_id[] = $doctor_specialty["id"];
}

// var_dump($doctor_specialties);
// var_dump($doctor_specialties_id); die;

require_once __DIR__ . "/../../layout/header.php";

?>

<h1>Modification d'un docteur</h1>

<form action="update-query.php" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label>Nom</label>
        <input type="text" class="form-control" name="lastname" value="<?= $doctor["lastname"]; ?>" placeholder="Nom">
    </div>

    <div class="form-group">
        <label>Prénom</label>
        <input type="text" class="form-control" name="firstname" value="<?= $doctor["firstname"]; ?>" placeholder="Prénom">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email" value="<?= $doctor["email"];?>" placeholder="Email">
    </div>

    <input type="hidden" name="id" value="<?= $id; ?>">
    <div class="form-group">
        <label>Photo</label>
        <input type="file" class="form-control" value="<?= $doctor["photo"];?>" name="photo">
    </div>

    <div class="form-group">
        <label>Universitéo</label>
        <input type="text" class="form-control" name="university" value="<?= $doctor["university"];?>" placeholder="Université">
    </div>

    <div class="form-group">
        <label>Téléphone</label>
        <input type="text" class="form-control" name="phone" value="<?= $doctor["phone"];?>" placeholder="Téléphone">
    </div>

    <div class="form-group">
        <label>Spécialités</label>
        <select name="specialties[]" multiple class="form-control">
            <?php foreach ($specialties as $specialty) : ?>
            <?php $selected = in_array($specialty["id"], $doctor_specialties_id) ? "selected" : ""; ?>
                <option value="<?= $specialty["id"]; ?>" <?= $selected; ?>>
                    <?= $specialty["label"]; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <input type="hidden" name="id" value="<?= $id;?>">

    <button type="submit" class="btn btn-success">
        <i class="fa fa-save"></i>
        Enregistrer
    </button>





</form>
<?php require_once __DIR__ . "/../../layout/footer.php"; ?>
