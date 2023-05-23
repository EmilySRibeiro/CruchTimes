<?php
    session_start();//fazer sessões
     print_r($_REQUEST);
    if(isset($_POST['inputsubmit']) && !empty($_POST['email']) && !empty($_POST['password']))
    {
        // Acessa
        include_once('config.php');
        $email = $_POST['email'];
        $password = $_POST['password'];

         print_r('Email: ' . $email);
         print_r('<br>');
         print_r('Senha: ' . $password);

         $sql = "SELECT * FROM users WHERE email = '$email' and Passwords = '$password'";

         $result = $conexao->query($sql);

          print_r($sql);
          print_r($result);

        // //se o resultado não for igual, então não vai começar uma sessão
         if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['email']);
            unset($_SESSION['Passwords']);
            header('Location: home.php');
        }
        //se o resultado for igual então vai começar uma sessão e direcionar para a o furmulario 
        else
        {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: homeEdit.php');
        }
    }
    else
    {
        // Não acessa
        header('Location: home.php');
    }
?>