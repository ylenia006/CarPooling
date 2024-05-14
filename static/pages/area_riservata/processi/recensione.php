<?php
session_start();
require_once("../../../../db.php");

// Verifica se tutti i parametri sono stati passati correttamente
if(isset($_POST['giudizio'], $_POST['voto'], $_POST['riceventeNome'], $_POST['riceventeCognome'])) {
    $giudizio = $_POST['giudizio'];
    $voto = $_POST['voto'];
    $nome_ricevente = $_POST['riceventeNome'];
    $cognome_ricevente = $_POST['riceventeCognome'];

    // Esegui la query per ottenere l'ID dell'utente ricevente
    $stmt_ricevente = $db_connection->prepare("SELECT id FROM utente WHERE nome = ? AND cognome = ?");
    $stmt_ricevente->bind_param("ss", $nome_ricevente, $cognome_ricevente);
    $stmt_ricevente->execute();
    $result_ricevente = $stmt_ricevente->get_result();

    if ($result_ricevente->num_rows > 0) {
        $row_ricevente = $result_ricevente->fetch_assoc();
        $id_utente_ricevente = $row_ricevente['id'];
    } else {
        echo "Nessun utente ricevente trovato.";
        exit; // Esci dallo script se non c'è un utente ricevente
    }

    // Esegui l'inserimento nella tabella recensioni
    $sql = "INSERT INTO recensione (giudizio, voto, id_utente_ricevente, id_utente_scrittore) VALUES (?, ?, ?, ?)";
    $stmt_recensione = $db_connection->prepare($sql);
    $stmt_recensione->bind_param("siii", $giudizio, $voto, $id_utente_ricevente, $id_utente_scrittore);

    if ($stmt_recensione->execute()) {
        echo "Recensione inserita con successo!";
        exit; // Esci dallo script dopo il reindirizzamento
    } else {
        echo "Errore durante l'inserimento della recensione: " . $stmt_recensione->error;
    }

    // Chiudi le connessioni e le istruzioni preparate
    $stmt_ricevente->close();
    $stmt_recensione->close();
} else {
    echo "Parametri mancanti per l'inserimento della recensione.";
}

$db_connection->close();
?>