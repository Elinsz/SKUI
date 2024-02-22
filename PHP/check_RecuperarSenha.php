<?php
// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do corpo da requisição
    $data = json_decode(file_get_contents("php://input"));

    // Verifica se os dados foram recebidos corretamente
    if ($data && isset($data->email)) {
        // Conecta ao banco de dados (substitua com suas configurações)
        $servername = "localhost";
        $username = "root";
        $password = " ";
        $dbname = "eis-elinsz";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão com o banco de dados
        if ($conn->connect_error) {
            die("Conexão com o banco de dados falhou: " . $conn->connect_error);
        }

        // Sanitize inputs para evitar SQL Injection (considere usar prepared statements)
        $email = $conn->real_escape_string($data->email);

        // Consulta SQL para verificar se o e-mail existe
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = $conn->query($sql);

        // Verifica se há uma correspondência
        if ($result->num_rows > 0) {
            // E-mail válido, proceda com a recuperação de senha
            // Aqui você pode gerar um token e enviar um e-mail de recuperação de senha, por exemplo
            http_response_code(200);
        } else {
            // E-mail não encontrado
            http_response_code(404);
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    } else {
        // Dados inválidos
        http_response_code(400);
    }
} else {
    // Método de requisição inválido
    http_response_code(405);
}
?>
