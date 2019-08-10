<?php
class Especialista
{
    private $nome;
    private $cidade;
    private $estado;
    private $rua;
    private $contato;
    private $email;
    private $senha;
    private $login;

    public function __construct()
    { }
    public function getNome()
    {
        return $this->nome;
    }
    public function getLogin()
    {
        return $this->login;
    }
    public function getSenha()
    {
        return $this->senha;
    }
    public function getCidade()
    {
        return $this->cidade;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function getRua()
    {
        return $this->rua;
    }
    public function getContato()
    {
        return $this->contato;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function setRua($rua)
    {
        $this->rua = $rua;
    }
    public function setContato($contato)
    {
        $this->contato = $contato;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setLogin($login)
    {
        $this->login = $login;
    }
    public function setSenha($senha)
    {
        $senha = crypt($senha,null);
        $this->senha = $senha;
    }
}

