
$(document).ready(function() {
    // Manipulador de evento para o clique do botão entrar
    $("#btn_login").click(function() {
        // Obtenha os dados do formulário
        var username = $("#username").val();
        var password = $("#password").val();

        // Faça uma requisição AJAX ao servidor (caminho relativo)
        $.ajax({
            url: "http://localhost/eis_elinsz/check_login.php", // caminho relativo
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify({ username: username, password: password }),
            success: function(response) {
                // Verifique a resposta do servidor
                if (response.success) {
                    alert("Login bem-sucedido!");
                    // Redirecione ou faça qualquer ação necessária após o login bem-sucedido
                } else {
                    alert('Login falhou. Verifique suas credenciais.');
                }
            },
            error: function() {
                alert("Erro na requisição. Tente novamente.");
            }
        });
    });
});
