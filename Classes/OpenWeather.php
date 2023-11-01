<?php

require 'Classes/Models/Clima.php';

use GuzzleHttp\Client;

class OpenWeather
{

    public $latitude = '-27.1091287397728';
    public $longitude = '-48.91347116618133';
    public $appid = '3af5f0dc0b125a773f61ff688a6c14e1';

    public function getTempoAtual()
    {

        try {

            $recurso = "https://api.openweathermap.org/data/2.5/weather?units=metric&lang=pt&lat=" . $this->latitude . "&lon=" . $this->longitude . "&appid=" . $this->appid;

            $client = new GuzzleHttp\Client();
            $resposta = $client->request('GET', $recurso, []);

            $objJson = json_decode($resposta->getBody());
            $clima = $this->mapear($objJson);
            $this->guardarEmCache($clima);

        } catch (Exception $e) {
            $clima = $this->obterDoCache();
        }

        return $clima;

    }

    private function mapear($objJson)
    {

        $clima = new Clima();

        $clima->temperatura = $objJson->main->temp;
        $clima->cidade = $objJson->name;
        $clima->humidade = $objJson->main->humidity;
        $clima->direcaoDoVendo = $objJson->wind->deg;
        $clima->velocidadeDoVeto = $objJson->wind->speed;
        $clima->sensacaoTermica = $objJson->main->feels_like;
        $clima->descricao = $objJson->weather[0]->description;
        $clima->temperaturaMinima = $objJson->main->temp_min;
        $clima->temperaturaMaxima = $objJson->main->temp_max;
        $clima->icone = $objJson->weather[0]->icon;
        $clima->nascerDoSol = $objJson->sys->sunrise;
        $clima->porDoSol = $objJson->sys->sunset;

        return $clima;

    }

    public function guardarEmCache($clima)
    {
        $dadosSerializados = serialize($clima);

        $caminhoArquivoCache = 'cache/clima.bin';

        file_put_contents($caminhoArquivoCache, $dadosSerializados);

    }

    public function obterDoCache()
    {

        $caminhoArquivoCache = 'cache/clima.bin';

        $dadosSerializados = file_get_contents($caminhoArquivoCache);

        $dadosDeserealizados = unserialize($dadosSerializados);

        return $dadosDeserealizados;

    }

}