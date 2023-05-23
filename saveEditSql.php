<?php

    include_once('config.php');

    if(isset($_POST['submit'])){
                $chave = $_POST['chave'];
                $Entrada = $_POST['Entrada'];
                $data =  $_POST['data'];
                $Produto =  $_POST['Produto'];
                $HDisp = $_POST['HDisp'];
                $QCs = $_POST['QCs'];
                $AgTqFus = $_POST['AgTqFus'];
                $BatTQFus =  $_POST['BatTQFus'];
                $BBFus = $_POST['BBFus'];
                $QSol = $_POST['QSol'];
                $HHProg = $_POST['HHProg'];
                $AgTQMis = $_POST['AgTQMis'];
                $BatTqMis = $_POST['BatTqMis'];
                $BBMis = $_POST['BBMis'];
                $AgTqAli = $_POST['AgTqAli'];
                $BBAli = $_POST['BBAli'];
                $AccMaqForm = $_POST['AccMaqForm'];
                $AccTransEstoc = $_POST['AccTransEstoc'];
                $QMFreal = $_POST['QMFreal'];
                $AprovQual = $_POST['AprovQual'];

    $update = "UPDATE product SET Entrada = '$Entrada', data ='$data', Produto ='$Produto', HDisp ='$HDisp', QCs = '$QCs', 
    AgTqFus ='$AgTqFus', BatTQFus = '$BatTQFus', BBFus ='$BBFus', QSol ='$QSol',HHProg = '$HHProg',AgTQMis = '$AgTQMis', BatTqMis = '$BatTqMis', 
    BBMis = '$BBMis', AgTqAli = '$AgTqAli', BBAli ='$BBAli', AccMaqForm = '$AccMaqForm',AccTransEstoc = '$AccTransEstoc', 
    QMFreal ='$QMFreal', AprovQual='$AprovQual'WHERE chave = $chave";

    $result = $conexao->query($update);
    }

    
    header('Location: homeEdit.php');//mudar o nome depois da pag de edit das colunas 17
?>

