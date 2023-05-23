<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, #6114dc, #24164e);
            color: white;
        }
        div{
            background-color: #170e326f;
            position: absolute; /*apenas os espaços dos elementos*/
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); /*para zerar o meio da pag*/
            padding: 80px;
            border-radius: 15px;

        }
        input{
            padding: 10px;
            border-radius: 15px;
            border: none;
            outline: none;
            font-size: 15px;
        }

   /*     button{
            border: none;
            /*padding: 25px;
            width: 80%;
            border-radius: 15px;
            outline: none;
            color: white;
            font-size: 15px;
        }
*/
        #inputsubmit{
            margin-top: 10px;
            background-color: #24164e;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            
        }
        #inputsubmit:hover{
            cursor: pointer;
            background-color: #452c91;
        }
    </style>
    
</head>
<body>

    <div>
        <form action="testLogin.php" method="post">
            <h1>Login</h1>
            <input type="text" name="email" placeholder="User">
            <br><br>
            <input type="password" name="password" placeholder="Password">
            <br>
            <input type="submit" name="inputsubmit" id="inputsubmit" value="Enviar">
        </form>

    </div>

</body>
</html>