<?php
// estabelece conexão com o servidor e BD
include_once('../conexao/connection.php');

// verifica se os dados do formulário foram enviados via método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // obtém os dados do formulário
    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $turma = $_POST['turma'];
    $senha = $_POST['senha'];

    // prepara a consulta SQL para inserir os dados
    $inserir = mysqli_query($connection, "INSERT INTO cadastrar_aluno (Matricula_aluno, Nome_aluno, Cpf_aluno, Turma, Senha_aluno)
                                          VALUES ('$matricula', '$nome', '$cpf', '$turma', '$senha')");

    // verifica se a inserção foi bem-sucedida
    if ($inserir) {
        // Redireciona para a página de login após o cadastro
        header("Location: ../login.html");
        exit();
    } else {
        echo "Erro ao cadastrar aluno: " . mysqli_error($connection);
    }
}
?>
