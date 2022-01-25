<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Min enkla blogg</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/minty/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="kontainer">
        <header>
            <h1>Min Blogg</h1>
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Mina inlägg</a></li>
                    <li class="nav-item"><a class="active nav-link" href="#">Admin</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <form action="./spara.php" method="post">

                <label class="form-label">Rubrik</label>
                <input class="form-control" type="text" name="rubrik" required>

                <label class="form-label">Meddelande</label>
                <textarea class="form-control" name="meddelande" cols="30" rows="10"></textarea>
                <button class="btn btn-primary">Skicka</button>

            </form>
        </main>
        <footer>
            Hösten 2021
        </footer>
    </div>
</body>
</html>