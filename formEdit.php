<?php 
     session_start();
     include_once('config.php');
     if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['password']) == true))
     {
         unset($_SESSION['email']);
         unset($_SESSION['password']);
         header('Location: home.php');
     }

    if(!empty($_GET['chave'])){
        include_once('config.php');

        $chave = $_GET['chave'];

        $selectSQL= "SELECT * FROM product WHERE chave= $chave";

        $result = $conexao->query($selectSQL);

        if($result->num_rows > 0){
            while($userData = mysqli_fetch_assoc($result)){
                $Entrada = $userData['Entrada'];
                $data =  $userData['Data'];
                $Produto =  $userData['Produto'];
                $HDisp = $userData['HDisp'];
                $QCs = $userData['QCs'];
                $AgTqFus = $userData['AgTqFus'];
                $BatTQFus =  $userData['BatTQFus'];
                $BBFus = $userData['BBFus'];
                $QSol = $userData['QSol'];
                $HHProg = $userData['HHProg'];
                $AgTQMis = $userData['AgTQMis'];
                $BatTqMis = $userData['BatTQMis'];
                $BBMis = $userData['BBMis'];
                $AgTqAli = $userData['AgTqAli'];
                $BBAli = $userData['BBAli'];
                $AccMaqForm = $userData['AccMaqForm'];
                $AccTransEstoc = $userData['AccTransEstoc'];
                $QMFreal = $userData['QMFReal'];
                $AprovQual = $userData['AprovQual'];
            }

        } 
    else{
        header('Location: form.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Formulário CrunchTime</title>

     <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, #6114dc, #8458fc);
        }

        .box{
            position:absolute;
            color: white;
            top: 95%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: #00000099;
            padding: 15px;
            border-radius: 15px;
            width: 38%;/*35%*/
            /*margin-top: 40px;*/   
        }
    
        fieldset{
            border: 3px solid #6114dc;
            border-style:outset;
        }
        legend{
            border: 1px solid #6114dc;
            padding: 10px;
            text-align: center;
            background-color: #6114dc;
            border-radius: 8px;
        }
        .inputBoxRight2{
            position:absolute;
        }
        .inputBoxLeft{
            display: inline-block;
            margin: 5px;
            vertical-align: top;
            position:relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position:static;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: rgb(203, 30, 255);
        }
        #dataEntrada{
            color: #1a041f;
            background-color: #f4e1f9;
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
            float: left;
        }
        #Entrada{
            float: right;
        }
      
        #submit{
            background-image: linear-gradient(to right,#6114dc, #39245C);
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            border-radius: 10px;
        }
        #submit:hover{
            cursor: pointer;
            background-image: linear-gradient(to right,#4f10b4, #2b1b44);
        }
        .buttonExit{
            background-color:#3f0b91;
            color:white;
            position: absolute;
            padding: 10px;
            border-radius: 5px;
            width: 10%;
            border: none;
            cursor: pointer;
        }
    </style> 
</head>
<body>
    
    <nav class="navbar">
        <a href="homeEdit.php" class="btn"><button class="buttonExit">Voltar</button></a>
    </nav>
       
    <br>
    <div class="box">
        <form action="saveEditSql.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário da semana 17 </b></legend>
                <br>
                <div class="inputBoxLeft">
                    <input type="text" name="Entrada" id="Entrada" class="inputUser" placeholder="Entrada (Chave principal)" value="<?php echo $Entrada?>" >
                    <label for="Entrada" class="labelInput">Entrada</label> 
                </div>
                <div class="inputBoxLeft">
                    <label for="dataEntrada" class="labelInput">data</label>
                    <input type="date" name="data" id="dataEntrada" class="inputUser" value="<?php echo $data?>" >
                </div>
                <br>
                <div class="inputBoxLeft">
                    <input type="text" name="Produto" id="Produto" class="inputUser" placeholder="Linha do Produto" value="<?php echo $Produto?>" >
                    <label for="Produto" class="labelInput">Produto</label>
                </div>
                <div class="inputBoxLeft">
                    <input type="number" step="0.1" name="HDisp" id="HDisp" class="inputUser" placeholder="H_Disp" value="<?php echo $HDisp?>"   required>
                    <label for="HDisp" class="labelInput">horas disponíveis no dia (até 24h)</label>
                </div>
                <!-- Volume (em kg) de Chocolate Sólido Fundido = QCs-->
                <div class="inputBoxLeft">
                    <input type="number" name="QCs" id="QCs" class="inputUser" placeholder="Q_Cs"  value="<?php echo $QCs?>" required>
                    <label for="QCs" class="labelInput">Volume (em kg) de chocolate solido Fundido</label>
                </div>
                <!--Horas de operação do Agitador do Tanque de Fusão-->
                <br>
                <div class="inputBoxLeft">
                    <input type="number" step="0.1" min="1.00" max="24.00" name="AgTqFus" id="AgTqFus" class="inputUser" placeholder="Ag_Tq_Fus" value="<?php echo $AgTqFus?>"  required>
                    <label for="AgTqFus" class="labelInput">Horas de operação do Tanque Fusão</label>
                </div>
                <!--BatTQFus-->
                <div class="inputBoxLeft">
                    <input type="number" name="BatTQFus" id="BatTQFus" class="inputUser" placeholder="Bat_TQ_Fus (N° inteiro)"value="<?php echo $BatTQFus?>"  required>
                    <label for="BatTQFus" class="labelInput">N° de bateladas feitas no dia na Fusão</label>
                </div>
                <br><br>
                <!--BBFus-->
                <div class="inputBoxLeft">
                    <input type="number" step="0.01" min="1.00" max="24.00" name="BBFus" id="BBFus" class="inputUser" placeholder="BB_Fus (Valor maximo = 24)"value="<?php echo $BBFus?>" required>
                    <label for="BBFus" class="labelInput">Horas de operação da bomba de tranferência da fusão</label>
                </div>
                <br><br>
                <!--Qsol-->
                <div class="inputBoxLeft"> 
                    <input type="number" step="0.0001" name="QSol" id="QSol" class="inputUser" placeholder="Q_Sol (em Kg)" value="<?php echo $QSol?>" required>
                    <label for="QSol" class="labelInput">Volume de carga consumida do dia</label>
                </div>
                <br><br>
                <!--HHProg-->
                <div class="inputBoxLeft">
                    <input type="number" step="0.01" min="1.00" max="24.00" name="HHProg" id="HHProg" class="inputUser" placeholder="HH_Prog(descontando paradas programadas)" value="<?php echo $HHProg?>" required>
                    <label for="HHProg" class="labelInput">Horas programadas de produção para o dia</label>
                </div>
                <br><br>
                <!--AgTQMis(NÃO TEM A EXPLICAÇÃO DO ROTULO) MUDAR PARA MIS AO INVÉS DE CAR DEPOIS-->
                <div class="inputBoxLeft">
                    <input type="number" step="0.01" min="1.00" max="24.00" name="AgTQMis" id="AgTQMis" class="inputUser" placeholder="Ag_Tq_Mis (Valor maximo = 24)" value="<?php echo $AgTQMis?>" required>
                    <label for="AgTQMis" class="labelInput">Horas de operação do Agitador do Tanque de Mistura</label>
                </div>
                <br><br>
                <!--BatTqMis-->
                <div class="inputBoxLeft">
                    <input type="number"  name="BatTqMis" id="BatTqMis" class="inputUser" placeholder="BatTqMis" placeholder="Bat_TQ_Mis (N° inteiro)" value="<?php echo $BatTqMis?>"  required>
                    <label for="BatTqMis" class="labelInput">N° de bateladas feitas no dia na mistura</label>
                </div>
                <br></br>
                    <div class="inputBoxLeft">
                        <input type="number" step="0.01" min="1.00" max="24.00" name="BBMis" id="BBMis" class="inputUser" placeholder="BB_Mis (Valor maximo = 24)" value="<?php echo $BBMis?>" required>
                        <label for="BBMis" class="labelInput">Horas de operação da bomba de transferência de mistura</label>
                    </div>
                    <br><br>
                    <!--AgTqAli-->
                    <div class="inputBoxLeft">
                        <input type="number" step="0.01" min="1.00" max="24.00" name="AgTqAli" id="AgTqAli" class="inputUser" placeholder="Ag_TQ_Ali (Valor maximo = 24)" value="<?php echo $AgTqAli?>" required>
                        <label for="AgTqAli" class="labelInput">Horas de operação do Agitador do Tanque de Alimentação</label>
                    </div>
                    <br><br>
                    <!--BBAli-->
                    <div class="inputBoxLeft">
                        <input type="number"  step="0.01" min="1.00" max="24.00" name="BBAli" id="BBAli" class="inputUser" placeholder="BB_Ali (Valor maximo = 24)" value="<?php echo $BBAli?>" "required>
                        <label for="BBAli" class="labelInput">Horas de operação da bomba de transferência de Alimentação</label>
                    </div>
                    <br><br>
                    <!--AccMaqForm-->
                    <div class="inputBoxLeft">
                        <input  type="number"  step="0.01" min="1.00" max="24.00" name="AccMaqForm" id="AccMaqForm" class="inputUser" placeholder="Acc_Maq_Form (Valor maximo = 24)" value="<?php echo $AccMaqForm?>"  required>
                        <label for="AccMaqForm" class="labelInput">Horas de operação da Máquina de Formação de Chocolates</label>
                    </div>
                    <br><br>
                    <!--AccTransEstoc-->
                    <div class="inputBoxLeft">
                        <input  type="number" step="0.01" min="1.00" max="24.00" name="AccTransEstoc" id="AccTransEstoc" class="inputUser" placeholder="Acc_Trans_Estoc (Valor maximo = 24)" value="<?php echo $AccTransEstoc?>"  required>
                        <label for="AccTransEstoc" class="labelInput">Horas de operação da Esteira transportadora de Chocolate</label>
                    </div>
                    <br><br>
                    <!--QMFreal-->
                    <div class="inputBoxLeft">
                        <input type="number" step="0.01" max="100.00" name="QMFreal" id="QMFreal" class="inputUser" placeholder="Q_MF_real (em Kg)" value="<?php echo $QMFreal?>" required>
                        <label for="QMFreal" class="labelInput">Volume de carga produzida no dia</label>
                    </div>
                    <br><br>
                    <!--AprovQual --> 
                    <div class="inputBoxLeft">
                        <input type="number" step="0.01" max="1" name="AprovQual" id="AprovQual" class="inputUser" placeholder="Porcentagem (Valor em Decimal)" value="<?php echo $AprovQual?>" required>
                        <label for="AprovQual" class="labelInput">Aprovado Qualidade</label>
                    </div>
                    <br><br>
                <input type="hidden" name="chave" id="chave" value="<?php echo $chave?>" >
                <input type="submit" name="submit" id="submit">
                
            </fieldset>
        </form>
    </div>
</body>
</html>