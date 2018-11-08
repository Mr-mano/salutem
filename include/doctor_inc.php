<?php
$specialties = getAllSpecialitiesByDoctor($docteur["id"]);

; ?>


<article class="doctor-thumbnail">
    <img src="<?= UPLOAD_DIR . $docteur ["photo"]; ?>"
         alt="<?= $docteur ["firstname"] . " " . $docteur ["lastname"]; ?>">
    <div class="doctor-details">
        <h4><?= $docteur["firstname"] . " " . $docteur["lastname"]; ?></h4>


        <ul class="doctor-skills">
            <?php foreach ($specialties as $specialty) : ?>
                <li><?= $specialty["label"]; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php if ($docteur["university"]): ?>
            Université : <?= $docteur["university"]; ?>
            <br>
        <?php  endif; ?>

        <?php if ($docteur["phone"]) : ?>
            <p>
                <a href="tel :<?= $docteur["phone"]; ?>">
                    <i class="fa fa-phone"></i>
                    <?= $docteur["phone"]; ?>
                </a>
            </p>
        <?php endif; ?>

        <a href="<?= SITE_URL; ?>doctor.php?id=<?= $docteur["id"]; ?>" class="btn btn-dark">
            <i class="fa fa-eye"></i>
            Plus d'informations
        </a>
    </div>
</article>