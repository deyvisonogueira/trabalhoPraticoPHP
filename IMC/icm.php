<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora de IMC</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
    }
    .container {
      max-width: 400px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1, h2 {
      text-align: center;
      color: #333;
    }
    form {
      margin-top: 20px;
    }
    label {
      display: block;
      margin-bottom: 5px;
      color: #555;
    }
    input[type="number"] {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 4px;
      background-color: #4caf50;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover {
      background-color: #45a049;
    }
    .resultado {
      margin-top: 20px;
      font-weight: bold;
      color: #333;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Calculadora de IMC</h1>

    <div> 
      <form action="" method="post">
        <div> 
          <label for="peso">Peso (kg):</label>
          <input type="number" id="peso" name="peso" step="0.01" required ><br>
          <label for="altura">Altura (cm):</label>
          <input type="number" id="altura" name="altura" step="1" required > <br>
        </div>
        <input type="submit" name="submit" value="Calcular IMC">
      </form>

      <?php
      if(isset($_POST['submit'])) {
        $peso = filter_input(INPUT_POST, 'peso', FILTER_VALIDATE_FLOAT);
        $altura_cm = filter_input(INPUT_POST, 'altura', FILTER_VALIDATE_INT);

        if (!$peso || !$altura_cm || $altura_cm <= 0) {
          echo "<p style='color: red'>Por favor, insira valores válidos para peso e altura.</p>";
        } else {
          // Converter altura para metros
          $altura_m = $altura_cm / 100;

          // Calcular IMC
          $imc = $peso / ($altura_m * $altura_m);

          // Exibir resultado
          echo "<h2>Seu IMC é: " . number_format($imc, 2) . "</h2>";
          echo "<p class='resultado'>" . interpretarIMC($imc) . "</p>";
        }
      }

      function interpretarIMC($imc) {
        if ($imc < 18.5) {
          return "Você está abaixo do peso.";
        } elseif ($imc < 24.9) {
          return "Seu peso está normal.";
        } elseif ($imc < 29.9) {
          return "Você está com sobrepeso.";
        } elseif ($imc < 34.9) {
          return "Você está com obesidade grau I.";
        } elseif ($imc < 39.9) {
          return "Você está com obesidade grau II (severa).";
        } else {
          return "Você está com obesidade grau III (mórbida).";
        }
      }
      ?>
    </div>
  </div>
</body>
</html>
