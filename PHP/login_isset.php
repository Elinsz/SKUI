<?php
  if(isset($_POST['email']))
  {
      $email = addslashes($_POST['email']);
      $senha = addslashes($_POST['senha']);

        //VERIFICAR SE ESTA PREENCHIDO
      if(!empty($email) && !empty($senha))
      {
          $u->conectar("eis_elinsz","localhost","root","");
          if($msgErro == "")//se esta tudo ok
          {
              if($u->logar($email,$senha))
              {
                  header("location: index.php");
              }
              else
              {
          ?>
          <div id="msg-sucesso">
                  Email e/ou senha estão incorreto!
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
      <?php
      }

  }


  ?>
