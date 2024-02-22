<?php
header('Content-Type: application/json');

// Conectar ao banco de dados
$conn = new mysqli('localhost', 'root', ' ', 'eis_elinsz');

// Verificar a conexão
if ($conn->connect_error) {
    die('Erro de conexão: ' . $conn->connect_error);
}

// Obter dados do formulário
$username = $_POST['username'];
$password = $_POST['password'];

// Consultar o banco de dados para verificar as credenciais
$query = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
$result = $conn->query($query);

// Verificar se o usuário foi encontrado
if ($result->num_rows > 0) {
    echo json_encode(array('success' => true));
} else {
    echo json_encode(array('success' => false));
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
