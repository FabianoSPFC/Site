<?php

class questao
{
    private $questao, $letra_A, $letra_B, $letra_C, $letra_D, $letra_E, $caminho, $nivel_dificuldade, $resposta;

    public function __construct($q, $A, $B, $C, $D, $E, $caminho, $resp, $nivel)
    {
        $this->questao = $q;
        $this->letra_A = $A;
        $this->letra_B = $B;
        $this->letra_C = $C;
        $this->letra_D = $D;
        $this->letra_E = $E;
        $this->caminho = $caminho;
        $this->resposta = $resp;
        $this->nivel_dificuldade = $nivel;
    }
    function getQuestao()
    {
        return $this->questao;
    }

    function getLetra_A()
    {
        return $this->letra_A;
    }

    function getLetra_B()
    {
        return $this->letra_B;
    }

    function getLetra_C()
    {
        return $this->letra_C;
    }

    function getLetra_D()
    {
        return $this->letra_D;
    }

    function getLetra_E()
    {
        return $this->letra_E;
    }

    function getCaminho()
    {
        return $this->caminho;
    }

    function getNivel_dificuldade()
    {
        return $this->nivel_dificuldade;
    }

    function getResposta()
    {
        return $this->resposta;
    }

    public function sql()
    {
        return "INSERT INTO created_questions (questao, caminho, letra_a, letra_b, letra_c, letra_d, letra_d, letra_e, resposta) VALUES ( '$this->questao' , 'a',  '$this->letra_A' , '$this->letra_B' ,  '$this->letra_C' , '$this->letra_D', '$this->letra_E' , '$this->resposta')";
    }
}
