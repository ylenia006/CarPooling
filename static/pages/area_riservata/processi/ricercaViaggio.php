<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Elenco Viaggi Disponibili</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #15222F; /* Cambiato colore di sfondo */
            color: #B4CDED; /* Cambiato colore del testo */
        }

        header {
            background-color: #0D1821;
            color: #B4CDED;
            text-align: center;
            padding: 20px 0;
        }

        h2 {
            color: #B4CDED;
        }

        main {
            padding: 20px;
        }

        div {
            border-bottom: 1px solid #344966;
            padding-bottom: 20px; /* Aggiunto spazio inferiore */
            margin-bottom: 20px; /* Aggiunto margine inferiore */
            text-align: center; /* Posiziona le informazioni al centro */
        }

        .Testo {
            color: #B4CDED;
        }

        .Testo1 {
            color: white;
            display: inline-block; /* Modificato per posizionare le informazioni una accanto all'altra */
            margin-right: 20px; /* Aggiunto margine per separare le informazioni */
        }

        .prenota-form {
            text-align: center; /* Posiziona il form all'estrema destra */
        }

        button[type="submit"] {
            width: 120px;
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
            background-color: #0D1821;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            margin-top: 20px; /* Aggiunto margine superiore */
        }

        footer a {
            color: #B4CDED;
            text-decoration: none;
            margin: 10px;
        }

    </style>
</head>

<body>
    <header>
        <h1>Elenco Viaggi Disponibili</h1>
    </header>

    <main>
        <?php
        // Connessione al database
        require_once("../../../../db.php");

        // Query per selezionare i viaggi disponibili
        $sql = "SELECT * FROM viaggio";
        $result = $db_connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sql = "SELECT COUNT(*) FROM prenotazione WHERE id_viaggio=" . $row["id"];
                $risultato = $db_connection->query($sql);
                $prenotati = $risultato->fetch_assoc()["COUNT(*)"];
                if ($prenotati < $row["numero_posti_disponibili"]) //visualizzerà solo i viaggi con posti disponibili 
                {

                    $animali = $row["animali"] == "1" ? "Si" : "No";
                    $bagaglio = $row["bagaglio"] == "1" ? "Si" : "No";
                    $fumatori = $row["fumatori"] == "1" ? "Si" : "No";
                    $aperto = $row["aperto"] == "1" ? "Si" : "No";

                    echo "<div>";
                    echo "<h2 class='Testo'>" . $row['partenza'] . " - " . $row['arrivo'] . "</h2>"; /* Modificato testo */
                    echo "<p class='Testo1'><span class='Testo'> Dal </span>" . $row['data_inizio'] . "<span class='Testo'> Al </span>" . $row['data_fine'] . "</p>";
                    echo "<p class='Testo1'><span class='Testo'> Numero soste: </span>" . $row['numero_soste'] . "</p>"; /* Modificato testo */
                    echo "<p class='Testo1'><span class='Testo'> Prezzo passeggero: </span>" . $row['prezzo_passeggero'] . "<span> € </span>" . "</p>"; /* Modificato testo */
                    echo "<p class='Testo1'><span class='Testo'> Aperto: </span>" . $aperto . "</p>"; /* Modificato testo */
                    echo "<p class='Testo1'><span class='Testo'> Fumatori: </span>" . $row['numero_soste'] . "</p>"; /* Modificato testo */
                    echo "<p class='Testo1'><span class='Testo'> Animali: </span>" . $animali . "</p>"; /* Modificato testo */
                    echo "<p class='Testo1'><span class='Testo'> Bagaglio: </span>" . $bagaglio . "</p>"; /* Modificato testo */
                    echo "<p class='Testo1'><span class='Testo'> Numero Posti Disponibili: </span>" . ($row['numero_posti_disponibili'] - $prenotati) . "</p>"; //sottrazione fra totale postio disponibili e posti prenotati
                    echo "<form class='prenota-form' action='conferma_prenotazione.php' method='post'>";
                    echo "<input type='hidden' name='id_viaggio' value='" . $row['id'] . "'>";
                    echo "<button type='submit'>Prenota</button>";
                    echo "</form>";
                    echo "</div>";
                }
            }
        } else {
            echo "Nessun viaggio disponibile";
        }

        // Chiusura della connessione al database
        $db_connection->close();
        ?>
    </main>
    <footer>
        <a href="../../../../index.php">Home page</a>
        <p>&copy; 2024 Car Pooling</p>
    </footer>
</body>

</html>
