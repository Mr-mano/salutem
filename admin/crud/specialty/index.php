<?php
require_once __DIR__ . "/../../../model/database.php";

$specialties = getAllEntities("specialty");

require_once __DIR__ . "/../../layout/header.php";
?>

<h1>Gestion des spécialités</h1>

<a href="create-form.php" class="btn btn-primary">
    <i class="fa fa-plus"></i>
    Ajouter
</a>

<hr>

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Libellé</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($specialties as $specialty) : ?>
        <tr>
            <td><?= $specialty["label"]; ?></td>
            <td class="actions">
                <a href="update-form.php?id=<?= $specialty["id"]; ?>" class="btn btn-warning">
                    <i class="fa fa-edit"></i>
                    Modifier
                </a>
                <form action="delete-query.php" method="post">
                    <input type="hidden" name="id" value="<?= $specialty["id"]; ?>">
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



