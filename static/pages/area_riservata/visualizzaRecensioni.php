

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
            border-bottom: 1px solid #344966;
            padding-bottom: 20px; /* Aggiunto spazio inferiore */
            margin-bottom: 20px; /* Aggiunto margine inferiore */
        }

		.Testo{
			color: #B4CDED;
		}

		.Testo1{
			color: white;
		}

    </style>
</head>

<body>
    <header>
        <h2>Visualizza recensioni</h2>
    </header>

    <main>
    <?php
        session_start();
        require_once("../../../db.php");

        $sql = "
        SELECT recensione.*, u1.nome AS nome_scrittore, u1.cognome AS cognome_scrittore, u2.nome AS nome_ricevente, u2.cognome AS cognome_ricevente
        FROM recensione
        JOIN utente AS u1 ON recensione.id_utente_scrittore = u1.id
        JOIN utente AS u2 ON recensione.id_utente_ricevente = u2.id;
        ";
        /*
        $select_scrittore = "SELECT nome, cognome FROM utente";
        $stmt_scrittore = $db_connection->prepare($select_scrittore);
        $stmt_scrittore->execute();
        $result_scrittore = $stmt_scrittore->get_result();

        if ($result_scrittore->num_rows > 0) {
            $row_scrittore = $result_scrittore->fetch_assoc();
        } else {
            echo "Nessun utente scrittore trovato.";
        }
        */
        $result = $db_connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div>";
                echo "<h3 class='Testo'>" . $row["nome_scrittore"]. " " . $row["cognome_scrittore"] . "</h3>";
                echo "<h4 class='Testo'>Recensione a: " . $row["nome_ricevente"]. " " . $row["cognome_ricevente"] . "</h4>"; /* Modificato testo */
                echo "<p class='Testo1'><span class='Testo'>Giudizio: </span>" . $row['giudizio'] . "</p>";
                echo "<p class='Testo1'><span class='Testo'> Voto: </span>" . $row['voto'] . "</p>"; /* Modificato testo */
                echo "</div>";
            }
        } else {
            echo "Nessun risultato";
        }
        $db_connection->close();
    ?>



    </main>
    <footer>
        <a href="inserisciRecensioni.html">Pagina di inserimento recensioni</a>
        <a href="../../../index.php">Home page</a>
        <p>&copy; 2024 Car Pooling</p>
    </footer>
</body>

</html>


