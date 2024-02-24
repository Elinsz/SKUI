<?php
//verificar se clicou no botão
if(isset($_POST['email']))
{
  $nome = addslashes($_POST['nome']);
  $email = addslashes($_POST['email']);
  $senha = addslashes($_POST['senha']);
  $confirmarSenha = addslashes($_POST['confSenha']);

  //VERIFICAR SE ESTA PREENCHIDO
  if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
  {
    $u->conectar("eis_elinsz","localhost","root","");
    if($u->msgErro == "")//se esta tudo ok
    {
      if($senha == $confirmarSenha)
      {

        if($u->cadastrar($nome,$email,$senha))

        {
		?>

		<div id="msg-sucesso">
        Cadastrado com Sucesso! Acesse a página de Login!
		</div>

		<?php
        }
        else
        {
		?>
		<div class="msg-erro">
        Email ja cadastrado!
		</div>
		<?php
        }
      }
      else
      {
		?>
		<div class="msg-erro">
        Senha e confirmar senha não correspondem!
		</div>
		<?php
      }
    }
    else
    {
	?>
	<div class="msg-erro">
    <?php echo "Erro: ".$u->msgErro;?>
	</div>
	<?php
    }
   }else
  {
	?>
	<div class="msg-erro">
    Preencha todos os campos!
	</div>

	<?php
  }
}

?>
