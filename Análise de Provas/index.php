<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Receber valores via POST
  $valorTotalProva1 = isset($_POST['valorTotalProva1']) ? $_POST['valorTotalProva1'] : 0;
  $valorTotalProva2 = isset($_POST['valorTotalProva2']) ? $_POST['valorTotalProva2'] : 0;
  $notaProva1 = isset($_POST['notaProva1']) ? $_POST['notaProva1'] : 0;
  $notaProva2 = isset($_POST['notaProva2']) ? $_POST['notaProva2'] : 0;

  // Cálculo da soma das notas
  $somaNotas = $notaProva1 + $notaProva2;

  // Cálculo da média geral
  $mediaGeral = round(($somaNotas / ($valorTotalProva1 + $valorTotalProva2)) * 100, 2);

  // Definição do conceito
  $conceito = "";
  if ($mediaGeral < 60) {
    $conceito = "Péssimo";
  } else if ($mediaGeral < 70) {
    $conceito = "Ruim";
  } else if ($mediaGeral < 80) {
    $conceito = "Bom";
  } else if ($mediaGeral < 90) {
    $conceito = "Ótimo";
  } else {
    $conceito = "Excelente";
  }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Análise de Provas</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Análise de Provas</h1>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="valorTotalProva1">Valor total da Prova 1:</label>
    <input type="number" id="valorTotalProva1" name="valorTotalProva1">
    <br>
    <label for="valorTotalProva2">Valor total da Prova 2:</label>
    <input type="number" id="valorTotalProva2" name="valorTotalProva2">
    <br>
    <label for="notaProva1">Nota da Prova 1:</label>
    <input type="number" id="notaProva1" name="notaProva1">
    <br>
    <label for="notaProva2">Nota da Prova 2:</label>
    <input type="number" id="notaProva2" name="notaProva2">
    <br>
    <br>
    <input type="submit" value="Calcular">
  </form>
  <br>
  <h2>Resultados</h2>

  <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
    <?php
    echo '<div class="resultado">';
    echo '<h2 class="titulo">Resultado</h2>';
    echo '<p class="valor">O valor total das duas provas é ' . ($valorTotalProva1 + $valorTotalProva2) . ' pontos.</p>';
    echo '<p class="valor">Em relação à Prova 1, o aluno obteve ' . (($notaProva1 / $valorTotalProva1) * 100) . '% do total.</p>';
    echo '<p class="valor">Em relação à Prova 2, o aluno obteve ' . (($notaProva2 / $valorTotalProva2) * 100) . '% do total.</p>';
    echo '<p class="valor">O aluno totalizou, com as duas provas, ' . $somaNotas . ' pontos.</p>';
    echo '<p class="valor">A porcentagem obtida pelo aluno em função do total foi de ' . $mediaGeral . '%.</p>';
    echo '<p class="valor">O conceito do aluno foi: ' . $conceito . '.</p>';
    echo '</div>';
    ?>
  <?php endif; ?>

</body>
</html>
