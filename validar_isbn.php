<?php
function validarISBN($isbn)
{
    $isbn = trim($isbn);
    $isbn = str_replace('-', '', $isbn);

    if (strlen($isbn) !== 10) {
        return false;
    }

    $soma = 0;
    for ($i = 0; $i < 10; $i++) {
        $soma += (int) $isbn[$i] * (10 - $i);
    }

    return $soma % 11 === 0;
}

if (isset($_POST['isbn'])) {
    $isbn = $_POST['isbn'];

    if (validarISBN($isbn)) {
        $mensagem = "O ISBN $isbn é válido.";
    } else {
        $mensagem = "O ISBN $isbn não é válido.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Validação de ISBN</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Resultado da Validação de ISBN</h1>

        <?php if (isset($mensagem)): ?>
            <p>
                <?php echo $mensagem; ?>
            </p>
        <?php endif; ?>

        <p><a href="index.html">Voltar</a></p>
    </div>
</body>

</html>