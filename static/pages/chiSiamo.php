<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Siamo - Car Pooling</title>
    <link rel="stylesheet" href="static/css/style.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0D1821;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Altezza minima pari al 100% dell'altezza della viewport */
        }

        .about-us {
            background-color: #15222F;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            width: 90vw;
            max-width: 600px;
            text-align: center;
        }

        h2, h3 {
            color: #B4CDED;
            margin-bottom: 20px;
        }

        p {
            color: white;
            margin-bottom: 10px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin-bottom: 20px;
        }

        li {
            margin-bottom: 10px;
            color: white;
        }

        img {
            max-width: 95%;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        footer {
            background-color: #15222F;
            padding: 20px;
            border-radius: 0;
            width: 100%;
            text-align: center;
            color: #ffffff;
            margin-top: auto; /* Posizionamento in fondo */
            position: fixed; /* Posizionamento fisso */
            bottom: 0; /* Posizionamento in basso */
        }

        footer p {
            margin: 0;
            color: #B4CDED;
        }

        .home-link {
            color: #ffffff;
            text-decoration: none;
            margin-top: 20px;
            display: block;
            text-align: center;
        }

        .home-link:hover {
            text-decoration: underline;
        }

        .contatti{
            color: #B4CDED;
        }

        a {
            color: #B4CDED; /* cambiato colore del testo dei link */
            text-decoration: none;
            margin: 10px;
            display: inline-block; /* aggiunto per allineare orizzontalmente i link */
        }

    </style>
</head>

<body>
    <section class="about-us">
        <h2>Benvenuti in Car Pooling</h2>
        <p>Siamo una piattaforma di car-pooling che mira a ridurre il traffico stradale, i costi di viaggio e l'impatto
            ambientale promuovendo la condivisione delle auto.</p>
        <p>La nostra missione è connettere persone che condividono viaggi in modo sicuro, efficiente ed ecologico.</p>
        <h3>Obiettivi Principali</h3>
        <ul>
            <li>Promuovere la condivisione dei viaggi per ridurre il traffico stradale.</li>
            <li>Ridurre l'inquinamento atmosferico e l'impatto ambientale legato all'uso eccessivo di veicoli privati.
            </li>
            <li>Fornire un'opzione economica e conveniente per gli spostamenti quotidiani e i viaggi occasionali.</li>
        </ul>
        <h3>Contatti</h3>
        <p>Se hai domande, suggerimenti o vuoi collaborare con noi, contattaci:</p>
        <ul>
            <li><span class="contatti">Email:</span> info@carpooling.com</li>
            <li><span class="contatti">Telefono:</span> +39 0123 456789</li>
        </ul>
        <img src="https://images.unsplash.com/photo-1682795659221-cd5cea1217cc?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
    </section>

    <footer>
        <a href="../../../index.php">Home page</a>
        <p>&copy; 2024 Car Pooling</p>
    </footer>
</body>

</html>
