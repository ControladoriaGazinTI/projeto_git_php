<?php
require_once 'Usuario.php';
class Resultado extends Usuario
{
    private $data;
    private $imc;
    private $classificacao;
    private $idUsuario;
    private $idtratamento;

    public function __construct()
    { }

    public function getData()
    {
        return $this->data;
    }
    public function getImc()
    {
        return $this->imc;
    }
    public function getClassificacao()
    {
        return $this->classificacao;
    }
    public function getIdTratamento()
    {
        return $this->idtratamento;
    }
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    public function setData($data)
    {
        $this->data = $data;
    }
    public function setImc($imc)
    {
        $this->imc = $imc;
        $this->classificacao();
        $this->setData(date('d/m/Y'));
    }
    public function setClassificacao($classificacao)
    {
        $this->classificacao = $classificacao;
    }
    public function setIdTratamento($tratamento)
    {
        $this->idtratamento = $tratamento;
    }
    public function setIdUsuario($objeto)
    {
        $this->idUsuario = $objeto;
    }
    public function calcularImc()
    {
        $calculo = 0.0;  
        $calculo = $this->getAltura() * $this->getAltura();
        $calculo = $this->getPeso() / $calculo;
        $this->setImc($calculo);
    }
    public function classificacao()
    {
        if ($this->getImc() < 0) {
            $this->setClassificacao("IMC inválido");
        } elseif ($this->getImc() < 18.5) {
            $this->setClassificacao("Abaixo do Peso.");
            $this->setIdTratamento(1);
        } elseif ($this->getImc() < 25) {
            $this->setClassificacao("Peso ideal!!!Parabéns.");
        } elseif ($this->getImc() < 30) {
            $this->setClassificacao("Levemente acima do Peso.");
            $this->setIdTratamento(2);
        } elseif ($this->getImc() < 35) {
            $this->setClassificacao("Obesidade grau 1.");
            $this->setIdTratamento(3);
        } elseif ($this->getImc() < 40) {
            $this->setClassificacao("Obesidade grau 2 (severa).");
            $this->setIdTratamento(4);
        } elseif ($this->getImc() < 60) {
            $this->setClassificacao("Obesidade grau 3 (mórbida) ");
            $this->setIdTratamento(5);
        } else {
            $this->setClassificacao("IMC inválido");
        }
    }
    public function salvarUsuario()
    {
        var_dump($this->getImc());
                var_dump($this->getData());
                var_dump($this->getClassificacao());
                var_dump($this->getIdUsuario());
                var_dump($this->getIdTratamento());
        include "config/conexao.php";
        include "config/funcoes.php";
        if (empty($id)) {
            $pdo->beginTransaction();
            $sql = "INSERT INTO usuario VALUES (NULL,?,?,?,?,?,?)";
            $consulta = $pdo->prepare($sql);
            $consulta->bindValue(1, $this->getNome());
            $consulta->bindValue(2, $this->getDataNasc());
            $consulta->bindValue(3, $this->getSexo());
            $consulta->bindValue(4, $this->getCpf());
            $consulta->bindValue(5, $this->getAltura());
            $consulta->bindValue(6, $this->getPeso());
          
            if($consulta->execute()){
                $this->setIdUsuario($pdo->lastInsertId());
                $sqli = "INSERT INTO resultado VALUES (NULL,?,?,?,?,?)";
                $teste = $pdo->prepare($sqli);
                $teste->bindValue(1,$this->getImc());
                $teste->bindValue(2,$this->getData());
                $teste->bindValue(3,$this->getClassificacao());
                $teste->bindValue(4,$this->getIdUsuario());
                $teste->bindValue(5,$this->getIdTratamento());
            }
            if($teste->execute()){
                echo "funcionou";
                $pdo->commit();
            }else {
                var_dump($this->getImc());
                var_dump($this->getData());
                var_dump($this->getClassificacao());
                var_dump($this->getIdUsuario());
                var_dump($this->getIdTratamento());
            }
        }
    }
}
