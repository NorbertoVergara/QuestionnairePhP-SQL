<?php
session_start();

$preguntas = [
    [
        'pregunta' => '1. ¿Qué lenguaje se utiliza para crear estilos y diseños en un sitio web?',
        'opciones' => ['HTML', 'JS', 'CSS', 'PHP'],
        'respuesta_correcta' => 2
    ],

    [
        'pregunta' => '2. ¿Qué etiqueta se utiliza para crear un enlace en HTML?',
        'opciones' => ["&lt;link&gt;", "&lt;href&gt;", "&lt;a&gt;", "&lt;url&gt;"],
        'respuesta_correcta' => 2
    ],

    [
        'pregunta' => '3. ¿Qué significa CSS?',
        'opciones' => ['Cascading Style Sheets', 'Creative Style Sheets', 'Computer Style Sheets', 'Colorful Style Sheets'],
        'respuesta_correcta' => 0
    ],

    [
        'pregunta' => '4. ¿Cuál es la forma correcta de enlazar un archivo CSS externo en una página HTML?',
        'opciones' => ['&lt;style&gt; &lt;link&gt;mystyle.css&lt;/link&gt; &lt;/style&gt;', '&lt;style src="mystyle.css"&gt;&lt;/style&gt;', '&lt;link rel="stylesheet" type="text/css" href="mystyle.css"&gt;', '&lt;style type="text/css"&gt;&lt;!--@import url("mystyle.css");--&gt;&lt;/style&gt;'],
        'respuesta_correcta' => 2
    ],

    [
        'pregunta' => '5. ¿Qué significa HTML?',
        'opciones' => ['Hyperlinks and Text Markup Language', 'Home Tool Markup Language', 'Hyper Text Markup Language', 'High Tech Markup Language'],
        'respuesta_correcta' => 2
    ],
    [
        'pregunta' => '6. ¿Cuál es la forma correcta de crear un comentario en HTML?',
        'opciones' => ['&lt;!-- Esto es un comentario --&gt;', '&lt;comment&gt;Esto es un comentario&lt;/comment&gt;', '&lt;# Esto es un comentario #&gt;', '// Esto es un comentario'],
        'respuesta_correcta' => 0
    ],
    [
        'pregunta' => '7. ¿Cuál es el resultado de este código JS? var x = 5; x = "Hola"; console.log(x);',
        'opciones' => ['5', 'undefined', 'Hola', 'Error de sintaxis'],
        'respuesta_correcta' => 2
    ],
    [
        'pregunta' => '8. ¿Cuál es la forma correcta de definir una función en JS?',
        'opciones' => ['function = miFuncion() {}', 'miFuncion = function() {}', 'def miFuncion() {}', 'function miFuncion() {}'],
        'respuesta_correcta' => 3
    ],
    [
        'pregunta' => '9. ¿Qué función se utiliza para seleccionar un elemento por su ID en JS?',
        'opciones' => ['getElementByClass', 'getElementByName', 'getElementById', 'getElementByTag'],
        'respuesta_correcta' => 2
    ],
    [
        'pregunta' => '10. ¿Qué propiedad se utiliza para cambiar el color de fondo de un elemento en CSS?',
        'opciones' => ['background-color', 'color', 'font-color', 'text-color'],
        'respuesta_correcta' => 0
    ],

    [
        'pregunta' => '11. ¿Cuál es el lenguaje de programación que se utiliza para el desarrollo front-end y back-end?',
        'opciones' => ['Python', 'Java', 'JavaScript', 'C++'],
        'respuesta_correcta' => 2
    ],

    [
        'pregunta' => '12. ¿Qué es AJAX en el desarrollo web?',
        'opciones' => ['Un lenguaje de programación', 'Una herramienta de diseño gráfico', 'Una técnica para crear animaciones', 'Una técnica para realizar solicitudes asíncronas al servidor'],
        'respuesta_correcta' => 3
    ],

    [
        'pregunta' => '13. ¿Qué lenguaje de programación se utiliza principalmente para el desarrollo front-end?',
        'opciones' => ['Python', 'Java', 'JavaScript', 'C++'],
        'respuesta_correcta' => 2
    ],

    [
        'pregunta' => '14. ¿Cuál es la función principal de CSS?',
        'opciones' => ['Crear contenido dinámico', 'Definir el contenido y la estructura del sitio web', 'Agregar interactividad al sitio web', 'Dar estilo y diseño al sitio web'],
        'respuesta_correcta' => 3
    ],

    [
        'pregunta' => '15. ¿Qué significa la sigla HTML?',
        'opciones' => ['Hyper Text Markup Language', 'High Tech Markup Language', 'Home Tool Markup Language', 'Hyper Tool Master Language'],
        'respuesta_correcta' => 0
    ],

    [
        'pregunta' => '16. ¿Cuál es la forma correcta de enlazar un archivo externo de JavaScript a una página web HTML?',
        'opciones' => [ '&lt;script href="script.js"&gt;&lt;/script&gt;', '&lt;link href="script.js"&gt;', '&lt;script src="script.js"&gt;&lt;/script&gt;', '&lt;a src="script.js"&gt;&lt;/a&gt;'],
        'respuesta_correcta' => 2   
    ],

    [
        'pregunta' => '17. ¿Cuál es la forma correcta de definir una variable en JavaScript?',
        'opciones' => ['var = miVariable;', 'miVariable = var;', 'var miVariable;', '$miVariable = var;'],
        'respuesta_correcta' => 2
    ],

    [
        'pregunta' => '18. ¿Qué es Bootstrap?',
        'opciones' => ['Una biblioteca de JavaScript', 'Una herramienta para crear animaciones', 'Un lenguaje de programación', 'Un framework de CSS'],
        'respuesta_correcta' => 3
    ],

    [
        'pregunta' => '19. ¿Qué es jQuery?',
        'opciones' => ['Una biblioteca de JavaScript', 'Una herramienta para crear animaciones', 'Un lenguaje de programación', 'Un framework de CSS'],
        'respuesta_correcta' => 0
    ],

    [
        'pregunta' => '20. ¿Cuál es la forma correcta de escribir un comentario en JavaScript?',
        'opciones' => ['<!-- Este es un comentario -->', '/* Este es un comentario */', '// Este es un comentario', '# Este es un comentario'],
        'respuesta_correcta' => 2
    ]
];

$num_preguntas = count($preguntas);

if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
    $_SESSION['puntaje'] = 0;
    $_SESSION['respuestas'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $respuesta = $_POST['respuesta'];

    if ($respuesta == $preguntas[$_SESSION['contador']]['respuesta_correcta']) {
        $_SESSION['puntaje']++;
    }

    $_SESSION['respuestas'][] = $respuesta;

    $_SESSION['contador']++;

    if ($_SESSION['contador'] == $num_preguntas) {
        // Todas las preguntas han sido respondidas
        header('Location: cuestionario.php?resultado=true');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cuestionario de desarrollo web</title>
    <link rel="stylesheet" type="text/css" href="cuestionario.css">
</head>
<body>
    <?php if (isset($_GET['resultado']) && $_GET['resultado'] === 'true') : ?>
        <?php
        $puntaje = $_SESSION['puntaje'];
        $respuestas = $_SESSION['respuestas'];

        session_destroy();
        ?>

        <div class="resultado">
            <h1>Resultado del cuestionario</h1>

            <p>Puntaje obtenido: <?php echo $puntaje; ?> de <?php echo $num_preguntas; ?></p>

            <h2>Respuestas:</h2>
            <ul>
                <?php foreach ($respuestas as $index => $respuesta) : ?>
                    <li>
                        Pregunta <?php echo $index + 1; ?>:
                        Respuesta seleccionada: <?php echo $preguntas[$index]['opciones'][$respuesta]; ?>
                        <?php if ($respuesta == $preguntas[$index]['respuesta_correcta']) : ?>
                            (Correcta)
                        <?php else : ?>
                            (Incorrecta)
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>

            <a href="index.php" class="regresar-btn">Salir y regresar al inicio</a>
        </div>

    <?php else : ?>
        <h1>Cuestionario de desarrollo web</h1>

        <form method="POST" action="cuestionario.php">
            <div class="pregunta">
                <?php echo $preguntas[$_SESSION['contador']]['pregunta']; ?>
            </div>

            <div class="opciones">
                <?php foreach ($preguntas[$_SESSION['contador']]['opciones'] as $index => $opcion) : ?>
                    <label>
                        <input type="radio" name="respuesta" value="<?php echo $index; ?>" required>
                        <?php echo $opcion; ?>
                    </label>
                <?php endforeach; ?>
            </div>

            <input type="submit" value="Siguiente" class="submit-btn">
        </form>

    <?php endif; ?>
</body>
</html>
