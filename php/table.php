<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Alunos</title>
</head>
<body>
    <h1>Alunos Cadastrados</h1>

    <!-- Formulário de pesquisa -->
    <form method="get">
        <label for="pesquisa">Pesquisar:</label>
        <input type="text" id="pesquisa" name="pesquisa" placeholder="Digite a matrícula ou nome">
        <input type="submit" value="Buscar">
    </form>

    <?php
    // estabelece conexão com o servidor e BD
    include_once('../conexao/connection.php');

    // Inicializa a variável de consulta
    $consulta = "SELECT * FROM cadastrar_aluno";

    // Verifica se há um termo de pesquisa enviado via GET
    if (isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])) {
        $termo = $_GET['pesquisa'];
        // Adiciona cláusula WHERE para filtrar por matrícula ou nome
        $consulta .= " WHERE Matricula_aluno LIKE '%$termo%' OR Nome_aluno LIKE '%$termo%' OR Turma LIKE '%$termo%'";
    }

    // Executa a consulta
    $resultado = mysqli_query($connection, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Matrícula</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Turma</th>
                    <th>Ação</th>
                </tr>";

        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<tr>
                    <td>" . $linha['ID'] . "</td>
                    <td>" . $linha['Matricula_aluno'] . "</td>
                    <td>" . $linha['Nome_aluno'] . "</td>
                    <td>" . $linha['Cpf_aluno'] . "</td>
                    <td>" . $linha['Turma'] . "</td>
                    <td>
                        <a href='read.php?id=" . $linha['ID'] . "'>Ver</a> | 
                        <a href='?update=" . $linha['ID'] . "'>Atualizar</a> | 
                        <a href='delete.php?id=" . $linha['ID'] . "'>Excluir</a>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum aluno encontrado.";
    }

    // Exibe o formulário de atualização se o parâmetro 'update' estiver presente na URL
    if (isset($_GET['update'])) {
        $id = $_GET['update'];
        $consulta = mysqli_query($connection, "SELECT * FROM cadastrar_aluno WHERE ID = '$id'");
        $aluno = mysqli_fetch_assoc($consulta);

        if ($aluno) {
            echo "<h2>Atualizar Aluno</h2>
                  <form action='update.php' method='post'>
                      <input type='hidden' name='id' value='" . $aluno['ID'] . "'>
                      Matrícula: <input type='text' name='matricula' value='" . $aluno['Matricula_aluno'] . "'><br>
                      Nome: <input type='text' name='nome' value='" . $aluno['Nome_aluno'] . "'><br>
                      CPF: <input type='text' name='cpf' value='" . $aluno['Cpf_aluno'] . "'><br>
                      Turma: <input type='text' name='turma' value='" . $aluno['Turma'] . "'><br>
                      Senha: <input type='password' name='senha' value='" . $aluno['Senha_aluno'] . "'><br>
                      <input type='submit' value='Atualizar'>
                  </form>";
        } else {
            echo "Aluno não encontrado.";
        }
    }
    ?>
</body>
</html>
