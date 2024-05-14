<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pubblica un viaggio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0D1821; /* Cambia il colore di sfondo */
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90vw; /* Imposta la larghezza del container al 90% della larghezza della finestra del browser */
            max-width: 400px; /* Imposta la larghezza massima del container */
            margin: 50px auto;
            background-color: #15222F;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #B4CDED;
            margin-bottom: 20px;
        }

        label {
            color: #607A9D;
            text-align: left; /* Allinea i label a sinistra */
            display: block;
            margin-bottom: 5px;
        }

        input[type="date"],
        input[type="number"],
        input[type="text"],
        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            color: #607A9D;
        }

        input[type="submit"] {
            background-color: #B4CDED;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #607A9D; /* Cambia colore al passaggio del mouse */
        }

        a {
            color: #B4CDED;
            text-decoration: none;
            margin-top: 20px;
            display: block;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Pubblica un viaggio</h2>
        <form action="processi/inserimentoViaggio.php" method="post">
            <label for="data_inizio">Data inizio</label>
            <input type="date" name="data_inizio" id="data_inizio" required>
            
            <label for="data_fine">Data fine</label>
            <input type="date" name="data_fine" id="data_fine" required>
            
            <label for="numero_soste">Numero soste</label>
            <input type="number" name="numero_soste" id="numero_soste" required>
            
            <label>Aperto</label>
            <input type="radio" id="aperto_si" name="aperto" value="si" required>
            <label for="aperto_si">Si</label>
            <input type="radio" id="aperto_no" name="aperto" value="no">
            <label for="aperto_no">No</label>

            <label for="prezzo_passeggero">Prezzo passeggero</label>
            <input type="number" name="prezzo_passeggero" id="prezzo_passeggero" required>

            <label>Animali</label>
            <input type="radio" id="animali_si" name="animali" value="si" required>
            <label for="animali_si">Si</label>
            <input type="radio" id="animali_no" name="animali" value="no">
            <label for="animali_no">No</label>

            <label>Bagaglio</label>
            <input type="radio" id="bagaglio_si" name="bagaglio" value="si" required>
            <label for="bagaglio_si">Si</label>
            <input type="radio" id="bagaglio_no" name="bagaglio" value="no">
            <label for="bagaglio_no">No</label>

            <label>Fumatori</label>
            <input type="radio" id="fumatori_si" name="fumatori" value="si" required>
            <label for="fumatori_si">Si</label>
            <input type="radio" id="fumatori_no" name="fumatori" value="no">
            <label for="fumatori_no">No</label>

            <label for="numero_posti_disponibili">Numero posti disponibili</label>
            <input type="number" name="numero_posti_disponibili" id="numero_posti_disponibili" required>

            <label for="partenza">Partenza</label>
            <input type="text" name="partenza" id="partenza" required>

            <label for="arrivo">Arrivo</label>
            <input type="text" name="arrivo" id="arrivo" required>

            <input type="submit" value="Pubblica">
        </form>

        <a href="../../../index.php">Home page</a>
    </div>
</body>

</html>
