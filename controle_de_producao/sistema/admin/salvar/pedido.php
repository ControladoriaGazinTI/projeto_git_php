<pre>
<?php
 //verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";
if ($_POST) {
    $id             = "";
    $cliente        = "";
    $produto        = "";
    $prioridade     = "";
    $data_lan       = "";
    $data_ent       = "";
    $qtde           = "";
    $valor          = "";

    foreach ($_POST as $key => $value) {
        //echo "<p>$key $value</p>";
        //$key - nome do campo
        //$value - valor do campo (digitado)
        if ( isset ( $_POST[$key] ) ) {
            $$key = trim ( $value );
        } 
       
    }
   
}
 