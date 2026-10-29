<?php
// Protege a página: só usuários cadastrados podem editar livros
include("verificar_sessao.php");

// Inclui a conexão com o banco de dados.
include("conexao.php");

// Recebe o ID do livro pela URL (ex: editar_livro.php?id=3)
$id = $_GET['id'];

// Consulta SQL para buscar os dados do livro pelo ID
$sql = "SELECT * FROM livros WHERE id = $id";

// Executa a consulta e guarda o resultado
$resultado = mysqli_query($conexao, $sql);

// Transforma o resultado em um array associativo
$livro = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro - Biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Editar Livro</h1>
        <p class="subtitulo">
            Altere os dados do livro e clique em "Salvar" para atualizar.
        </p>

        <!-- Formulário para editar o livro -->
        <form action="atualizar_livro.php" method="POST">
            <!-- Campo oculto para enviar o ID do livro -->
            <input type="hidden" name="id" value="<?php echo $livro['id']; ?>">

            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo $livro['titulo']; ?>" required>

            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" value="<?php echo $livro['autor']; ?>" required>

            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="disponível" <?php if ($livro['status'] == 'disponível')
                    echo 'selected'; ?>>Disponível
                </option>
                <option value="emprestado" <?php if ($livro['status'] == 'emprestado')
                    echo 'selected'; ?>>
                    Emprestado</option>
            </select>
            <button type="submit" class="btn btn-block">Atualizar Livro</button>
        </form>
        <a href="listar_livro.php" class="btn btn-voltar">Voltar para a listagem</a>
    </div>
</body>

</html>