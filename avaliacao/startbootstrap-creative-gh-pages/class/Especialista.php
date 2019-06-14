<?php
    class Especialista{
        private $nome;
        private $cidade;
        private $estado;
        private $rua;
        private $contato;
        private $email;

        public function __construct()
        {
            
        }
        public function getNome(){
            return $this->nome;
        }
        public function getCidade(){
            return $this->cidade;
        }
        public function getEstado(){
            return $this->estado;
        }
        public function getRua(){
            return $this->rua;
        }
        public function getContato(){
            return $this->contato;
        }
        public function getEmail(){
            return $this->email;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function setCidade($cidade){
            $this->cidade = $cidade;
        }
        public function setEstado($estado){
            $this->estado = $estado;
        }
        public function setRua($rua){
            $this->rua = $rua;
        }
        public function setContato($contato){
            $this->contato = $contato;
        }
        public function setEmail($email){
            $this->email = $email;
        }
    }
?>