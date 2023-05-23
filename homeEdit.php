<?php

    session_start();
    include_once('config.php');
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['password']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header('Location: home.php');
    }
    
    $sqlSelect = " SELECT  chave, Entrada, Data, Produto, HDisp, QCs, AgTqFus
    FROM product WHERE HDisp = 0";

    $result = $conexao->query($sqlSelect);

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Edição dos registros</title>
    <style>
        body{
                font-family: Arial, Helvetica, sans-serif;
                background-image: linear-gradient(to right, #6114dc, #8458fc);
                background: #8458fc;
                color:white;
                
            }
        .divTable{
            position:absolute;
            color: white;
            top: 55%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: #00000099;
            padding: 15px;
            border-radius: 5px;
            width: 50%;
        }
        tableMain{
            border:  5 solid;
        }
        .navbar{
            background: #00000099;
        }
        .buttonEdit{
            background-color:#6114dc;
            color:white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            padding:10px;
        }
        .buttonExit{
            
            background-color:#6114dc;
            color:white;
            padding: 10px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            margin-botton:15px;
        }
    </style>
</head>
<body class="body">
    <div class="navbar">
    
    <a href="sair.php" class="btn"><button class="buttonExit">Sair</button></a>
    <h2>Tabela de valores</h2>
    </div>
    
    <div class="divTable">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Entrada</th>
            <th scope="col">Data Entrada</th>
            <th scope="col">Produto</th>
            <th scope="col">H_disp</th>
            <th scope="col">Q_CS</th>
            <th scope="col">Ag_Tq_Fus</th>
            <th scope="col">...</th>

        </tr>
        </thead>
        <tbody>
            <?php
            while($userData = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo"<td>".$userData['chave']."</td>";
            echo"<td>".$userData['Entrada']."</td>";
            echo"<td>".$userData['Data']."</td>";
            echo"<td>".$userData['Produto']."</td>";
            echo"<td>".$userData['HDisp']."</td>";
            echo"<td>".$userData['QCs']."</td>";
            echo"<td>".$userData['AgTqFus']."</td>";
            echo "<td><a href='formEdit.php?chave=$userData[chave]' class=''><button class='buttonEdit'>Alterar</button></a></td>";
            // echo"<td><a href='#' class='btn'><button class='buttonExit'>Alterar</button></a></td>";
        }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
