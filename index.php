<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Validador de Cédula - Módulo 10</title>
    <style>
        * {box-sizing: border-box; font-family: Arial, sans-serif;}
        body {max-width: 500px; margin: 50px auto; padding: 20px; background: #f0f2f5;}
        h1 {text-align: center; color: #1a73e8;}
        .card {background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);}
        label {display: block; margin-bottom: 8px; font-weight: bold; color: #333;}
        input {width: 100%; padding: 12px; font-size: 18px; border: 2px solid #ddd; border-radius: 5px; margin-bottom: 20px;}
        input:focus {outline: none; border-color: #1a73e8;}
        button {width: 100%; padding: 12px; background: #1a73e8; color: white; border: none; font-size: 18px; border-radius: 5px; cursor: pointer;}
        button:hover {background: #1557b0;}
        .resultado {margin-top: 20px; padding: 15px; border-radius: 5px; font-size: 18px; text-align: center; display: none;}
        .valido {background: #d4edda; color: #155724; border: 1px solid #c3e6cb; display: block;}
        .invalido {background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; display: block;}
        .info {margin-top: 20px; font-size: 14px; color: #666; line-height: 1.6;}
    </style>
</head>
<body>
    <div class="card">
        <h1>🆔 Validador de Cédula</h1>
        <p style="text-align:center; color:#666; margin-bottom:25px">Algoritmo del Módulo 10 — República Dominicana</p>
        
        <form method="POST" action="validar.php">
            <label for="cedula">Ingrese el número de cédula:</label>
            <input type="text" id="cedula" name="cedula" placeholder="Ej: 00100758912" maxlength="11" required>
            <button type="submit">✅ Validar Cédula</button>
        </form>

        <?php if (isset($_GET['mensaje'])): ?>
        <div class="resultado <?php echo $_GET['estado']; ?>">
            <?php echo $_GET['mensaje']; ?>
        </div>
        <?php endif; ?>

        <div class="info">
            <strong>📌 Requisitos:</strong>
            <ul>
                <li>Debe contener exactamente 11 dígitos numéricos</li>
                <li>No incluya guiones ni espacios</li>
                <li>Se valida usando el algoritmo del Módulo 10</li>
            </ul>
        </div>
    </div>
</body>
</html>
