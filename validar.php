<?php
function validarCedula($cedula) {
    $cedula = preg_replace('/[^0-9]/', '', $cedula);
    
    if (strlen($cedula) != 11) {
        return [
            'valido' => false,
            'mensaje' => '❌ La cédula debe tener exactamente 11 dígitos.'
        ];
    }

    $secuencia = [1, 2, 1, 2, 1, 1, 2, 1, 2, 1];
    $suma = 0;

    for ($i = 0; $i < 10; $i++) {
        $digito = intval($cedula[$i]);
        $suma += $digito * $secuencia[$i];
    }

    $residuo = $suma % 10;
    $digitoCalculado = ($residuo === 0) ? 0 : 10 - $residuo;
    $digitoVerificador = intval($cedula[10]);

    if ($digitoCalculado === $digitoVerificador) {
        return [
            'valido' => true,
            'mensaje' => '✅ ¡CÉDULA VÁLIDA! El dígito verificador coincide correctamente.'
        ];
    } else {
        return [
            'valido' => false,
            'mensaje' => "❌ CÉDULA INVÁLIDA. El dígito verificador no coincide."
        ];
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cedula = trim($_POST['cedula']);
    $resultado = validarCedula($cedula);
    $estado = $resultado['valido'] ? 'valido' : 'invalido';
    header("Location: index.php?mensaje=" . urlencode($resultado['mensaje']) . "&estado=$estado");
    exit;
}
?>
