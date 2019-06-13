<?php
    require_once 'Tratamento.php';
    require_once 'Usuario.php';
    class Resultado{
        private $data;
        private $imc;
        private $classificacao;
        private $objetoUsuario; 
        private $idtratamento ;
        
        public function __construct()
        {
            
        }

        public function getData(){
            return $this->data;
        }
        public function getImc(){
            return $this->imc;
        }
        public function getClassificacao(){
            return $this->classificacao;
        }
        public function getIdTratamento(){
            return $this->idtratamento;
        }
        public function getIdUsuario(){
            return $this->objetoUsuario;
        }
        public function setData($data){
            $this->data = $data;
        }
        public function setImc($imc){
            $this->imc = $imc;
            $this->classificacao();
        }
        public function setClassificacao($classificacao){
            $this->classificacao = $classificacao;
        }
        public function setIdTratamento($tratamento){
            $this->idtratamento = $tratamento;
        }
        public function setIdUsuario($objeto){
            $this->objetoUsuario = $objeto;
        }
        public function classificacao(){
            if($this->getImc() < 0){
                $this->setClassificacao("IMC inválido");
            }elseif($this->getImc() < 18.5){
                $this->setClassificacao("Abaixo do Peso.");
            }elseif($this->getImc() < 25){
                $this->setClassificacao("Peso ideal!!!Parabéns.");
            }elseif($this->getImc() < 30){
                $this->setClassificacao("Levemente acima do Peso.");
            }elseif($this->getImc() < 35){
                $this->setClassificacao("Obesidade grau 1.");
            }elseif($this->getImc() < 40){
                $this->setClassificacao("Obesidade grau 2 (severa).");
            }elseif($this->getImc() < 60){
                $this->setClassificacao("Obesidade grau 3 (mórbida) ");
            }else{
                $this->setClassificacao("IMC inválido");
            }
        }
    }
?>