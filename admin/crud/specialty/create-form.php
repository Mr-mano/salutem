<?php require_once __DIR__ . "/../../layout/header.php"; ?>

<h1>Création d'une spécialité</h1>

<form action="create-query.php" method="post">

    <div class="form-group">
        <label>Libellé</label>
        <input type="text" class="form-control" name="label" placeholder="Libellé">
    </div>

    <button type="submit" class="btn btn-success">
        <i class="fa fa-save"></i>
        Enregistrer
    </button>




</form>
<?php require_once __DIR__ . "/../../layout/footer.php"; ?>