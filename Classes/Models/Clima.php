<?php

class Clima
{

    public $temperatura;
    public $cidade;
    public $humidade;
    public $direcaoDoVendo;
    public $velocidadeDoVeto;
    public $sensacaoTermica;
    public $descricao;
    public $temperaturaMinima;
    public $temperaturaMaxima;
    public $icone;
    public $nascerDoSol;
    public $porDoSol;


    public function getTemp(int $temperatura)
    {
        return number_format($temperatura, 0);
    }

    public function getHorario(int $timestamp)
    {

        $tempo = new DateTime("@$timestamp");

        $fusoBrasil = new DateTimeZone("America/Sao_Paulo");

        $tempo->setTimezone($fusoBrasil);

        return $tempo->format("H:i:s");

    }

    public function getDirecaoVento(){

        if($this->direcaoDoVendo >= 0 && $this->direcaoDoVendo <= 45){
            return 'norte';
        }
        else if($this->direcaoDoVendo > 45 && $this->direcaoDoVendo <= 135){
            return 'leste';
        }
        else if($this->direcaoDoVendo > 135 && $this->direcaoDoVendo <= 225){
            return 'sul';
        }
        else if($this->direcaoDoVendo > 225 && $this->direcaoDoVendo <= 315){
            return 'oeste';
        }
        else{
            return 'norte';
        }
    }
}   


?>