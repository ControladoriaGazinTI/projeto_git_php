<?php
class Usuario
{
    private $id;
    private $nome;
    private $data_nasc;
    private $sexo;
    private $cpf;
    private $altura;
    private $peso;

    public function __construct()
    { }

    public function getId()
    {
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getDataNasc()
    {
        return $this->data_nasc;
    }
    public function getSexo()
    {
        return $this->sexo;
    }
    public function getCpf()
    {
        return $this->cpf;
    }
    public function getAltura()
    {
        return $this->altura;
    }
    public function getPeso()
    {
        return $this->peso;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setDataNasc($data)
    {
        $this->data_nasc = $data;
    }
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    public function setAltura($altura)
    {
        $this->altura = $altura;
    }
    public function setPeso($peso)
    {
        $this->peso = $peso;
    }
}
