<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabela Dinâmica</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Preencha os campos corretamente:</h2>

    <div> 
      <form method="post">
        <div id="centro"> 
          <label for="titulo">Título da Tabela:</label><br>
          <input type="text" name="titulo" required><br><br>

          <label for="espaco">Espaço ocupado pela tabela na página (%):</label><br>
          <select name="espaco" required>
            <option value="20">20%</option>
            <option value="40">40%</option>
            <option value="60">60%</option>
            <option value="80">80%</option>
            <option value="100">100%</option>
          </select><br><br>

          <label for="linhas">Quantidade de linhas:</label><br>
          <input type="number" name="linhas" min="1" required><br><br>

          <label for="colunas">Quantidade de colunas:</label><br>
          <input type="number" name="colunas" min="1" required><br><br>

          <label for="borda">Tamanho da borda (0 a 9):</label><br>
          <input type="number" name="borda" min="0" max="9" required><br><br>

          <label for="corFundo">Cor de fundo da tabela:</label><br>
          <select name="corFundo" required>
            <option value="red">Vermelho</option>
            <option value="blue">Azul</option>
            <option value="green">Verde</option>
            <option value="yellow">Amarelo</option>
            <option value="black">Preto</option>
          </select><br><br>

          <label for="corTexto">Cor do texto da tabela:</label><br>
          <select name="corTexto" required>
            <option value="red">Vermelho</option>
            <option value="blue">Azul</option>
            <option value="green">Verde</option>
            <option value="yellow">Amarelo</option>
            <option value="black">Preto</option>
          </select><br><br>
        </div>
        <input type="submit" name="submit" value="Gerar Tabela">
      </form>

      <?php
      if(isset($_POST['submit'])) {
        $titulo = $_POST['titulo'];
        $espaco = (int)$_POST['espaco'];
        $linhas = (int)$_POST['linhas'];
        $colunas = (int)$_POST['colunas'];
        $borda = (int)$_POST['borda'];
        $corFundo = $_POST['corFundo'];
        $corTexto = $_POST['corTexto'];

        if (!$titulo || !$espaco || !$linhas || !$colunas || !$borda || !$corFundo || !$corTexto) {
          echo "<p style='color: red'>Erro: Todos os campos são obrigatórios!</p>";
          exit;
        }

        $larguraTabela = ($espaco / 100) * 500; // 500px é a largura da área disponível

        echo "<h2>$titulo</h2>";
        echo "<table style='width: {$larguraTabela}px; color: $corTexto; border: {$borda}px solid black;'>";
        for ($i = 0; $i < $linhas; $i++) {
          echo "<tr>";
          for ($j = 0; $j < $colunas; $j++) {
            echo "<td style='background-color: $corFundo; padding: 10px;'>Texto </td>";
          }
          echo "</tr>";
        }
        echo "</table>";
      }
      ?>

    </div>
  </div>
</body>
</html>
