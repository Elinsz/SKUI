<?php
if(isset($_POST['nome']))
{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

      //VERIFICAR SE ESTA PREENCHIDO
    if(!empty($email) && !empty($senha))
    {
        $u->conectar("plugin_elinsz","localhost","root","");
        if($msgErro == "")//se esta tudo ok
        {
            if($u->logar($email,$senha))
            {
                header("elinsz.php");
            }
            else
            {
                echo "Email e/ou senha estão incorreto!";
            }
        }
        else
        {
            echo "Erro: ".$u->msgErro;
        }
    }else
    {
        echo "Preencha todos os campos!";
    }

}


?>
