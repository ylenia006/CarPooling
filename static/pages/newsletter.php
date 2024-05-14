<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iscriviti alla Newsletter - Car Pooling</title>
    <link rel="stylesheet" href="../../static/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0D1821;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Altezza minima pari al 100% dell'altezza della viewport */
        }

        .registration-container {
            width: 90vw;
            max-width: 600px;
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

        form {
            display: grid;
            grid-gap: 10px;
        }

        label {
            color: #607A9D;
        }

        input[type="email"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            color: #607A9D;
        }

        input[type="submit"] {
            background-color: #B4CDED;
            color: #ffffff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #607A9D;
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
    </style>
</head>

<body>
    <div class="registration-container">
        <h2>Iscriviti alla Newsletter</h2>
        <form action="#" method="post">
            <label for="email">Indirizzo Email:</label>
            <input type="email" id="email" name="email" required>
            <input type="submit" value="Iscriviti">
        </form>
        <a href="../../../index.php" class="home-link">Torna alla Home</a>
    </div>

    <footer>
        <p>&copy; 2024 Car Pooling</p>
    </footer>
</body>

</html>
