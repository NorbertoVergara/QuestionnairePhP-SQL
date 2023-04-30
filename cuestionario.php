<?php
session_start();

$preguntas = [
    
    [
    'pregunta' => '1. ¿Qué lenguaje se utiliza para crear el contenido y la estructura de un sitio web?',
    'opciones' => ['HTML', 'CSS', 'JavaScript', 'PHP'],
    'respuesta_correcta' => 0
],

[
    'pregunta' => '2. ¿Qué etiqueta se utiliza para crear un enlace en HTML?',
    'opciones' => ['<link>', '<href>', '<a>', '<url>'],
    'respuesta_correcta' => 2
],

[
    'pregunta' => '3. ¿Qué lenguaje se utiliza para programar el comportamiento de un sitio web?',
    'opciones' => ['HTML', 'CSS', 'JavaScript', 'PHP'],
    'respuesta_correcta' => 2
],

[
    'pregunta' => '4. ¿Cuál de las siguientes opciones es un selector de CSS válido?',
    'opciones' => ['!p', '.p', '#p', '&p'],
    'respuesta_correcta' => 2
],

[
    'pregunta' => '5. ¿Qué propiedad de CSS se utiliza para cambiar el color de fondo de un elemento?',
    'opciones' => ['background-color', 'color', 'font-size', 'text-align'],
    'respuesta_correcta' => 0
],

[
    'pregunta' => '6. ¿Qué función se utiliza en JavaScript para imprimir algo en la consola del navegador?',
    'opciones' => ['alert()', 'console.log()', 'prompt()', 'document.write()'],
    'respuesta_correcta' => 1
],

[
    'pregunta' => '7. ¿Qué significa HTML?',
    'opciones' => ['Hypertext Markup Language', 'Hyperlink and Text Markup Language', 'Hyperlink Markup Language', 'Hypertext Markup Logic'],
    'respuesta_correcta' => 0
],

[
    'pregunta' => '8. ¿Qué propiedad de CSS se utiliza para cambiar el tamaño de un elemento?',
    'opciones' => ['font-size', 'width', 'height', 'padding'],
    'respuesta_correcta' => 1
],

[
    'pregunta' => '9. ¿Qué evento de JavaScript se dispara cuando el usuario hace clic en un elemento?',
    'opciones' => ['onhover', 'onchange', 'onload', 'onclick'],
    'respuesta_correcta' => 3
],

[
    'pregunta' => '10. ¿Cuál de las siguientes opciones NO es un operador de comparación en JavaScript?',
    'opciones' => ['===', '!==', '<>', '>='],
    'respuesta_correcta' => 2
],

[
    'pregunta' => '11. ¿Qué propiedad de CSS se utiliza para cambiar la fuente de un elemento?',
    'opciones' => ['font-family', 'font-style', 'font-size', 'text-align'],
    'respuesta_correcta' => 0
],

[
    'pregunta' => '12. ¿Qué evento de JavaScript se dispara cuando el usuario coloca el cursor sobre un elemento?',
    'opciones' => ['onmouseover', 'onchange', 'onload', 'onclick'],
    'respuesta_correcta' => 0
],

[
    'pregunta' => '13. ¿Cuál de los siguientes elementos NO es un elemento de bloque en HTML?',
    'opciones' => ['<div>', '<p>', '<span>', '<h1>'],
    'respuesta_correcta' => 2
],
    [
    'pregunta' => '14. ¿Qué propiedad de CSS se utiliza para cambiar la posición de un elemento?',
    'opciones' => ['position', 'float', 'top', 'right'],
    'respuesta_correcta' => 0
],

[
    'pregunta' => '15. ¿Qué método se utiliza en JavaScript para agregar un elemento al final de un arreglo?',
    'opciones' => ['push()', 'concat()', 'splice()', 'shift()'],
    'respuesta_correcta' => 0
],

[
    'pregunta' => '16. ¿Qué propiedad de CSS se utiliza para cambiar el borde de un elemento?',
    'opciones' => ['border-style', 'border-width', 'border-color', 'Todas las anteriores'],
    'respuesta_correcta' => 3
],

[
    'pregunta' => '17. ¿Cuál de las siguientes opciones NO es un valor válido para el atributo "type" de un elemento <input>?',
    'opciones' => ['text', 'password', 'email', 'link'],
    'respuesta_correcta' => 3
],

[
    'pregunta' => '18. ¿Qué método se utiliza en JavaScript para eliminar el último elemento de un arreglo?',
    'opciones' => ['push()', 'pop()', 'shift()', 'unshift()'],
    'respuesta_correcta' => 1
],

[
    'pregunta' => '19. ¿Qué propiedad de CSS se utiliza para cambiar el espaciado entre las líneas de un elemento?',
    'opciones' => ['line-height', 'letter-spacing', 'word-spacing', 'Todas las anteriores'],
    'respuesta_correcta' => 0
],

[
    'pregunta' => '20. ¿Cuál es la versión más reciente de HTML?',
    'opciones' => ['HTML4', 'HTML5', 'HTML6', 'No hay una versión más reciente'],
    'respuesta_correcta' => 1
],

    
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
