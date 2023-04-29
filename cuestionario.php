<?php
session_start();

$preguntas = [
    [
        'pregunta' => '1. ¿Qué lenguaje se utiliza para crear estilos y diseños en un sitio web?',
        'opciones' => ['HTML', 'JS', 'CS', 'PHP'],
        'respuesta_correcta' => 2
    ],
    // Agregar más preguntas aquí
];

$num_preguntas = count($preguntas);

if (!isset($_SESSION['respuestas'])) {
    $_SESSION['respuestas'] = array_fill(0, $num_preguntas, '');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $respuesta_usuario = $_POST['respuesta'];
    $pregunta_actual = $_POST['pregunta_actual'];
    $_SESSION['respuestas'][$pregunta_actual] = $respuesta_usuario;

    if ($pregunta_actual == $num_preguntas - 1) {
        header('Location: resultados.php');
        exit;
    } else {
        $pregunta_actual++;
        header("Location: cuestionario.php?pregunta_actual=$pregunta_actual");
        exit;
    }
}

$pregunta_actual = isset($_GET['pregunta_actual']) ? $_GET['pregunta_actual'] : 0;
$pregunta = $preguntas[$pregunta_actual];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cuestionario con PHP</title>
</head>
<body>
    <h1>Cuestionario con PHP</h1>
    <form method="post">
        <h2><?= $pregunta['pregunta'] ?></h2>
        <?php foreach ($pregunta['opciones'] as $opcion => $respuesta) : ?>
            <label>
                <input type="radio" name="respuesta" value="<?= $opcion ?>" <?= ($_SESSION['respuestas'][$pregunta_actual] == $opcion) ? 'checked' : '' ?>>
                <?= $respuesta ?>
            </label>
        <?php endforeach; ?>
        <input type="hidden" name="pregunta_actual" value="<?= $pregunta_actual ?>">
        <button type="submit"><?= ($pregunta_actual == $num_preguntas - 1) ? 'Entregar' : 'Siguiente' ?></button>
        <?php if ($pregunta_actual > 0) : ?>
            <a href="cuestionario.php?pregunta_actual=<?= $pregunta_actual - 1 ?>">Anterior</a>
        <?php endif; ?>
    </form>
</body>
</html>
