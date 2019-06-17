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
        $this->setIdUsuario($this->getId());
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
        include "config/conexao.php";
        include "config/funcoes.php";

        if (empty($id)) {
            $pdo->beginTransaction();
            $sql = "INSERT INTO usuario 
                (id,nome,data_nasc,sexo,cpf,altura,peso) 
                VALUES 
                (NULL,:nome,:data_nasc,:sexo,:cpf,:altura,:peso)";

            $consulta = $pdo->prepare($sql);
            $consulta->bindValue(":nome", $this->getNome());
            $consulta->bindValue(":data_nasc", $this->getDataNasc());
            $consulta->bindValue(":sexo", $this->getSexo());
            $consulta->bindValue(":cpf", $this->getCpf());
            $consulta->bindValue(":altura", $this->getAltura());
            $consulta->bindValue(":peso", $this->getPeso());

            // printf ("New Record has id %d.\n", $consulta->insert_id);
        }

        if ($consulta->execute()) {
            $this->setId($pdo->lastInsertId());
            $insert = "INSERT INTO resultado
            (id,imc,data,classificacao,idusuario,idtratamento)
            VALUES 
            (NULL,:imc,:data,:classificacao,:idusuario,:idtratamento";
            $consulta = $pdo->prepare($insert);
            $consulta->bindValue(":imc", $this->getImc());
            $consulta->bindValue(":data", $this->getData());
            $consulta->bindValue(":classificacao", $this->getClassificacao());
            $consulta->bindValue(":idusuario", $this->getIdUsuario());
            $consulta->bindValue(":idtratamento", $this->getIdTratamento());
            $pdo->commit();
        } else {
            echo $consulta->errorInfo()[2];
            exit;
            $msg = "Erro ao salvar quadrinho";
            mensagem($msg);
            $pdo->rollBack();
        }
    }
}
