<?php

require './vendor/autoload.php';
require 'Classes/OpenWeather.php';

$o = new OpenWeather();

$clima = $o->getTempoAtual();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="style.css">
    <title>Document</title>

</head>

<body>


    <div class="container text-center mt-5" id="box">

        <div class="col-md-12 mb-5 mt-5>
            <div class=" row justify-content-center text-center">
            <h1>Tempo em
                <?PHP echo $clima->cidade ?>
            </h1>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="row justify-content-center d-flex-center">
                    <div class="col-md-6"><img id="icone" src="imagens/<?php echo $clima->icone ?>.png" alt="">
                    </div>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-md-12">
                        <div class="row">
                            <h1>
                                <?php echo $clima->getTemp($clima->temperatura) ?>ºC
                            </h1>
                            <p><i class="fa-solid fa-temperature-three-quarters"></i><b> Max: </b>
                                <?php echo $clima->getTemp($clima->temperaturaMaxima) ?>ºC
                            </p>
                            <p><i class="fa-solid fa-temperature-quarter"></i> <b> Min: </b>
                                <?php echo $clima->getTemp($clima->temperaturaMinima) ?>ºC
                            </p>
                            <p>
                                <b>Sensação:</b>
                                <?php echo $clima->getTemp($clima->sensacaoTermica) ?>ºC
                            </p>
                            <p>
                                <b>Humidade:</b>
                                <?php echo $clima->humidade ?>%
                            </p>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-md-4 mt-4 text-center">
                <div class="row justify-content-center d-flex-center">
                    <div class="col-md-6 mt-5 mb-2">
                        <h1>Vento</h1>
                    </div>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-md-12">
                        <div class="row ">
                            <p><i class="fa-solid fa-wind"></i>
                                <b>Velocidade:</b>

                                <?php echo $clima->velocidadeDoVeto ?>Km/h
                            </p>
                            <p><i class="fa-regular fa-compass"></i>
                                <b>
                                    Direção:
                                </b>

                                <?php echo $clima->getDirecaoVento() ?>
                            </p>
                        </div>

                    </div>

                </div>
                <div class="row justify-content-center d-flex-center">
                    <div class="col-md-6 mt-1">
                        <h1>Sol</h1>
                    </div>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-md-12">
                        <div class="row ">
                            <p>
                                <i class="fa-solid fa-sun"></i>
                                <b>Nascer:</b>
                                <?php echo $clima->getHorario($clima->nascerDoSol) ?>
                            </p>
                            <p>
                                <i class="fa-solid fa-sun"></i>
                                <b>
                                    Por:
                                </b>
                                <?php echo $clima->getHorario($clima->porDoSol) ?>
                            </p>
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-md-3">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96349.93507176169!2d-48.97163561774777!3d-27.091046439573784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94df47e7c38fa4b3%3A0xf5e4cbe02813448!2sBrusque%2C%20SC!5e1!3m2!1spt-BR!2sbr!4v1698184844725!5m2!1spt-BR!2sbr"
                    width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>