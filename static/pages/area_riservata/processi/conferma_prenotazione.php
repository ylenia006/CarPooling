<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Conferma Prenotazione</title>
    <style>

    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #15222F; /* Cambiato colore di sfondo */
    text-decoration: #B4CDED;
    display: flex;
    justify-content: center; /* Centrare orizzontalmente */
    align-items: center; /* Centrare verticalmente */
    height: 100vh; /* Altezza della viewport */
    }

    .response-container {
        text-align: center;
        background-color: #0D1821;
        padding: 40px; /* Aumentato il padding */
        border-radius: 8px;
        color: #ffffff; /* Testo bianco */
        border: 2px solid #344966;
        max-width: 400px; /* Larghezza massima del container */
    }

    .response-container h2 {
        margin-bottom: 20px; /* Aggiunto margine inferiore */
    }

    .response-container a {
        color: #B4CDED; /* Colore del link */
        text-decoration: none;
        margin-top: 20px; /* Aggiunto margine superiore per il link */
    }

    .response-container a:hover {
        text-decoration: underline;
    }

    </style>
</head>

<body>
    <div class="response-container">
        <?php
        session_start();
        require_once("../../../../db.php");

        // Ottieni l'ID del viaggio prenotato
        $id_viaggio = $_POST['id_viaggio'];

        // Ottieni l'ID dell'utente dalla sessione
        $username = $_SESSION['username'];
        $sql = "SELECT id FROM utente WHERE email='" . $username . "'";
        $result = $db_connection->query($sql);
        $id_utente = $result->fetch_assoc()["id"];

        // Prepara la query per l'inserimento della prenotazione
        $sql = "INSERT INTO prenotazione (id, accettata, id_viaggio, id_utente) VALUES (NULL, NULL, ?, ?)";

        // Prepara e esegui la query con prepared statement
        if ($stmt = $db_connection->prepare($sql)) {
            // Associa i parametri alla query
            $stmt->bind_param("ii", $id_viaggio, $id_utente);

            // Esegui la query
            if ($stmt->execute()) {
                // Se l'inserimento è avvenuto con successo, visualizza un messaggio all'utente
                echo "</h2>Prenotazione confermata!</h2>";
            } else {
                // Se si è verificato un errore durante l'esecuzione della query, visualizza un messaggio di errore
                echo "Si è verificato un errore durante la prenotazione.";
            }

            // Chiudi lo statement
            $stmt->close();
        } else {
            // Se si è verificato un errore nella preparazione della query, visualizza un messaggio di errore
            echo "Errore nella preparazione della query.";
        }

        // Chiudi la connessione al database
        $db_connection->close();
        ?>
        <br>
        <br>
        <a href="../../../../index.php">Home page</a>
        <p>&copy; 2024 Car Pooling</p>
    </div>
</body>

</html>
