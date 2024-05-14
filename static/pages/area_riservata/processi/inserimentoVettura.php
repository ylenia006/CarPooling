<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Visualizzazione recensioni</title>
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
            text-align: center; /* Centrare il testo */
            background-color: #0D1821;
            padding: 20px;
            border-radius: 8px;
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

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #344966;
            margin-bottom: 15px;
            width: calc(100% - 22px);
            color: #B4CDED;
        }

        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            background-color: #333;
            color: #B4CDED;
            cursor: pointer;
            transition: background-color 0.3s; /* Aggiunto effetto di transizione */
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Cambiato colore di sfondo al passaggio del mouse */
        }

        main {
            padding: 20px;
        }

        footer {
            background-color: #0D1821;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer a {
            color: #B4CDED;
            text-decoration: none;
            margin: 0 10px;
        }

        div {
            padding-bottom: 20px; /* Aggiunto spazio inferiore */
            margin-bottom: 20px; /* Aggiunto margine inferiore */
        }

        .Testo {
            color: #B4CDED;
            text-decoration: none;
        }

        .Testo1 {
            color: white;
            text-decoration: none;
        }

    </style>
</head>

<body>
    <div class="response-container">
        <?php
        session_start();
        require_once("../../../../db.php");

        // Ottieni i valori inviati dal form
        $targa = $_POST['targa'];
        $casaProduttrice = $_POST['casaProduttrice'];
        $modello = $_POST['modello'];
        $numeroPosti = $_POST['numeroPosti'];
        $annoImmatricolazione = $_POST['annoImmatricolazione'];
        $numeroPatente = $_SESSION['user']["patente"];
        $colore = $_POST['colore'];
        $chilometri = $_POST['chilometri'];
        $carburante = $_POST['carburante'];
        $cilindrata = $_POST['cilindrata'];

        $select_id = "SELECT id FROM utente WHERE numero_patente = ?";
        if ($stmt_id = $db_connection->prepare($select_id)) {
            $stmt_id->bind_param("s", $numeroPatente);
            if ($stmt_id->execute()) {
                $result_id = $stmt_id->get_result();
                $row_id = $result_id->fetch_assoc();
                $result_id = $row_id['id'];
            } else {
                echo "Errore nell'esecuzione della query";
            }
            $stmt_id->close();
        } else {
            echo "Errore nella preparazione dell'istruzione SQL: " . $db_connection->error;
        }

        $sql_insert = "INSERT INTO automobile (targa, casa_produttrice, modello, numero_posti, colore, anno_immatricolazione, chilometri, carburante, cilindrata, id_utente) 
               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt_insert = $db_connection->prepare($sql_insert)) {
            // Associa i parametri e setta i tipi di dato
            $stmt_insert->bind_param("ssssssssss", $targa, $casaProduttrice, $modello, $numeroPosti, $colore, $annoImmatricolazione, $chilometri, $carburante, $cilindrata, $result_id);

            // Esegui l'istruzione INSERT
            if ($stmt_insert->execute()) {
                echo "<span class='Testo1'>Dati inseriti correttamente nella tabella automobile.</span>";
            } else {
                echo "<span class='Testo1'>Errore nell'esecuzione dell'istruzione INSERT: </span>" . $stmt_insert->error;
            }

            // Chiudi lo statement INSERT
            $stmt_insert->close();
        } else {
            echo "Errore nella preparazione dell'istruzione SQL di inserimento: " . $db_connection->error;
        }

        // Chiudi la connessione al database
        $db_connection->close();
        ?>
        <br><a class='Testo' href="/">Home page</a>
    </div>
</body>

</html>
