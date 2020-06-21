<?php
require_once __DIR__ . "/../../../model/database.php";

$doctors = getAllDoctors();

require_once __DIR__ . "/../../layout/header.php";
?>

<h1>Liste des docteurs</h1>

<a href="create-form.php" class="btn btn-primary">
    <i class="fa fa-plus"></i>
    Ajouter
</a>

<hr>

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Photo</th>
        <th class="actions">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($doctors as $doctor) : ?>
        <tr>
            <td><?= $doctor["lastname"]; ?></td>
            <td><?= $doctor["firstname"]; ?></td>
            <td>
                <img src="<?= UPLOAD_URL . $doctor["photo"]; ?>" class="img-thumbnail">
            </td>
            <td class="actions">
                <a href="update-form.php?id=<?= $doctor["id"]; ?>" class="btn btn-warning">
                    <i class="fa fa-edit"></i>
                    Modifier
                </a>
                <form action="delete-query.php" method="post">
                    <input type="hidden" name="id" value="<?= $doctor["id"]; ?>">
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                        Supprimer
                    </button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . "/../../layout/footer.php"; ?>



