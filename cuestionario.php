<?php
session_start();

$preguntas = [

    [
        'pregunta' => '1. ¿Cuál es la última versión estable de HTML?',
        'opciones' => ['HTML4', 'HTML5', 'HTML6', 'HTML7'],
        'respuesta_correcta' => 2
    ],
    
    [
        'pregunta' => '2. ¿Qué etiqueta se utiliza para crear un enlace en HTML?',
        'opciones' => ['<link>', '<href>', '<a>', '<url>'],
        'respuesta_correcta' => 3
    ],
    
    [
        'pregunta' => '3. ¿Cuál es el estándar para los estilos en la web?',
        'opciones' => ['CSS', 'HTML', 'JS', 'PHP'],
        'respuesta_correcta' => 1
    ],
    
    [
        'pregunta' => '4. ¿Cuál es el lenguaje de programación más utilizado en la web?',
        'opciones' => ['Python', 'Java', 'Ruby', 'JavaScript'],
        'respuesta_correcta' => 4
    ],
    
    [
        'pregunta' => '5. ¿Qué etiqueta se utiliza para definir un párrafo en HTML?',
        'opciones' => ['<paragraph>', '<p>', '<text>', '<para>'],
        'respuesta_correcta' => 2
    ],
    
    [
        'pregunta' => '6. ¿Cuál es la forma correcta de enlazar un archivo CSS en HTML?',
        'opciones' => ['<link rel="stylesheet" type="text/css" href="styles.css">', '<css href="styles.css">', '<style href="styles.css">', '<link href="styles.css">'],
        'respuesta_correcta' => 1
    ],
    
    [
        'pregunta' => '7. ¿Qué propiedad de CSS se utiliza para definir el tamaño de letra?',
        'opciones' => ['font-size', 'text-size', 'font-style', 'text-style'],
        'respuesta_correcta' => 1
    ],
    
    [
        'pregunta' => '8. ¿Cuál es la función principal de JavaScript en la web?',
        'opciones' => ['Definir la estructura del contenido', 'Dar estilo al contenido', 'Hacer que la página sea interactiva', 'Comunicarse con el servidor'],
        'respuesta_correcta' => 3
    ],
    
    [
        'pregunta' => '9. ¿Qué etiqueta se utiliza para insertar una imagen en HTML?',
        'opciones' => ['<image>', '<img>', '<picture>', '<src>'],
        'respuesta_correcta' => 2
    ],
    
    [
        'pregunta' => '10. ¿Qué propiedad de CSS se utiliza para definir el color de fondo?',
        'opciones' => ['background-color', 'color', 'background-image', 'style'],
        'respuesta_correcta' => 1
    ],
    
    [
        'pregunta' => '11. ¿Qué es un "framework" en programación front-end?',
        'opciones' => ['Un lenguaje de programación', 'Una biblioteca de códigos predefinidos', 'Un editor de texto', 'Un sistema de almacenamiento de datos'],
        'respuesta_correcta' => 2
    ],
    
    [
        'pregunta' => '12. ¿Qué es un "DOM" en programación front-end?',
        'opciones' => ['Document Object Model', 'Database Object Model', 'Development Operation Mode', 'Digital Object Memory'],
        'respuesta_correcta' => 1
    ],
    
    [
        'pregunta' => '13. ¿Qué es el responsive design?',
        'opciones' => ['Un método para escribir código HTML', 'Una técnica para mejorar el rendimiento de la página', 'Un enfoque para diseñar sitios web que se adapten a diferentes tamaños de pantalla', 'Una herramienta de desarrollo web'],
        'respuesta_correcta' => 3
    ],
    
    [
        'pregunta' => '14. ¿Cuál es la función principal de Bootstrap?',
        'opciones' => ['Definir la estructura del contenido', 'Dar estilo al contenido', 'Hacer que la página sea interactiva', 'Comunicarse con el servidor'],
        'respuesta_correcta' => 2
    ],
    
    [
        'pregunta' => '15. ¿Qué es el "box model" en CSS?',
        'opciones' => ['Un modelo matemático utilizado para el diseño de la página', 'Un modelo de caja que define la forma en que se representan los elementos HTML', 'Un modelo de programación orientado a objetos', 'Un modelo de red'],
        'respuesta_correcta' => 2
    ],
    
    [
        'pregunta' => '16. ¿Qué es un "preprocesador" de CSS?',
        'opciones' => ['Una herramienta de edición de texto', 'Un lenguaje de programación para la web', 'Un software para el desarrollo web', 'Un sistema para procesar código CSS antes de que se cargue en el navegador'],
        'respuesta_correcta' => 4
    ],
    
    [
        'pregunta' => '17. ¿Qué propiedad de CSS se utiliza para definir la posición de un elemento en la página?',
        'opciones' => ['position', 'layout', 'place', 'arrange'],
        'respuesta_correcta' => 1
    ],
    
    [
        'pregunta' => '18. ¿Qué es un "plugin" en programación front-end?',
        'opciones' => ['Un programa para optimizar el rendimiento del navegador', 'Un complemento que se añade a un editor de texto', 'Un módulo que se utiliza para extender la funcionalidad de un sitio web', 'Un lenguaje de programación para la web'],
        'respuesta_correcta' => 3
    ],
    
    [
        'pregunta' => '19. ¿Cuál es la función principal de jQuery?',
        'opciones' => ['Definir la estructura del contenido', 'Dar estilo al contenido', 'Hacer que la página sea interactiva', 'Comunicarse con el servidor'],
        'respuesta_correcta' => 3
    ],
    
    [
        'pregunta' => '20. ¿Qué es un "sprite" en programación front-end?',
        'opciones' => ['Una imagen que contiene varias imágenes más pequeñas', 'Una animación creada con CSS', 'Un formato de imagen para la web', 'Un lenguaje de programación para la web'],
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
