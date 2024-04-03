<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Triângulo Retângulo</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Triângulo Retângulo</h1>
    <form action="" method="post">
        <label for="altura">Altura do triângulo (1-50):</label>
        <input type="number" id="altura" name="altura" min="1" max="50" required><br>
        <label for="caractere">Caractere de preenchimento:</label>
        <input type="text" id="caractere" name="caractere" maxlength="1" required><br>
        <label for="cor">Cor de preenchimento:</label>
        <select id="cor" name="cor" required>
            <option value="vermelho">Vermelho</option>
            <option value="azul">Azul</option>
            <option value="verde">Verde</option>
            <option value="amarelo">Amarelo</option>
            <option value="preto">Preto</option>
        </select><br>
        <button type="submit" name="submit">Gerar Triângulo</button>
    </form>

    <?php
    $resultado_exibido = false; // Variável para controlar a exibição do resultado

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $altura = intval($_POST['altura']);
        $caractere = $_POST['caractere'];
        $cor = $_POST['cor'];

        // Definindo as cores predefinidas
        $cores = array(
            "vermelho" => "#FF0000",
            "azul" => "#0000FF",
            "verde" => "#00FF00",
            "amarelo" => "#FFFF00",
            "preto" => "#000000",
        );

        // Validando a altura
        if ($altura < 1 || $altura > 50) {
            echo "Altura inválida! Deve ser um número entre 1 e 50.";
        } else {
            // Gerando o triângulo
            $resultado_exibido = true; // Atualiza a variável para indicar que o resultado deve ser exibido
            echo "<div id='triangle'>";
            for ($i = 1; $i <= $altura; $i++) {
                echo "<span style='color: ${cores[$cor]}'>";
                for ($j = 1; $j <= $i; $j++) {
                    echo $caractere;
                }
                echo "</span><br>";
            }
            echo "</div>";
        }
    }
    ?>

</body>
</html>
