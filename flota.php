<?php
session_start();
 
if (!isset($_SESSION['tablero'])) {
    $_SESSION['tablero'] = array_fill(0, 5, array_fill(0, 5, 'agua'));
    $_SESSION['barco'] = [];
    colocarBarco();
}
 

function colocarBarco() {
    $direccion = rand(0, 1);
    $barcoPos = [];
 
    if ($direccion == 0) {
        $fila = rand(0, 4);
        $columna = rand(0, 2);
        for ($i = 0; $i < 3; $i++) {
            $_SESSION['tablero'][$fila][$columna + $i] = 'barco';
            $barcoPos[] = [$fila, $columna + $i];
        }
    } else {
        $fila = rand(0, 2);
        $columna = rand(0, 4);
        for ($i = 0; $i < 3; $i++) {
            $_SESSION['tablero'][$fila + $i][$columna] = 'barco';
            $barcoPos[] = [$fila + $i, $columna];
        }
    }
 
    $_SESSION['barco'] = $barcoPos;
}
 
if (isset($_POST['fila']) && isset($_POST['columna'])) {
    $fila = (int)$_POST['fila'];
    $columna = (int)$_POST['columna'];
    $tocado = false;
 
 
    if ($_SESSION['tablero'][$fila][$columna] === 'barco') {
        $_SESSION['tablero'][$fila][$columna] = 'tocado';
        $tocado = true;
    }
 
    if ($tocado) {
        $hundido = true;
        foreach ($_SESSION['barco'] as $pos) {
            if ($_SESSION['tablero'][$pos[0]][$pos[1]] !== 'tocado') {
                $hundido = false;
                break;
            }
        }
 
        if ($hundido) {
            echo "<script>alert('¡Enhorabuena!, Has hundido el barco!');</script>";
            session_destroy();
        } else {
            echo "<script>alert('¡Has tocado el barco!');</script>";
        }
    } else {
        echo "<script>alert('Agua.');</script>";
    }
}

?>
 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hundir la Flota</title>

    <script>
        function disparar(fila, columna) {
            const form = document.createElement('form');
            form.method = 'POST';
            const filaInput = document.createElement('input');
            filaInput.type = 'hidden';
            filaInput.name = 'fila';
            filaInput.value = fila;
            const columnaInput = document.createElement('input');
            columnaInput.type = 'hidden';
            columnaInput.name = 'columna';
            columnaInput.value = columna;
            form.appendChild(filaInput);
            form.appendChild(columnaInput);
            document.body.appendChild(form);
            form.submit();
        }
    </script>

    <style>
        table {
            border-collapse: collapse;
        }
        td {
            width: 40px;
            height: 40px;
            text-align: center;
            cursor: pointer;
            border: 1px solid #000;
        }
        .tocado {
            background-color: rgb(247, 142, 148);
        }
        .agua {
            background-color: rgb(170, 222, 253); 
        }    
</style>
</head>
<body>
    <h1> Hundir la Flota</h1>
    <table>
        <?php foreach ($_SESSION['tablero'] as $filaIndex => $fila): ?>
            <tr>
                <?php foreach ($fila as $columnaIndex => $celda): ?>
                    <td class="<?php echo $celda === 'tocado' ? 'tocado' : ($celda === 'agua' ? 'agua' : 'agua'); ?>"
                        onclick="disparar(<?php echo $filaIndex; ?>, <?php echo $columnaIndex; ?>)">
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
 
    
</body>
</html>