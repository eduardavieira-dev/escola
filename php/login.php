<?php
// Inicia a sessão para manter o usuário logado
session_start();

// Estabelece conexão com o servidor e BD
include_once('../conexao/connection.php');

// Verifica se os dados do formulário foram enviados via método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados do formulário
    $matricula = $_POST['matricula'];
    $senha = $_POST['senha'];

    // Prepara a consulta SQL para verificar as credenciais
    $query = "SELECT * FROM cadastrar_aluno WHERE Matricula_aluno = '$matricula' AND Senha_aluno = '$senha'";
    $resultado = mysqli_query($connection, $query);

    if ($resultado) {
        // Verifica se encontrou um usuário com as credenciais fornecidas
        if (mysqli_num_rows($resultado) == 1) {
            // Usuário autenticado com sucesso, inicia a sessão e redireciona
            $_SESSION['matricula'] = $matricula;
            header("Location: ./table.php");
            exit();
        } else {
            echo "Matrícula ou senha incorretos.";
        }
    } else {
        echo "Erro ao executar a consulta: " . mysqli_error($connection);
    }
}
?>
