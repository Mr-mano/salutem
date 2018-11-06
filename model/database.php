<?php

function getAllDoctors(): array
{

    $doctors = [];

    $doctors[] = [
        "firstname" => "Jack",
        "lastname" => "smith",
        "photo" => "doctor-1.jpg",
        "skills" => ["homéopathe", "osthéopathe"],
        "university" => "digitalcampus",
        "phone" => ""
    ];

    $doctors[] = [
        "firstname" => "Norma",
        "lastname" => "Pedric",
        "photo" => "doctor-2.jpg",
        "skills" => ["Médecin généraliste"],
        "university" => "",
        "phone" => "0645872536"
    ];

    $doctors[] = [
        "firstname" => "Maria",
        "lastname" => "Martin",
        "photo" => "doctor-3.jpg",
        "skills" => ["dentiste"],
        "university" => "Rennes",
        "phone" => "0618546720"
    ];

    return $doctors;
}