<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "agenda"; // Nome do banco de dados corrigido

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar conexão
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // coletar valores do formulário
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $servico = $_POST['servico'];
    $doutor = $_POST['doutor'];
    $mensagem = $_POST['mensagem'];
    $data = $_POST['data']; // Certifique-se de que esses campos existam no seu formulário
    $hora = $_POST['hora'];
  
    // preparar e executar a consulta SQL
    $sql = "INSERT INTO Consultas (nome, telefone, servico, doutor, mensagem, data, hora) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $nome, $telefone, $servico, $doutor, $mensagem, $data, $hora);
    
    if ($stmt->execute()) {
      echo "Novo registro criado com sucesso";
    } else {
      echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    
    $stmt->close();
}
  
$conn->close();
?>