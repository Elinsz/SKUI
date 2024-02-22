<?php
// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do corpo da requisição
    $data = json_decode(file_get_contents("php://input"));

    // Verifica se os dados foram recebidos corretamente
    if ($data && isset($data->username) && isset($data->password)) {
        // Conecta ao banco de dados (substitua com suas configurações)
        $servername = "localhost";
        $username = "root";
        $password = " ";
        $dbname = "eis_elinsz";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão com o banco de dados
        if ($conn->connect_error) {
            die("Conexão com o banco de dados falhou: " . $conn->connect_error);
        }

        // Sanitize inputs para evitar SQL Injection (considere usar prepared statements)
        $username = $conn->real_escape_string($data->username);
        $password = $conn->real_escape_string($data->password);

        // Consulta SQL para verificar as credenciais
        $sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        // Verifica se há uma correspondência
        if ($result->num_rows > 0) {
            // Credenciais válidas
            http_response_code(200);
        } else {
            // Credenciais inválidas
            http_response_code(401);
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
