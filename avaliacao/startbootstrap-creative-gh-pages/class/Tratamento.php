<?php
    require_once 'Especialista.php';
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
        public function salvarEspecialista(){
            include "config/conexao.php";
            include "config/funcoes.php";

            if(!isset($id)){
                $pdo->beginTransaction();
                $sql = "INSERT INTO especialista
                (id,nome,cidade,estado,rua,contato,email,login,senha) 
                VALUES 
                (NULL,:nome,:cidade,:estado,:rua,:contato,:email,:login,:senha)";
               
                $consulta = $pdo->prepare($sql);
                $consulta->bindValue(":nome",$this->getNome());
                $consulta->bindValue(":cidade",$this->getCidade());
                $consulta->bindValue(":estado",$this->getEstado());
                $consulta->bindValue(":rua",$this->getRua());
                $consulta->bindValue(":contato",$this->getContato());
                $consulta->bindValue(":email",$this->getEmail());
                $consulta->bindValue(":login",$this->getLogin());
                $consulta->bindValue(":senha",$this->getSenha());
                
                // printf ("New Record has id %d.\n", $consulta->insert_id);
            }
            
            if($consulta->execute()){
               $this->setIdEspecialista($pdo->lastInsertId());
               $pdo->commit();
            }else{
                    echo $consulta->errorInfo()[2];
                    exit;
                    $msg = "Erro ao salvar quadrinho";
                    mensagem( $msg );
                    $pdo->rollBack();
            }
        }
    }
?>