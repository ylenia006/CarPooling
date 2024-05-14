<?php
session_start();
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Pooling home page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #0D1821;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        header {
            color: #ffffff;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }

        h1 {
            margin: 0;
            margin-bottom: 20px;
            color: #B4CDED;
        }

        h2 {
            margin: 0;
            margin-bottom: 20px;
            color: #B4CDED;
            padding-top: 20px;
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            margin: 0 10px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        main {
            margin: 20px;
        }

        form {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        button[type="text"],
        button[type="date"],
        button[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 150px;
            padding: 10px;
            background-color: #B4CDED;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #344966;
        }

        footer {
            background-color: #15222F;
            color: #B4CDED;
            text-align: center;
            border-radius: 0 0 8px 8px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        img {
            width: 55%;
            border-radius: 8px;
        }

        .separatore{
            padding-top: 20px;
        }

    </style>
</head>

<body>
    <header>
        <h1>Car Pooling</h1>
        <nav>
            <?php
                if (!isset($_SESSION["user"])) {
                    echo "
                        <button type='submit' onclick='window.location.href=`./static/pages/area_riservata/login.html`'>Accedi</button>
                        <button type='submit' onclick='window.location.href=`static/pages/area_riservata/registrazione.html`'>Registrati</button>
                    ";
                }
            ?>
        </nav>
        <div class="separatore"></div>
        <img src="./static/pages/area_riservata/processi/images/ferrari.jpg" alt="immagine macchina">
        <h2>Benvenuto</h2>
        <?php 
            if (isset($_SESSION["user"])) {
                echo "
                    <button type='submit' onclick='window.location.href=`static/pages/area_riservata/logout.php`'>Logout</button>            
                    <button type='submit' onclick='window.location.href=`static/pages/area_riservata/processi/ricercaViaggio.php`'> Cerca Viaggio</button>
                    <button type='submit' onclick='window.location.href=`static/pages/area_riservata/inserisciRecensioni.html`'>Inserisci recensione</button>
                    <button type='submit' onclick='window.location.href=`static/pages/area_riservata/visualizzaRecensioni.php`'>Visualizza recensioni</button>
                    <button type='submit' onclick='window.location.href=`static/pages/area_riservata/pubblicaViaggio.php`'>Pubblica passaggio</button>
                    <button type='submit' onclick='window.location.href=`static/pages/area_riservata/inserimentovettura.html`'>Inserisci Vettura</button>";
            }
        ?>
        <button type="submit" onclick="window.location.href='static/pages/newsletter.php'">Newsletter</button>
        <button type="submit" onclick="window.location.href='static/pages/chiSiamo.php'">Chi Siamo</button>
    </header>

    <footer>
        <p>&copy; 2024 Car Pooling</p>
    </footer>
</body>
</html>
