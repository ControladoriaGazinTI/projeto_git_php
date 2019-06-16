<?php
    class Tratamento extends Especialista{
        private $tipoTratamento;
        private $idEspecialista;
        private $exercicio;
        private $medicamento;
        private $alimentacao;

        public function __construct()
        {
            
        }
        public function getTipoTratamento(){
            return $this->tipoTratamento;
        }
        public function getIdEspecialista(){
            return $this->idEspecialista;
        }
        public function getExercicio(){
            return $this->exercicio;
        }
        public function getMedicamento(){
            return $this->medicamento;
        }
        public function getAlimentacao(){
            return $this->alimentacao;
        }
        public function setTipoTratamento($tipoTratamento){
            $this->tipoTratamento = $tipoTratamento;
        }
        public function setIdEspecialista($idEspecialista){
            $this->idEspecialista = $idEspecialista;
        }
        public function setExercicio($exercicio){
            $this->exercicio = $exercicio;
        }
        public function setMedicamento($medicamento){
            $this->medicamento = $medicamento;
        }
        public function setAlimentacao($alimentacao){
            $this->alimentacao = $alimentacao;
        }
    }
?>