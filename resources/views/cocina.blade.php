<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>DUI Spá</title>
</head>
<body>
    <header>
        <div id="logo">
            <img src="/img/logo.jpeg" alt="Logo de DUI">
        </div>
        <nav>
            <a href="/">DUI</a>
            <a href="/habitaciones">Habitaciones</a>
            <a href="/cocina">Cocina</a>
            <a href="/spa">Spá</a>
            <a href="/bodas">Bodas</a>
            <a href="/grupos">Grupos</a>
            <a href="/experiencia">Experiencia</a>
            <a href="/mas">Más</a>
        </nav>
    </header>
    <article class="img-principal" id="cocina-img">
        <h2 id="frase">La cocina de DUI</h2>
    </article>
    <main>
        <h2 class="subtitulo">Nuestras opciones culinarias</h2>
        <ul>
            <li>MESA DE ORIGEN RESTAURANTE</li>
            <li>PISCINA Y POOL BAR</li>
            <li>ROOM SERVICE</li>
            <li>CENAS ROMÁNTICAS EN EL ESTANQUE</li>
            <li>COCTELES Y CENAS PRIVADAS EN MESA DE HOTEL</li>
        </ul>
        <article id="comidas">
            <div class="descripcion-comida">
                <h3>Cena romántica</h3>
                <p>Cenas privadas pora ocasiones especiales junto al
                    estanque creando recuerdos para toda la vida
                    Decoración con flores, velas y músico de cuerdos, el
                    encuodre perfecto pora una gron celebración en pareja</p>
                <button class="ver-mas">Menú muestra</button>
            </div>
            <img src="/img/comida-1.png" alt="Tipo de comida 1">
            <div class="descripcion-comida">
                <h3>Menú de piscina</h3>
                <p>En la piscina, nuestros huéspedes disfrutan de una de
                    los mejores vistos del Tepozteco encuadroda por los
                    verdes jordines de Amomoxtl: platilios regionoles.
                    pizzos al horno de leña, vegetales y frutos frescos y
                    originales cocteles desde nuestro bar.</p>
                <button class="ver-mas">Resevar</button>
            </div>
            <img src="/img/comida-2.png" alt="Tipo de comida 2">
            <div class="descripcion-comida">
                <h3>Mesa de origen</h3>
                <p>En Mesa de Origen, nuestro restaurante en Tepoztlán, utilizamos únicamente ingredientes oriundos de Morelos. Muchos de ellos son los productos del día en el mercado del pueblo. Rescatamos recetas familiares ancestrales y utilizamos métodos de cocina como el tlecuil y el horno de leña, para llenar nuestra cocina de esos aromas y sabores que nos remiten a lo auténtico. Es el gozo por lo simple. Entendemos el ciclo vital de producción, la relación entre las estaciones, la tierra, la semilla y el territorio. Los platillos, la arquitectura y el servicio convierten a Mesa de Origen en una de las mejores opciones de restaurante en Cuernavaca y sus alrededores.</p>
                <button class="ver-mas">Resevar</button>
            </div>
            <img src="/img/comida-3.png" alt="Tipo de comida 3">
        </article>
    </main>
    <footer>
        <div id="social">
            <a href="https://www.facebook.com/dui" target="_blank"><img src="/img/facebook.svg" alt="Facebook"></a>
            <a href="https://www.instagram.com/dui" target="_blank"><img src="/img/whatsapp.svg" alt="Instagram"></a>
            <a href="https://www.twitter.com/dui" target="_blank"><img src="/img/twitter.svg" alt="Twitter"></a>
        </div>
    </footer>
</body>
</html>