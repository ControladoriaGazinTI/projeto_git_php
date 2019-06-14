<?php
    
    class Usuario{
        private $id;
        private $nome;
        private $data_nasc;
        private $sexo;
        private $cpf;
        private $altura;
        private $peso;
        private $resultado;

        public function __construct()
        {
            $id           = "";
            $nome         = "";
            $data_nasc    = "";
            $sexo         = "";
            $cpf          = "";
            $altura       = 0 ;
            $peso         = 0 ;
            $resultado    = 0 ;
        }
        public function getResultado(){
            return $this->resultado;
        }
        public function getId(){
            return $this->id;
        }
        public function getNome(){
            return $this->nome;
        }
        public function getDataNasc(){
            return $this->data_nasc;
        }
        public function getSexo(){
            return $this->sexo;
        }
        public function getCpf(){
            return $this->cpf;
        }
        public function getAltura(){
            return $this->altura;
        }
        public function getPeso(){
            return $this->peso;
        }

        public function setId($id){
            $this->id = $id;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function setDataNasc($data){
            $this->data_nasc = $data;
        }
        public function setSexo($sexo){
            $this->sexo = $sexo;
        }
        public function setCpf($cpf){
            $this->cpf = $cpf;
        }
        public function setAltura($altura){
            $this->altura = $altura;
        }
        public function setPeso($peso){
            $this->peso = $peso;
        }
        public function setResultado($resultado){
            $this->resultado = $resultado;
        }
        public function calcular(){
            $this->setResultado($this->getAltura() * $this->getAltura());
            $this->setResultado($this->getPeso() / $this->getResultado());
        }
        public function salvarbanco(){
            include "../config/conexao.php";
            include "../config/funcoes.php";
            if(empty($id)){
                $sql = "INSERT INTO usuario 
                (id,nome,data_nasc,sexo,cpf,altura,peso) 
                VALUES 
                (NULL,:nome,:data_nasc,:sexo,:cpf,:altura,:peso)";
                $consulta = $pdo->prepare($sql);
                $consulta->bindValue(":nome",$this->getNome());
                $consulta->bindValue(":data_nasc",$this->getDataNasc());
                $consulta->bindValue(":sexo",$this->getSexo());
                $consulta->bindValue(":cpf",$this->getCpf());
                $consulta->bindValue(":altura",$this->getAltura());
                $consulta->bindValue(":peso",$this->getPeso());
            }
            if($consulta->execute()){
                $msg = "Registro inserido com sucesso!";
		    	sucesso( $msg, "index.php" );
            }else{
                    echo $consulta->errorInfo()[2];
                    exit;
                    $msg = "Erro ao salvar quadrinho";
                    mensagem( $msg );
            }
        }
    }
?>