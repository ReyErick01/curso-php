<?php
    const API_URL = "https://whenisthenextmcufilm.com/api";
    // Obtener el contenido de la API
    $result = @file_get_contents(API_URL);

    // Verificar si la solicitud fue exitosa
    if ($result === false) {
        die("Error al acceder a la API");
    }

    // Decodificar el resultado JSON
    $data = json_decode($result, true);

    // Verificar si hubo un error en la decodificación JSON
    if (json_last_error() !== JSON_ERROR_NONE) {
        die("Error en la decodificación JSON: " . json_last_error_msg());
    }
    
?>

<head>
    <meta charset="UTF-8" />
    <title>La próxima película de Marvel</title>
    <meta name="description" content="La próxima película de Marvel" />
    <meta name="viewport" content="width=device-width, initial-scale1.0" />
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>


<main>
    <!--<pre style="font-size: 8 px; overflow: scroll; height: 250px">
    <?php var_dump($data); ?>
    </pre>-->
    <section>
        <img src="<?= $data["poster_url"]; ?>" width="200" alt="Poster de <?= $data["title"]; ?>" 
        style="border-radius: 16px" />
    </section>

    <hgroup>
        <h3><?= $data["title"]; ?> Se estrena en <?= $data["days_until"]; ?> días</h3>
        <p>Fecha de estreno: <?= $data["release_date"]; ?></p>
        <p>La siguiente es: <?= $data["following_production"]["title"]; ?></p>
    </hgroup>
    
</main>


<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }
    section{
        display: flex;
        justify-content: center;
        text-align: center;
    }
    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
    img{
        margin: 0 auto;
    }
</style>
