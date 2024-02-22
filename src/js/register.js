/*******************************************************************************
 *
 * class Register
 *
 ******************************************************************************/

<script>
$(document).ready(function() {
    // Manipulador de evento para o clique do botão cadastrar
    $("#register").click(function() {
        // Obtenha os dados do formulário
        var username = $("#username").val();
        var password = $("#password").val();

        // Faça uma requisição AJAX ao servidor (substitua a URL com o caminho correto para o seu arquivo PHP)
        $.ajax({
            url: "caminho/para/check_cadastro.php",
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify({ username: username, password: password }),
            success: function(response) {
                // Verifique a resposta do servidor
                if (response === "200") {
                    alert("Cadastro bem-sucedido!");
                    // Redirecione ou faça qualquer ação necessária após o cadastro bem-sucedido
                } else {
                    alert("Falha no cadastro. Verifique suas credenciais.");
                }
            },
            error: function() {
                alert("Erro na requisição. Tente novamente.");
            }
        });
    });
});
</script>

