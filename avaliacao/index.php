<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="jquery/jquery.mask.min.js"></script>
    <title>Document</title>
</head>
<body>
    <pre>
        <?php
            require_once 'Usuario.php';
            $objeto = new Usuario;
            if(isset($_POST["enviar"])){
                $objeto->setNome($_POST["nome"]);
                $objeto->setDataNasc($_POST["data_nasc"]);
                $objeto->setSexo($_POST["sexo"]);
                $objeto->setCpf($_POST["cpf"]);
                $objeto->setAltura($_POST["altura"]);
                $objeto->setPeso($_POST["peso"]);
                $objeto->calcular();
                print_r($objeto);
            }
        ?>
        <form action="" method="post">
            <div>
                <label>Nome:</label>
                <input type="text" name="nome">
            </div>
            <div>
                <label>Data de nascimento:</label>
                <input type="date" name="data_nasc">
            </div>
            <div>
                <select name="sexo">
                    <option value="0"></option>
                    <option value="1">Masculino</option>
                    <option value="2">Feminino</option>
                </select>
            </div>
            <div>
                <label>CPF:</label>
                <input type="text" name="cpf"   onkeypress= "$(this).mask('000.000.000-00')">
            </div>
            <div>
                <label>Altura:</label>
                <input type="text" name="altura">
            </div>
            <div>
                <label>Peso:</label>
                <input type="text" name="peso">
            </div>
            <div>
                <label>Resultado:</label>
                <input type="text" name="resultado" value="<?=$objeto->getResultado();?>">
            </div>
            <button name="enviar" type="submit">Enviar</button>
        </form>
        </pre>
</body>
</html>