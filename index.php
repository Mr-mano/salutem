<?php
require_once "config/parameters.php";
require_once "model/database.php";

$doctors = getAllDoctors();


require_once "layout/header.php"; ?>

    <section class="home-top">
        <article class="container">
            <h1>Salutem</h1>
            <h2>Maison de santé</h2>
            <a href="#appointment" class="btn btn-dark">Prendre rendez-vous</a>
        </article>
    </section>
    <section class="home-boxes">
        <div class="container">
            <article>
                <h3>Centre médicale</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, debitis delectus dolorem, est
                    eveniet ex explicabo id iure iusto magni maiores nam non numquam odio officiis quaerat reiciendis
                    repellat totam.</p>
                <a href="#" class="btn btn-light">Lire la suite</a>
            </article>
            <article>
                <h3>Horaires d'ouverture</h3>
                <table class="opening-hours">
                    <tr>
                        <td>Lundi</td>
                        <td class="hours">9h - 17h</td>
                    </tr>
                    <tr class="today">
                        <td>Mardi</td>
                        <td class="hours">9h - 17h</td>
                    </tr>
                    <tr>
                        <td>Mercredi</td>
                        <td class="hours">9h - 17h</td>
                    </tr>
                    <tr>
                        <td>Jeudi</td>
                        <td class="hours">9h - 17h</td>
                    </tr>
                    <tr>
                        <td>Vendredi</td>
                        <td class="hours">9h - 17h</td>
                    </tr>
                    <tr>
                        <td>Samedi</td>
                        <td class="hours">9h - 12h</td>
                    </tr>
                    <tr>
                        <td>Dimanche</td>
                        <td class="hours">Fermé</td>
                    </tr>
                </table>
            </article>
            <article>
                <h3>Numéro d'urgence</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci assumenda aut delectus dolores
                    illo laboriosam provident reiciendis tempore vel?</p>
                <p>
                    <a href="tel:0243785443" class="phone-number">0243785443</a>
                </p>
                <a href="#" class="btn btn-light">Lire la suite</a>
            </article>
        </div>
    </section>

    <section class="doctors">
        <div class="container">
            <article>
                <form class="form-appointment" method="post" action="insert-appointment.php">
                    <h3>Prendre rendez-vous</h3>
                    <input type="text" name="lastname" required placeholder="Nom">
                    <input type="text" name="firstname" required placeholder="Prénom">
                    <input type="email" name="email" placeholder="Email">
                    <input type="tel" name="phone" required placeholder="Téléphone">
                    <input type="date" name="date" required placeholder="Date">
                    <input type="time" name="time" step="900" required placeholder="Heure">
                    <select name="speciality" required>
                        <option disabled selected>Choisissez une spécialité</option>
                        <option>Médecin Généraliste</option>
                        <option>Dentiste</option>
                        <option>Infirmier</option>
                        <option>Homéopathe</option>
                        <option>Osthéopathe</option>
                    </select>
                    <textarea name="message" placeholder="Votre message"></textarea>
                    <button type="submit" class="btn btn-light">
                        <i class="fa fa-check"></i>
                        Envoyer
                    </button>
                </form>
            </article>

            <?php foreach ($doctors as $docteur): ?>
            <?php include "include/doctor_inc.php"; ?>
            <?php endforeach; ?>
        </div>
    </section>



<?php require_once "layout/footer.php"; ?>