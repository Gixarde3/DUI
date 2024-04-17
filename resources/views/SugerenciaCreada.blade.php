<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sugerencia creada con éxito</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root{
            --principal: #022857;
            --principal-hover: #21236c;
        }
        *{
            font-family: 'Open Sans', sans-serif;
            box-sizing: border-box;
        }
        main{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }
        h1{
            margin: 0;
            font-size: 32px;
            text-align: center;
        }
        p{
            margin:0;
            font-family: "Open Sans";
            font-size: 16px;
            line-height: 1.57143;
            text-align: center;
            width: 100%;
        }
        a{
            text-decoration: none;
            color: white;
        }
        .accept{
            background-color: #022857;
            color: white;
            padding: 0.5rem;
            width: auto;
            cursor: pointer;
        }
        .accept:hover{
            background-color: var(--principal-hover);
        }
        .aclaracion{
            font-size: 12px;
            color: #8c8c8c;
        }
        img{
            max-width: 100%;
        }
    </style>
</head>
<body>
    <main>
        <!-- TODO Mail respuesta enviada -->
        <div style="text-align: center; padding: 20px;">
            <img src="{{ $message->embed(public_path() . '/img/logo.jpeg') }}" alt="Logo de DUI" style="max-width: 50%;">
        </div>
        <h1 style="text-align: center; color: #2E3092;">Sugerencia creada con éxito</h1>
    </main> 
</body>
</html>