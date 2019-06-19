<?php
require_once 'Especialista.php';
class Tratamento extends Especialista
{
    private $tipoTratamento;
    private $idEspecialista;
    private $id;
    private $exercicio;
    private $medicamento;
    private $alimentacao;
    private $loginEntrar;
    private $senhaEntrar;

    public function __construct()
    { }
    public function GetId()
    {
        return $this->id;
    }
    public function getLoginEntrar()
    {
        return $this->loginEntrar;
    }
    public function getSenhaEntrar()
    {
        return $this->senhaEntrar;
    }
    public function getTipoTratamento()
    {
        return $this->tipoTratamento;
    }
    public function getIdEspecialista()
    {
        return $this->idEspecialista;
    }
    public function getExercicio()
    {
        return $this->exercicio;
    }
    public function getMedicamento()
    {
        return $this->medicamento;
    }
    public function getAlimentacao()
    {
        return $this->alimentacao;
    }
    public function setLoginEntrar($login)
    {
        $this->loginEntrar = $login;
    }
    public function setSenhaEntrar($senha)
    {
        $this->senhaEntrar =  $senha;
    }
    public function setTipoTratamento($tipoTratamento)
    {
        $this->tipoTratamento = $tipoTratamento;
    }
    public function setIdEspecialista($idEspecialista)
    {
        $this->idEspecialista = $idEspecialista;
    }
    public function setExercicio($exercicio)
    {
        $this->exercicio = $exercicio;
    }
    public function setMedicamento($medicamento)
    {
        $this->medicamento = $medicamento;
    }
    public function setAlimentacao($alimentacao)
    {
        $this->alimentacao = $alimentacao;
    }
    public function setId($tratamento)
    {
        $this->id = $tratamento;
    }
    public function salvarEspecialista()
    {
        include "config/conexao.php";
        include "config/funcoes.php";

        if (!isset($id)) {
            $pdo->beginTransaction();
            $sql = "INSERT INTO especialista
                (id,nome,cidade,estado,rua,contato,email,login,senha) 
                VALUES 
                (NULL,:nome,:cidade,:estado,:rua,:contato,:email,:login,:senha)";

            $consulta = $pdo->prepare($sql);
            $consulta->bindValue(":nome", $this->getNome());
            $consulta->bindValue(":cidade", $this->getCidade());
            $consulta->bindValue(":estado", $this->getEstado());
            $consulta->bindValue(":rua", $this->getRua());
            $consulta->bindValue(":contato", $this->getContato());
            $consulta->bindValue(":email", $this->getEmail());
            $consulta->bindValue(":login", $this->getLogin());
            $consulta->bindValue(":senha", $this->getSenha());

            // printf ("New Record has id %d.\n", $consulta->insert_id);
        }

        if ($consulta->execute()) {
            $pdo->commit();
            $msg = "Cadastrador com sucesso!!!";
            sucesso($msg, "cadastros/usuario");
        } else {
            $msg = "Erro ao salvar quadrinho";
            mensagem($msg);
            $pdo->rollBack();
        }
    }
    public function login()
    {

        include "config/conexao.php";
        include "config/funcoes.php";
        //verificar se o longin esta em brancos

        if (empty($this->getLoginEntrar())) {
            $msg = "Preencha o login:";
            menssagem($msg);
            //verificar se a senha esta em branco
        } else if (empty($this->getSenhaEntrar())) {
            menssagem("preencha o senha:");
        } else {
            //login e a senha foram preenchidos
            //buscar o usuario em banco
            $sql = "SELECT id, nome ,login , senha
                         from especialista
                         where login = ? 
                         limit 1";
            //preparar o sql para execução
            $consulta = $pdo->prepare($sql);
            //passar o parametro
            $consulta->bindValue(1, $this->getLoginEntrar());
            //executar
            $consulta->execute();
            //recuperar os dados da cunsulta

            $dados = $consulta->fetch(PDO::FETCH_OBJ);

            if (isset($dados->id)) {
                //verifica se trouxe algum resultado
                if (!password_verify($this->getSenhaEntrar(), $dados->senha)) {
                    $msg = "Senha invalida!!!";
                    menssagem($msg);
                } else {
                    $_SESSION["banco_avaliacao"] = array(
                        "id" => $dados->id,
                        "login" => $dados->login,
                    );
                }
            } else {
                //se nao trouxe resultado
                $msg = "Usuário inexistente ou desativado";
                menssagem($msg);
            }
            //redirecionar a tela para home
            echo "<script>location.href='cadastros/tratamento'</script>";
        }
    }
    public function salvarTratamento()
    {
        include "config/conexao.php";
        include "config/funcoes.php";

        if (!isset($id)) {
            $pdo->beginTransaction();
            $sql = "INSERT INTO tratamento
                (id,exercicio,medicamento,alimentacao,tipo_tratamento,idespecialista) 
                VALUES 
                (NULL,:exercicio,:medicamento,:alimentacao,:tipo_tratamento,:idespecialista)";

            $consulta = $pdo->prepare($sql);
            $consulta->bindValue(":exercicio", $this->getExercicio());
            $consulta->bindValue(":medicamento", $this->getMedicamento());
            $consulta->bindValue(":alimentacao", $this->getAlimentacao());
            $consulta->bindValue(":tipo_tratamento", $this->getTipoTratamento());
            $consulta->bindValue(":idespecialista", $this->getIdEspecialista());

            // printf ("New Record has id %d.\n", $consulta->insert_id);
        }

        if ($consulta->execute()) {
            $_SESSION["idtratamento"] = $pdo->lastInsertId();
            $pdo->commit();
             $msg = "Cadastrador com sucesso!!!";
            sucesso($msg, "cadastros/tratamento");
        } else {
            $msg = "Erro ao salvar quadrinho";
            mensagem($msg);
            $pdo->rollBack();
        }
    }
}
