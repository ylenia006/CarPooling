<?php

session_start();
require_once("../../../../db.php");

// Ottieni i valori inviati dal form
$email = $_POST["email"];
$password = $_POST["password"];

// Prepara la query SQL utilizzando una dichiarazione preparata
$sql = "SELECT * FROM utente WHERE email like ?";

if ($stmt = $db_connection->prepare($sql)) {
    // Associa i parametri e setta i tipi di dato
    $stmt->bind_param("s", $email);

    // Esegui la query
    if ($stmt->execute()) {
        // Ottieni il risultato della query
        $result = $stmt->get_result();
        // Verifica se esiste un utente con le credenziali fornite
        $row = mysqli_fetch_assoc($result);

        if ($result->num_rows == 1 && password_verify($password, $row["password"])) {
            // Login riuscito, imposto la variabile di sessione e reindirizzo alla home page
            $_SESSION['user'] = [
                "email" => $email,
                "patente" => $row["numero_patente"],
            ];
            header("Location: ../../../../index.php");
            exit;
        } else {
            echo "Credenziali non valide";
        }
    } else {
        echo "Errore nell'esecuzione della query";
    }

    // Chiudi lo statement
    $stmt->close();
} else {
    echo "Errore nella preparazione della query";
}

// Chiudi la connessione al database
$db_connection->close();
