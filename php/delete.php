<?php

include_once('../conexao/connection.php');

// verifica se o ID foi passado
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // consulta para excluir o aluno
    $excluir = mysqli_query($connection, "DELETE FROM cadastrar_aluno WHERE ID = '$id'");

    // verifica se a exclusão foi bem-sucedida
    if ($excluir) {
        echo "Aluno excluído com sucesso!";
    } else {
        echo "Erro ao excluir aluno: " . mysqli_error($connection);
    }
} else {
    echo "ID do aluno não fornecido.";
}

// redireciona de volta para a página de visualização de alunos
header("Location: ./table.php");
exit();
?>
