<?php
//verificar se clicou no botão
if(isset($_POST['nome']))
{
  $nome = addslashes($_POST['nome']);
  $email = addslashes($_POST['email']);
  $senha = addslashes($_POST['senha']);
  $confirmarSenha = addslashes($_POST['confSenha']);

  //VERIFICAR SE ESTA PREENCHIDO
  if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
  {
    $u->conectar("plugin_elinsz","localhost","root","");
    if($u->msgErro == "")//se esta tudo ok
    {
      if($senha == $confirmarSenha)
      {
        if($u->cadastrar($nome,$email,$senha))
        {
          echo "Cadastrado com Sucesso! Acesse para entrar!";
        }
        else
        {
          echo "Email ja cadastrado";
        }
      }
      else
      {
        echo "Senha e confirmar senha não correspondem!";
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
