<!DOCTYPE html>
<html>
<head>
    <title>Sorteio de Números</title>
</head>
<body>
    <h2>Escolha 25 números entre 1 e 50:</h2>
    <form method="post">
        <?php
        for ($i = 1; $i <= 50; $i++) {
            echo "<label><input type='checkbox' name='numeros[]' value='$i'> $i</label><br>";
        }
        ?>
        <br>
        <label>Valor da Aposta:</label>
        <input type="number" name="aposta" required>
        <br><br>
        <input type="submit" name="submit" value="Verificar Resultado">
    </form>
 
    <?php
    if (isset($_POST['submit'])) {
        $numerosEscolhidos = $_POST['numeros'];
        $aposta = $_POST['aposta'];
 
        if (count($numerosEscolhidos) != 25) {
            echo "<p>Por favor, escolha exatamente 25 números.</p>";
        } else {
            $numerosSorteados = range(1, 50);
            shuffle($numerosSorteados);
            $numerosSorteados = array_slice($numerosSorteados, 0, 25);
 
            $acertos = count(array_intersect($numerosEscolhidos, $numerosSorteados));
 
            echo "<p>Números Sorteados: " . implode(", ", $numerosSorteados) . "</p>";
            echo "<p>Números Escolhidos: " . implode(", ", $numerosEscolhidos) . "</p>";
            echo "<p>Acertos: $acertos</p>";
 
            $premio = 0;
            if ($acertos >0 && $acertos <21){
                $premio = 0;
            } elseif ($acertos <= 24 && $acertos >=21) {
                $premio = $acertos * $aposta;
            } elseif ($acertos = 0) {
                $premio = 50 * $aposta;
            } elseif($acertos = 25) {
                $premio = 50 * $aposta;
            }
 
           
 
            echo "<p>Prêmio: $premio</p>";
        }
    }
    ?>
</body>
</html>