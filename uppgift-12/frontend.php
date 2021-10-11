<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Små till stora bokstäver</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h3>Versaler eller Gemener</h3>
        <form action="./backend.php" method="post">
            <div class="mb-3">
                <label for="texten" class="form-label">Mata in text</label>
                <textarea class="form-control" name="texten" id="texten" cols="30" rows="10"></textarea>
            </div>
            <div class="kol2">
                <p>Ange riktning</p>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="stora" checked name="riktning" value="stora">
                    
                    <label class="form-check-label" for="stora">Till stora bokstäver</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="sma" name="riktning" value="sma">
                    
                    <label class="form-check-label" for="sma">Till små bokstäver</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Skicka</button>
        </form>
    </div>
    <script src="./script.js"></script>
</body>
</html>