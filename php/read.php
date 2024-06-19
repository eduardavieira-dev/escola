<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Aluno</title>
</head>
<body>
    <h1>Informações do Aluno</h1>
    <?php
    // estabelece conexão com o servidor e BD
    include_once('../conexao/connection.php');

    // verifica se o ID foi passado
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // consulta para selecionar o aluno pelo ID
        $consulta = mysqli_query($connection, "SELECT * FROM cadastrar_aluno WHERE ID = '$id'");
        $aluno = mysqli_fetch_assoc($consulta);

        if ($aluno) {
            echo "<p><strong>ID:</strong> " . $aluno['ID'] . "</p>
                  <p><strong>Matrícula:</strong> " . $aluno['Matricula_aluno'] . "</p>
                  <p><strong>Nome:</strong> " . $aluno['Nome_aluno'] . "</p>
                  <p><strong>CPF:</strong> " . $aluno['Cpf_aluno'] . "</p>
                  <p><strong>Turma:</strong> " . $aluno['Turma'] . "</p>
                  <p><strong>Senha:</strong> " . $aluno['Senha_aluno'] . "</p>";
        } else {
            echo "Aluno não encontrado.";
        }
    } else {
        echo "ID do aluno não fornecido.";
    }
    ?>
    <br>
    <a href="./table.php">Voltar</a>
</body>
</html>
