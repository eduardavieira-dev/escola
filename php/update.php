<?php
// estabelece conexão com o servidor e BD
include_once('../conexao/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $turma = $_POST['turma'];
    $senha = $_POST['senha'];

    $atualizar = mysqli_query($connection, "UPDATE cadastrar_aluno 
                                            SET Matricula_aluno = '$matricula',
                                                Nome_aluno = '$nome',
                                                Cpf_aluno = '$cpf',
                                                Turma = '$turma',
                                                Senha_aluno = '$senha'
                                            WHERE ID = '$id'") 
                                            or die(mysqli_error($connection));

    if ($atualizar) {
        // Redireciona para table.php após a atualização
        header("Location: ./table.php");
        exit();
    } else {
        echo "Erro ao atualizar aluno: " . mysqli_error($connection);
    }
} else {
    echo "Dados inválidos.";
}
?>
