<?php
$servername = "localhost:3306";
$username = "root";
$password = "123";
$dbname = "consultas";

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
    $data = $_POST['data'];
    $hora = $_POST['hora'];
  
    // preparar e executar a consulta SQL
    $sql = "INSERT INTO Consultas (nome, telefone, servico, doutor, mensagem) VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nome, $telefone, $servico, $doutor, $mensagem);
    
    if ($stmt->execute()) {
      echo "Novo registro criado com sucesso";
    } else {
      echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    
    $stmt->close();
  }
  
  $conn->close();

  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>